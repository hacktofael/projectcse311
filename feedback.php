<?php
   	include "navbar.php";
 	include "connection.php";
?>
<!DOCTYPE html>
<html>
<head>
	
	<title>Feedback</title>
	<link rel="stylesheet" type="text/css" href="style.css">
	<meta charset="utf-8">
	<meta name="viewpoint" content="width=device-width,initial-scale=1">

	
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">


<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.4/jquery.min.js"></script>


<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
<style type="text/css">
	body
	{
		background-image: url("images/feedback.jpg");
	}
	.wrapper
	{
		padding: 10px;
		margin: -20px auto;
		width: 900px;
		height: 600px;
		background-color: black;
		opacity: 8;
		color: white;

	}
	.form-control
	{
		height: 70px;
		width: 650px;
		overflow: auto;
	}
	.scroll
	{
		width: 100%;
		height: 350px;
	}
</style>
</head>
<body>
	<div class="wrapper">
		<h4> If you have any suggestion or questions please comment below</h4>
		<form style="" action="" method="post">
			<input class="form-control" type="text"  name="comment" placeholder="Write a comment if any quires..."><br>

			<input class="btn btn-default" type="submit"  name="submit" 
			value="Comment" style="width: 100px; height: 35px;">
			
		</form>
	<br><br>
	<div class="scroll">
		<?php
			if(isset($_POST['submit']))
			{
				$sql="INSERT INTO `comments` VALUES('','$_POST[comment]');";
				if(mysqli_query($db,$sql))
				{
					$q="SELECT * FROM `comments` ORDER BY `comments`.`id` DESC";
					$res=mysqli_query($db,$q);
					echo "<table class='table table-bordered'>";
					while($row=mysqli_fetch_assoc($res))
					{
						echo "<tr>";
						echo "<td>"; echo $row['comment']; echo"</td>";
						echo "</tr>";

					}

				}
			}
			else
			{
				$q="SELECT * FROM `comments` ORDER BY `comments`.`id` DESC";
					$res=mysqli_query($db,$q);
					echo "<table class='table table-bordered'>";
					while($row=mysqli_fetch_assoc($res))
					{
						echo "<tr>";
						echo "<td>"; echo $row['comment']; echo"</td>";
						echo "</tr>";
					}
			}



		?>
	</div>
	</div>
</body>
</html>