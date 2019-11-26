<?php 
/*
   Plugin Name:helper plugin;
   author:Kamal Uddin;
   version:1.0.0
   description: This plugin is used for building the page style of fusion theme.
   slug:helper
*/
   defined('ABSPATH') || exit;

if(file_exists(dirname(__FILE__).'/elements/honeyhome-main-slider.php')){
require dirname(__FILE__).'/elements/honeyhome-main-slider.php'; 
}
if(file_exists(dirname(__FILE__).'/elements/honeyhome-about.php')){
require dirname(__FILE__).'/elements/honeyhome-about.php';
}
if(file_exists(dirname(__FILE__).'/elements/honeyhome-service.php')){
require dirname(__FILE__).'/elements/honeyhome-service.php';
}
if(file_exists(dirname(__FILE__).'/elements/honeyhome-title.php')){
require dirname(__FILE__).'/elements/honeyhome-title.php';
}
if(file_exists(dirname(__FILE__).'/elements/honeyhome-contactinfo.php')){
require dirname(__FILE__).'/elements/honeyhome-contactinfo.php';
}
if(file_exists(dirname(__FILE__).'/elements/honeyhome-project.php')){
require dirname(__FILE__).'/elements/honeyhome-project.php';
}
if(file_exists(dirname(__FILE__).'/elements/honeyhome-map.php')){
require dirname(__FILE__).'/elements/honeyhome-map.php';
}
if(file_exists(dirname(__FILE__).'/elements/honeyhome-contact-social-info.php')){
require dirname(__FILE__).'/elements/honeyhome-contact-social-info.php';
}

if(file_exists(dirname(__FILE__).'/elements/honeyhome-price.php')){
require dirname(__FILE__).'/elements/honeyhome-price.php';
}

if(file_exists(dirname(__FILE__).'/post-type.php')){
require dirname(__FILE__).'/post-type.php';
}




