<?php
class Reg{
	public static function init($username,$passwd,$type=null){
		 !$type&&$type=self::isEmail($username)?'email':'account';
		 if(self::isExist($username,$type)){
			return false;
		 }
		 $now=date('Y-m-d H:i:s');
		 $user=new User;
		 $user->$type=$username;
                 $user->passwd=md5($passwd);
                 $user->updated_at=$now;
                 $user->created_at=$now;
                 return $user->save();
	}
	public static function isEmail($username){
		if(strpos($username,'@')===false)
                         return false;
		return true;
             
	}
	public static function isExist($username,$type=null){
		!$type&&$type=self::isEmail($username)?'email':'account';
		$user=User::where($type,'=',$username)->first();
		if($user->id)
			return true;
		return false;

	}
}

?>
