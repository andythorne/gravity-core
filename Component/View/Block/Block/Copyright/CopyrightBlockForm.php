<?php

namespace GravityCMS\Component\View\Block\Block\Copyright;

use GravityCMS\Component\Configuration\Form\ConfigurationSettingsForm;
use GravityCMS\Component\View\Block\Configuration\AbstractBlockConfigurationForm;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;

/**
 * Class CopyrightBlockForm
 *
 * @package GravityCMS\Component\View\Block\Block\Copyright
 * @author  Andy Thorne <contrabandvr@gmail.com>
 */
class CopyrightBlockForm extends AbstractBlockConfigurationForm
{
    protected function buildConfigForm(FormBuilderInterface $builder, array $options)
    {
        $builder->add('text', 'textarea', array(
            'label' => 'Copyright Text'
        ));
    }

    /**
     * Returns the name of this type.
     *
     * @return string The name of this type
     */
    public function getName()
    {
        return 'configuration_block_copyright';
    }

}
