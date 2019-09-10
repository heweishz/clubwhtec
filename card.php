<?php
    $cid=$_GET["cid"];
    $mysqli=new mysqli("cdb-adcxju0z.gz.tencentcdb.com:10059","root","53444r00m","card");
    
    $result=$mysqli->query("select id,title from card where cid={$cid}");
    while ($row=$result->_assoc()) {
        echo '<ul>';
        echo '<li><a href="con.php?id='.$row["id"].'">'.$row["title"].'</a></li>';
        echo '</ul>';
    }
    ?>