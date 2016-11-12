<?php

namespace Kanboard\Plugin\AllBoardView\Controller;

use Kanboard\Controller\BaseController;
use Kanboard\Controller\TaskModificationController;

class AllBoardViewController extends BaseController
{
    public function project()
    {
	$project = $this->getProject();

	$AllBoardViewData = $this->allBoardViewModel->AllBoardViewFullTasksList($project['id']);

        $this->response->html($this->helper->layout->app('allBoardView:allBoardView/show', array('title' => t('AllBoardView'),
            'project' => $project,
	    'AllBoardViewData' => $AllBoardViewData
        )));
    }

    public function projectAll()
    {
	//$project = $this->getProject();
	$user = $this->getUser();

	$projectAccess = $this->allBoardViewModel->AllBoardViewGetProjectid($user['id']);
	$AllBoardViewData = $this->allBoardViewModel->allBoardViewFullTasksListAll($projectAccess);

        $this->response->html($this->helper->layout->app('allBoardView:allboardview/show', array('title' => t('AllBoardView - All projects'),
            'project' => 'Allprojects',
	    'AllBoardViewData' => $AllBoardViewData
        )));
    }

}
