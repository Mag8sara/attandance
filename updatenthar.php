 <?php
//session_start();
$title='دليل الهاتف لموظفين المستشفى';
include 'Header.php';
include 'connect-db.php';
?>
<?php
//Checking if the session is set or not, if not it will go to error page
if(!isset($_SESSION['admin']))
{
    header('Location: error.php');
}

if(isset($_POST['update']))
{
    $id=$_POST['id'];
  
    $nab=$_POST['nab'];
    $nal=$_POST['nal'];
   
    if($id || $nab || $nal)
    {
        //mysqli_co
        $exists= "SELECT * FROM enthar WHERE id LIKE '%$id%' ";
       $result1 = mysqli_query($con, $exists);
       
       $result_count = mysqli_num_rows($result1);
      
    
       
    if($result_count !=0)
    {
       
       $query1 = "UPDATE enthar SET  nab='$nab' ,nal='$nal'  WHERE id='$id'";  
       $result3 = mysqli_query($con, $query1);
      
       header("Location: thanx_1_1.php");
        
    }
    else echo'لم يتم العثور على بيانات , حاول مرة أخرى';
    }
    else echo'الرجاء تعبئة جميع الخانات';
    
    
}


?>
<title><?php echo $title; ?> </title>
<html lang="ar"  dir="rtl">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <!--Connecting to CSS file for styling-->
    <link  href="Style.css" rel="stylesheet" type="text/css"/>
 <link  href="style1.css" rel="stylesheet" type="text/css"/>
    </head>
  
<div id="content">

   <div class="page section">
       <center><h1>تعديل بيانات الانذار  </h1></center>
    
  
       <form  class ="reg6" id="update" name="update" method="POST" action="updatenthar.php" onsubmit="return validate();">
 <center><h3>يرجى كتابة سجل الموظف لتحديث بياناته </h3></center>

 <?php      //creat query
            $sql = "SELECT DISTINCT id FROM enthar";
            //run query
            $result = mysqli_query($con, $sql);

            echo "<select name='id' style='width:120px; height: 30px'>";
            echo "<option value='default'> </option>";
            
            while ($row = mysqli_fetch_array($result)) {
                echo "<option value='" . $row['id'] . "'>" . $row['id'] . "</option>";
            }
            echo "</select>";
            
            ?>
<br>
<h3>الرجاء كتابة السجل المدني كما هو موضح بالقائمة أعلاه :</h3>
<b>السجل المدني للموظف:<h2 style="color: red; display :inline">* </h2></b> 
      <input type="text" name="id1"  maxlength="10" required/>
                                  <span class="error" id="0">مطلوب</span>   
                                     <h3>البيانات المطلوب تحديثها </h3>                        
	<p><b><h2 style="color: red; display :inline">* </h2>عدد الغيابات:</b>
    <input type="text" name="nab"  />  <span class="error" id="1">مطلوب</span> 
    </p>
      
    
	<p><b><h2 style="color: red; display :inline">* </h2>عدد ساعات التأخير:</b>
	<input type="text" name="nal" required />  <span class="error" id="2">مطلوب</span> </p>
           </p>
	
        
        
        <input type="submit" value="إضافة" name="update" onclick=" return validate();"/> </p>
</form>
</html>
	
 

        <?php
    
include 'footer.php';
?>
<script>
    function validate()
    {
        var id1 = document.update.id1.value;
 var nab = document.update.nab.value;
 var nal = document.update.nal.value;

        var spans = document.getElementsByTagName("span");
        //Checking if the feilds are empty, then show the span messages
        if ( id1 === "")
        {
            spans[0].style.visibility = "visible";
        }
         if ( nab === "")
        { 
            spans[1].style.visibility = "visible";
        }
         if (nal === "")
        {
            spans[2].style.visibility = "visible";
        }
        





    }
</script>
