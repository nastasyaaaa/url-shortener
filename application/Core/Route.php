<?php

namespace App\Core;

use App\Core\Http\Exceptions\NotFoundHttpException;
use App\Core\Http\Request;

class Route
{
    protected $routes = [];

    const METHOD_GET = 'GET';
    const METHOD_POST = 'POST';
    const METHOD_PUT = 'PUT';
    const METHOD_DELETE = 'DELETE';

    public function get($uri, $callable)
    {
        array_push($this->routes, [
            'method' => self::METHOD_GET,
            'uri' => $uri,
            'handler' => $callable
        ]);
    }

    public function post($uri, $callable)
    {
        array_push($this->routes, [
            'method' => self::METHOD_POST,
            'uri' => $uri,
            'handler' => $callable
        ]);

    }

    public function put($uri, $callable)
    {
        array_push($this->routes, [
            'method' => self::METHOD_PUT,
            'uri' => $uri,
            'handler' => $callable
        ]);

    }

    public function delete($uri, $callable)
    {
        array_push($this->routes, [
            'method' => self::METHOD_DELETE,
            'uri' => $uri,
            'handler' => $callable
        ]);
    }

    public function start(Request $request)
    {
        $uri = $request->server('REQUEST_URI');
        $method = $request->server('REQUEST_METHOD');

        try {
            $handler = $this->getRouteHandler($uri, $method);

            $controller = new $handler[0];
            $handler = $handler[1];

            $controller->$handler($request);

        }catch(\Exception $e) {
            echo $e->getMessage();
        }

    }

    private function getRouteHandler($uri, $method)
    {
        if(!empty($this->routes)){

            foreach($this->routes as $route){

                if($route['uri'] === $uri) {
                    return $this->check($route, $method);
                }

                // by reg_exp
                if(strpos($route['uri'], '{')) {
                    return $this->check($route, $method);
                }

            }
        }

        throw new NotFoundHttpException();
    }

    private function check($route, $method)
    {
        if($route['method'] !== $method) {
            throw new \Exception('This method isn`t supported by this route.');
        }

        if(!is_callable($route['handler'])) {
            throw new NotFoundHttpException();
        }

        return $route['handler'];
    }

}