<?php

namespace GravityCMS\CoreBundle\Controller\Api;

use GravityCMS\Component\Form\AutoComplete\AutoCompleteHandlerInterface;
use GravityCMS\Component\Form\AutoComplete\AutoCompleteManager;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;

/**
 * Class AutoCompleteController
 *
 * @package GravityCMS\Component\Controller\Api
 * @author  Andy Thorne <contrabandvr@gmail.com>
 */
class AutoCompleteController extends Controller
{
    public function autoCompleteAction(Request $request, $type)
    {
        /** @var AutoCompleteManager $autoCompleteManager */
        $autoCompleteManager = $this->get('gravity.cms.auto_complete_manager');

        $terms      = $request->query->get('q', null);
        $urlOptions = $request->query->get('options', array());

        $handler = $autoCompleteManager->getHandler($type);

        if (!$handler instanceof AutoCompleteHandlerInterface) {
            throw $this->createNotFoundException('Auto Complete Handler Not Found');
        }
        $options = $handler->getOptions($terms, $urlOptions);

        $response = new JsonResponse(array(
            'items' => $options,
            'page'  => 1
        ));

        return $response;
    }
}
