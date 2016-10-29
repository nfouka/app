<?php

namespace MyApp\NadirBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class DefaultController extends Controller
{
    public function indexAction()
    {
        $transport = \Swift_SmtpTransport::newInstance()
            ->setHost('smtp.gmail.com')
            ->setPort(465)
            ->setEncryption('ssl')
            ->setUsername('cedric.mayol.albert@gmail.com')
            ->setPassword('de4fd7a469cf23f7b87ef39a3d668d29');

    $mailer = \Swift_Mailer::newInstance($transport);

    $message = \Swift_Message::newInstance('Contato via Site')
            ->setFrom("nadir.fouka@gmail.com")
            ->setTo("nadir.fouka@gmail.com")
            ->setBody("hello nadir", 'text/html')
            ->attach(Swift_Attachment::fromPath('/home/nadir/.jenkins/workspace/Hamdouda/build.xml'))
            ->setCharset('UTF-8');
    

    $mailer->send($message);
    
    return $this->render('MyAppNadirBundle:Default:index.html.twig');
    }
}
