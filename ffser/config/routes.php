<?php
use NoahBuscher\Macaw\Macaw;
class routes{
	public static function init($chn){
		if(in_array($chn,['passport'])){
			self::$chn();
			Macaw::dispatch();
		}
		self::error404();
		Macaw::dispatch();
	}
	public static function error404(){
		Macaw::get('(:all)', function($fu) {
  			echo "no page".$fu;
		});
	}
	public static function  passport(){
		Macaw::get('fuck', function() {
			echo 'success!';
		});
		Macaw::get('index','IndexController@index');
		 Macaw::get('reg','IndexController@register');
	 Macaw::get('test','test@test');	
	}

}
?>
