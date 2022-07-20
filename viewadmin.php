<?php
//session_start();
include 'Header.php';
include 'connect-db.php';
$title='عرض البحث';


//Checking if the session is set or not, if not it will go to error page
if(!isset($_SESSION['admin']))
{
    header('Location: error.php');
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
    <body>
        
        <form name="search" action="viewadmin.php" method="POST"  onsubmit="return validate()">
            
       <fieldset id="home"> 
           <h2>عرض بيانات الحضور</h2>
            <legend>العرض</legend>
            
            <h2 style="color: red; display :inline">*</h2>اختر التاريخ المطلوب:
          
            <?php
            //creat query
            $sql = "SELECT DISTINCT date FROM attends";
            //run query
            $result = mysqli_query($con, $sql);

            echo "<select name='date' required style='width:120px; height: 30px'>";
            echo "<option value='default'></option>";
            while ($row = mysqli_fetch_array($result)) {
                echo "<option value='" . $row['date'] . "'>" . $row['date'] . "</option>";
            }
            echo "</select>";
            ?>
            <br>
            <span class="error" id="0" >مطلوب</span><br>
            
            <?php
if (isset($_POST['find2'])) {
// create variables 
    
    $date = $_POST['date'];

    if ($date == "default") {  // if nothing is selected in Dropdown box
        echo '<h1>', '<strong>', 'لم يتم اختيار التاريخ المطلوب ', '</strong>', '</h1>';
    } else 
        {
?>
<center><table  class="tab" style="width:100%; ">
                <thead>
                     <th class="col">اسم الموظف</th>
                <th class="col">السجل المدني للموظف</th>
                <th  class="col">التاريخ</th>
                    <th class="col">الوقت</th>
        

            </thead>
<?php
//creat query
$q2 =  "SELECT * FROM attends WHERE date='$date' "; 
//run query
$result4 = mysqli_query($con, $q2 );
    $s4= array();

       //Retrieve values from result4
    // here retrive the patient from db
    while ($row = mysqli_fetch_assoc($result4)) {

        $s4[$row['userfullname']]=array(
                  'userfullname' => $row['userfullname'], 
            'username' => $row['username'],
            //'userfullname' => $row['userfullname'],
            'date' => $row['date'],
             'time' => $row['time']
        );
    }

    ?>
            <tbody>
                
 <?php // printing for viewing
 foreach ( $s4 as $info) { ?>
                        <tr  style=" border: black solid" >
                            
                           
                            <td class="col3">
                                <h4><?php echo $info['userfullname']; ?> </h4>
                            </td>
                             <td class="col3">
                                <h4> <?php echo $info['username']; ?></h4>
                            </td>
                            <td class="col3">
                                
                                <h4> <?php echo $info['date']; ?> </h4>
                            </td>
                            <td class="col3">
                                <h4> <?php echo $info['time']; ?> </h4>
                            </td>
                      
                        </tr>
                    

<?php }}} ?>
                    </tbody>    
      
            </table></center> 



    <?php    
    
    
    if ((mysqli_num_rows($result) == 0)) {
        echo '<h1>', '<strong>', 'لاتوجد نتائج', '</strong>', '</h1>';
    }

?>
              <br><br>
              <input type="submit" name="find2" value="بحث" onclick=" return validate(); " style="width:120px; height: 40px; font-size: 20px; "/> 
       </fieldset>
</form>
  
   <center><img  id="print" onclick="myFunction()" alt="print" src="img/print.gif" ></center>
    <br><br>
<script>
function myFunction() {
    window.print();
}
</script>
    </body>

<script>
                function validate()
                {
                    var date = document.search.date.value;
                  
                    var spans = document.getElementsByTagName("span");
                    //Checking if the feilds is empty, then show the span message
                    if (date === "default")
                    {
                        spans[0].style.visibility = "visible";
                    }
                    
    }
 </script>
 </html>

<?php
include 'footer.php';
?>
