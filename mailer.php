<?php

require __DIR__ . '/vendor/autoload.php';

class Mailer {
    public static function send($percent) {
        try {
            // Create the SMTP Transport
            $transport = (new Swift_SmtpTransport('smtp.mailtrap.io', 2525))
                ->setUsername('af77e48a3d2aeb')
                ->setPassword('54002491776542')
                ->setEncryption('tls');

            // Create the Mailer using your created Transport
            $mailer = new Swift_Mailer($transport);

            // Create a message
            $message = new Swift_Message();

            // Set a "subject"
            $message->setSubject('Demo message using the SwiftMailer library.');

            // Set the "From address"
            $message->setFrom(['gojas90@gmail.com' => 'goja']);

            // Set the "To address" [Use setTo method for multiple recipients, argument should be array]
            $message->addTo('gojas90@gmail.com','goja');

            // Set the plain-text "Body"
            $message->setBody("PROMENA {$percent}%");

            // Send the message
            $result = $mailer->send($message);
        } catch (Exception $e) {
            echo $e->getMessage();
        }
    }
}