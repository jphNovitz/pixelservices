<?php
/**
 *  -- partials - _functions --
 *  @file contact-form-submit.php
 *  @description check if contact form has been submitted, check fields and submit
 *  @package liegeweb
 *  @author Novitz Jean-Philippe <novitz@gmail.com>
 *  @copyright 2022
 */

defined('HOST') or define('HOST', $_ENV['HOST']);
defined('SMTPAUTH') or define('SMTPAUTH', $_ENV['SMTPAUTH']);
defined('PORT') or define('PORT', $_ENV['PORT']);
defined('USERNAME') or define('USERNAME', $_ENV['USERNAME']);
defined('PASSWORD') or define('PASSWORD', $_ENV['PASSWORD']);

function sendmail($phpmailer) {
    $phpmailer->isSMTP();
    $phpmailer->Host = HOST;
    $phpmailer->SMTPAuth = SMTPAUTH;
    $phpmailer->Port = PORT;
    $phpmailer->Username = USERNAME;
    $phpmailer->Password = PASSWORD;
}

add_action('phpmailer_init', 'sendmail');


if (isset($_POST['submitted'])) {

    $hasError = false;
    $errorMessage = 'Veuillez indiquer: <br />';
    if (strlen(trim($_POST['_name'])) === 0) {
        $hasError = true;
        $errorMessage = $errorMessage . '* Un <strong>nom</strong><br />';
    }

    if (isset($_POST['_email']) && strlen(trim($_POST['_email'])) > 0) {
        if (!preg_match("/^[[:alnum:]][a-z0-9_.-]*@[a-z0-9.-]+.[a-z]{2,4}$/i", trim($_POST["_email"]))) {
            $hasError = true;
            $errorMessage = $errorMessage . '* Un email <strong>valide</strong><br />';
        } else {
            $email = $_POST['_email'];
        }
    } else {
        $hasError = true;
        $errorMessage = $errorMessage . '* Un <strong>email</strong><br />';
    }

    if (strlen(trim($_POST['_message'])) === 0) {
        $hasError = true;
        $errorMessage = $errorMessage . '* Un <strong>message</strong><br />';
    } else {
        $message = $_POST['_message'];
    }
/*
    if (!isset($_POST['authorize'])) {
        $hasError = true;
        $errorMessage = $errorMessage . '* si vous <strong>autorisez</strong> a stocker les infos<br />';
    }*/


    if ($hasError) {
        echo '<div class="bg-red-900 text-red-50 px-6 py-4" role="alert">';
        echo $errorMessage;
        echo '</div>';

    } else {
        $headers = 'MIME-Version: 1.0' . "\r\n";
        $headers .= 'Content-Type: text/html; charset=ISO-8859-1' . "\r\n";
        $headers .= 'From: mail@liegeweb.be'. "\r\n";

        if ($sent = wp_mail($email, 'mail venant page contact', strip_tags($message), $headers)){
            echo '<div class="bg-green-100 text-green-900 px-6 py-4" role="alert">
                Votre message a été envoyé 
                    </div>';
        }else{
            echo '<div class="bg-red-900 text-red-50 px-6 py-4" role="alert">
                Il y a eu un problème avec l\'envoi du message 
                    </div>';
        }

    }
}