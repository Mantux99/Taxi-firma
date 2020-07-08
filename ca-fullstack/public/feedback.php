<?php

require_once '../bootloader.php';

use App\App;

//ties sia vieta $form sukuriam 
//formos masyvas yra prieinamas per getData
//kiekvieno fieldo ir formos validatoriu kvieciame ir callbackiname.

$navigation = new \App\Views\Navigation();
$commentForm = new \App\Views\Forms\Comments\CommentCreateForm();

// function form_success(&$commentForm, $input)
// {
//     $comment = new \App\Comments\Comment($input);
//     $comment->id = \App\Comments\Model::insert($comment);
//     print json_encode($comment);
//     var_dump($comment);
// }

function fail(&$form, $input)
{
}
?>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>About Us</title>
    <link rel="stylesheet" href="/assets/css/style.css">
    <script src="assets/js/app.js" type="module" defer></script>
</head>

<body>
    <?php print $navigation->render(); ?>
    <main class="main">
    <div class="form">
        <h1>Feedback</h1>
        <div class="comments-block"></div>
        <div class="add-comment-block">
            <?php if (App::$session->getUser()) : ?>
                <?php print $commentForm->render(); ?>
            <?php else : ?>
                <span>Want to write a comment? <a href="register.php">Register</a></span>
            <?php endif ?>
        </div>
        </div>
    </main>
    <footer>
        <span>© 2019. Mantas Cerkesas, all rights reserved.</span>
    </footer>
</body>

</html>