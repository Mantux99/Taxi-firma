<header>
    <div class="wrapper">
        <nav>
            <?php foreach ($data as $section_id => $section): ?>
                <ul class="<?php print $section_id; ?>">
                    <?php foreach ($section as $nav_id => $link): ?>
                        <div class="link-wrapper <?php print ($link['active'] ?? false) ? 'active' : ''; ?>">
                            <a href="<?php print $link['url']; ?>">
                                <?php print $link['title']; ?>
                            </a>
                        </div>
                    <?php endforeach; ?>
                </ul>
            <?php endforeach; ?>
        </nav>
    </div>
</header>

<!-- <header>
    <div>
        <nav>
            <div>
                <a href="/index.php">Home</a>
            </div>
            <div>
                <?php if (App\App::$session->getUser()): ?>
                <a href="/admin/products/create.php">Add drink</a>
                <a href="/admin/products/view.php">List</a>
                <a href="/logout.php">Logout</a>
                <?php else: ?>
                <a href="/login.php">Login</a>
                <a href="/register.php">Register</a>
                <?php endif; ?>
            </div>
        </nav>
    </div>
</header> -->