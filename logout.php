<?php
session_start();
$title='تحضير الموظفين';

//Setting the sessions to destroy sessions
if(isset($_SESSION['Username'])||($_SESSION['admin']))
{
    session_unset();
    session_destroy();
    header("Location: Login.php");
}

?>
<html>
    <head>
        <title><?php echo $title; ?> </title>
    </head>
</html>
