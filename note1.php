<?php
$title = "الملاحظات";
include 'header.php';
include 'connect-db.php';
//session_start();

//Checking if the session is set or not, if not it will go to error page
if(!isset($_SESSION['admin']))
{
    header('Location: error.php');
}

 

// $_SESSION['userfullname']= $uname;
?>

<html lang="ar"  dir="rtl">
    <form name="lo" id="lo" action="note1.php" method="POST"  >
    
    
  
          
            
                <legend>الملاحظات</legend>
                <img src="img/thumbnail_notee.jpg"  alt="icon" width="100" height="100"><br><br>
            
                
                
                <center><table  class="tab" style="width:100%; ">
                <thead>
                     <th class="col">اسم الموظف</th>
                <th class="col">السجل المدني للموظف</th>
                <th  class="col">الملاحظات</th>
           
        

            </thead>
<?php

//creat query
$q2 =  "SELECT * FROM notes"; 
//run query
$result4 = mysqli_query($con,$q2);
    $s4= array();

    //Retrieve values from result1
    while ($row = mysqli_fetch_assoc($result4)) {

        $s4[$row['userfullname']]=array(
                  'userfullname' => $row['userfullname'], 
            'username' => $row['username'],
        
            'note' => $row['note']
             
        );
    }

    ?>
            <tbody>
 <?php foreach ( $s4 as $info) { ?>
                        <tr  style=" border: black solid" >
                            
                           
                            <td class="col3">
                                <h4><?php echo $info['userfullname']; ?> </h4>
                            </td>
                             <td class="col3">
                                <h4> <?php echo $info['username']; ?></h4>
                            </td>
                            <td class="col3">
                                
                                <h4> <?php echo $info['note']; ?> </h4>
                            </td>
                            
                      
                        </tr>
                    

<?php } ?>
                    </tbody>    
      
            </table></center> 


          
                
</html>
        </form>
    

         
        <?php


include 'Footer.php';

?> 