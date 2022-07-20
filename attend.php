<?php
include 'header.php';
include 'connect-db.php';
$title = 'صفحة الحضور';
//session_start();
if (isset($_GET['id'])) {
    //create variable
    $id = $_GET['id'];

    //create query
    $query1 = "SELECT * FROM users WHERE username=$id";
    //run query
    $result1 = mysqli_query($con, $query1);

    $s = array();
    //Retrieve values from result1
    while ($row = mysqli_fetch_assoc($result1)) {

        $s[$row['username']] = array(
            'username' => $row['username'],
            'userfullname' => $row['userfullname'],
            'email' => $row['email'],
            'phone' => $row['phone'],
            'password' => $row['password']
        );
    }
}
?>
<title><?php echo $title; ?></title>
<html lang="ar"  dir="rtl">
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
        <!--Connecting to CSS file for styling-->
        <link  href="Style.css" rel="stylesheet" type="text/css"/>
        <link  href="style1.css" rel="stylesheet" type="text/css"/>
    </head>
    <div style=" width: 100%; height: 80%; padding: 20px; margin: 0 auto;">
        <center><form  name="att" id="att" action="attend.php" method="POST"  onsubmit="return validate1()" style=" width: 1100px;  margin: 0 auto;  height:300px;">
                <center><table class="tab" style="width:1100px;">

                        <thead>
                        <th class="col">اسم الموظف</th>
                        <th class="col">السجل المدني للموظف</th>
                        <th  class="col">التاريخ</th>
                        <th class="col">الوقت</th>


                        </thead>
<?php foreach ($s as $info) { ?>
                            <tr  style=" border: black solid" >

                            <br>
                            <td class="col6">
                                <h4><span><input type="text" name="userfullname" value="<?php echo $info['userfullname']; ?> "/> </span> </h4>
                            </td>

                            <td class="col6">
                                <h4><span><input type="text" name="username" value="<?php echo $info['username']; ?> "/></span> </h4>
                            </td>
                            <td  class="col6"><h4><span><input type="text" name="date" value="<?php
    date_default_timezone_set("Asia/Riyadh");
//$time= date("H:i:s");
    $date = date("Y-m-d");
//echo  "the time is" . $time ;
    echo $date;
    ?>"/></h4></span>

                            </td>
                            <td  class="col6"><h4><span><input type="text" name="time" value="<?php
                                                               date_default_timezone_set("Asia/Riyadh");
                                                               $time = date("H:i:s");
                                                               //$date= date("Y-m-d");
                                                               echo "the time is" . $time;
                                                                //echo $date;
                                                               ?>"/></h4></span>

                            </td>

                            </tr>


<?php } ?>
                    </table></center>

                <br><br>
                <div id="zz">
                    <center><button type="submit"  class='form11' name="submit" ><h3>تسجيل الحضور</h3></button></center>

                    <center><button type="submit"  class='form11'  name="submit1" ><h3>تسجيل الإنصراف</h3></button></center>
                </div>
            </form></center>
    </div>

    <br><br>
</html>
<?php
if (isset($_POST['submit'])) {
//Create variables 
    $ufn = $_POST['userfullname'];
    $uname1 = $_POST['username'];
    $date = $_POST['date'];
    $time = $_POST['time'];

    $query = "INSERT INTO attends (userfullname,username,date,time)
      VALUES('$ufn','$uname1','$date','$time')";
// run query

    $res = mysqli_query($con, $query);

    //checking the result
    if ($res == 1) {
        //$status = "done";

        header("Location: thanx_1.php");
    } else {
        //$status = "notdone";
        echo '<h2> لم يتم التحضير بنجاح</h2>';
    }
}
?>
<?php
if (isset($_POST['submit1'])) {
//Create variables 
    $ufn = $_POST['userfullname'];
    $uname1 = $_POST['username'];
    $date = $_POST['date'];
    $time = $_POST['time'];

    $query = "INSERT INTO leave1 (userfullname,username,date,time)
      VALUES('$ufn','$uname1','$date','$time')";
// run query

    $res = mysqli_query($con, $query);

    //checking the result
    if ($res == 1) {
        //$status = "done";

        header("Location: leave.php");
    } else {
        //$status = "notdone";
        echo '<h2> لم يتم التحضير بنجاح</h2>';
    }
}
?>
<?php
include 'Footer.php';
?> 