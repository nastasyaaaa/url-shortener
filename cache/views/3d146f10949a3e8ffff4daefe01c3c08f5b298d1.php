<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="/assets/css/semantic.min.css">

    <title>Url Shortener</title>
    <style>
        .invalid {

        }
    </style>
</head>
<body>

<?php echo $__env->yieldContent('content'); ?>


<?php echo $__env->make('layouts.scripts', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

</body>
</html><?php /**PATH /var/www/url-shortener/views/layouts/layout.blade.php ENDPATH**/ ?>