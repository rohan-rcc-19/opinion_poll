<?php
	$con=mysqli_connect("localhost","root","","polls");
	if($con==FALSE)
	{
		echo "Something Wrong";
	}
	if(isset($_REQUEST["enter"]))
	{
		$pol=$_REQUEST['poll'];
		if($pol===NULL)
		{
			echo "Please choose an option!";
		}
		else
		{
			$q="INSERT INTO `proj_opinion`(`opinions`) VALUES ('$pol')";
			$r=mysqli_query($con,$q);
			if($r)
			{
				echo"<p align = 'center' style = 'margin-top:200px;' >Vote Successfull&nbsp;<a href='front_page.php'>Click Here</a></p>";
			}
		}
	}
?>