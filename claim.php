			<?php
$room = $_POST['room'];


if(strlen($room)>20 or strlen($room)<2)
{
	$message = "Please Enter Name Between 2 to 20 characters";

	echo '<script language="javascript">;';
	echo 'alert("'.$message.'");';
	echo 'window.location="http://localhost/ChatRoom";';
	echo '</script>';

}

else if(!ctype_alnum($room)){
	$message = "please choose an alphanumeric chat room";

	echo '<script language="javascript">;';
	echo 'alert("'.$message.'");';
	echo 'window.location="http://localhost/ChatRoom";';
	echo '</script>';

}
else{
//connect to database
	include 'db_connect.php';
}
//if room exist
$sql = "SELECT * FROM `rooms` WHERE NAME ='$room'";


$result = mysqli_query($conn , $sql);


if($result){
	if(mysqli_run_rows($result)>0)
	{
		#code
			$message = "Please choose different room this room is already claimed";

		echo '<script language="javascript">;';
		echo 'alert("'.$message.'");';
		echo 'window.location="http://localhost/ChatRoom";';
		echo '</script>';
	}
}
	else{
		$sql="INSERT INTO `rooms` (`roomname`, `stime`) VALUES ('$room-.3', current_timestamp());";
		if(mysqli_query($conn, $sql))
		{
		$message = "your room is ready to chat";

		echo '<script language="javascript">;';
		echo 'alert("'.$message.'");';
		echo 'window.location="http://localhost/ChatRoom/rooms.php?roomname='.$room.'";';
		echo '</script>';	
		}
	}





?> 