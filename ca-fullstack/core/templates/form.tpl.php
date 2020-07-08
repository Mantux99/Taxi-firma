<form <?php print html_attr($data['attr'] ?? []); ?>>
    <!-- title printer -->

    <?php if (isset($data['title'])) : ?>
        <h1><?php print $data['title']; ?></h1>
    <?php endif; ?>

    <!--Field generation start-->
    <?php foreach ($data['fields'] ?? [] as $field_id => $field) : ?>
        <div>
            <?php if (isset($field['label'])) : ?>
                <label><?php print $field['label']; ?></label>
            <?php endif; ?>

            <?php if ($field['type'] == 'textarea') : ?>

                <!--Select tag generation start-->
                <textarea <?php print select_attr($field_id, $field); ?>></textarea>
                <!--Select tag generation end -->
        </div>

    <?php else : ?>

        <!--Input tag generation-->
        <input <?php print input_attr($field_id, $field) ?>>

    <?php endif; ?>

    <!-- Field error generation-->
    <?php if (isset($field['error'])) : ?>
        <div class="error"><?php print $field['error']; ?></div>
    <?php endif; ?>

<?php endforeach; ?>
<!--Field generation end-->

<!--Button generation start-->
<?php foreach ($data['buttons'] ?? [] as $button_id => $button) : ?>
    <button <?php print button_attr($button_id, $button) ?>>
        <?php print $button['title']; ?>
    </button>
<?php endforeach; ?>
<!--Button generation end-->

<?php if (isset($data['success_message'])) : ?>
    <div class="success_message"><?php print $data['success_message']; ?></div>
<?php endif; ?>

<?php if (isset($data['fail_message'])) : ?>
    <div class="fail_message"><?php print $data['fail_message']; ?></div>
<?php endif; ?>

</form>