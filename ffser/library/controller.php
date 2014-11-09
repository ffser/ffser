<?php

/**

* \BaseController

*/

class controller

{

  protected $view;

  

  public function __construct()

  {

  }

  public function __destruct()

  {
die;
    $view = $this->view;

    if ( $view instanceof View ) {

      extract($view->data);

     require $view->view;

    }

  }

}
