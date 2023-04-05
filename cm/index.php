<?php
$method = $_SERVER['REQUEST_METHOD'];
$uri = $_SERVER['REQUEST_URI'];

$uri = ltrim($uri,"/");
$uri = rtrim($uri,"/");
$uri = explode("/",$uri);

switch ($uri[1]) {
    case 'class' :
       switch ( $method ) {
         case 'GET' : 
            require __DIR__.'/api/class/read.php';
         break;
    }	 
    break;
    case 'student' :
        switch ( $method ) {
          case 'GET' : 
             require __DIR__.'/api/student/read.php';
          break;
     }	
     break;	
default:

  }
?>