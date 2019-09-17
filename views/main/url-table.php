<?php include(VIEWPATH . '/layouts/head.php') ?>
<body>
<div class="ui container">
    <a href="/" class="ui button left attached">Back</a>

    <h3 class="ui header centered">URL HISTORY</h3>


    <?php if(!empty($urls)):  ?>
    <table class="ui sortable celled table">
        <thead>
        <tr><th>Original URL</th>
            <th>Shortened URL</th>
            <th>Created Date</th>
        </tr></thead>
        <tbody>
        <?php foreach($urls as $url): ?>
        <tr>
            <td>
                <a href="<?= \Helpers\UrlHelper::normalizeUrl($url['original_url']) ?>" target="_blank">
                    <?= \Helpers\UrlHelper::normalizeUrl($url['original_url'])?>
                </a>
            </td>
            <td>
                <a href="<?= \Helpers\UrlHelper::make($url['shorten_url'])?>" target="_blank">
                    <?= \Helpers\UrlHelper::make($url['shorten_url'])?>
                </a>
            </td>
            <td><?= $url['created_date'] ?></td>
        </tr>
        <?php endforeach ?>
        </tbody>
    </table>
    <?php else: ?>
        <p>Nothing...</p>
    <?php endif ?>


</div>

<?php include(VIEWPATH . '/layouts/footer.php') ?>
