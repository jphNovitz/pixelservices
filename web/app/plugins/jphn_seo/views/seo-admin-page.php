<?php
//include_once dirname( __FILE__ ). '/' .'../assets/js/jphn_seo.js';
function seo_admin_page()
{
    ?>
    <div class="wrap">
        <h2>Parametrages S.E.O</h2>
        <h3><u>Balise <strong>TITLE</strong> </u></h3>
        <p>La balise titre est automatiquement créée en utilisant le titre de la page ou du post.
            <br>Si aucun titre n'est disponible alors le titre du site du site est utilisé.
            (<a href="options-general.php">Page de configuration</a>) </p>
        <p><em>Une balise meta <u>og:title</u> (facebbok) est également générée automatiquement avec les mêmes critères.</em>
        </p>
        <h3><u>Balise <strong>DESCRIPTION</strong> </u></h3>
        <p>Un résumé (ou excerpt) a été ajouté dans l'éditeur. Ce résumé est utilisé pour créer automatiquement la
            <strong>balise meta DESCRIPTION</strong>. Si aucun 'résumé' n'est trouvé le slogan de votre site est utilisé
            (<a href="options-general.php">Page de configuration</a>) </p>
        <p><em>Une balise meta <u>og:description</u> (facebbok) est également générée automatiquement avec les mêmes
                critères.</em></p>
    </div>
    <?php

    if($_SERVER['REQUEST_METHOD'] == 'POST' && $url = $_POST['image']) {
        update_option('seo_image', $url);
    }
    ?>
    <form method="post">
       <?php
       settings_errors();
       settings_fields('meta_image');
       do_settings_sections('seo-admin-page');

       submit_button(); ?>

    </form>
<?php }