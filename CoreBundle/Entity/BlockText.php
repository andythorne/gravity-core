<?php

namespace GravityCMS\CoreBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use GravityCMS\Component\View\Block\Block\Text\BlockTextModel;

/**
 * Class Block
 *
 * @package GravityCMS\CoreBundle\Entity
 * @author  Andy Thorne <contrabandvr@gmail.com>
 *
 * @ORM\Entity
 * @ORM\Table(name="block_text")
 */
class BlockText extends LayoutLayoutPositionBlock
{
    /**
     * @var string
     *
     * @ORM\Column(type="text")
     */
    protected $text;

    /**
     * @return string
     */
    public function getText()
    {
        return $this->text;
    }

    /**
     * @param string $text
     */
    public function setText($text)
    {
        $this->text = $text;
    }

}
