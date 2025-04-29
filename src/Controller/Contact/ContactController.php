<?php

namespace App\Controller\Contact;

use App\Contract\SendMessageInterface;
use App\Entity\Message;
use App\Form\MessageType;
use Doctrine\ORM\EntityManagerInterface;
use Karser\Recaptcha3Bundle\Validator\Constraints\Recaptcha3Validator;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

class ContactController extends AbstractController
{
    #[Route('/contact', name: 'app_contact')]
    public function index(Request $request, EntityManagerInterface $em,
                          SendMessageInterface $sendMessage,
                          Recaptcha3Validator $recaptcha3Validator): Response
    {
        $message = new Message();

        $form = $this->createForm(MessageType::class, $message);

        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $datas = $form->getData();
//            $datas->getText();
            $score = $recaptcha3Validator->getLastResponse()->getScore();
            $message = new Message();
            $message->setName($datas->getName());
//            $message->setPhone($datas->getPhone());
            $message->setEmail($datas->getEmail());
            $message->setText($datas->getText());
            $em->persist($message);
            $em->flush();
            $this->addFlash('success', 'Votre message a été envoyé.');

            $sendMessage($datas->getEmail(),null , $datas->getText()); //phone removed

            $this->addFlash('success', 'Your message have been send');
            return $this->redirectToRoute('app_contact');
        }

        $response = $this->render('contact/index.html.twig', [
            'form' => $form->createView(),
        ]);

        // // cache publicly for 3600 seconds
        // $response->setPublic();
        // $response->setMaxAge(3600);
        // use this method to set several cache settings in one call
        // (this example lists all the available cache settings)
        $response->setCache([
            'must_revalidate'  => false,
            'no_cache'         => false,
            'no_store'         => false,
            'no_transform'     => false,
            'public'           => true,
            'private'          => false,
            'proxy_revalidate' => false,
            'max_age'          => 7884000,
            's_maxage'         => 7884000,
            'immutable'        => true,
            'last_modified'    => new \DateTime(),
        ]);

        // (optional) set a custom Cache-Control directive
        $response->headers->addCacheControlDirective('must-revalidate', true);

        return $response;
    }
}
