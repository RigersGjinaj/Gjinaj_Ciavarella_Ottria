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

           if (count($uri[]) > 2) {
              $num = $uri[2];
              require __DIR__.'/api/class/read.php';
           }else {
              require __DIR__.'/api/class/read.php';  
           }
           
            break;
         case 'POST':
               require __DIR__.'/api/class/create.php';
            break;
      }	 
   break;
   case 'student' :
       switch ( $method ) {
         case 'GET' : 

            if (count($uri[]) > 2) {
               $num = $uri[2];
               require __DIR__.'/api/student/read.php';
            }else {
               require __DIR__.'/api/student/read.php';  
            }

            break;
         case 'POST':
               require __DIR__.'/api/student/create.php';
            break;
      }	
   break;	
   default:
  }
?>