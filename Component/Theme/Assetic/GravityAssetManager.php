<?php

namespace GravityCMS\Component\Theme\Assetic;

/**
 * Class GravityAssetManager
 *
 * @package GravityCMS\Component\Theme\Assetic
 * @author  Andy Thorne <contrabandvr@gmail.com>
 */
class GravityAssetManager
{
    protected $assetMap = array();

    public function setAssets(array $assetMap = array())
    {
        $this->assetMap = $assetMap;
    }

    public function hasAsset($name)
    {
        return array_key_exists($name, $this->assetMap);
    }

    public function getAsset($name)
    {
        if($this->hasAsset($name))
        {
            return $this->assetMap[$name];
        }
        else
        {
            return null;
        }
    }
} 
