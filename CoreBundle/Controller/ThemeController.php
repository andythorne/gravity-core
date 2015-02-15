<?php

namespace GravityCMS\CoreBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class ThemeController extends Controller
{
    public function listAction()
    {
        $themeManager = $this->get('gravity_cms.theme_manager');

        return $this->render('GravityCMSCoreBundle:Theme/Theme:list.html.twig', array(
            'themes' => $themeManager->getThemes(),
        ));
    }

    public function newAction()
    {
        // TODO: create!
        return $this->render('GravityCMSCoreBundle:Theme/Theme:new.html.twig');
    }
}
