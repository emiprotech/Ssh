<?php

namespace Emipro\Ssh\Controller\Adminhtml\Grid;

use Magento\Backend\App\Action;

class Edit extends \Magento\Backend\App\Action
{
    protected $_coreRegistry = null;
    protected $resultPageFactory;

    public function __construct(
        Action\Context $context,
        \Magento\Framework\View\Result\PageFactory $resultPageFactory,
        \Magento\Framework\Registry $registry
    )
    {
        $this->resultPageFactory = $resultPageFactory;
        $this->_coreRegistry = $registry;
        parent::__construct($context);
    }

    protected function _isAllowed()
    {
        return true;
    }
    protected function _initAction()
    {
        $resultPage = $this->resultPageFactory->create();
        $resultPage->setActiveMenu('Emipro_Ssh::grid')->addBreadcrumb(__('SSH'), __('SSH'))
            ->addBreadcrumb(__('Emipro SSH'), __('Emipro SSH'));
        return $resultPage;
    }
    public function execute()
    {
        $resultPage = $this->_initAction();
        $resultPage->addBreadcrumb(__('Emipro SSH'),__('Emipro SSH')
        );
        $resultPage->getConfig()->getTitle()->prepend(__('Grids'));
        $resultPage->getConfig()->getTitle()
            ->prepend(__('Emipro SSH'));
        return $resultPage;
    }
}