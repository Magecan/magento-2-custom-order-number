<?php
/**
 * Copyright © Magecan, Inc. All rights reserved.
 */
namespace Magecan\CustomOrderNumber\Block\Adminhtml\System\Config\Form\Field;

use Magento\Framework\DataObject;
use Magento\Config\Block\System\Config\Form\Field\FieldArray\AbstractFieldArray;
use Magento\Framework\View\Element\Html\Select;

class DynamicRows extends AbstractFieldArray
{
    /**
     * @var Select
     */
    protected $selectRenderer;

    /**
     * Prepare to render the dynamic rows grid.
     */
    protected function _prepareToRender()
    {
        // Define the columns of the dynamic rows
        $this->addColumn('type', [
            'label' => __('Type'),
            'renderer' => $this->_getSelectRenderer(),
            'class' => 'required-entry'
        ]);

        $this->addColumn('value', [
            'label' => __('Value')
        ]);

        $this->_addAfter = false; // Disable the "Add After" button
        $this->_addButtonLabel = __('Add Row'); // Customize the Add button
    }

    /**
     * Prepare HTML attributes for each row in the array.
     *
     * @param DataObject $row The DataObject representing a row to prepare.
     *
     * @return void
     */
    protected function _prepareArrayRow(DataObject $row)
    {
        $options = [];
        $options['option_' . $this->_getSelectRenderer()->calcOptionHash($row->getData('select_field'))]
            = 'selected="selected"';

        $row->setData('option_extra_attrs', $options);
    }

    /**
     * Get select field renderer for the select type.
     *
     * @return Select
     */
    protected function _getSelectRenderer()
    {
        if (!$this->selectRenderer) {
            $this->selectRenderer = $this->getLayout()->createBlock(
                \Magecan\CustomOrderNumber\Block\Adminhtml\Form\Field\SelectRenderer::class,
                '',
                ['data' => ['is_render_to_js_template' => true]]
            );
        }
        return $this->selectRenderer;
    }
}
