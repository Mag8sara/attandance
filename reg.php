
<?php

$title = "التسجيل";
include 'Header.php';
include 'connect-db.php';
//session_start();

?>

<html lang="ar"  dir="rtl">
    <head>
        <title><?php echo $title; ?> تسجيل حضور</title>
    <link  href="style.css" rel="stylesheet" type="text/css"/></head>


    

    <form id="reg5" name="reg" method="POST" action="Reg-process.php" enctype="multipart/form-data" onsubmit="return validate();" >
    <h1 id="oneH1" ><strong>التسجيل</strong></h1>
    <br>
    <img src="Img/reges.png"  alt="icon" width="150" height="150" align="middle"  >
         <br><br> 
        <h3>:المعلومات الشخصية</h3>
        <label title="userfullname" class="align" ><h2 style="color: red; display :inline">* </h2>:الاسم الرباعي </label><br>
        <input type="text" name="userfullname"  required placeholder="أدخل اسمك كاملا" />
        <span class="error" id="0">مطلوب</span>
        <br><br>
       
        <label title="email" class="align"><h2 style="color: red; display :inline">* </h2>:عنوان البريد الالكتروني</label><br>
        <input type="email" name="email" autocomplete="on"  required placeholder="ادخل بريدك الالكتروني"/>
        <span class="error" id="1">مطلوب</span>
        <br><br>
        <label title="phone" class="align"><h2 style="color: red; display :inline">* </h2>:رقم الجوال</label><br>
        <input  type="tel" name="phone" required placeholder="05********"  maxlength="10" min="10"/>
        <span class="error" id="2">مطلوب</span>
        <br><br>
        <h3> :معلومات الدخول</h3> 
        <label title="username" class="align"><h2 style="color: red; display :inline">* </h2>:اسم المستخدم</label><br>
        <input type="text" name="username" required placeholder="استخدم رقم سجلك المدني" maxlength="10" minlength="10"/>
        <span class="error" id="3">مطلوب</span>
        <br><br>
        <label title="password" class="align"><h2 style="color: red; display :inline">* </h2>:كلمة المرور</label><br>
        <input type="password" name="password" required  placeholder=" كلمة المرور"  minlength="4"/>
        <span class="error" id="4">مطلوب</span>
        <br><br>



        
        
        <input  type="Submit" name='sub'  value="تسجيل" onclick=" return validate();"/><br><br>

    </form>

</html>
<script>
    function validate()
    {
        var fname = document.reg.fname.value;
 
        var email = document.reg.email.value;
        var Pnumber = document.reg.Pnumber.value;
        var uname = document.reg.uname.value;
        var password = document.reg.password.value;
        var spans = document.getElementsByTagName("span");
       //Checking if the feilds are empty, then show the span messages
        if (fname === "")
        {
            spans[0].style.visibility = "visible";}
        
           
   
   
           
            
            
        if (email === "")
        {
           spans[1].style.visibility = "visible";}
        
           
            
            
          
        if (Pnumber === "")
        {
           spans[2].style.visibility = "visible";}
        
          
            
            
        
        if (uname === "")
        {
            spans[3].style.visibility = "visible";}
        
          
            
            
        if (password === "")
        {
           spans[4].style.visibility = "visible";
       }
       
      
            
 

    }
</script>




<?php
include 'footer.php';
?>
