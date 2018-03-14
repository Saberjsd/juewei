<?php
	
	$totalnum=$_POST['totalnum'];
	$page='';
	$pageshow=5;
	$totalpage=ceil($totalnum/$pageshow);
	$start=$page-($pageshow-1)/2;
	$end=$page+($pageshow-1)/2;
	
	var_dump($totalpage);
