<?php

namespace GravityCMS\CoreBundle\Controller\Api;

use GravityCMS\Component\Configuration\ConfigurationInterface;
use GravityCMS\Component\View\Layout\Configuration\LayoutConfiguration;
use GravityCMS\CoreBundle\Controller\Api\Event\ApiConfigurationEvent;
use GravityCMS\CoreBundle\Controller\Api\Event\ApiEvents;
use GravityCMS\CoreBundle\FosRest\View\View\JsonApiView;
use Symfony\Component\HttpFoundation\Request;

/**
 * Class ViewController
 *
 * @package GravityCMS\Component\Controller\Api
 * @author  Andy Thorne <contrabandvr@gmail.com>
 */
class LayoutController extends AbstractApiConfigurationController
{
    /**
     * Get the default configuration
     *
     * @return ConfigurationInterface
     */
    public function getConfiguration()
    {
        return new LayoutConfiguration();
    }

    /**
     * @param int  $method
     * @param ConfigurationInterface $entity
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
                return $this->generateUrl('gravity_api_core_post_layout');
                break;

            case self::METHOD_PUT:
                return $this->generateUrl('gravity_api_core_put_layout', array('id' => $entity->getConfigurationName()));
                break;

            case self::METHOD_DELETE:
                return $this->generateUrl('gravity_api_core_delete_layout', array('id' => $entity->getConfigurationName()));
                break;

            case self::METHOD_GET:
                return $this->generateUrl('gravity_cms_admin_layout_edit',
                    array('id' => $entity->getConfigurationName()));
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

    public function postBlockAction(Request $request, $layout, $block)
    {
        $blockManager = $this->get('gravity_cms.theme.block_manager');
        $configurationManager = $this->get('gravity_cms.config_manager');
        $this->authenticate(self::METHOD_POST);

        $block = $blockManager->getBlock($block);
        $newEntity = $block->getDefaultConfiguration();

        $payload = json_decode($request->getContent(), true);

        $formType  = $newEntity->getForm();
        $form      = $this->createForm($formType, $newEntity);
        $form->submit($payload[$formType->getName()]);

        if($form->isValid())
        {
            $entity = $form->getData();
            $eventDispatcher = $this->get('event_dispatcher');

            $eventDispatcher->dispatch(ApiEvents::PRE_CREATE, new ApiConfigurationEvent($entity));

            $configurationManager->create($entity);

            $eventDispatcher->dispatch(ApiEvents::POST_CREATE, new ApiConfigurationEvent($entity));

            $view = JsonApiView::create(null, 201, array(
                'location' => $this->getUrl(self::METHOD_GET, $entity)
            ));
        }
        else
        {
            $view = JsonApiView::create($form, 400);
        }

        return $this->get('fos_rest.view_handler')->handle($view);
    }
}
