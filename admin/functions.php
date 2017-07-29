<?php
function confirmQuery($result){
	if(!$result){
		global $connection;
		die("QUERY FAILED:<br/>".mysqli_error($connection));
	}
}

function insert_categories(){
	global $connection; // 函数内部无法调用外部的值，所以连接数据库$connction设置一个全局变量，使数据库成功链接
	if(isset($_POST['submit'])){
		$cat_title = $_POST['cat_title'];
		if($cat_title == "" || empty($cat_title)){
			echo "This field shoudn't be empty";
		}else{
			$query = "INSERT INTO categories(cat_title)";
			$query .= "VALUE('{$cat_title}')";
			$result = mysqli_query($connection, $query);
			if(!$result){
				die('QUERY FAILED'.mysqli_error($connection));
			}
		}
	}
	
}


function findAllCategories(){
	global $connection; // 必有的第一句
	$query = "SELECT * FROM categories";
	$result = mysqli_query($connection, $query);
	while($row = mysqli_fetch_assoc($result)){
		$cat_id = $row['cat_id'];
		$cat_title = $row['cat_title'];
		
		echo '<tr>';
		echo "<td>{$cat_id}</td>";
		echo "<td>{$cat_title}</td>";
		echo "<td><a href='categories.php?delete={$cat_id}'>Delete</a></td>"; // 当我们点击删除按钮时，删除点击的那个数据的信息
		echo "<td><a href='categories.php?edit={$cat_id}'>Edit</a></td>";
		echo '</tr>';
	}
}

function deleteCategories(){
	global $connection; // 必有的第一句
	if(isset($_GET['delete'])){
		$the_cat_id = $_GET['delete'];
		$query = "DELETE FROM categories WHERE cat_id = {$the_cat_id}"; // 该句仅执行删除语句，但在页面上显示的地址还是删除前的地址，所以用户看不大删除后的效果
		$result = mysqli_query($connection, $query);
		header("Location:categories.php"); // 重新载入该页面，类似于刷新，可以看到删除数据后的效果  也可以另写一个删除页面，以<a href='categories.php?=delete.php'>Delete</a>
		
	}
}