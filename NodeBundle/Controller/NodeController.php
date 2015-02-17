<?php

namespace GravityCMS\NodeBundle\Controller;

use GravityCMS\NodeBundle\Entity\ContentType;
use GravityCMS\NodeBundle\Entity\Node;
use GravityCMS\NodeBundle\Form\NodeForm;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;

/**
 * Class NodeController
 *
 * @package GravityCMS\NodeBundle\Controller
 * @author  Andy Thorne <contrabandvr@gmail.com>
 */
class NodeController extends Controller
{
    public function viewAction(Node $node)
    {
        return $this->render('@plugin_content_management/Node/view.html.twig', array(
            'node' => $node,
        ));
    }
} 
