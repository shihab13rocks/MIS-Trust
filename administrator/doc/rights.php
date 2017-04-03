<?php 
$allRights = array(
	'Dashboards' => array('index'),
	'Inspections' => array('add','edit','delete','view','index'),
	'InspectionTestMethods' => array('add','edit','delete','view','index'),
	'InspectionTests' => array('add','edit','delete','view','index'),
	'InspectionTestStandardLimits' => array('add','edit','delete','view','index'),
	'OrganizationGroups' => array('add','edit','delete','view','index'),
	'Organizations' => array('add','edit','delete','view','index'),
	'OrganizationTypes' => array('add','edit','delete','view','index'),
	'Premixes' => array('add','edit','delete','view','index'),
	'PremixRequests' => array('add','edit','delete','view','index'),
	'PremixStandardLimits' => array('add','edit','delete','view','index'),
	'ProductBrands' => array('add','edit','delete','view','index'),
	'ProductionForecasts' => array('add','edit','delete','view','index'),
	'Productions' => array('add','edit','delete','view','index'),
	'Products' => array('add','edit','delete','view','index'),
	'Reports' => array('add','edit','delete','view','index'),
	'Settings' => array('add','edit','delete','view','index'),
	'UserRoles' => array('add','edit','delete','view','index'),
	'Users' => array('add','edit','delete','view','index'),
	'UserType' => array('add','edit','delete','view','index')
);

$allRights = serialize($allRights);

$SuperAdminRights = array(
	'Dashboards' => array('index'),
	'Inspections' => array('view','index'),
	'InspectionTestMethods' => array('view','index'),
	'InspectionTests' => array('view','index'),
	'InspectionTestStandardLimits' => array('view','index'),
	'OrganizationGroups' => array('add','edit','delete','view','index'),
	'Organizations' => array('add','edit','delete','view','index'),
	'OrganizationTypes' => array('add','edit','delete','view','index'),
	'Premixes' => array('add','edit','delete','view','index'),
	'PremixRequests' => array('view','index'),
	'PremixStandardLimits' => array('add','edit','delete','view','index'),
	'ProductBrands' => array('view','index'),
	'ProductionForecasts' => array('view','index'),
	'Productions' => array('view','index'),
	'Products' => array('add','edit','delete','view','index'),
	'Reports' => array('view','index'),
	'Settings' => array('edit','view','index'),
	'UserRoles' => array('add','edit','delete','view','index'),
	'Users' => array('add','edit','delete','view','index'),
	'UserType' => array('add','edit','delete','view','index')
);

$SuperAdminRights = serialize($SuperAdminRights);

$PmuRights = array(
	'Dashboards' => array('index'),
	'Inspections' => array('view','index'),
	'InspectionTestMethods' => array('view','index'),
	'InspectionTests' => array('view','index'),
	'InspectionTestStandardLimits' => array('view','index'),
	'OrganizationGroups' => array('view','index'),
	'Organizations' => array('edit','view','index'),
	'OrganizationTypes' => array('view','index'),
	'Premixes' => array('view','index'),
	'PremixRequests' => array('edit','view','index'),
	'PremixStandardLimits' => array('add','edit','delete','view','index'),
	'ProductBrands' => array('view','index'),
	'ProductionForecasts' => array('view','index'),
	'Productions' => array('view','index'),
	'Products' => array('view','index'),
	'Reports' => array('view','index'),
	'Settings' => array('edit','view','index'),
	'UserRoles' => array('view','index'),
	'Users' => array('add','edit','delete','view','index'),
	'UserType' => array('view','index')
);

$PmuRights = serialize($PmuRights);

$BstiRights = array(
	'Dashboards' => array('index'),
	'Inspections' => array('add','edit','delete','view','index'),
	'InspectionTestMethods' => array('add','edit','delete','view','index'),
	'InspectionTests' => array('add','edit','delete','view','index'),
	'InspectionTestStandardLimits' => array('add','edit','delete','view','index'),
	'OrganizationGroups' => array('view','index'),
	'Organizations' => array('edit','view','index'),
	'OrganizationTypes' => array('view','index'),
	'Premixes' => array('view','index'),
	'PremixStandardLimits' => array('view','index'),
	'ProductBrands' => array('view','index'),
	'Products' => array('view','index'),
	'Reports' => array('view','index'),
	'Settings' => array('edit','view','index'),
	'UserRoles' => array('view','index'),
	'Users' => array('add','edit','delete','view','index'),
	'UserType' => array('view','index')
);

