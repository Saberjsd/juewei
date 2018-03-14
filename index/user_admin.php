<?php
isset($_SESSION) || session_start();
if(!isset($_SESSION['username'])||trim($_SESSION['username'])==null){
	header('Location:../index.html');
}
