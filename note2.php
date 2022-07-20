<?php
$title = "الملاحظات";
include 'header.php';
include 'connect-db.php';
//session_start();
?>
<?php
//Checking if the session is set or not, if not it will go to error page
    if(!isset($_SESSION['Username']))
{
    header('Location: error.php');
}

 if(isset($_POST['subnote']))

{
    //creat values
    $userfullname = $_POST['userfullname'];
    $username = $_POST['username'];
    $note = $_POST['note'];
   
//Creat query
$q2 =  "INSERT INTO notes(userfullname,username,note) VALUES ('$userfullname','$username','$note') "; 
//run query
$result4 = mysqli_query($con,$q2 );
   

}  ?>
  

<html lang="ar"  dir="rtl">
    <body>
        <div style="  "><center>
    <form name="lo" id="lo" action="note2.php" method="POST"  onsubmit="return notess()">
    
    
  
          
            
                <h2>الملاحظات</h2>
                <img src="img/thumbnail_notee.jpg"  alt="icon" width="100" height="100"><br><br>
                <label> <h2 style="color: red; display :inline">* </h2> <b>اسم الموظف :</b> </label>
             <input type="text" name="userfullname" size="30" maxlength="60" required/>
              <span  class="error">مطلوب</span>
                <label> <h2 style="color: red; display :inline">* </h2> <b>السجل المدني للموظف :</b> </label>
                 <input type="text" name="username" size="30" maxlength="60" required/>
                 <span  class="error">مطلوب</span>
                    <label> <h2 style="color: red; display :inline">* </h2> <b>الملاحظات :</b> </label>
                    <textarea  name="note" rows="10" cols="24" required> </textarea>
                  <span  class="error">مطلوب</span>
                  
                

        
<input type="submit" value="إرسال الملاحظة" name="subnote" onclick="return notess()" /> </p>
</form>
            </center>   </div>
</body>
</html>
	
    
    <script>
        function notess()
            {
                var userfullname = document.lo.userfullname.value;
                 var username = document.lo.username.value;
                  var note = document.lo.note.value;
       
                
                var spans = document.getElementsByTagName("span");
                //Checking if the feilds are empty, then show the span messages
                if(userfullname==="" )
                    {
                      spans[0].style.visibility="visible";  
                    }
                    if(username==="" )
                    {
                      spans[1].style.visibility="visible";  
                    }
                    if(note==="" )
                    {
                      spans[2].style.visibility="visible";  
                    }
                }

         </script>
         
            <?php
include 'footer.php';
?>