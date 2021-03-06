<?php $__env->startSection('content'); ?>

    <div class="ui container ">

        <a href="/table" class="ui button">URL List</a>

        <div class="ui segment">
            <h3 class="ui header">URL SHORTENER</h3>

            <form action="/make" method="post" class="form ui">
                <div class="ui field">
                    <div class="ui pointing below label">
                        Please enter a value with http(s)
                    </div>

                    <input type="text" id="url" class="js-validate" data-validation="required url"
                           placeholder="mysite.com">

                </div>
                <button class="ui button" id="add-url" type="submit">Shorten</button>
            </form>


            <div id="result" style="display: none;">
                <h3> Shortened URL: </h3>

                <a target="_blank" id="shortened"></a>
            </div>
        </div>
    </div>

<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.layout', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /var/www/url-shortener/views/main/main.blade.php ENDPATH**/ ?>