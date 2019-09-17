@extends('layouts.layout')

@section('content')
<div class="ui container">
    <a href="/" class="ui button left attached">Back</a>

    <h3 class="ui header centered">URL HISTORY</h3>


    @if(!empty($urls))
    <table class="ui sortable celled table">
        <thead>
        <tr><th>Original URL</th>
            <th>Shortened URL</th>
            <th>Created Date</th>
        </tr></thead>
        <tbody>
        @foreach($urls as $url)
        <tr>
            <td>
                <a href="<?= \App\Helpers\UrlHelper::normalizeUrl($url['original_url']) ?>" target="_blank">
                    <?= \App\Helpers\UrlHelper::normalizeUrl($url['original_url'])?>
                </a>
            </td>
            <td>
                <a href="<?= \App\Helpers\UrlHelper::make($url['shorten_url'])?>" target="_blank">
                    <?= \App\Helpers\UrlHelper::make($url['shorten_url'])?>
                </a>
            </td>
            <td><?= $url['created_date'] ?></td>
        </tr>
        @endforeach
        </tbody>
    </table>
    @else
        <p>Nothing...</p>
    @endif


</div>

@endsection