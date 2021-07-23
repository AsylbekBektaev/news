<?php
require_once('vendor/autoload.php');

use app\Controllers\MainController;

$cont=new MainController();
$view=$cont->process();



if(!empty($view) ){
if(file_exists('app/View/'.$view)){
require_once('app/View/'.$view);
}else{
require_once('app/View/error.php');
}
}

?>