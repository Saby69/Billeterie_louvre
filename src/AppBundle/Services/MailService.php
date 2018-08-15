<?php
/**
 * Created by PhpStorm.
 * User: Sabrina
 * Date: 14/08/2018
 * Time: 08:43
 */

namespace AppBundle\Services;


class MailService extends \Twig_Extension
{

    private $mailer;
    private $twig;

    public function __construct(\Swift_Mailer $mailer, \Twig_Environment $twig)
    {
        $this->mailer=$mailer;
        $this->twig=$twig;
    }


    public function mailSend($booking)
    {

        $message = (new \Swift_Message('Votre commande sur la billeterie du Louvre est validée'))
            ->setFrom('scarruezco@gmail.com')
            ->setTo('scarruezco@gmail.com')
            ->setBody(

                $this->twig->render('ticketing/confirmation_order_mail.html.twig', [
                    "booking" => $booking, 'id' => $booking->getId()
                ]),
                'text/html')
            /*
             * If you also want to include a plaintext version of the message
            ->addPart(
                $this->renderView(
                    'Emails/registration.txt.twig',
                    array('name' => $name)
                ),
                'text/plain'
            )
            */
        ;

        $this->mailer->send($message);

    }
}