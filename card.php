
<?php
    $cid=$_GET["cid"];
    $mysqli=new mysqli("cdb-adcxju0z.gz.tencentcdb.com:10059","root","53444r00m","card") or die('connect sql die');
    
    $result=$mysqli->query("select id,title from card where cid={$cid}");
    //print_r($result);
    //$row = mysqli_fetch_assoc($result);
    //print_r($row);
    
    while ($row=$result->fetch_assoc()) {
        echo '<ul>';
        echo '<li><a href="con.php?id='.$row["id"].'">'.$row["title"].'</a></li>';
        echo '</ul>';
    }
?>
