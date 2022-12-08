
<?php
session_start();
if(!isset($_SESSION['designee_name'])){
    header("location:designeelogin.php");
}
include('shared/connection.php');
?>
<html>
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width">
	<link rel="stylesheet" href="css/admindashboard.css">
	<link rel="icon" href="images/icon.ico">
	<title>  F.U.D Student Clearance Portal| Welcome </title>
	</head>
	<body>
			<header>
			<div class="container">
				<div class="branding">
				<h1> <span class="current"> F.U.D </span> Student Clearance Portal </h1>
			<nav>
				<ul>
					
					<li><a href="library.php">Request Approval</a></li>
					<li> <span class="current"><a href="library_records.php">Records </span></a></li>
					<li><a href="#">Change Password </a></li>
					<li><a href="logout.php">Logout</a></li>
				</ul>
			</nav>
			</div>
			</div>
		</header>
		<section id="newsletter">

<div id="profile">
<br>
<div class="input-group">
      <button type="submit" id="prt" class="btn" name="submit" onclick="print();">Print</button>
      <br>
      <button type="submit" id="add" class="btn" name="submit">Add New</button>
    </div>

<body>
<?php 
$sql="SELECT 
		student.id, 
		student.index_no, 
		student.first_name, 
		student.last_name, 
		student.faculty, 
		student.department,
		student.status,
		tbl_library.book_title, 
		tbl_library.date_of_issue,
		tbl_library.date_of_return
		FROM student INNER JOIN tbl_library on 
		student.id=tbl_library.student_id
		WHERE tbl_library.student_id=student.id 
		GROUP BY student.id";
$records=mysqli_query($con,$sql);
?>
	<?php include('shared/bootstrap.php'); ?>
<table class="table" cellpadding="5" cellspacing="8">
	<tr>
		<th> Index No</th>
		<th> First Name</th>
		<th> Last Name </th>
		<th> Department </th>
		<th> Faculty</th>
		<th> Book Title </th>
		<th> Date of Issue </th>
		<th> Return Date </th>
			
	</tr>
<?php 
while($employee=mysqli_fetch_assoc($records)){
$index=$employee['id'];
echo "<tr>";
echo "<td>".$employee['index_no']."</td>";
echo "<td>".$employee['first_name']."</td>";
echo "<td>".$employee['last_name']."</td>";
echo "<td>".$employee['department']."</td>";
echo "<td>".$employee['faculty']."</td>";
echo "<td>".$employee['book_title']."</td>";
echo "<td>".$employee['date_of_issue']."</td>";
echo "<td>".$employee['date_of_return']."</td>";


//if($fetch){
	//echo "<td>".$fetch['date_of_action']."</td>"." ";
//} else
//echo "<td>"."No problem"."</td>"." ";

		
?>
<input type="hidden" name="text" class= "idx" value="<?php echo $index;?>"> 
<?php

			"</td>";
echo "</tr>";



}


?>
<style>
		#prt{
	position:relative;
	left:90%;
	background: rgb(7,133,191);
	color:white;
}
#add{
	position:relative;
	left:3%;
	background: rgb(7,133,191);
	color:white;
}

#prt:hover{
	background: black;
}

#add:hover{
	background: black;
}

	</style>

</table>
</div>