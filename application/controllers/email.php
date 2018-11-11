<?php 
class Email extends CI_Controller {
	public function __construct(){
		parent::__construct();		
		$this->load->helper('phpmailer');
	}//end fct	
	
	public function index(){
		$name 		= $_POST['name'];
		$msg 	= 'Name:'.$name.'<br/>'.$_POST['msg'];
		$recipient	= 'hello@magentocebu.com'; 
		$sender = $_POST['email'];
		$subject = "Hello";	
		send_mail($recipient,$msg,$subject,$sender);
		
	}//end fct.
	
}//end class
