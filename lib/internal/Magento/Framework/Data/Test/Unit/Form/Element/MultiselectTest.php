<?php
/**
 * Copyright © Magento, Inc. All rights reserved.
 * See COPYING.txt for license details.
 */
namespace Magento\Framework\Data\Test\Unit\Form\Element;

class MultiselectTest extends \PHPUnit\Framework\TestCase
{
    /**
     * @var \Magento\Framework\Data\Form\Element\Multiselect
     */
    protected $_model;

    protected function setUp()
    {
        $testHelper = new \Magento\Framework\TestFramework\Unit\Helper\ObjectManager($this);
        $this->_model = $testHelper->getObject(\Magento\Framework\Data\Form\Element\Editablemultiselect::class);
        $this->_model->setForm(new \Magento\Framework\DataObject());
    }

    /**
     * Verify that hidden input is present in multiselect
     *
     * @covers \Magento\Framework\Data\Form\Element\Multiselect::getElementHtml
     */
    public function testHiddenFieldPresentInMultiSelect()
    {
        $fieldName = 'fieldName';
        $fieldId = 'fieldId';
        $this->_model->setCanBeEmpty(true);
        $this->_model->setName($fieldName);
        $this->_model->setId($fieldId);
        $elementHtml = $this->_model->getElementHtml();
        $this->assertContains(
            '<input type="hidden" id="' . $fieldId . '_hidden" name="' . $fieldName . '"',
            $elementHtml
        );
    }

    /**
     * Verify that js element is added
     */
    public function testGetAfterElementJs()
    {
        $this->_model->setAfterElementJs('<script language="text/javascript">var website = "website1";</script>');
        $elementHtml = $this->_model->getAfterElementJs();
        $this->assertContains('var website = "website1";', $elementHtml);
    }
}