$BstiRights = serialize($BstiRights);

$RefineryRights = array(
	'Dashboards' => array('index'),
	'Inspections' => array('view','index'),
	'InspectionTestMethods' => array('view','index'),
	'InspectionTests' => array('add','edit','delete','view','index'),
	'InspectionTestStandardLimits' => array('view','index'),
	'OrganizationGroups' => array('view','index'),
	'Organizations' => array('edit','view','index'),
	'OrganizationTypes' => array('view','index'),
	'Premixes' => array('view','index'),
	'PremixRequests' => array('add','edit','delete','view','index'),
	'PremixStandardLimits' => array('view','index'),
	'ProductBrands' => array('add','edit','delete','view','index'),
	'ProductionForecasts' => array('add','edit','delete','view','index'),
	'Productions' => array('add','edit','delete','view','index'),
	'Products' => array('view','index'),
	'Reports' => array('view','index'),
	'UserRoles' => array('view','index'),
	'Users' => array('add','edit','delete','view','index'),
	'UserType' => array('view','index')
);

$RefineryRights = serialize($RefineryRights);

echo '<pre>';
print_r($allRights);
echo '</pre>';
echo '<pre>';
print_r($SuperAdminRights);
echo '</pre>';
echo '<pre>';
print_r($PmuRights);
echo '</pre>';
echo '<pre>';
print_r($BstiRights);
echo '</pre>';
echo '<pre>';
print_r($RefineryRights);
echo '</pre>';


if($User["userlevel"]!="admin"){
	$allPerms=$this->_permittableActions();
	$userPerms=unserialize($User["pMatrix"]);
	if(is_array($allPerms)){
		ksort($allPerms);
		foreach($allPerms as $section=>$subsections){
			$html.="<div class='permissionSection clearfix'><span class='section headertoolbar collapsible open'>$section <input class='main_cb' type='checkbox' onclick='checkUncheck_all_perms(event,this);' /></span>";
			if(is_array($subsections)){
				foreach($subsections as $subsection=>$name){
					if(isset($userPerms[$section][$subsection])){
						$html.="<label class='subsection'><input type='checkbox' name='".$section."_".$subsection."' /> $name</label>";
					}else{
						$html.="<label class='subsection'><input type='checkbox' name='".$section."_".$subsection."' checked /> $name</label>";
					}

				}
			}
			$html.="</div>";
		}
	}
}


function _checkAuthentication(&$CI){
	if(!isset($CI->_userid) || $CI->_userid==""){
		if(isset($_SERVER["HTTP_X_REQUESTED_WITH"]) && $_SERVER["HTTP_X_REQUESTED_WITH"] == "XMLHttpRequest"){
			header("HTTP/1.1 412 Precondition Failed");
			exit;
		}else{
			header("Location: ".base_url()."admin/authentication/showlogin");
			exit;
		}
	}else{
		//check user type
		if($CI->_utype!="admin"){
			//load permissions matrix
			$CI->load->model("users_m","users");
			$matrix=$CI->users->get($CI->_userid);
			$pMatrix=unserialize($matrix["pMatrix"]);
			if(is_array($pMatrix)){
				//find out who called this function
				$trace=debug_backtrace();
				$caller=$trace["1"];
				$C_funct=$caller['function'];
				if (isset($caller['class'])){
					$C_class=$caller['class'];
				}
				//By Default, users are allowed every where
				//have to manually uncheck items you would want them to be blocked on
				if(isset($pMatrix[$C_class])){
					if(isset($pMatrix[$C_class][$C_funct])){
						_kickOut();
					}else{
						return true;
					}
				}else{
					return true;
				}



			}else{
				return true;
			}
		}else{
			//administrator, so allowed to anywhere
			return true;
		}
	}
}