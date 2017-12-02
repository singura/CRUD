<?php
class Student{
	public $id;
	public $name;
	public $age;
	public $gender;
	public $edu;
}
//增
function add($obj){
	$connect = mysqli_connect("localhost","root","123456","itcast");
	mysqli_set_charset($connect,"utf-8");
	$sql = "INSERT INTO user(name,gender,age,edu) VALUES ('{$obj->name}','{$obj->gender}',{$obj->age},{$obj->edu})";
	$res = mysqli_query($connect,$sql);
	return $res;
}
//删
function del($id){
	$connect = mysqli_connect("localhost","root","123456","itcast");
	mysqli_set_charset($connect,"utf-8");
	$sql = "DELETE FROM user where id={$id}";
	$res = mysqli_query($connect,$sql);
	return $res;
}
//改
function update($obj){
	$connect = mysqli_connect("localhost","root","123456","itcast");
	mysqli_set_charset($connect,"utf-8");
	$sql = "UPDATE user SET name='{$obj->name}',age={$obj->age},gender='{$obj->gender}',edu={$obj->edu} WHERE id = {$obj->id}";
	$res = mysqli_query($connect,$sql);
	return $res;
}
function getAllData(){
	$connect = mysqli_connect("localhost","root","123456","itcast");
	mysqli_set_charset($connect,"utf-8");
	$sql = "SELECT * FROM user";
	$res = mysqli_query($connect,$sql);
	if($res){
		$rows = array();
		while ($row = mysqli_fetch_assoc($res)) {
			$rows[] = $row;
		}
		$objArr = array();
		foreach ($rows as $key => $value) {
			$stu = new Student();
			foreach ($value as $index => $item) {
				$stu->$index = $item;
			}
			$objArr[] = $stu;
		}
	}else{
			$objArr = null;
		}
	return $objArr;
}
function getDataById($id){
	$connect = mysqli_connect("localhost","root","123456","itcast");
	mysqli_set_charset($connect,"utf-8");
	$sql = "SELECT * FROM user WHERE id = ".$id;
	$res = mysqli_query($connect,$sql);
	if ($res) {
		$row = mysqli_fetch_assoc($res);
		$stu = new Student();
		foreach ($row as $key => $value) {
			$stu->$key = $value;
		}
	}else{
		$stu = null;
	}
	return $stu;
}
?>