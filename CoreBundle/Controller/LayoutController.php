<?php

namespace GravityCMS\CoreBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;

class LayoutController extends Controller
{
    public function listAction()
    {
        $layoutManager = $this->get('gravity_cms.theme.layout_manager');

        return $this->render('GravityCMSCoreBundle:Theme/Layout:list.html.twig', array(
            'layouts' => $layoutManager->getLayouts(),
        ));
    }

    public function newAction()
    {
        $layoutManager       = $this->get('gravity_cms.theme.layout_manager');
        $layoutConfiguration = $layoutManager->createLayout();

        $form = $this->createForm($layoutConfiguration->getForm(), $layoutConfiguration, array(
            'method' => 'POST',
            'action' => $this->generateUrl('gravity_api_core_post_layout'),
            'attr'   => array(
                'class' => 'api-save',
            )
        ));

//        $blockForm     = $this->createForm('gravity_cms_layout_block', null, array(
//            'method' => 'POST',
//            'action' => $this->generateUrl('gravity_api_core_post_block'),
//            'attrs' => array(
//                'class' => 'api-save',
//            )
//        ));

        return $this->render('GravityCMSCoreBundle:Theme/Layout:new.html.twig', array(
            'positions' => $layoutManager->getPositions(),
            'blocks'    => $layoutManager->getBlocks(),
            'form'      => $form->createView(),
            //            'blockForm' => $blockForm->createView(),
        ));
    }

    public function editAction($id)
    {
        $configurationManager = $this->get('gravity_cms.config_manager');
        $layoutManager        = $this->get('gravity_cms.theme.layout_manager');
        $config               = $layoutManager->get($id);

        $form = $this->createForm($config->getForm(), $config, array(
            'method' => 'PUT',
            'action' => $this->generateUrl('gravity_api_core_put_layout', array(
                'id' => $configurationManager->getConfigurationName($config),
            )),
            'attr'   => array(
                'class' => 'api-save',
            )
        ));

        return $this->render('GravityCMSCoreBundle:Theme/Layout:edit.html.twig', array(
            'layout'    => $config,
            'positions' => $layoutManager->getPositions(),
            'blocks'    => $layoutManager->getBlocks(),
            'existingBLocks' => $layoutManager->getC
            'form'      => $form->createView(),
            //            'blockForm' => $blockForm->createView(),
        ));
    }

    public function newBlockAction(Request $request, $id)
    {
        $configurationManager = $this->get('gravity_cms.config_manager');
        $layoutManager        = $this->get('gravity_cms.theme.layout_manager');
        $blockManager         = $this->get('gravity_cms.theme.block_manager');
        $layoutConfig         = $layoutManager->get($id);

        $blockName = $request->query->get('block');

        if (!$blockName) {
            throw $this->createNotFoundException('Block not found');
        }
        $block       = $blockManager->getBlock($blockName);
        $blockConfig = $block->getDefaultConfiguration();
        $form        = $this->createForm($blockConfig->getForm(), $blockConfig, array(
            'method' => 'POST',
            'action' => $this->generateUrl('gravity_api_core_post_layout_block', array(
                'layout' => $layoutConfig->getConfigurationName(),
                'block'  => $blockName,
            )),
            'attr'   => array(
                'class' => 'api-save',
            )
        ));

        return $this->render('GravityCMSCoreBundle:Theme/Layout:block-add.html.twig', array(
            'layout'    => $layoutConfig,
            'block'     => $block,
            'form'      => $form->createView(),
        ));
    }
}
