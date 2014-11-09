<?php
class indexController{
	public function login(){
		$data=[];
		$content=view::make('login',$data);
		frame::load($content);
		//echo $t;
	}
	public function dologin(){
		$username=mysql_real_escape_string($_POST['username']);
                $passwd=mysql_real_escape_string($_POST['passwd']);
		if(!$username)
			 Response::jsonp(0,-1,'username is null');
		if(!$passwd)
                         Response::jsonp(0,-2,'passwd is null');
		$type=Reg::isEmail($username)?'email':'account';
		if(!Login::check($username,$passwd,$type,$error))
		
		     Response::jsonp(0,$error,'username or passwd is wrong');

		 //Login::init($username,$type);
		 Response::jsonp(0,0,'login success');
	}
	public function register(){
		$content=view::make('register');
                frame::load($content);
        }
	public function doreg(){
                $username=mysql_real_escape_string($_POST['username']);
                $passwd=mysql_real_escape_string($_POST['passwd']);
		$repasswd=$_POST['repasswd'];
		$code=$_POST['code'];
		if(!$username)
                        Response::jsonp(0,-1,'username is null');
                if(!$passwd)
                        Response::jsonp(0,-2,'passwd is null');
		if(!$repasswd)
                        Response::jsonp(0,-3,'repasswd is null');
		if($passwd!=$repasswd){
			Response::jsonp(0,-4,'passwd is wrong');
		}
                $ret=Reg::init($username,$passwd);
		//var_dump($ret);die;
	//	$ret=false;
		if($ret)
			Response::jsonp(0,0,'reg success');
		
		Response::jsonp(0,-5,'reg falied username had reg');
	}
	public function test(){
	  header("Content-type:text/html;charset=utf-8");
	Login::init();	
		var_dump($_SESSION);
die;
		header("Content-type:text/html;charset=utf-8");
		$packInfo="1234|willhao|250248410@qq.com";
  //              $packInfo='1234';
		//$token=xtea::encrypt($packInfo,self::$_localKey);
                $packInfo=base64_encode($packInfo);
		$token=Login::authcode($packInfo,'1');
		var_dump($token);
		$ret=Login::tokenParse($token);
		//$ret=Login::unpack($ret);
		var_dump($ret);
	//	var_dump($_SESSION);
	}
}
?>
