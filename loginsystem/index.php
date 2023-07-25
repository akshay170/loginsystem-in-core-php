<?php 
//user require
require './controller/user.php';
// admin require
require './controller/admin.php';

//objects:-

$userObj = new user();
$adminObj = new admin();

$uri=$_SERVER['REQUEST_URI'];

// print_r($uri);die;

if ($uri === '/loginsystem/') { 
    $userObj ->home_view();
  
}
//Signup page
elseif ($uri === '/loginsystem/signup') {
    $userObj-> signup();
   
} 
//login page 
elseif ($uri === '/loginsystem/login') {
    $userObj-> login();
    
} 
//welcome page 
elseif ($uri === '/loginsystem/welcome') {
    $userObj-> welcome();
} 
elseif ($uri === '/loginsystem/profile') {
    $userObj-> profile();
} 
elseif ($uri === '/loginsystem/change-password') {
    $userObj -> Change_Password();
} 
elseif ($uri === '/loginsystem/edit-profile') {
    $userObj-> edit_profile();
} 

// admin page

// Admin view page 
elseif ($uri === '/loginsystem/admin_view') {
    $adminObj -> admin_view();
} 
// admin dashbord page 
elseif ($uri === '/loginsystem/admin_dashbord') {
    $adminObj  -> admin_dash();
} 
elseif ($uri === '/loginsystem/admin_manage-users') {
    $adminObj  -> admin_manage();
} 

elseif ($uri === '/loginsystem/admin_search-result') {
    $adminObj   -> admin_serach();
} 

elseif ($uri === '/loginsystem/admin_edit-profile') {
    $adminObj   -> admin_edit();
    
} 

elseif ($uri === '/loginsystem/admin_afteredit-profile') {
    $adminObj   -> after_edit();
} 

elseif ($uri === '/loginsystem/admin_user-profile') {
    $adminObj  -> admin_user();
} 

elseif ($uri === '/loginsystem/admin_delete-profile') {
    $adminObj  -> admin_delete();
}
