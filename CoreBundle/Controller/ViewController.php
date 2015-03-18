<?php

namespace GravityCMS\CoreBundle\Controller;

use Doctrine\ORM\EntityManager;
use GravityCMS\CoreBundle\Entity\Block;
use GravityCMS\CoreBundle\Entity\Layout;
use GravityCMS\CoreBundle\Entity\View;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;

class ViewController extends Controller
{
    public function listAction()
    {
        /** @var EntityManager $entityManager */
        $entityManager = $this->getDoctrine()->getManager();

        $views = $entityManager->getRepository('GravityCMSCoreBundle:View')->findAll();

        return $this->render('GravityCMSCoreBundle:Theme/View:list.html.twig', array(
            'views' => $views,
        ));
    }

    public function newAction()
    {
        /** @var EntityManager $entityManager */
        $entityManager = $this->getDoctrine()->getManager();

        $view = new View();
        $form = $this->createForm('gravity_cms_view', $view, array(
            'method' => 'POST',
            'action' => $this->generateUrl('gravity_api_post_view'),
            'attr'   => array(
                'class' => 'api-save',
            )
        ));

        return $this->render('GravityCMSCoreBundle:Theme/View:new.html.twig', array(
            'form'      => $form->createView(),
        ));
    }

    public function editAction(Layout $layout)
    {
        /** @var EntityManager $entityManager */
        $entityManager = $this->getDoctrine()->getManager();
        $positions     = $entityManager->getRepository('GravityCMSCoreBundle:LayoutPosition')->findAll();
        $blocks        = $entityManager->getRepository('GravityCMSCoreBundle:Block')->findAll();

        $form = $this->createForm('gravity_cms_layout', $layout, array(
            'method' => 'PUT',
            'action' => $this->generateUrl('gravity_api_put_layout', array(
                'id' => $layout->getId()
            )),
            'attr'   => array(
                'class' => 'api-save',
            )
        ));

        return $this->render('GravityCMSCoreBundle:Theme/Layout:edit.html.twig', array(
            'layout'    => $layout,
            'positions' => $positions,
            'blocks'    => $blocks,
            'form'      => $form->createView(),
        ));
    }
}
