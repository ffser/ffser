<?php
/**
* \View
*/
class view
{
	const VIEW_BASE_PATH = '/view/';

        /**
         * ×ºóصÄiew
         * @var string
         */
        protected static $last_load = null;

        /**
         * ËÓ±»¼ÓصÄiew
         * @var array
         */
        protected static $views = array();
	/*
         * @param  string  $view   View·¾¶Ã
         * @param  array/stdClass  $params ²Îý      * @param  boolean $output Ê·ñö¯ÀÆ ĬÈÊ
         * @return string          ·µ»Øiew×ÖÄÈ
         */
        public static function load($view, $params = array(), $output = true, $public_view = false){
                return self::make($view, $params, $output, $public_view);
        }

        public static function loadPub($view, $params = array(), $output = true, $public_view = true){
                return self::make($view, $params, $output, $public_view );
        }

        /**
         * É³ÉiewÄÈ²¢·µ»Ø 
         * @param  string  $view   View·¾¶Ã
         * @param  array/stdClass  $params ²Îý      * @param  boolean $output Ê·ñö¯ÀÆ ĬÈ·ñ       * @return string          ·µ»Øiew×ÖÄÈ
         */
        public static function make($___kis_view, $___kis_params = array(), $output = false, $public_view = false){
                self::$last_load = $___kis_view;
                if(empty(self::$views[$___kis_view])) {
                        $___kis_view_path = self::getFilePath($___kis_view,$public_view);
                        if($___kis_view_path){
                                self::$views[$___kis_view_path] = file_get_contents($___kis_view_path);
                        } else {
                                return '';
                        }
                        // var_dump($___kis_view, $___kis_view_path, self::$views[$___kis_view_path]);
                }
                if(is_array($___kis_params)) {
                        extract($___kis_params);
                } elseif (is_object($___kis_params)) {
                        extract(get_object_vars($___kis_params));
                }
                ob_start();
                //include loader::getViewPathForLoad($___kis_view);
                if(1 || KIS_TRACE_MODE) {
                      include $___kis_view_path;
                } else {
                      eval('?>'.self::$views[$___kis_view_path]);
                }
                $content = ob_get_clean();
                if($output) {
                        echo $content;
                }
                return $content;
        }

        /**
         * »ñî¼ÓصÄiew
         * @return string ×ºóصÄiew
         */
        public static function lastLoad(){
                return self::$last_load;
        }

        /**
         * ħÊ·½·¨ ·µ»Ø½Ó¾²̬³É±µľ²̬·½·¨
         * @param  string $func      ħÊ¾²̬·½·¨ ¼´Ҫ·ÃʵÄ½Ó¾²̬³É±Ã
         * @param  array  $arguments ԤÁ²Îý
         * @return mix                   È´æ¸Ã½Ó¾²̬³É±Ô·µ»Ø         */
        public static function __callStatic($func, $arguments = array()){
                if(isset(self::$$func)) {
                        return self::$$func;
                }
        }

  	private static function getFilePath($viewName,$public_view=false){
    		$filePath = str_replace('.', '/', $viewName);
    		if($public_view)
			return FFSER_PATH.self::VIEW_BASE_PATH.$filePath.'.php';
    		return APP_PATH.self::VIEW_BASE_PATH.$filePath.'.php';
  	}

}
