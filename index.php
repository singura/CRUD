<?php
require "student.php";
$objArr = getAllData();
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
		body{
			background: #ebebeb;
		}
		.main{
			width: 800px;
			margin: 100px auto;
			padding: 40px 100px;
			box-sizing: border-box;
			background: #fff;
			border-radius: 10px;
			box-shadow: 5px 5px 20px rgba(0, 0, 0, 0.7);
		}
		.main>a{
			text-decoration: none;
			float: right;
		}
		.main>a:hover{
			color: red;
		}
		.main>table{
			width: 600px;
			border-collapse: collapse;
			border: 1px solid #000;
		}
		th{
			background: #ccc;
		}
		th,td{
			height: 35px;
			text-align: center;
			border: 1px solid #000;
		}
        #updateDocument{
			width: 100%;
			height: 100%;
			position: absolute;
			top: 0;
			left: 0;
			background: rgba(0, 0, 0, 0.7);
			display: none;
		}
		.update{
            width: 500px;
            border:1px solid #d3d3d3;
            background-color: #fff;
            margin: 100px auto;
            box-shadow: 0 6px 20px 4px rgba(255, 255, 255, 0.4);
            position: relative
        } 
        .update table{
        	width: 250px;
        	height: 250px;
        	margin: 0 auto;
        }
        .update table,.update td,.update tr{
        	border: none;
        }
        .update select{
        	width: 160px;
        }
        .update input[type="button"]{
        	width: 94px;
	        height: 34px;
	        background-color: #009efb;
	        border:1px solid #009efb;
	        color:#fff;
	        border-radius: 4px;
	        font-size:16px;
	        cursor:pointer;
        }
	</style>
</head>
<body>
<div class="main">
	<a href="add.php" id="add">点此添加数据</a>
	<table>
	<tr>
		<th>学号</th>
		<th>姓名</th>
		<th>性别</th>
		<th>年龄</th>
		<th>学历</th>
		<th>编辑</th>
	</tr>
	<?php
		$str = "";
		foreach ($objArr as $key => $value) {
			$str .= "<tr>";
			$str .= "<td>{$value->id}</td>";
			$str .= "<td>{$value->name}</td>";
			$str .= "<td>{$value->gender}</td>";
			$str .= "<td>{$value->age}</td>";
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
				$str.="<td><a href='update.php?id={$value->id}'>修改</a> <a class='del' href='del.php?id={$value->id}'>删除</a></td>";
				$str.="</tr>";
			}
			echo $str;
	?>
</table>
</div>
</body>
<script>
	var delArr=document.getElementsByClassName("del");
	for(var i = 0 ; i < delArr.length; i ++) {
		delArr[i].onclick = function(){
			if(confirm("是否确定删除")){
				window.location = this.href;
			}
			return false;
		}
	}
</script>
</html>