<?php
/**
 * Copyright © Magecan, Inc. All rights reserved.
 */
namespace Magecan\CustomOrderNumber\Block\Adminhtml\Form\Field;

use Magento\Framework\View\Element\Html\Select;

class SelectRenderer extends Select
{
    /**
     * Set the input name for the select field.
     *
     * @param string $value
     * @return $this
     */
    public function setInputName($value)
    {
        return $this->setName($value);
    }

    /**
     * Set the input ID for the select field.
     *
     * @param string $value
     * @return $this
     */
    public function setInputId($value)
    {
        return $this->setId($value);
    }

    /**
     * Render the HTML for the select field.
     *
     * @return string
     */
    public function _toHtml()
    {
        if (!$this->getOptions()) {
            $this->addOption('fixed_string', __('Fixed String'));
            $this->addOption('yyyy', __('YYYY'));
            $this->addOption('mm', __('MM'));
            $this->addOption('dd', __('DD'));
            $this->addOption('store_id', __('Store ID'));
        }
        return parent::_toHtml();
    }
}
