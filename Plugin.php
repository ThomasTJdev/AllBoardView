<?php

namespace Kanboard\Plugin\AllBoardView;

use Kanboard\Core\Plugin\Base;

class Plugin extends Base
{
    public function initialize()
    {
	// WARNING !! This is changing the security policy
	$this->setContentSecurityPolicy(array('default-src' => '* \'unsafe-inline\' \'unsafe-eval\''));

	$this->template->hook->attach('template:dashboard:sidebar', 'allBoardView:dashboard/dashboardsidebar');
	$this->template->hook->attach('template:project:dropdown', 'allBoardView:project/dropdown');
	$this->template->hook->attach('template:project:sidebar', 'allBoardView:project/sidebar');

    }

    public function getClasses()
    {
        return array(
            'Plugin\AllBoardView\Model' => array(
		'AllBoardViewModel'
             )
         );
    }

    public function getPluginName()
    {
        return 'AllBoardView';
    }
    public function getPluginAuthor()
    {
        return 'TTJ';
    }
    public function getPluginVersion()
    {
        return '0.0.1';
    }
    public function getPluginDescription()
    {
        return 'AllBoardView';
    }
    public function getPluginHomepage()
    {
        return '';
    }
}
