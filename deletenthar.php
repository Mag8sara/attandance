<?php
//session_start();
$title = "حذف بيانات";
include 'Header.php';
include 'connect-db.php';

//Checking if the session is set or not, if not it will go to error page
if (!isset($_SESSION['admin'])) {
    header('Location: error.php');
}

if (isset($_GET['submit'])) {
    
    $id = $_GET['id'];
    //creat query
    $query = "DELETE FROM enthar WHERE id=$id";
    //run query
    $result = mysqli_query($con, $query);
    
    if ($result == 1) {
        header("Location: delmsg.php");
    } else {

        header("Location: deletenthar.php");
    }
}
?>

<html lang="ar"  dir="rtl">
    <head>
     <title><?php echo $title; ?> </title>
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
        <!--Connecting to CSS file for styling-->
        <link  href="Style.css" rel="stylesheet" type="text/css"/>
        <link  href="style1.css" rel="stylesheet" type="text/css"/>
    </head>
    <body>
        <div id="content">

            <div class="page section">







            </div>
        </div>

    <html>
        <center> <form method="GET" action="deletenthar.php" name="delete" id="de" class='form13'  onsubmit=" return validatedel()" >
                <center> <h1>حذف بيانات الانذار</h1></center>


                <p> <label> <h2 style="color: red; display :inline">* </h2> <b>حذف بإستخدام رقم السجل المدني  :</b> </label>

                    <input type="text" name="id" method="get" required maxlength="10" max="10"/> </p>
                <span class="error" id="0">مطلوب</span>   


                <center><input type="submit" value="حذف" name="submit" style="width: 110px; height:30px;" onclick=" return validatedel()"/>  </center>
                <br> </form></center></html>


    <script>

        function validatedel()
        {
            var uname = document.delete.uname.value;

            var spans = document.getElementsByTagName("span");
            //Checking if the feild is empty, then show the span message
            if (uname === "")
            {
                spans[0].style.visibility = "visible";
            }
        }
    </script>
<?php
include 'footer.php';
?>
