<?php

require_once '../bootloader.php';

$navigation = new \App\Views\Navigation();

?>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Home Page</title>
    <link rel="stylesheet" href="/assets/css/style.css">
</head>

<body>
    <?php print $navigation->render(); ?>
    <main>
        <div class="background"></div>
        <section>
            <div class="container">
                <div class="card">
                    <div class="image1"></div>
                    <h1>Uber</h1>
                    <p>Download our uber application to get a taxi everywhere you need. We offering best value and price each day.</p>
                </div>
                <div class="card">
                    <div class="image2"></div>
                    <h1>Express</h1>
                    <p>Only our company has proffesional drivers who can drive as fast as possible. With Express taxi you will be lifted to any place you need in a shortest time.</p>
                </div>
                <div class="card">
                    <div class="image3"></div>
                    <h1>Limousine</h1>
                    <p>We have highest class limousines, which can be rented for special events like weddings or school parties. Check our prices right now.</p>
                </div>
            </div>
        </section>
        <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d2304.219426156724!2d25.3356966160162!3d54.72335507837753!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x46dd96e7d814e149%3A0xdd7887e198efd4c7!2sSaul%C4%97tekio%20al.%2015%2C%20Vilnius%2010221!5e0!3m2!1sen!2slt!4v1594120406997!5m2!1sen!2slt" width="100%" height="300" frameborder="0" style="border:0;" allowfullscreen="" aria-hidden="false" tabindex="0"></iframe>
    </main>
            <footer>
                <span>© 2019. Mantas Cerkesas, all rights reserved.</span>
            </footer>
</body>

</html>