<?php 
	if ($conn = mysqli("cdb-adcxju0z.gz.tencentcdb.com:10059","root","53444r00m","card")){
        print '<p>successfully connected to MySQL!</p>';
    }
    else{
        print 'failed!';
    }
