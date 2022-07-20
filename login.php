<?php
$title = "تسجيل الدخول";
include 'header.php';
include 'connect-db.php';
//session_start();


if (isset($_POST['login'])) {
    //create variables
    $uname = $_POST['username'];
    $pwd = md5($_POST['password']);

    

    //create query
    $query = "SELECT * FROM users WHERE username='$uname' AND Password='$pwd'";
    //run query
    $result = mysqli_query($con, $query);

     if($result)
    {  
        if((mysqli_num_rows($result) == 1))
        {
            //After checking if the username/password is correct, set the session
            $_SESSION[Username] = $uname;
            echo 'Log in';
            header('Location: attend.php?id='.$_POST['username']);
                
             exit();
        }
        else
        {
            header('Location: login.php?status=invalid');
             exit();
        }
    }
        
 }
 

?>

<html lang="ar"  dir="rtl">
    <div style=" width: 1500px; margin-left:5000px;  "><center>
<form name="lo" id="lo" action="Login.php" method="POST"  onsubmit="return validate1()">
    
    
  
            <fieldset id="loginfield" style="border: none;"> 
                <!-- Setting the sessions to show the status-->
  <?php if(isset($_GET['status']) && $_GET['status']==="invalid") { ?>          
          <p>كلمة المرور خاطئه الرجاء المحاوله مرة أخرى</p>
      <?php } ?> 
            
                <legend>تسجيل الدخول</legend>
                <img src="img/login.png"  alt="icon" width="100" height="100"><br><br>
                <img src="img/username.png"  alt="icon" width="30" height="30">
                <label><strong>اسم المستخدم:</strong><input type="text" name="username" maxlength="10" minlength="10" required placeholder="اسم المستخدم"/></label> 
                 <span class="error" id="na">مطلوب</span>
                <br><br>
                <img src="img/password.png"  alt="icon" width="30" height="30">
                <label><strong>كلمة المرور:</strong> <input type="password" name="password" maxlength="13"  required placeholder="كلمة المرور"/></label> 
                <span class="error" id="pass">مطلوب</span>
                <br><br><input type="submit" value="دخول" name='login'style="height:30px; width:170px" onclick="validatel()" />

                
                <br><a   href="reg.php"> التسجيل </a>
               
            </fieldset><br><br><br>


        </form>
        </center></div>
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