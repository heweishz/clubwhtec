<?php
$info=array(
    "user"=>array(
        array(1,"zhansan",10,"nan"),
        array(2,"lisi",20,"nv"),
        array(3,"wangwu",30,"nan")
    ),
    "score"=>array(
        array(1,100,90,80),
        array(2,99,88,11),
        array(3,10,50,88)
    ),
    "connect"=>array(
        array(1,'110','aaa@bbb.com'),
        array(2,'120','bbb@ccc.com'),
        array(3,'119','ccc@ddd.com')
    )
);
foreach($info as $tableName=>$table){
    echo '<table align="center" width="500" border="1">';
    echo "<caption><h1>".$tableName. "</h1></caption>";
    foreach($table as $row){
        echo '<tr>';
        foreach($row as $col){
            echo ('<td>'.$col.'</td>');
        }
        echo '</tr>';
    }
    echo '</table>';
}