<?php
if(!defined('BASEPATH')) exit('No direct script access allowed');
if(!function_exists('activate_menu')) {
  function activate_menu($link, $css = "") {
    if ( isset($_SESSION["link"]) ) {
        $controller = $_SESSION["link"];
    } else {
        $controller = "inicio";
    }
    return ($controller == $link) ? "{$css} active" : $css;
    unset($_SESSION["link"]);
  }
}
?>