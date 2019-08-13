<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>

<title>Exam Interface</title>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
</head>
<body>

<p><strong>NOTE: </strong>If a search box is left blank, then the form will search for all data under that specific field</p>

<form action="exam_interface.php" method="post" name="sessionform">        <!-- This will post the form to its own page"-->
<p>Session ID: <input type="text" name="sessionid" /></p>      <!-- Enter Session Id here-->
<p>Module Number: <input type="text" name="moduleid" /></p>      <!-- Enter Module Id here-->
<p>Teacher Username: <input type="text" name="teacherid" /></p>      <!-- Enter Teacher here-->
<p>Student Username: <input type="text" name="studentid" /></p>      <!-- Enter User Id here-->
<p>Grade: <input type="text" name="grade" /></p>      <!-- Enter Grade here-->
<p>Order Results By: <select name="order">
<option value="ordersessionid">Session ID</option>
<option value="ordermoduleid">Module Number</option>
<option value="orderteacherid">Teacher Username</option>
<option value="orderstudentid">Student Username</option>
<option value="ordergrade">Grade</option>
</select>
<p><input type="submit" value="Submit" /></p>
</form>

<?php

$username="xxx";
$password="xxx";
$database="mobile_app";

mysql_connect('localhost',$username,$password);

@mysql_select_db($database) or die("Unable to select database");

$sessionid = isset ($_POST['sessionid']) ? $_POST['sessionid'] : "";
$moduleid = isset ($_POST['moduleid']) ? $_POST['moduleid'] : "";
$teacherid = isset ($_POST['teacherid']) ? $_POST['teacherid'] : "";
$studentid = isset ($_POST['studentid']) ? $_POST['studentid'] : "";
$grade = isset ($_POST['grade']) ? $_POST['grade'] : "";
$orderfield = isset ($_POST['order']) ? $_POST['order'] : "";

$sessionid = mysql_real_escape_string($sessionid);
$moduleid = mysql_real_escape_string($moduleid);
$teacherid = mysql_real_escape_string($teacherid);
$studentid = mysql_real_escape_string($studentid);
$grade = mysql_real_escape_string($grade);

switch ($orderfield) {
    case 'ordersessionid': $orderfield = 'gr.SessionId';
    break;
    case 'ordermoduleid': $orderfield = 'm.ModuleId'; 
    break;
    case 'orderteacherid': $orderfield = 's.TeacherId';
    break;
    case 'orderstudentid': $orderfield = 'gr.StudentId'; 
    break;
    case 'ordergrade': $orderfield = 'gr.Grade';
    break;
}

$ordertable = $orderfield;

$result = mysql_query("SELECT * FROM Module m INNER JOIN Session s ON m.ModuleId = s.ModuleId JOIN Grade_Report gr ON s.SessionId = gr.SessionId JOIN Student st ON gr.StudentId = st.StudentId WHERE ('$sessionid' = '' OR gr.SessionId = '$sessionid') AND ('$moduleid' = '' OR m.ModuleId = '$moduleid') AND ('$teacherid' = '' OR s.TeacherId = '$teacherid') AND ('$studentid' = '' OR gr.StudentId = '$studentid') AND ('$grade' = '' OR gr.Grade = '$grade') ORDER BY $ordertable ASC");

$num=mysql_numrows($result);

if(isset($_POST['submit'])){

echo "<p>Your Search: <strong>Session ID:</strong> "; if (empty($sessionid))echo "'All Sessions'"; else echo "'$sessionid'";echo ", <strong>Module ID:</strong> "; if (empty($moduleid))echo "'All Modules'"; else echo "'$moduleid'";echo ", <strong>Teacher Username:</strong> "; if (empty($teacherid))echo "'All Teachers'"; else echo "'$teacherid'";echo ", <strong>Student Username:</strong> "; if (empty($studentid))echo "'All Students'"; else echo "'$studentid'";echo ", <strong>Grade:</strong> "; if (empty($grade))echo "'All Grades'"; else echo "'$grade'"; "</p>";

echo "<p>Number of Records Shown in Result of the Search: <strong>$num</strong></p>";

echo "<table border='1'>
<tr>
<th>Student Id</th>
<th>Forename</th>
<th>Session Id</th>
<th>Grade</th>
<th>Mark</th>
<th>Module</th>
<th>Teacher</th>
</tr>";

while ($row = mysql_fetch_array($result)){

 echo "<tr>";
  echo "<td>" . $row['StudentId'] . "</td>";
  echo "<td>" . $row['Forename'] . "</td>";
  echo "<td>" . $row['SessionId'] . "</td>";
  echo "<td>" . $row['Grade'] . "</td>";
  echo "<td>" . $row['Mark'] . "</td>";
  echo "<td>" . $row['ModuleName'] . "</td>";
  echo "<td>" . $row['TeacherId'] . "</td>";
  echo "</tr>";
}