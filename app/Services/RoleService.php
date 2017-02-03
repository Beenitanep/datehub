<?php
namespace App\Services;

use Auth;

use App\User;

use Config;

use Session;


class RoleService
{
	public function getPermissionModules() {
       $userPermission = Session::get('loggedInUser')->permission;
        $moduleData['cmsmodules'] = Config::get('cmsconfig.cmsmodules');
        $moduleData['cmsmodulepages'] = Config::get('cmsconfig.cmsmodulepages');
        $allData = array();
        if ($userPermission == 'all') {
            foreach ($moduleData['cmsmodules'] as $moduleID => $moduleTitle) {
                $arrayData['id'] = $moduleID;
                $arrayData['title'] = $moduleTitle;
                $arrayData['pages'] = count($moduleData['cmsmodulepages'][$moduleID]);//1
                $arrayData['subPages'] = $moduleData['cmsmodulepages'][$moduleID];//Dashboard
                array_push($allData, $arrayData);
            }
        } 
        else {
            $userModule = explode(',', $userPermission);
            foreach ($moduleData['cmsmodules'] as $moduleID => $moduleTitle) {
                foreach ($userModule as $moduleValue) {
                    if ($moduleID == $moduleValue) {
                        $arrayData['id'] = $moduleValue;
                        $arrayData['title'] = $moduleTitle;
                        $arrayData['pages'] = count($moduleData['cmsmodulepages'][$moduleValue]);
                        $arrayData['subPages'] = $moduleData['cmsmodulepages'][$moduleValue];
                        $arrayData['logo'] = Config::get('cmsconfig.logotitle');
                        array_push($allData, $arrayData);
                    }
                }
            }
        }
        //dd($allData);
        return $allData;
    }



}