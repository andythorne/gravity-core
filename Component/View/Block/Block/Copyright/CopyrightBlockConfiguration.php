<?php

namespace GravityCMS\Component\View\Block\Block\Copyright;

use GravityCMS\Component\View\Block\Configuration\AbstractBlockConfiguration;

class CopyrightBlockConfiguration extends AbstractBlockConfiguration
{
    /**
     * @var string
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

    /**
     * The service or object of the form
     *
     * @return string|object
     */
    public function getForm()
    {
        return new CopyrightBlockForm();
    }
}
