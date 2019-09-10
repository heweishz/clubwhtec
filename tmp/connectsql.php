<?php 
	$conn = mysqli_connect("cdb-adcxju0z.gz.tencentcdb.com:10059","root","53444r00m","card");
	if(mysqli_connect_errno()){
	echo 'failed to connect to Mysql ' . mysqli_connect_errno();
}