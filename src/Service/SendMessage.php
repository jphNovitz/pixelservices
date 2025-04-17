<?php

namespace App\Service;

use App\Contract\SendMessageInterface;
use Symfony\Component\Mailer\Exception\TransportException;
use Symfony\Component\Mailer\Exception\TransportExceptionInterface;
use Symfony\Component\Mailer\MailerInterface;
use Symfony\Component\Mime\Email;

class SendMessage implements SendMessageInterface
{
    public function __construct(private MailerInterface $mailer)
    {
    }

    /**
     * @throws TransportExceptionInterface
     */
    public function __invoke(?string $email = '', ?string $phone = '', ?string $message = ''): void
    {
        try {
            $mail = (new Email())
                ->from($_ENV['MAIL_FROM'])
                ->to($_ENV['MAIL_TO'])
                //->cc('cc@example.com')
                //->bcc('bcc@example.com')
                //->replyTo('fabien@example.com')
                ->priority(Email::PRIORITY_HIGH)
                ->subject('Nouveau message de la page de contact')
                ->text($email.'\n'.$phone.'\n'.$message)
                ->html('<p>' . $email . '</p>'. '<p>' . $phone . '</p>'. '<p>' . $message . '</p>');

            $this->mailer->send($mail);
        } catch (TransportExceptionInterface $e) {
            // Handle the exception (e.g., log it)
//            dd($e);
            throw new TransportException('Error sending email: ');
        }


    }
}