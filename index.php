<?php include 'server-info.php'; ?>
<!DOCTYPE html>
<html>
<head>
    <title>System Info</title>
    <link rel="stylesheet" href="assets/bootstrap/css/bootstrap.min.css">
</head>
<body>
<div class = "container">
    <h1>Server & Info</h1>
    <?php if($server): ?>
        <ul class="list-group">
            <?php foreach($server as $key => $value): ?>
                <li class="list-group-item">
                    <strong><?php echo $key; ?>:</strong>
                    <?php echo $value; ?>
                </li>
            <?php endforeach; ?>
        </ul>
    <?php endif; ?>
</div>
</body>
</html>