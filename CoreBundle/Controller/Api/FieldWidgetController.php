<?php

namespace GravityCMS\CoreBundle\Controller\Api;

use FOS\RestBundle\Controller\Annotations as FOSRest;
use FOS\RestBundle\Routing\ClassResourceInterface;
use GravityCMS\Component\Field\Widget\WidgetSettingsInterface;
use GravityCMS\CoreBundle\Entity\Field;
use GravityCMS\CoreBundle\Entity\FieldWidget;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;

/**
 * Class FieldWidgetController
 *
 * @package GravityCMS\CoreBundle\Controller\Api
 * @author  Andy Thorne <contrabandvr@gmail.com>
 */
class FieldWidgetController extends Controller implements ClassResourceInterface
{
    use ApiEntityServiceControllerTrait;

    /**
     * [PUT] Update an existing entity
     *
     * @param Request     $request
     * @param Field       $field
     * @param FieldWidget $widget
     *
     * @return \Symfony\Component\HttpFoundation\Response
     */
    public function putSettingsAction(Request $request, Field $field, FieldWidget $widget)
    {
        $service = $this->get('gravity.entity_service.field_widget');

        $config  = clone $widget->getConfig();
        $form    = $this->createForm(
            $config->getForm(),
            $config,
            [
                'method' => 'PUT',
            ]
        );
        $payload = json_decode($request->getContent(), true);

        $entity = $this->putConfig($service, $widget, $form, $payload[$form->getName()]);

        if (!$entity instanceof WidgetSettingsInterface) {
            return $this->jsonResponse($form, 400);
        }

        $this->getDoctrine()->getManager()->flush();

        return $this->jsonResponse(null, 204);
    }

    /**
     * [PATCH] Partial update an existing entity
     *
     * @param Request     $request
     * @param Field       $field
     * @param FieldWidget $widget
     *
     * @return \Symfony\Component\HttpFoundation\Response
     */
    public function patchSettingsAction(Request $request, Field $field, FieldWidget $widget)
    {
        $service = $this->get('gravity.entity_service.field_widget');

        $config  = clone $widget->getConfig();
        $form    = $this->createForm(
            $config->getForm(),
            $config,
            [
                'method' => 'PUT',
            ]
        );
        $payload = json_decode($request->getContent(), true);

        $entity = $this->patchConfig($service, $widget, $form, $payload[$form->getName()]);

        if (!$entity instanceof WidgetSettingsInterface) {
            return $this->jsonResponse($form, 400);
        }

        $this->getDoctrine()->getManager()->flush();

        return $this->jsonResponse(null, 204);
    }

    /**
     * {@inheritdoc}
     */
    public function hasPermission($method)
    {
        return true;
        //        $userManager = $this->get('nefarian_core.user_manager');
        //        switch ($method) {
        //            case Request::METHOD_NEW:
        //            case Request::METHOD_POST:
        //                return $userManager->hasPermission($this->getUser(), 'content.type.create');
        //                break;
        //
        //            case Request::METHOD_EDIT:
        //            case Request::METHOD_PUT:
        //                return $userManager->hasPermission($this->getUser(), 'content.type.update');
        //                break;
        //
        //            case Request::METHOD_DELETE:
        //                return $userManager->hasPermission($this->getUser(), 'content.type.delete');
        //                break;
        //
        //            case Request::METHOD_GET:
        //                return $userManager->hasPermission($this->getUser(), 'content.type.get');
        //                break;
        //        }
        //
        //        return false;
    }

} 
