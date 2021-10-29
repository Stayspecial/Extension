<?php
namespace Learning\ThirdUnit\Model;

use Magento\Checkout\Model\ConfigProviderInterface;

class CustomConfigProvider implements ConfigProviderInterface
{
protected $scopeConfig;
protected $disallowedUsStates;
public function __construct(\Magento\Framework\App\Config\ScopeConfigInterface $scopeConfig)
{
$this->scopeConfig = $scopeConfig;
}
   public function getConfig()
    {
        $disallowedUsStates = $this->scopeConfig->getValue('thirdunit_extension/state_filter/us_state_filter', \Magento\Store\Model\ScopeInterface::SCOPE_STORE);
        $this->disallowedUsStates = explode(",", $disallowedUsStates);
        $config = [];
        $config['myCustomData'] = $this->disallowedUsStates;
        //echo '<pre>';print_r($config['myCustomData']);
        return $config;
    }
}
