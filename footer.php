<!DOCTYPE html>

<html>
    <head>
        <meta charset="UTF-8">

         <!--Connecting to CSS file for styling-->
        <link  href="style6.css" rel="stylesheet" type="text/css"/>
    </head>
    <body>
        <footer>

            <div id="footer">


                <div class="col1">
                    <h3></h3>
                    <ul id="foo">
                        <a class="admin" href="adminlogin.php">دخول المشرف</a>
                        <br><br>
                        <!-- Setting the sessions to show the links-->
                        <?php if (!isset($_SESSION['Username']) AND ( !isset($_SESSION['admin']))) { ?>
                            <li class="link"><a href="login.php">تسجيل الدخول</a></li>
                        <?php } ?>
                        <!-- Setting the sessions to show the links-->
                        <?php if (isset($_SESSION['Username'])) { ?>
                        <li class="link"><a href="viewenthar.php">عرض الانذارت</a></li> 
                         <li class="link"><a href="logout.php">تسجيل الخروج</a></li> 
                        
                           
                             

                        <?php } ?>
                       <!-- Setting the sessions to show the links-->
                        <?php if (isset($_SESSION['admin'])) { ?>
                            <li class="link"><a href="adminhome.php">لوحة المشرف</a></li> 
                            <li class="link"><a href="logout.php">تسجيل الخروج للمشرف</a></li> 
                        <?php } ?>


                    </ul>

                </div>

                <div class="col1" id="p1">
                    <h3><strong>نبذة عن المستشفى</strong> </h3>
                    <p onclick="ChangeStyle()"><strong>مستشفى الأمير سعود بن جلوي بالأحساء الجديد يعد ضمن منظومة المشاريع الصحية الجديدة بالمحافظة والتي ستسهم في تطوير ونمو الخدمات الصحية بالمحافظة و ستنعكس هذه التطورات بإذن الله في مزيد من النتائج الإيجابيه لمؤشرات قياس الأداء الخاصة بالخدمات الصحة.</strong></p>

                </div>


                <div class="col1" id="hospital" >
                    <br><br>
                    <p>جميع الحقوق محفوظة  &copy; <span><a style="color:white" href="http://www.psbjh.gov.sa">مستشفى الأمير سعود بن جلوي  &trade;</a></p>
                </div>
            </div>
           
        </footer></body>
</html>
