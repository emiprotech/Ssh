<?php
namespace Emipro\Ssh\Controller\Adminhtml\Grid;

use Magento\Backend\App\Action\Context;
use Magento\Framework\View\Result\PageFactory;
use Magento\Backend\App\Action;

class Git extends Action
{
    protected $resultPageFactory;

    public function __construct(
        Context $context,
        PageFactory $resultPageFactory,
        \Magento\Backend\Model\Auth\Session $authSession,
        \Magento\Framework\App\Config\ScopeConfigInterface $scopeConfig
    ){
        parent::__construct($context);
        $this->resultPageFactory = $resultPageFactory;
        $this->authSession = $authSession;
        $this->scopeConfig = $scopeConfig;
    }

    public function execute()
    {
        $git =  $this->scopeConfig->getValue('emipro_ssh/git/git_active', \Magento\Store\Model\ScopeInterface::SCOPE_STORE);
        if($git){
            $gitdir =  $this->scopeConfig->getValue('emipro_ssh/git/gitdirectory', \Magento\Store\Model\ScopeInterface::SCOPE_STORE);
            $branch =  $this->scopeConfig->getValue('emipro_ssh/git/branch', \Magento\Store\Model\ScopeInterface::SCOPE_STORE);
            $repourlconf =  $this->scopeConfig->getValue('emipro_ssh/git/repourl', \Magento\Store\Model\ScopeInterface::SCOPE_STORE);
            $gituser =  $this->scopeConfig->getValue('emipro_ssh/git/gituser', \Magento\Store\Model\ScopeInterface::SCOPE_STORE);
            $gitpassword =  $this->scopeConfig->getValue('emipro_ssh/git/gitpassword', \Magento\Store\Model\ScopeInterface::SCOPE_STORE);
            $username = $this->authSession->getUser()->getUsername();
            $email =  $this->authSession->getUser()->getEmail();
            $data = $this->getRequest()->getParam('type');
            if($data){
                $repourlexploaded = explode('@', $repourlconf);
                $passwordurlencoded = urlencode($gitpassword);
                $repourl='https://'.$gituser.':'.$passwordurlencoded.'@'.$repourlexploaded[1];
                chdir($gitdir.'/');
                if($data == 'gitstatus'){
                $output = 'git status 2>&1';
                }
                if($data == 'gitadd'){
                $output = 'git add --all 2>&1';
                }
                if($data == 'gitcommit'){
                $output = 'git commit -m "auto commit" 2>&1';
                }
                if($data == 'gitcheckout'){
                $output = 'git checkout 2>&1';
                }
                if($data == 'gitcheckoutbranch'){
                $output = 'git checkout '.$branch.' 2>&1';
                }
                if($data == 'gitbranchlist'){
                $output = 'git branch 2>&1';
                }
                if($data == 'gitpush'){
                //$output = 'git push origin '.$branch.' 2>&1';
                $output = 'git push '.$repourl.' '.$branch.' 2>&1';
                }
                if($data == 'gitpull'){
                //$output = 'git pull origin '.$branch.' 2>&1';
                $output = 'git pull '.$repourl.' '.$branch.' 2>&1';
                }
                if($data == 'gitemail'){
                //passthru('chown -R 777 firsttest/');
                $output = 'git config user.email "'.$email.'" 2>&1';
                }
                if($data == 'gitname'){
                //passthru('chown -R www-data:www-data firsttest/');

                $output = 'git config user.name "'.$username.'" 2>&1';
                }
                while (@ob_end_flush());

                ob_implicit_flush(true);

                header('Content-Encoding: none');
                header('Cache-Control: no-cache'); // recommended to prevent caching of event data.
                echo '<style type="text/css">body{background: #000;color: green !important;}pre{white-space: pre-wrap;word-break: break-all;word-break: break-word;}</style>';
                $cmd = $output;
                echo "<pre>";
                passthru($cmd);
                if($data == 'gitemail'){echo "Email Added.";}
                if($data == 'gitname'){echo "Name Added.";}
                echo "</pre>";
            }
        }
    }
}