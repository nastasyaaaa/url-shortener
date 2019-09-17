<?php

namespace App\Controllers;

use App\Core\Controller;
use App\Core\Http\Exceptions\NotFoundHttpException;
use App\Core\Http\Request;
use App\Helpers\UrlHelper;
use App\Models\Url;
use App\Services\UrlShortenService;

class MainController extends Controller
{
    public function main()
    {
        return view('main.main');
    }

    public function urlTable()
    {
        $model = new Url();

        $urls = $model->getURls();

        return view('main.url-table', compact('urls'));
    }

    public function shortenUrl(Request $request)
    {
        $service = new UrlShortenService();
        $model = new Url();

        $url = $request->json('url');
        $existing = $model->getByOriginalUrl($url);


        if (!$existing) {

            // TRANSACTION : CREATE URL -> GET UNIQUE ID -> GET UNIQUE A-Z ID -> UPDATE ROW
            $created = $model->transaction(function () use ($model, $url, $service) {

                $id = $model->add([
                    'original_url' => $url,
                    'created_date' => date('Y-m-d H:i:s')
                ]);

                $shortened = $service->shorten($id);

                $model->update($id, $shortened);
            });

            if ($created) {
                $existing = $model->getByOriginalUrl($url);
            }

        }
        if ($existing) {
            return $this->response->JsonResponse(['url' => UrlHelper::make($existing['shorten_url'])]);
        }

        return $this->response->JsonResponse('Something went wrong', 400);
    }

    public function getUrlBySlug(Request $request)
    {
        $model = new Url();

        $shortened = $request->server('REQUEST_URI');
        $item = $model->getByShortenedUrl($shortened);

        if ($item) {
            $this->response->redirect(UrlHelper::normalizeUrl($item['original_url']));
        }

        throw new NotFoundHttpException();
    }

}