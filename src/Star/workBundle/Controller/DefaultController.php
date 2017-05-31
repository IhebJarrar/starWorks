<?php

namespace Star\workBundle\Controller;

use Star\workBundle\Entity\Startup;
use Star\workBundle\Form\StartupType;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Component\HttpFoundation\Request;

class DefaultController extends Controller
{
    /**
     * @Route("/",name="homepage")
     */
    public function indexAction()
    {
        return $this->render('StarworkBundle:Default:index.html.twig');
    }


    /**
     * @Route("/add_startup",name="add_startup")
     */


    public function addStartupAction(Request $request)
    {

        $startup=new Startup();

        $form=$this->createForm(StartupType::class,$startup);

        if ( $form->isSubmitted() && $form->isValid()  )
        {

            $form->handleRequest($request);

            $em=$this->getDoctrine()->getManager();
            $em->persist($startup);
            $em->flush();

               //return $this->redirectToRoute(''); redirection after the creation of the startup

        }
        return $this->render('StarworkBundle:Startup:add.html.twig',array('f'=>$form->createView()));

    }








}
