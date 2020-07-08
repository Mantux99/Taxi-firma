<?php

require_once '../bootloader.php';

use App\App;

if (!App::$session->getUser()) {
    header('Location: index.php');
}

function delete_success($form, $input)
{
    $item = new \App\Cart\Items\Item($input);
    \App\Cart\Items\Model::delete($item);
}

$form = new \App\Views\Forms\Items\ItemDeleteForm();
$form->validate();

$table_view = new \App\Views\Tables\CartTable();
$navigation_view = new \App\Views\Navigation();

?>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Add Pixel</title>
    <link rel="stylesheet" href="assets/css/style.css">
</head>
<body>
<?php print $navigation_view->render(); ?>
<main>
    <div>
        <?php print $table_view->render(); ?>
    </div>
</main>
</body>
</html>