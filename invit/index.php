<?php
# 定义application路径 

define('APPPATH', trim(__DIR__,'/')); //根目录

# 获得请求地址 

$root = $_SERVER['SCRIPT_NAME']; 

$request = $_SERVER['REQUEST_URI']; 

$URI = array(); 

# 获得index.php 后面的地址 

$url = trim(str_replace($root, ”, $request), '/'); 

# 如果为空，则是访问根地址 

if (empty($url)) { 

# 默认控制器和默认方法 
	// $class = 'index'; //路径
	// $func = 'welcome'; 

	header('Location: http://f.bqzmz.com/'); 

} else { 

$URI = explode('/', $url); 

# 如果function为空 则默认访问index 

if (count($URI) < 2) { 

	$class = $URI[0]; //路径
	$func = 'index2'; 

} else {

	$class = $URI[0]; 
	$func = $URI[1]; 

} 

header('Location: http://f.bqzmz.com/?i='.$class);

} 
