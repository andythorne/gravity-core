<?php

namespace GravityCMS\EditorCKE\Editor;

use GravityCMS\Component\Editor\EditorInterface;

/**
 * Class CKEditor
 *
 * @package GravityCMS\EditorCKE\Editor
 * @author  Andy Thorne <contrabandvr@gmail.com>
 */
class CKEditor implements EditorInterface
{
    public function getName()
    {
        return 'ckeditor';
    }

    public function getAssets()
    {
        return array(
            '@module_editor_cke/ckeditor/ckeditor.js',
        );
    }
} 
