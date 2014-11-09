<?php
 use NoahBuscher\Macaw\Macaw;
 Macaw::get('login','indexController@login');
 Macaw::post('login','indexController@dologin');
 Macaw::get('reg','indexController@register');
 Macaw::post('reg','indexController@doreg');
 Macaw::get('test','indexController@test');
 Macaw::dispatch();
?>
