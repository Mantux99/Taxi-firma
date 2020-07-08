<?php

require_once '../bootloader.php';

use App\App;

if (App::$session->getUser()) {
    header('Location: index.php');
}

function form_success(&$form, $input) {
    $userData = \App\Users\Model::getWhere([
        'email' => $input['email']
    ]);

    $user = $userData[0];
    App::$session->login($user->email, $user->password);

    header('Location: index.php');
}

function form_fail(&$form, $input)
{
    $form['message'] = 'Failed to log in';
}

$navigation = new \App\Views\Navigation();
$form = new \App\Views\Forms\Auth\Login();
$form->validate();

?>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Login</title>
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