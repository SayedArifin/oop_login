<?php 
 spl_autoload_register('myAutoLoader');
 function myAutoLoader($className) {
   $path ='./classes/';
   $extetion = '.class.php';
   $fullPath = $path.$className.$extetion;

   if (!file_exists($fullPath)) {
    return false;
   } 

   include_once $fullPath;

 }