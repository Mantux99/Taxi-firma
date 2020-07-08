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
                    <h1>Personal trainer</h1>
                    <p>With personal training, the focus is you. We design a program specific to your health and fitness goal and work with you to achieve them. Our trainers are proffesional specialists who will help you to reach the best results.</p>
                </div>
                <div class="card">
                    <div class="image2"></div>
                    <h1>Group lesson</h1>
                    <p>Group fitness is a great way to get a workout in without having to think or plan. Each class is structured with a warm-up, a balanced workout and a cool-down. We are offering the best price and quality.</p>
                </div>
                <div class="card">
                    <div class="image3"></div>
                    <h1>Yoga</h1>
                    <p>Yoga Journal is your number one source for in-depth yoga pose instruction, yoga sequences for beginners to advanced practitioners, guided meditations to keep your day stress-free.</p>
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