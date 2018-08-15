<?php
/**
 * Created by PhpStorm.
 * User: Sabrina
 * Date: 14/08/2018
 * Time: 08:43
 */

namespace AppBundle\Services;


class MailService
{
    public function mailSend()
    {

        $message = (new \Swift_Message('Votre commande sur la billeterie du Louvre est validée'))
            ->setFrom('scarruezco@gmail.com')
            ->setTo('skru@kaleys.fr')
            ->setBody('test symfony'
                /*$this->render(
                // app/Resources/views/Emails/registration.html.twig
                    'ticketing/confirmation_order_mail.html.twig'

                )*/,
                'text/html'
            )
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

        //$mailer->send($message);

        // or, you can also fetch the mailer service this way
         $this->get('mailer')->send($message);

        //return $this->render(...);
    }
}