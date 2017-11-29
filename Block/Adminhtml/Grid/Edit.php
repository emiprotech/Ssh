<?php
 
namespace Emipro\Ssh\Block\Adminhtml\Grid;
 
class Edit extends \Magento\Backend\Block\Widget\Form\Container
{
    protected $_coreRegistry = null;
 
    public function __construct(
        \Magento\Backend\Block\Widget\Context $context,
        \Magento\Framework\Registry $registry,
        array $data = []
    ) 
    {
        $this->_coreRegistry = $registry;
        parent::__construct($context, $data);
    }
    protected function _construct()
    {
        $this->_objectId = 'id';
        $this->_blockGroup = 'emipro_ssh';
        $this->_controller = 'adminhtml_grid';
        parent::_construct();
        $this->buttonList->remove('save');
        $this->buttonList->remove('reset');
    }
 
    public function getHeaderText()
    {
        if ($this->_coreRegistry->registry('emipro_form_data')->getId()) 
        {
            return __("Edit Post '%1'", $this->escapeHtml($this->_coreRegistry->registry('emipro_form_data')->getTitle()));
        } 
        else 
        {
            return __('Emipro SSH');
        }
    }
    protected function _prepareLayout()
    {
       $scopVal =  $this->_scopeConfig->getValue('emipro_ssh/git/git_active', \Magento\Store\Model\ScopeInterface::SCOPE_STORE);
       if(!$scopVal)
        {
            $this->_formScripts[] = "
                require(['jquery', 'jquery/ui'], function($){ 
                    $('#grid_record_main_section').hide();
             });                                                                        
            ";       
        } 
        return parent::_prepareLayout();
    }
}