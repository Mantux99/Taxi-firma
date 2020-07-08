




<div class="">
    <?php foreach ($data ?? [] as $bottle) : ?>
        <div class="product">
            <div id="drink-container">
                <?php if (isset($bottle['price'])) : ?>
                    <h2 class="price"><?php print $bottle['price']; ?></h2>
                <?php endif; ?>

                <?php if (isset($bottle['image'])) : ?>
                    <img class="bottle-img" src="<?php print $bottle['image']; ?>">
                <?php endif; ?>

                <?php if (isset($bottle['name'])) : ?>
                    <h2 class="title bottle-info"><?php print $bottle['name']; ?></h2>
                <?php endif; ?>

                <?php if (isset($bottle['strength'])) : ?>
                    <h2 class="strength bottle-info"><?php print $bottle['strength']; ?></h2>
                <?php endif; ?>

                <?php if (isset($bottle['volume'])) : ?>
                    <h2 class="volume bottle-info"><?php print $bottle['volume']; ?></h2>
                <?php endif; ?>

                <?php if (isset($bottle['quantity'])) : ?>
                    <p class="quantity"><?php print 'Sandėlyje: ' . $bottle['quantity']; ?></p>
                <?php endif; ?>
            </div>
        </div>
    <?php endforeach; ?>
</div>