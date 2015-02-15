<?php

namespace GravityCMS\CoreBundle\Controller\Api;

use GravityCMS\Component\View\DataTable\ViewDataTableType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;

/**
 * Class ViewController
 *
 * @package GravityCMS\Component\Controller\Api
 * @author  Andy Thorne <contrabandvr@gmail.com>
 */
class ViewController extends AbstractApiController
{
    /**
     * Get the form type
     *
     * @return AbstractType
     */
    function getForm()
    {
        return $this->get('nefarian.view.form.view_form');
    }

    /**
     * Get the entity name
     *
     * @return string
     */
    function getEntityClass()
    {
        return '\GravityCMS\Component\Entity\View';
    }

    /**
     * @inheritdoc
     */
    function getUrl($method, $entity = null)
    {
        switch($method)
        {
            case self::METHOD_VIEW_ALL:
                return $this->generateUrl('nefarian_plugin_content_management_content_type_manage');
                break;

            case self::METHOD_POST:
                return $this->generateUrl('nefarian_api_content_management_post_type');
                break;

            case self::METHOD_PUT:
                return $this->generateUrl('nefarian_api_content_management_put_type', array( 'id' => $entity->getId() ));
                break;

            case self::METHOD_DELETE:
                return $this->generateUrl('nefarian_api_content_management_delete_type', array( 'id' => $entity->getId() ));
                break;

            case self::METHOD_GET:
                return $this->generateUrl('nefarian_plugin_content_management_content_type_edit', array( 'type' => $entity->getName() ));
                break;
        }

        return '';
    }

    function hasPermission($method)
    {
        $userManager = $this->get('nefarian_core.user_manager');
        switch($method)
        {
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

    public function getTableResultsAction(Request $request)
    {
        /**
         * @var \Sg\DatatablesBundle\Datatable\Data\DatatableData $datatable
         */

        $dataTableManager = $this->get('nefarian.datatable_manager');

        $dataTable = new ViewDataTableType($this->container->get('router'));
        $response = $dataTableManager->create($dataTable, $request);

        return new JsonResponse($response);
    }

}
