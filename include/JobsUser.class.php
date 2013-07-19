<?php
/*
 * @author: maweiguo
 * @date: 2013/7/10
 * @file: index.php
 * 
 */

class JobsUser{
	// user info
	
	function JobsUser(){
		
	}
	
	function login(){
		
	}
	
	function logout(){
		
	}
	
	function register(){
		
	}
	
	function passwordChange(){
		
	}
	
	function userInfoChange(){
		
	}
};

class PersonalUser extends JobsUser{
	// info
	private $user = null;
	function PersonalUser(){
		
	}
	function favoriteJob(){
		
	}
}

class EnterpriseUser extends JobsUser{
	// info
	function EnterpriseUser(){
		
	}
	function favoriteResume(){
		
	}
}
