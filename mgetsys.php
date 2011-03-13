<?php
/**
 * MGetSys ystem plugin for Joomla! 1.5/1.6
 * Version: 1.0
 * @license http://www.gnu.org/licenses/gpl.html GNU/GPL v2.0.
 * @by DtD Productions
 * @Copyright (C) 2008-2011
 */
defined( '_JEXEC' ) or die( 'Restricted access' );

class  plgSystemMGetSys extends JPlugin
{
	function plgSystemMGetSys(&$subject, $config)  {
		parent::__construct($subject, $config);
	}

	function onAfterRender()
	{
		$app =& JFactory::getApplication();

		if($app->getName() != 'site') {
			return true;
		}

		$buffer = JResponse::getBody();
		$user = &JFactory::getUser();
		
		$uid=$user->id;
		if ($uid) {
			$username=$user->username;
			$usersname=$user->name;
			$email=$user->email;
		} else {
			$username='Guest';
			$usersname='Guest';
			$email='Guest';
			
		}
		
		//User ID
		$buffer = str_replace('{mgetsysuid}',$uid,$buffer);
		//Username
		$buffer = str_replace('{mgetsysuser}',$username,$buffer);
		//Users Name
		$buffer = str_replace('{mgetsysuname}',$usersname,$buffer);
		//Users Name
		$buffer = str_replace('{mgetsysueml}',$email,$buffer);
		
		JResponse::setBody($buffer);
		return true;
	}

}


?>
