<!DOCTYPE html>

<html lang="fr">

    <head>
        <meta charset="utf-8" />
        <title><?= $title ?></title>
        <!-- Boostrap -->
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">

        <!-- Google fonts -->
        <link href="https://fonts.googleapis.com/css?family=Caveat|Niconne|Titillium+Web&display=swap" rel="stylesheet">

        <!-- Tiny MCE -->
        <script src="https://cdn.tiny.cloud/1/trvvr2zcgtzs9oiv88nw7oainebtfn4zeag01li68yewenve/tinymce/5/tinymce.min.js" referrerpolicy="origin"></script>
        <script>tinymce.init({selector:'.tinymce'});</script>

        <link href="public/css/style.css" rel="stylesheet" /> 
    </head>
        
    <body>

        <?= $header ?>
        
        <div class="content">
            <?= $content ?>
        </div>

        <footer>
            <?= $footer ?>
        </footer>

        <!-- JQuery -->
        <script src="https://code.jquery.com/jquery-3.4.1.min.js" integrity="sha256-CSXorXvZcTkaix6Yvo6HppcZGetbYMGWSFlBw8HfCJo="crossorigin="anonymous"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>

        <!-- Boostrap -->
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>

        <script src="public/js/script.js"></script>
    </body>
    
</html>
