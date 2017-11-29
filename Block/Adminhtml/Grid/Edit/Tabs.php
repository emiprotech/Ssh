<?php

namespace Emipro\Ssh\Block\Adminhtml\Grid\Edit;

class Tabs extends \Magento\Backend\Block\Widget\Tabs
{
    protected function _construct()
    {
        parent::_construct();
        $this->setId('grid_record');
        $this->setDestElementId('edit_form');
        $this->setTitle(__('Emipro SSH'));
    }
    protected function _prepareLayout()
    {
    	$this->addTab(
			'Git_Command',
		    [
		     	'label' => __('Magento'),
                'content' => $this->getLayout()->createBlock('Emipro\Ssh\Block\Adminhtml\Grid\Edit\Tab\Magento')->toHtml(),
		    ]
		    );
    }
}