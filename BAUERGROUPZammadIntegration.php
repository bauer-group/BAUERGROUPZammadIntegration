<?php

/* 
 *  Bootstrapper for Zammad Chat Widget Class 
 */

namespace BAUERGROUPZammadIntegration;

use Shopware\Components\Plugin;
use Shopware\Components\Plugin\Context\InstallContext;
use Shopware\Components\Plugin\Context\UninstallContext;
use Shopware\Components\Plugin\Context\ActivateContext;
use Shopware\Components\Plugin\Context\DeactivateContext;
use Shopware\Components\Plugin\Context\UpdateContext;


class BAUERGROUPZammadIntegration extends Plugin
{
	//---------------------------------------------------------------------
	//Common Bootstrap Code START - Version 1.0
	
	//Internals START	
	private function getCacheArray()
	{
		return [
			InstallContext::CACHE_LIST_DEFAULT
		];
	}
	//Internals STOP
	
	//Setup START
	public function install(InstallContext $context)
	{
		$context->scheduleClearCache($this->getCacheArray());
		parent::install($context);
	}
 
	public function uninstall(UninstallContext $context)
	{
		$context->scheduleClearCache($this->getCacheArray());
		parent::uninstall($context);
	}
 
	public function activate(ActivateContext $context)
	{
		$context->scheduleClearCache($this->getCacheArray());
		parent::activate($context);
	}
 
	public function deactivate(DeactivateContext $context)
	{
		$context->scheduleClearCache($this->getCacheArray());
		parent::deactivate($context);
	}
	
	public function update(UpdateContext $context) 
	{
		$context->scheduleClearCache($this->getCacheArray());
		parent::update($context);
	}
	//Setup END
	
	//Common Bootstrap Code END
	//---------------------------------------------------------------------
	
	public static function getSubscribedEvents()
	{		
		return [			
			'Enlight_Controller_Action_PostDispatchSecure_Frontend' => 'onFrontendPostDispatch'
		];
	}
	
	public function onFrontendPostDispatch(\Enlight_Controller_ActionEventArgs $args)
	{
		$config = $this->container->get('shopware.plugin.cached_config_reader')->getByPluginName($this->getName(), Shopware()->Shop());
		
		$controller = $args->get('subject');
		$view = $controller->View();
		
		$view->assign('BAUERGROUPZammadIntegration_TitleText', $config["TitleText"]);
		$view->assign('BAUERGROUPZammadIntegration_BackgroundColor', $config["BackgroundColor"]);
		$view->assign('BAUERGROUPZammadIntegration_FontSize', $config["FontSize"]);
		$view->assign('BAUERGROUPZammadIntegration_FlatDesign', $config["FlatDesign"]);
		$view->assign('BAUERGROUPZammadIntegration_Hostname', $config["Hostname"]);
		$view->assign('BAUERGROUPZammadIntegration_ChatID', $config["ChatID"]);
		
		/*
		$view->assign('BAUERGROUPZammadIntegration_ScriptSource', $config["ScriptSource"]);
		$view->assign('BAUERGROUPZammadIntegration_CSSAutoload', $config["CSSAutoload"]);		
		$view->assign('BAUERGROUPZammadIntegration_CSSSource', $config["CSSSource"]);
		*/
		$this->container->get('template')->addTemplateDir($this->getPath() . '/Resources/Views/');
	} //onFrontendPostDispatch	
}

?>
