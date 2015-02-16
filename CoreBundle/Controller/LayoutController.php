<?php

namespace GravityCMS\CoreBundle\Controller;

use Doctrine\ORM\EntityManager;
use GravityCMS\CoreBundle\Entity\Block;
use GravityCMS\CoreBundle\Entity\Layout;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;

class LayoutController extends Controller
{
    public function listAction()
    {
        /** @var EntityManager $entityManager */
        $entityManager = $this->getDoctrine()->getManager();

        $layouts = $entityManager->getRepository('GravityCMSCoreBundle:Layout')->findAll();

        return $this->render('GravityCMSCoreBundle:Theme/Layout:list.html.twig', array(
            'layouts' => $layouts,
        ));
    }

    public function newAction()
    {
        /** @var EntityManager $entityManager */
        $entityManager = $this->getDoctrine()->getManager();

        $positions = $entityManager->getRepository('GravityCMSCoreBundle:LayoutPosition')->findAll();
        $blocks    = $entityManager->getRepository('GravityCMSCoreBundle:Block')->findAll();
        $layout    = new Layout();

        $form = $this->createForm('gravity_cms_layout', $layout, array(
            'method' => 'POST',
            'action' => $this->generateUrl('gravity_api_core_post_layout'),
            'attr'   => array(
                'class' => 'api-save',
            )
        ));

        return $this->render('GravityCMSCoreBundle:Theme/Layout:new.html.twig', array(
            'positions' => $positions,
            'blocks'    => $blocks,
            'form'      => $form->createView(),
            //            'blockForm' => $blockForm->createView(),
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
            'action' => $this->generateUrl('gravity_api_core_put_layout', array(
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

    public function newBlockAction(Request $request, Layout $layout, Block $block)
    {
        $blockManager    = $this->get('gravity_cms.theme.block_manager');
        $blockDefinition = $blockManager->getBlock($block->getType());

        $form = $this->createForm($blockDefinition->getForm(), null, array(
            'method' => 'POST',
            'action' => $this->generateUrl('gravity_api_core_post_layout_block', array(
                'layout' => $layout->getId(),
                'block'  => $block->getId(),
            )),
            'attr'   => array(
                'class' => 'api-save',
            )
        ));

        return $this->render('GravityCMSCoreBundle:Theme/Layout:block-add.html.twig', array(
            'layout' => $layout,
            'block'  => $block,
            'form'   => $form->createView(),
        ));
    }
}
