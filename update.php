<?php
require "student.php";
if (!empty($_GET)) {
	$id = $_GET["id"];
	$objArr = getAllData();
	$stu = new Student();
	foreach ($objArr as $key => $value) {
		if($value->id == $id){
			$stu = $value;
			break;
		}
	}
}else{
	$objArr = getAllData();
	$stu = new Student();
	$stu->id = $_POST["id"];
	$stu->name = $_POST["name"];
	$stu->age = $_POST["age"];
	$stu->gender = $_POST["gender"];
	$stu->edu = $_POST["edu"];
	$res = update($stu);
	if($res){
		echo "<script>alert('修改成功');window.location='/hospital/CRUD-MYSQL2'</script>";
	}else{
		echo "<script>alert('修改失败');window.location='/hospital/CRUD-MYSQL2/update.php'</script>";
	}
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Document</title>
	<style>
		#updateDocument{
			width: 100%;
			height: 100%;
			position: absolute;
			top: 0;
			left: 0;
			background: rgba(0, 0, 0, 0.7);
		}
		.update{
            width: 500px;
            border:1px solid #d3d3d3;
            background-color: #fff;
            margin: 100px auto;
            box-shadow: 0 6px 20px 4px rgba(255, 255, 255, 0.4);
            position: relative
        } 
        .close{
        	position: absolute;
		    font-size: 12px;
		    right: -20px;
		    top: -20px;
		    background: #ffffff;
		    border: #ebebeb solid 1px;
		    width: 40px;
		    height: 40px;
		    border-radius: 20px;
		    text-align: center;
		    box-shadow: 0 6px 20px 4px rgba(255, 255, 255, 0.3);
		    line-height: 40px;
		    cursor: pointer;
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
        .update input[type="submit"]{
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
<div id="updateDocument">
	<div class="update">
		<div class="close">关闭</div>
		<form id="form" method="post" action="update.php">
		<table>
		<input type="hidden" name="id" id="id" value='<?php echo "{$stu->id}"?>'>
		<tr>
			<td>姓名</td>
			<td><input type="text" name="name" id="name" value='<?php echo "{$stu->name}"?>'></td>
		</tr>
		<tr>
			<td>年龄</td>
			<td><input type="text" name="age" id="age" value='<?php echo "{$stu->age}"?>'></td>
		</tr>
		<tr>
			<td>性别</td>
			<td>
				<?php
					if($stu->gender=="男"){
						$str='<input type="radio" name="gender" id="man" checked value="男"><label for="man">男</label>';
						$str.='<input type="radio" name="gender" id="women" value="女"><label for="women">女</label>';
					}else{
						$str='<input type="radio" name="gender" id="man" value="男"><label for="man">男</label>';
						$str.='<input type="radio" name="gender" id="women" value="女" checked><label for="women">女</label>';
					}
					echo $str;
				?>
			</td>
		</tr>
		<tr>
			<td>学历</td>
			<td>
				<select id="edu" name="edu">
					<option value="0">初中</option>
					<option value="1">高中</option>
					<option value="2">大专</option>
					<option value="3">本科</option>
					<option value="4">硕士</option>
					<option value="5">博士</option>
				</select>
			</td>
			<?php
				echo "<script>document.getElementById('edu').options[{$stu->edu}].selected='selected'</script>";
			?>
		</tr>
		<tr>
			<td></td>
			<td><input type="submit" value="提交数据" ></td>
		</tr>
	</table>
	</form>
	</div>
</div>
</body>
<script>
	document.getElementsByClassName("close")[0].onclick=function(){
		window.location = "index.php";
	}
</script>
</html>