<?php
class test{
	public function index(){
		$data['header']=view::loadPub('frame.header',[],false);
		$data['footer']=view::loadPub('frame.footer',[],false);
		view::load('index',$data);
		//echo $t;
	}
	public function register(){
		 $data['header']=view::loadPub('frame.header',[],false);
                $data['footer']=view::loadPub('frame.footer',[],false);
                view::load('register',$data);
        }
	public function test(){
		view::load('t');
	}
}
?>
