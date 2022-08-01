<?php

namespace Sanoop\Assignment6\Block\Adminhtml\Form\Field;

use Magento\Config\Block\System\Config\Form\Field\FieldArray\AbstractFieldArray;
use Magento\Framework\DataObject;
use Magento\Framework\Exception\LocalizedException;
use Sanoop\Assignment6\Block\Adminhtml\Form\Field\GenderColumn;

class EmiPlans extends AbstractFieldArray
{
    /**
     * @var GenderColumn
     */
    private $genderRenderer;

    /**
     * Prepare rendering the new field by adding all the needed columns
     */
    protected function _prepareToRender()
    {
        $this->addColumn('interest_rate', ['label' => __('Interest Rate'), 'class' => 'required-entry']);
        $this->addColumn('tenure', ['label' => __('Tenure'), 'class' => 'required-entry']);
        $this->addColumn('gender', [
            'label' => __('Gender'),
            'renderer' => $this->getGenderRenderer()
        ]);
        $this->_addAfter = false;
        $this->_addButtonLabel = __('Add');
    }

    /**
     * @return GenderColumn
     * @throws LocalizedException
     */
    private function getGenderRenderer()
    {
        if (!$this->genderRenderer) {
            $this->genderRenderer = $this->getLayout()->createBlock(
                GenderColumn::class,
                '',
                ['data' => ['is_render_to_js_template' => true]]
            );
        }
        return $this->genderRenderer;
    }

    /**
     * Prepare existing row data object
     *
     * @param DataObject $row
     * @throws LocalizedException
     */
    protected function _prepareArrayRow(DataObject $row): void
    {
        $options = [];

        $gender = $row->getGender();
        if ($gender !== null) {
            $options['option_' . $this->getGenderRenderer()->calcOptionHash($gender)] = 'selected="selected"';
        }

        $row->setData('option_extra_attrs', $options);
    }
}
