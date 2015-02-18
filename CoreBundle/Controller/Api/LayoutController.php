<?php

namespace GravityCMS\CoreBundle\Controller\Api;

use GravityCMS\CoreBundle\Controller\Api\Event\ApiEvent;
use GravityCMS\CoreBundle\Controller\Api\Event\ApiEvents;
use GravityCMS\CoreBundle\Entity\Block;
use GravityCMS\CoreBundle\Entity\Layout;
use GravityCMS\CoreBundle\Entity\LayoutPositionBlock;
use GravityCMS\CoreBundle\FosRest\View\View\JsonApiView;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\HttpFoundation\Request;

/**
 * Class ViewController
 *
 * @package GravityCMS\Component\Controller\Api
 * @author  Andy Thorne <contrabandvr@gmail.com>
 */
class LayoutController extends AbstractApiController
{
    /**
     * Get the entity name
     *
     * @return string
     */
    protected function getEntityClass()
    {
        return '\GravityCMS\CoreBundle\Entity\Layout';
    }

    /**
     * Get the form type
     *
     * @return AbstractType
     */
    function getForm()
    {
        return $this->get('gravity_cms.theme.form.layout');
    }

    /**
     * @param int    $method
     * @param object $entity
     *
     * @return string
     */
    function getUrl($method, $entity = null)
    {
        switch ($method) {
            case self::METHOD_VIEW_ALL:
                return $this->generateUrl('gravity_cms_admin_layout_list');
                break;

            case self::METHOD_POST:
                return $this->generateUrl('gravity_api_post_layout');
                break;

            case self::METHOD_PUT:
                return $this->generateUrl('gravity_api_put_layout',
                    array('id' => $entity->getId()));
                break;

            case self::METHOD_DELETE:
                return $this->generateUrl('gravity_api_delete_layout',
                    array('id' => $entity->getId()));
                break;

            case self::METHOD_GET:
                return $this->generateUrl('gravity_cms_admin_layout_edit',
                    array('id' => $entity->getId()));
                break;
        }

        return '';
    }

    function hasPermission($method)
    {
        return true;
        $userManager = $this->get('nefarian_core.user_manager');
        switch ($method) {
            case self::METHOD_NEW:
            case self::METHOD_POST:
                return $userManager->hasPermission($this->getUser(), 'content.type.create');
                break;

            case self::METHOD_EDIT:
            case self::METHOD_PUT:
                return $userManager->hasPermission($this->getUser(), 'content.type.update');
                break;

            case self::METHOD_DELETE:
                return $userManager->hasPermission($this->getUser(), 'content.type.delete');
                break;

            case self::METHOD_GET:
                return $userManager->hasPermission($this->getUser(), 'content.type.get');
                break;
        }

        return false;
    }

    public function postBlockAction(Request $request, Layout $layout, Block $block)
    {
        $this->authenticate(self::METHOD_POST);

        $em              = $this->getDoctrine()->getManager();
        $blockManager    = $this->get('gravity_cms.theme.block_manager');
        $blockDefinition = $blockManager->getBlock($block->getType());
        $payload         = json_decode($request->getContent(), true);

        $formType = $blockDefinition->getForm();
        $form     = $this->createForm($formType);
        $form->submit($payload[$formType->getName()]);

        if ($form->isValid()) {
            /** @var LayoutPositionBlock $entity */
            $entity          = $form->getData();
            $eventDispatcher = $this->get('event_dispatcher');

            $eventDispatcher->dispatch(ApiEvents::PRE_CREATE, new ApiEvent($entity));

            $entity->setBlock($block);
            $entity->setLayout($layout);

            $em->persist($entity);
            $em->flush();

            $eventDispatcher->dispatch(ApiEvents::POST_CREATE, new ApiEvent($entity));

            $view = JsonApiView::create(null, 201, array(
                'location' => $this->getUrl(self::METHOD_GET, $layout)
            ));
        } else {
            $view = JsonApiView::create($form, 400);
        }

        return $this->get('fos_rest.view_handler')->handle($view);
    }
}
