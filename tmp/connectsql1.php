<?php
$dbhost = 'cdb-adcxju0z.gz.tencentcdb.com:10059';  // mysql服务器主机地址
$dbuser = 'root';            // mysql用户名
$dbpass = '53444r00m';          // mysql用户名密码
$conn = mysqli_connect($dbhost, $dbuser, $dbpass);
if(! $conn )
{
    die('连接失败: ' . mysqli_error($conn));
}