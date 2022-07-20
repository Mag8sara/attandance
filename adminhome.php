<?php
//session_start();
include 'Header.php';
include 'connect-db.php';
$title='لوحة المشرف';
?>
 <title><?php echo $title; ?></title>
<html lang="ar"  dir="rtl">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <!--Connecting to CSS file for styling-->
    <link  href="Style.css" rel="stylesheet" type="text/css"/></head>
   <link  href="style1.css" rel="stylesheet" type="text/css"/>         

<?php
//Checking if the session is set or not, if not it will go to error page
if(!isset($_SESSION['admin']))
{
    header('Location: error.php');
}

////Checking if the sessions are set
if (isset($_POST['view1'])) {
  header('Location: viewadmin.php');
}
if (isset($_POST['view2'])) {
  header('Location: viewadmin2.php');
}
if (isset($_POST['add'])) {
  header('Location: addenthar.php');
}
if (isset($_POST['delete'])) {
  header('Location: deletenthar.php');
}
if (isset($_POST['view3'])) {
  header('Location: viewenthar.php');
}
if (isset($_POST['update'])) {
  header('Location: updatenthar.php');
}
if (isset($_POST['view4'])) {
  header('Location: note1.php');
}

?>
   

 <form name="formm" class="form1" method='post'  lang="arb" dir="rtl">
     <h2>أختر طريقة عرض بيانات الموظفين </h2>
         <input class='button' type='submit' name='view1' value='عرض بيانات الحضور'/>
                <input class='button' type='submit' name='view2' value='عرض بيانات الإنصراف'  />
               
      <h2>خيارات أخرى: </h2> 
      
           <input class='button' type='submit' name='add' value='تسجيل إنذار'/>
           <input class='button' type='submit' name='delete' value='حذف إنذار'  /><br><br>
           <input class='button' type='submit' name='update' value='تحديث إنذار'  />  
           <br><br>
                 <input class='button' type='submit' name='view3' value='عرض الإنذارات'  /> 
                 <input class='button' type='submit' name='view4' value='عرض ملاحظات الموظفين'  /> 
     </form>
   
           <?php
 
include 'footer.php';
?>
