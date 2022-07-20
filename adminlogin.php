
<?php
//session_start();
$title = "Login";
include 'Header.php';
include 'connect-db.php';
$title='دخول المشرف';
if(isset($_POST['username'],$_POST['password']))
{
    //create variables
    $uname = $_POST['username'];
    $pwd = md5($_POST['password']);
    //create query
    $query = "SELECT * FROM admin WHERE username='$uname' AND password='$pwd'";
    //run query
    $result = mysqli_query($con, $query);
   
    if($result)
    {
        if((mysqli_num_rows($result) == 1))
        {
            //After checking if the username/password is correct, set the session
            $_SESSION['admin'] = $uname;
            echo 'Log in';
            header('Location: adminhome.php?status=valid');
             exit();
        }
        else
        {
            header('Location: adminlogin.php?status=invalid');
             exit();
        }
    }
        
 }
?>
<html lang="ar" dir="rtl">
<head>
     <title><?php echo $title; ?></title>
        <link  href="style.css" rel="stylesheet" type="text/css"/>
</head>

<form name="lo" id="lo" action="adminlogin.php" method="POST" enctype="multipart/form-data" onsubmit="return validate1()">
    
    <h4 id="wellll"><center> اهلا بك في لوحة دخول المشرفين</center></h4>
    
            
  <?php if(isset($_GET['status']) && $_GET['status']==="invalid") { ?>          
          <p>يوجد خطأ بالمدخلات</p>
      <?php } ?> 
            
                <legend>تسجيل الدخول</legend>
                <img src="img/login.png"  alt="icon" width="100" height="100"><br><br>
                <img src="img/username.png"  alt="icon" width="30" height="30">
                <label><strong>اسم المستخدم</strong><input type="text" name="username" maxlength="13" required placeholder="اسم المستخدم"/></label> 
                 <span class="error" id="na">مطلوب</span>
                <br><br>
                <img src="img/password.png"  alt="icon" width="30" height="30">
                <label><strong>كلمة المرور</strong> <input type="password" name="password" maxlength="13"  required placeholder="كلمة المرور"/></label> 
                <span class="error" id="pass">مطلوب</span>
                <br><br><input type="submit" value="ارسال" name='login'style="height:30px; width:170px" onclick="validatel()" />

                
           
               
         <br><br><br>


        </form>
<script>
            function validatel()
            {
                    var i = document.lo.username.value;
                   var x = document.lo.password.value;

                    var splo = document.getElementsByTagName("span");
                    //Checking if the feilds are empty, then show the span messages
                    if(i==="")
                    {
                        splo[0].style.visibility="visible"; 
                       
                    }
                    
                    if(x==="")
                    {
                        splo[1].style.visibility="visible";  
                        
                    }

            }




        </script>
        </html>
        <?php


include 'Footer.php';

?>     