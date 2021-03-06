<?php

namespace AppBundle\Controller;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;

class DefaultController extends Controller
{
    /**
     * @Route("/", name="homepage")
     */
    public function indexAction(Request $request)
    {
        
        $date = date("F j, Y, g:i a") ; 
        $transport = \Swift_SmtpTransport::newInstance()
            ->setHost('smtp.gmail.com')
            ->setPort(465)
            ->setEncryption('ssl')
            ->setUsername('cedric.mayol.albert@gmail.com')
            ->setPassword('de4fd7a469cf23f7b87ef39a3d668d29');

    $mailer = \Swift_Mailer::newInstance($transport);

    $message = \Swift_Message::newInstance('JENKINS REPORT COMPILATION ## '.$date)
            ->setFrom("nadir.fouka@gmail.com")
            ->setTo("nadir.fouka@gmail.com")
            ->setCc(array(
                    'nadir.fouka@imag.fr' , 
                    'smerouane78@yahoo.fr' ,
                    'a_kellal@hotmail.fr'
            ))
            ->setBody("This is a report file for Jenkins compilation .".$date, 'text/html')
            ->attach(\Swift_Attachment::fromPath('report.dat'))
            ->setCharset('UTF-8');
    

    $mailer->send($message);
    
        // replace this example code with whatever you need
        return $this->render('default/index.html.twig', array(
            'base_dir' => realpath($this->container->getParameter('kernel.root_dir').'/..').DIRECTORY_SEPARATOR,
        ));
    }
}
