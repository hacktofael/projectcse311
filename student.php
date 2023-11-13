SELECT first,last,username,roll,email,contact  FROM `student`


<?php
	include "connection.php";
	include "navbar.php";
?>
<!DOCTYPE html>
<html>
<head>
	
	<title>Student Information</title>
	<style type="text/css">
		.srch
		{
			padding-left: 1100px;
		}
	</style>
</head>
<body>
	<!--_______Search Bar _____-->
	<div class="srch">
		<form class="navbar-form" method="post" name="form1">
			
				<input class="form-control"  type="text" name="search" placeholder="search student...." required="">
				<button style="background-color:#1c3fc8  " type="submit" name="submit" class="btn btn-default">
					<span class="glyphicon glyphicon-search">
						
					</span>
				</button>
			

			
		</form>
	</div>
	<h2>List Of Students</h2>
	<?php


	if(isset($_POST['submit']))
	{
		$q=mysqli_query($db,"SELECT first,last,username,roll,email,contact  FROM `student` where username like '%$_POST[search]%'");
		if (mysqli_num_rows($q)==0)
		{
			echo "Sorry! No Student  found. search again ";
		}
		else
		{
			echo "<table class='table table-bordered table-hover'>";
	echo "<tr style='background-color: #1c3fc8 ;'>" ;
	//Table header
				echo "<th>"; echo "first Name";	echo "</th>";
				echo "<th>"; echo "Last Name";  echo "</th>";
				echo "<th>"; echo "username";  echo "</th>";
				echo "<th>"; echo "roll";  echo "</th>";
				echo "<th>"; echo "email";  echo "</th>";
				echo "<th>"; echo "contact";  echo "</th>";
				
			echo "</tr>";	

			while($row=mysqli_fetch_assoc($q))
			{
				echo "<tr>";
				echo "<td>"; echo $row['bid']; echo "</td>";
				echo "<td>"; echo $row['name']; echo "</td>";
				echo "<td>"; echo $row['authors']; echo "</td>";
				echo "<td>"; echo $row['edition']; echo "</td>";
				echo "<td>"; echo $row['status']; echo "</td>";
				echo "<td>"; echo $row['quantity']; echo "</td>";
				echo "<td>"; echo $row['department']; echo "</td>";

				echo "</tr>";
			}
			
    echo "</table>";
		}
	}
/* if the button is not pressed.*/
	else
	{
		$res=mysqli_query($db,"SELECT * FROM `books` ORDER BY `books`.`name` ASC;");
	echo "<table class='table table-bordered table-hover'>";
	echo "<tr style='background-color: #1c3fc8 ;'>" ;
	//Table header
				echo "<th>"; echo "ID";	echo "</th>";
				echo "<th>"; echo "Book-Name";  echo "</th>";
				echo "<th>"; echo "Authors Name";  echo "</th>";
				echo "<th>"; echo "Edition";  echo "</th>";
				echo "<th>"; echo "Status";  echo "</th>";
				echo "<th>"; echo "Quantity";  echo "</th>";
				echo "<th>"; echo "Department";  echo "</th>";
			echo "</tr>";	

			while($row=mysqli_fetch_assoc($res))
			{
				echo "<tr>";
				echo "<td>"; echo $row['bid']; echo "</td>";
				echo "<td>"; echo $row['name']; echo "</td>";
				echo "<td>"; echo $row['authors']; echo "</td>";
				echo "<td>"; echo $row['edition']; echo "</td>";
				echo "<td>"; echo $row['status']; echo "</td>";
				echo "<td>"; echo $row['quantity']; echo "</td>";
				echo "<td>"; echo $row['department']; echo "</td>";

				echo "</tr>";
			}
			
    echo "</table>";
	}

	?>

</body>
</html>
