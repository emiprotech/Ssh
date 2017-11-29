<?php
 
namespace Emipro\Ssh\Block\Adminhtml\Grid\Edit\Tab;

class Magento extends \Magento\Backend\Block\Widget\Form\Generic implements \Magento\Backend\Block\Widget\Tab\TabInterface
{
    protected $_systemStore;
    protected $_adminSession;
    protected $_template = 'grid/magento.phtml';
    protected $_wysiwygConfig;
    
    public function __construct(
        \Magento\Backend\Block\Template\Context $context,
        \Magento\Framework\Registry $registry,
        \Magento\Framework\Data\FormFactory $formFactory,
        \Magento\Store\Model\System\Store $systemStore,
        \Magento\Cms\Model\Wysiwyg\Config $wysiwygConfig,
        \Magento\Backend\Model\Auth\Session $adminSession,
        array $data = []
    ) 
    {
        $this->_systemStore = $systemStore;
        $this->_wysiwygConfig = $wysiwygConfig;
        parent::__construct($context, $registry, $formFactory, $data);
        $this->_adminSession = $adminSession;
    }
    
    public function getTabLabel()
    {
        return __('Magento');
    }
   
    public function getTabTitle()
    {
        return __('Magento SSH');
    }
 
    public function canShowTab()
    {
        return true;
    }
 
    public function isHidden()
    {
        return false;
    }
   
    protected function _isAllowedAction($resourceId)
    {
        return $this->_authorization->isAllowed($resourceId);
    }

    public function getMagentoUrl()
    { 
        return $this->getUrl('ssh/grid/magento/');
    }
}