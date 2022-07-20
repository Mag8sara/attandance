
<?php

$title = "التسجيل";
include 'Header.php';
include 'connect-db.php';
//session_start();


//Checking if the session is set or not, if not it will go to error page
if(!isset($_SESSION['admin']))
{
    header('Location: error.php');
}

//If the session is set, do the following steps
        
        if (isset($_POST['sub'])) {
         //Create variables 
            $userfullname = $_POST['userfullname'];
            $id = $_POST['id'];
            $nab = $_POST['nab'];
            $nal = $_POST['nal'];
            $comm =$_POST['comm'];
          
           
             //Create query
           $query = "INSERT INTO enthar (userfullname, id,nab, nal,comm)
           VALUES('$userfullname','$id','$nab','$nal','$comm')";
            // run query

            $res = mysqli_query($con, $query);

            //checking the result
            if ($res == 1) {
                $status = "done";
                
                header("Location: thanx_1_1.php");
            } else {
                $status = "notdone";
                echo 'لم تتم العملية بنجاح ';
            }
        }
        
?>
<html lang="ar"  dir="rtl">
    <head>
        <title><?php echo $title; ?> تسجيل حضور</title>
    <link  href="style.css" rel="stylesheet" type="text/css"/></head>




    <form class="reg6" name="reg6" method="POST" action="addenthar.php"  onsubmit="return validate();" >
        <center><h1 id="oneH1" ><strong>تسجيل بيانات الإنذارات</strong></h1></center>
          

        <label title="userfullname" class="align" ><h2 style="color: red; display :inline">* </h2>الاسم الرباعي :</label><br>
        <input type="text" name="userfullname"  required placeholder="أدخل اسمك كاملا" />
        <span class="error" id="0">مطلوب</span>
        <br><br>
       
        <label title="id" class="align"><h2 style="color: red; display :inline">* </h2> السجل المدني:</label><br>
        <input type="text" name="id" autocomplete="on"  required placeholder="ادخل السجل المدني" maxlength="10" min="10"/>
        <span class="error" id="1">مطلوب</span>
        <br><br>
        <label title="nab" class="align"><h2 style="color: red; display :inline">* </h2>عدد الغيابات:</label><br>
        <input  type="number" name="nab" required placeholder="ادخل العدد " />
        <span class="error" id="2">مطلوب</span>
        <br><br>

        <label title="nal" class="align"><h2 style="color: red; display :inline">* </h2>ساعات التأخير:</label><br>
        <input type="number" name="nal" required placeholder="ادخل الساعات"/>
        <span class="error" id="3">مطلوب</span>
        <br><br>
        <label title="comm" class="align">الملاحظات:</label><br>
        <textarea name="comm"  placeholder=" ادخل الملاحظات" ></textarea>
        <!--<span class="error" id="4">مطلوب</span>-->
        <br><br>



        
        
        <center><input  type="Submit" name='sub'  value="تسجيل" onclick=" return validate();" style="width:130px; height:30px;"/></center><br><br>

    </form>

</html>
<script>
    function validate()
    {
        var name = document.reg6.userfullname.value;
        var id = document.reg6.id.value;
        var nab = document.reg6.nab.value;
        var nal = document.reg6.nal.value;
        
     
        var spans = document.getElementsByTagName("span");


        //Checking if the feilds are empty, then show the span messages
        if (name === "")
        {
            spans[0].style.visibility = "visible";}
        
           
   
   
           
            
            
        if (id === "")
        {
           spans[1].style.visibility = "visible";}
        
           
            
            
          
        if (nab === "")
        {
           spans[2].style.visibility = "visible";}
        
          
            
            
        
        if (nal === "")
        {
            spans[3].style.visibility = "visible";}
        
          
            
                   
 

    }
</script>




<?php
include 'footer.php';
?>

