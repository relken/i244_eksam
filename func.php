<?php

	$host="localhost";
	$user="test";
	$pass="t3st3r123";
	$db="test";
	$con = mysqli_connect($host, $user, $pass, $db) or die("ei saa ühendust mootoriga- ".mysqli_error());
	mysqli_query($con, "SET CHARACTER SET UTF8") or die("Ei saanud baasi utf-8-sse - ".mysqli_error($con));

if(isset($_POST['item_id'])) {
	$item_id = mysqli_real_escape_string($con,$_POST['item_id']);
	$ip = mysqli_real_escape_string($con,get_real_ip());
	mysqli_query($con,"INSERT INTO rain_likes (item_id,ip) VALUES ('$item_id','$ip')");
	echo 'Like <span>'.likes($item_id).'</span>';
}

function likes($item_id) {
	global $con;
	$query = mysqli_query($con,"SELECT * FROM rain_likes WHERE item_id=".mysqli_real_escape_string($con, $item_id));
	$likes = mysqli_num_rows($query);
	return $likes;
}

function get_real_ip()
{
    if (!empty($_SERVER['HTTP_CLIENT_IP']))
    { $ip=$_SERVER['HTTP_CLIENT_IP'];}
    elseif (!empty($_SERVER['HTTP_X_FORWARDED_FOR']))
    {$ip=$_SERVER['HTTP_X_FORWARDED_FOR'];}
    else {$ip=$_SERVER['REMOTE_ADDR'];}
    return $ip;
}

 
?>