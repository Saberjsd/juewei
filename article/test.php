<?php  
	require '../common/index_common.php';
	$r = $mydb->getOneData('article','*','artid = 5 AND status =1');
	
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Document</title>
</head>
<body>
	<?=$r['content']?>
</body>
</html>