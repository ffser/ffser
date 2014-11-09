<?php
class frame{
	public static function load($view){
		//$data['content']=$view;
		$data=[];
		$all=view::loadPub('frame.header',$data,false);
		$all.=$view;
		$all.=view::loadPub('frame.footer',$data,false);
		echo $all;
	}

}
?>
