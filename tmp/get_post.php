
<!DOCTYPE html>
<html>
    <head>
        <title>My Website</title>
    </head>

<body>
<?php
    if(isset($_REQUEST['name'])){
        $name = htmlentities($_REQUEST['name']);
        echo $name;
        echo "<br>";
        print_r($_REQUEST);
    }
?>
<?php
    if(isset($_REQUEST['email'])){
        echo $_REQUEST['email'];
    }
?>
<?php
    if(isset($_REQUEST['City'])){
        echo htmlentities($_REQUEST['City']); 
        echo "<br>";
        echo htmlentities($_REQUEST['Major']);
    }
?>
    <form method="GET" action="<?php echo $_SERVER['PHP_SELF']; ?>">
        <div>
            <label>Name</label><br>
            <input type="text" name="name">
        </div>
        <div>
            <label>Email</label><br>
            <input type="text" name="email">
        </div>
        <input type="submit" value="submit">
    </form>
    <form method="POST" action="<?php echo $_SERVER['PHP_SELF']; ?>">
        <div>
            <label>City</label><br>
            <input type="text" name="City">
        </div>
        <div> <label>Major</label><br>
            <input type="text" name="Major">
        </div>
        <input type="submit" value="button">
    </form>
    <ul>
        <li>
            <a href="<?php echo $_SERVER['PHP_SELF']; ?> ?name=willho&email=heweishz%40mail.com">willho</a>
            <a href="<?php echo $_SERVER['PHP_SELF']; ?>?name=hewei">hewei</a>
        </li>
    </ul>
    <?php if(isset($_REQUEST['name'])) {?>
    
        <strong><?php echo "{$name}'s Profile"; ?></strong>
    <?php } ?>

</body>
</html>