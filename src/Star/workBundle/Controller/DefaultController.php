<?php

namespace Star\workBundle\Controller;

use Star\workBundle\Entity\Startup;
use Star\workBundle\Form\StartupType;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Session\Session;

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
     * @Route("/startup/new",name="add_startup")
     */


    public function addStartupAction(Request $request)
    {

        $startup=new Startup();

        $form=$this->createForm(StartupType::class,$startup);

        $form->handleRequest($request);

        if ( $form->isSubmitted() && $form->isValid()  )
        {

            $em=$this->getDoctrine()->getManager();
            $em->persist($startup);
            $em->flush();

            $session=new Session();
            $session->getFlashBag()->add('info',"un Startup ajouteé avec succeé!");
              //redirection after the creation of the startup
               return $this->redirectToRoute('startup_show', array('id' => $startup->getId()));

        }
        return $this->render('StarworkBundle:Startup:add.html.twig',array('startup'=>$startup,'f'=>$form->createView()));

    }


        /**
         * @Route("/startup/{id}/show",name="startup_show")
         */


        public function showStartupAction(Startup $startup)
        {

                return $this->render('@Starwork/Startup/show.html.twig',array('startup'=>$startup));

        }










}
