<?php
header('content-type:text/html;charset=utf-8');
include_once("module/Person.php");
session_start();
if (isset($_SESSION["use"])) {
	if (isset($_SERVER["REQUEST_METHOD"]) && $_SERVER["REQUEST_METHOD"]=="POST") {
		$fileName=__DIR__."/Data/data.txt";
		$name=$_POST["name"];
		$age=$_POST["age"];
		$gender=$_POST["gender"];
		$edu=$_POST["edu"];
		$per=new Person();
		$per->name=$name;
		$per->age=$age;
		$per->gender=$gender;
		$per->edu=$edu;
		$objArr=getAllData();
		//获取最后一个id
		$len=count($objArr);
		if($len!=0){
			$id=$objArr[$len-1]->id+1;
			$per->id=$id;
			$objArr[$len-1]->edu=$objArr[$len-1]->edu."\n";
		}else{
			$per->id=1;
		}
		$objArr[]=$per;
		// 将添加的信息追加到data.txt文件中
		$str="";
		foreach ($objArr as $value) {
			foreach ($value as $key => $pro) {
				$str.=$key.":".$pro.",";
			}
			$str=substr($str, 0, -1);
		}
		$res=file_put_contents($fileName, $str);
		if($res){
			echo "<script>alert('新增成功');window.location='/PHP_CRUD/index.php'</script>";
		}else{
			echo "<script>alert('新增失败')</script>";
		}
	}
}else{
	echo "<script>alert('您还没有登录，请登录');window.location='/PHP_CRUD/login.php'</script>";
	exit();
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Document</title>
	<style>
		*{
			margin: 0;
			padding: 0;
		}
		table{
			width: 300px;
			margin: 100px auto;
			border-collapse: collapse;
			border: 1px solid #000;
			text-align: center;
		}
		td{
			border: 1px solid #000;
			height: 35px;
		}
		select{
			width: 20%;
			height: 80%;
		}
	</style>
</head>
<body>
	<form action="#" method="post">
		<table>
		<tr>
			<td>姓名</td>
			<td><input type="text" name="name"></td>
		</tr>
		<tr>
			<td>年龄</td>
			<td><input type="text" name="age"></td>
		</tr>
		<tr>
			<td>性别</td>
			<td>
				<input type="radio" name="gender" value="男" id="man"><label for="man">男</label>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
				<input type="radio" name="gender" value="男" id="woman"><label for="woman">女</label>
			</td>
		</tr>
		<tr>
			<td>学历</td>
			<td>
				<select name="edu">
					<option value="0">初中</option>
					<option value="1">高中</option>
					<option value="2">大专</option>
					<option value="3">本科</option>
					<option value="4">硕士</option>
					<option value="5">博士</option>
				</select>
			</td>
		</tr>
		<tr>
			<td></td>
			<td><input type="submit"> <input type="reset"></td>
		</tr>
	</table>
	</form>
</body>
</html>