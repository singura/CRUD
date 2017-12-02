<?php
include_once("module/Person.php");
$objArr=getAllData();
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
			text-align: center;
			margin: 50px auto;
			width: 800px;
			border-collapse: collapse;
			border: 1px solid #000;
		}
		th,td{
			border: 1px solid #000;
			height: 35px;
		}
		.td{
			text-align: right;
			padding-right: 10px;
		}
		div{
			width: 100%;
			height: 50px;
			background: #f1f1f1;
			box-sizing: border-box;
		}
		div input{
			float: right;
			margin-right: 20px;
			margin-top: 15px;
		}
	</style>
</head>
<body>
	<div>
		<?php
			session_start();
			$str="";
			if (isset($_SESSION["use"])) {
				$str .= "<input type='button' value='退出' id='login'/>";
			}else{
				$str .= "<input type='button' value='登录' id='login'/>";
			}
			echo $str;
		?>
	</div>
	<table>
		<tr>
			<td colspan="6" class="td"><input type="button" value="新增" id="add"></td>
		</tr>
		<tr>
			<th>编号</th>
			<th>姓名</th>
			<th>年龄</th>
			<th>性别</th>
			<th>学历</th>
			<th>编辑</th>
		</tr>
		<?php
			$str="";
			foreach ($objArr as $value) {
				$str.="<tr>";
				$str.="<td>{$value->id}</td>";
				$str.="<td>{$value->name}</td>";
				$str.="<td>{$value->age}</td>";
				$str.="<td>{$value->gender}</td>";
				switch (trim($value->edu)) {
					case "0":
					$str.="<td>初中</td>";
						break;
					case "1":
					$str.="<td>高中</td>";
						break;
					case "2":
					$str.="<td>大专</td>";
						break;
					case "3":
					$str.="<td>本科</td>";
						break;
					case "4":
					$str.="<td>硕士</td>";
						break;
					case "5":
					$str.="<td>博士</td>";
						break;
					default:
					$str.="<td>其他</td>";
						break;
				};
				$str.="<td><a href='edit.php?id={$value->id}'>修改</a> <a class='del' href='del.php?id={$value->id}'>删除</a></td>";
				$str.="</tr>";
			}
			echo $str;
		?>
	</table>
</body>
<script>
	document.getElementById("add").onclick=function(){
		window.location="add.php";
	}
	document.getElementById("login").onclick=function(){
		if(this.value=="登录"){
			window.location="login.php";
		}else{
			window.location="loginOut.php";
		}
	}
	var delArr=document.getElementsByClassName("del");
	for(var i = 0 ; i < delArr.length; i ++) {
		delArr[i].onclick = function(){
			if(confirm("是否确定删除")){
				window.location = this.href;
			}
			return false;
		}
	}
	document.getElementById("del").onclick=function(){
		if(confirm("Are you sure?")){
			window.location=this.href;
		}
		return false;
	}
</script>
</html>