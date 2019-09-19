<?php $__env->startSection('content'); ?>
<div class="ui container">
    <a href="/" class="ui button left attached">Back</a>

    <h3 class="ui header centered">URL HISTORY</h3>


    <?php if(!empty($urls)): ?>
    <table class="ui sortable celled table">
        <thead>
        <tr><th>Original URL</th>
            <th>Shortened URL</th>
            <th>Created Date</th>
        </tr></thead>
        <tbody>
        <?php $__currentLoopData = $urls; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $url): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
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
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </tbody>
    </table>
    <?php else: ?>
        <p>Nothing...</p>
    <?php endif; ?>


</div>

<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.layout', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /var/www/url-shortener/views/main/url-table.blade.php ENDPATH**/ ?>