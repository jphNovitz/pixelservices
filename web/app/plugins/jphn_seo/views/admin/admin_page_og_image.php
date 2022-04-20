
<?php
//og:image form
?>

<form method="post">
    <?php
    settings_errors();
    settings_fields('meta_image');
    do_settings_sections('seo-admin-page');

    ?>
</form>
