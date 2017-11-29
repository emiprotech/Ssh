<?php
namespace Emipro\Ssh\Block\Adminhtml\Grid;
 
class Grid extends \Magento\Backend\Block\Widget\Grid\Extended
{
    protected $moduleManager;
     
    public function __construct(
        \Magento\Backend\Block\Template\Context $context,
        \Magento\Backend\Helper\Data $backendHelper,
        \Magento\Framework\Module\Manager $moduleManager,
        array $data = []
    ) 
    {
        $this->moduleManager = $moduleManager;
        parent::__construct($context, $backendHelper, $data);
    } 
   
    protected function _construct()
    {
        parent::_construct();
        $this->setId('gridGrid');
        $this->setDefaultSort('id');
        $this->setDefaultDir('DESC');
        $this->setSaveParametersInSession(true);
        $this->setUseAjax(true);
        $this->setVarNameFilter('grid_record');
    }
}