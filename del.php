<?php
include_once("Student.php");
	$id = $_GET["id"];
	//2.0
	$res = del($id);
	if($res) {
		echo "<script>alert('删除成功');window.location='/hospital/CRUD-MYSQL2/index.php'</script>";
		exit();
	}else {
		echo "<script>alert('删除失败');window.location='/hospital/CRUD-MYSQL2/index.php'</script>";
		exit();
	}
?>