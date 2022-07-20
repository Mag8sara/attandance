<?php
session_start();
?>
<!DOCTYPE html>
<html lang="ar">
    <head>
        <!--Connecting to CSS file for styling-->
        <link  href="Style.css" rel="stylesheet" type="text/css"/>


    </head>
    <body>

        <div id="wrapper">

        </div>
        <ul id="ul">
            <!-- Setting the sessions to show the links-->
            <?php if (!isset($_SESSION['Username']) AND ( !isset($_SESSION['admin']))) { ?>
                <li class="a"><a href="login.php">تسجيل الدخول</a></li>
            <?php } ?><!-- Setting the sessions to show the links-->
            <?php if (isset($_SESSION['Username'])) { ?>
                <li class="a"><a href="note2.php">ملاحظات الموظف</a></li> 
                <li class="a"><a href="viewenthar.php">عرض الانذارت</a></li> 
                
                <li class="a"><a href="logout.php">تسجيل الخروج</a></li> 

            <?php } ?>
            <!-- Setting the sessions to show the links-->
            <?php if (isset($_SESSION['admin'])) { ?>
                <li class="a"><a href="adminhome.php">لوحة المشرف</a></li> 

                <li class="a"><a href="logout.php">تسجيل الخروج للمشرف</a></li> 
                <?php } ?>

        </ul>


    </script>
</body>
</html>