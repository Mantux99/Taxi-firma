<?php

require_once '../bootloader.php';

use App\App;

if (App::$session->getUser()) {
    header('Location: index.php');
}

function form_success(&$form, $input)
{
    $input['password'] = password_hash($input['password'], PASSWORD_BCRYPT);

    $user = new \App\Users\User($input);
    
    \App\Users\Model::insert($user);

    header('Location: login.php');
}

function form_fail(&$form, $input)
{
    $form['message'] = 'Failed to Register';
}

$navigation = new \App\Views\Navigation();
$form = new \App\Views\Forms\Auth\Register();
$form->validate();

?>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Register</title>
    <link rel="stylesheet" href="/assets/css/style.css">
</head>

<body>
    <?php print $navigation->render(); ?>
    <main class="main">
        <div class="logRegForm">
            <?php print $form->render() ?>
        </div>
    </main>
    <footer>
                <span>© 2019. Mantas Cerkesas, all rights reserved.</span>
            </footer>
</body>

</html>