<?php
/**
 * Created by Andy Thorne
 *
 * @author Andy Thorne <contrabandvr@gmail.com>
 */

namespace GravityCMS\Component\View\Form;


use GravityCMS\Component\Configuration\Form\ConfigurationSettingsForm;
use GravityCMS\Component\View\Block\BlockManager;
use GravityCMS\Component\View\Layout\LayoutManager;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;

class LayoutForm extends ConfigurationSettingsForm
{
    /**
     * @var LayoutManager
     */
    protected $layoutManager;

    protected $positionOptions = array();
    protected $blockOptions = array();

    function __construct(LayoutManager $layoutManager, BlockManager $blockManager)
    {
        $this->layoutManager = $layoutManager;

        $positions = $layoutManager->getPositions();
        foreach($positions as $position)
        {
            $this->positionOptions[$position->getName()] = $position->getLabel();
        }

        $blocks = $blockManager->getBlocks();
        foreach($blocks as $block)
        {
            $this->blockOptions[$block->getName()] = $block->getName();
        }
    }

    protected function buildConfigForm(FormBuilderInterface $builder, array $options)
    {

    }

    /**
     * Returns the name of this type.
     *
     * @return string The name of this type
     */
    public function getName()
    {
        return 'gravity_cms_layout';
    }

}
