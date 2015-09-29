<?php include_once('app/init.php'); ?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>PHP Tricks - Login With Facebook Tutorial</title>
</head>
<body>
    <?php if(!isset($_SESSION['fb_token'])) : /* check if facebook session exist */?>
        <a href="<?php $helper->getLoginUrl() /* get login url */ ?>">Login With Facebook</a>
    <?php else: ?>
   User Name is : <?php echo $user['name'] /* print username */ ?> - <a href="logout.php">Logout</a>
    <?php endif; ?>
</body>
</html>
