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
           if (count($uri) > 2) {
              $class_id = $uri[2];
              require __DIR__.'/api/class/readByID.php';
           }else {
              require __DIR__.'/api/class/read.php';  
           }
           
            break;
         case 'POST':
               require __DIR__.'/api/class/create.php';
            break;
         case 'DELETE':
               $class_id = $uri[2];
               require __DIR__.'/api/class/delate.php';
            break;
         case 'PUT':
               $class_id = $uri[2];
               require __DIR__.'/api/class/update.php';
            break;
      }	 
   break;
   case 'students' :
       switch ( $method ) {
         case 'GET' : 
            if (count($uri) > 2) {
               $student_id = $uri[2];
               require __DIR__.'/api/student/readByID.php';
            }else {
               require __DIR__.'/api/student/read.php';  
            }
            break;
         case 'POST':
               require __DIR__.'/api/student/create.php';
            break;
         case 'DELETE':
               $student_id = $uri[2];
               require __DIR__.'/api/student/delate.php';
            break;
            case 'PUT':
               $student_id = $uri[2];
               require __DIR__.'/api/student/update.php';
            break;
      }	
   break;	
   default:
  }
?>