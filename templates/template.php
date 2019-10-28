<!DOCTYPE html>
<html lang="fr">
    <head>
        <meta charset="utf-8" />
        <title><?= $title ?></title>
        <link href="public/css/style.css" rel="stylesheet" /> 
        <script src="https://cdn.tiny.cloud/1/trvvr2zcgtzs9oiv88nw7oainebtfn4zeag01li68yewenve/tinymce/5/tinymce.min.js" referrerpolicy="origin"></script>
        <script>tinymce.init({selector:'.tinymce'});</script>
    </head>
        
    <body>

        <?= $header ?>
        <?= $content ?>

        <script src="public/js/script.js"></script>
    </body>
</html>
