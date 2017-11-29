<?php

namespace Emipro\Ssh\Controller\Adminhtml\Grid;

use Magento\Backend\App\Action\Context;
use Magento\Framework\View\Result\PageFactory;
use Magento\Backend\App\Action;

class Magento extends Action
{
    protected $resultPageFactory;

    public function __construct(
        Context $context,
        PageFactory $resultPageFactory
    ) {
        parent::__construct($context);
        $this->resultPageFactory = $resultPageFactory;

    }

    public function execute()
    {
        $data = $this->getRequest()->getParam('type');
        $custom = $this->getRequest()->getParam('custom');
        if($data){
            if($data == 'reindex'){
            $output = 'php bin/magento indexer:reindex 2>&1';
            }
            if($data == 'design_config_grid'){
            $output = 'php bin/magento indexer:reindex design_config_grid 2>&1';
            }
            if($data == 'customer_grid'){
            $output = 'php bin/magento indexer:reindex customer_grid 2>&1';
            }
            if($data == 'catalog_category_product'){
            $output = 'php bin/magento indexer:reindex catalog_category_product 2>&1';
            }
            if($data == 'catalog_product_category'){
            $output = 'php bin/magento indexer:reindex catalog_product_category 2>&1';
            }
            if($data == 'catalog_product_price'){
            $output = 'php bin/magento indexer:reindex catalog_product_price 2>&1';
            }
            if($data == 'catalog_product_attribute'){
            $output = 'php bin/magento indexer:reindex catalog_product_attribute 2>&1';
            }
            if($data == 'cataloginventory_stock'){
            $output = 'php bin/magento indexer:reindex cataloginventory_stock 2>&1';
            }
            if($data == 'catalogrule_rule'){
            $output = 'php bin/magento indexer:reindex catalogrule_rule 2>&1';
            }
            if($data == 'catalogrule_product'){
            $output = 'php bin/magento indexer:reindex catalogrule_product 2>&1';
            }
            if($data == 'catalogsearch_fulltext'){
            $output = 'php bin/magento indexer:reindex catalogsearch_fulltext 2>&1';
            }
            if($data == 'indexinfo'){
            $output = 'php bin/magento indexer:info 2>&1';
            }
            if($data == 'indexstatus'){
            $output = 'php bin/magento indexer:status 2>&1';
            }
            if($data == 'clean'){
            $output = 'php bin/magento cache:clean 2>&1';
            }
            if($data == 'flush'){
            $output = 'php bin/magento cache:flush 2>&1';
            }
            if($data == 'status'){
            $output = 'php bin/magento cache:status 2>&1';
            }
            if($data == 'enable'){
            $output = 'php bin/magento cache:enable 2>&1';
            }
            if($data == 'disable'){
            $output = 'php bin/magento cache:disable 2>&1';
            }
            if($data == 'upgrade'){
            $output = 'php bin/magento setup:upgrade 2>&1';
            }
            if($data == 'upgradekeep'){
            $output = 'php bin/magento setup:upgrade --keep-generated 2>&1';
            }
            if($data == 'deploy'){
            $output = 'php bin/magento setup:static-content:deploy 2>&1';
            }
            if($data == 'deployus'){
            $output = 'php bin/magento setup:static-content:deploy en_US 2>&1';
            }
            if($data == 'deployadmin'){
            $output = 'php bin/magento setup:static-content:deploy --theme="Magento/backend" 2>&1';
            }
            if($data == 'modeshow'){
            $output = 'php bin/magento deploy:mode:show 2>&1';
            }
            if($data == 'modedeve'){
            $output = 'php bin/magento deploy:mode:set developer 2>&1';
            }
            if($data == 'modeprod'){
            $output = 'php bin/magento deploy:mode:set production 2>&1';
            }
            if($data == 'dicompile'){
            $output = 'php bin/magento setup:di:compile 2>&1';
            }
            if($data == 'var'){
            $output = 'rm -rf var/*  2>&1';
            }
            if($data == 'generation'){
            $output = 'rm -rf var/generation/*  2>&1';
            }
            if($data == 'customcommand'){
            if($custom)
            $output = 'php bin/magento setup:static-content:deploy '.base64_decode($custom).'  2>&1';
            }

            if($output){
                while (@ob_end_flush());
                ob_implicit_flush(true);
                header('Content-Encoding: none');
                header('Cache-Control: no-cache'); // recommended to prevent caching of event data.
                echo '<style type="text/css">body{background: #000;color: green !important;}pre{white-space: pre-wrap;word-break: break-all;word-break: break-word;}</style>';
                $cmd = $output;
                echo "<pre>";
                passthru($cmd);
                if($data == 'var'){echo "var folder clean.";}
                if($data == 'generation'){echo "generation folder clean.";}
                echo "</pre>";
            }
        }
    }
}