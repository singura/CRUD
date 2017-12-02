<?php
require "student.php";
if (!empty($_POST)) {
	$name = $_POST["name"];
	$age = $_POST["age"];
	$gender = $_POST["gender"];
	$edu = $_POST["edu"];
	$stu = new Student();
	$stu->name = $name;
	$stu->age = $age;
	$stu->gender = $gender;
	$stu->edu = $edu;
	$res = add($stu);
	if ($res) {
		echo "<script>alert('新增成功');window.location='/hospital/CRUD-MYSQL2/index.php'</script>";
	}else{
		echo "<script>alert('新增失败');window.location='/hospital/CRUD-MYSQL2/index.php'</script>";
	}
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Document</title>
	<style>
		#addDocument{
			width: 100%;
			height: 100%;
			position: absolute;
			top: 0;
			left: 0;
			background: rgba(0, 0, 0, 0.7);
		}
		.add{
            width: 500px;
            border:1px solid #d3d3d3;
            background-color: #fff;
            margin: 100px auto;
            box-shadow: 0 6px 20px 4px rgba(255, 255, 255, 0.4);
            position: relative;
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
        .add .add-tr{
            position: relative;
            margin-top:20px;
         	text-align: center;
        }
        .add .add-tr input{
            width: 160px;
            height: 30px;
            border:1px solid #d3d3d3;
        }
        .add .add-tr input[type=radio]{
        	width: 15px;
        	height: 15px;
        }
        .add .add-tr select{
            width: 160px;
            height: 30px;
            font-size:16px;
            border:1px solid #d3d3d3;
        }
        .add .add-tr span{
            display: inline-block;
            width: 66px;
            height: 30px;
            line-height: 30px;
            position: absolute;
            left:80px;
            text-align: right;
            color:#4c4b54;
        }
        .add .submit input{
         width: 94px;
         height: 34px;
         background-color: #009efb;
         border:1px solid #009efb;
         color:#fff;
         border-radius: 4px;
         font-size:16px;
         margin:20px 0 10px 200px;
         cursor:pointer;
        }
	</style>
</head>
<body>
<div id="addDocument">
	<div class="add">
		<div class="close">关闭</div>
		<form action="#" method="POST">
	        <div class="add-tr">
	            <span>姓名:</span>
	            <input type="text" name="name">
	        </div>
	        <div class="add-tr">
	            <span>性别:</span>
	            <input type="radio" id="man" value="男" name="gender"><label for="man">男</label>
	            &nbsp;&nbsp;&nbsp;&nbsp;
				<input type="radio" id="woman" value="女" name="gender"><label for="woman">女</label>
	        </div>
	        <div class="add-tr">
	            <span>年龄:</span>
	            <input type="text" name="age">
	        </div>
	        <div class="add-tr">
	            <span>学历:</span>
	            <select name="edu">
						<option value="0">初中</option>
						<option value="1">高中</option>
						<option value="2">大专</option>
						<option value="3">本科</option>
						<option value="4">硕士</option>
						<option value="5">博士</option>
				</select>
	        </div>
	        <div class="submit">
	        	<input type="submit" value="提交数据" >
	        </div>
	    </form>
	</div>
</div>	
</body>
<script>
	document.getElementsByClassName("close")[0].onclick = function(){
		window.location = "index.php";
	}
</script>
</html>