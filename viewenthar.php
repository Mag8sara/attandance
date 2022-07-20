<?php
//session_start();
include 'Header.php';
include 'connect-db.php';
$title = 'الحضور والإنصراف';
?>
<title><?php echo $title; ?></title>
<html lang="ar"  dir="rtl">
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
        <!--Connecting to CSS file for styling-->
        <link  href="Style.css" rel="stylesheet" type="text/css"/></head>
    <br><br>
   
    <center><table  class="tab" style="width:900px;">
            <thead>
            <th class="col">اسم الموظف </th>
            <th  class="col">السجل المدني</th>
            <th class="col">عدد الغيابات</th>
            <th class="col">ساعات التأخير</th>
            <th class="col">الملاحظات</th> 

            </thead>
            <?php
         

            //creat query
            $q = "SELECT * FROM enthar"; 
            //run query
            $result = mysqli_query($con, $q);
            $s = array();
            
               //Retrieve values from result
            while ($row = mysqli_fetch_assoc($result)) {

                $s[$row['userfullname']] = array(
                    'userfullname' => $row['userfullname'],
                    'id' => $row['id'],
                    'nab' => $row['nab'],
                    'nal' => $row['nal'],
                    'comm' => $row['comm']
                );
            }
            ?>
            <tbody>
            <?php // printing for viewing
             foreach ($s as $info) { ?>
                    <tr  style=" border: black solid" >


                        <td class="col">
                            <h4><span> <?php echo $info['userfullname']; ?></span> </h4>
                        </td>
                        <td class="col">
                            <h4><span> <?php echo $info['id']; ?></span> </h4>
                        </td>
                        <td class="col">
                            <h4><span> <?php echo $info['nab']; ?></span> </h4>
                        </td>
                        <td class="col">
                            <h4><span> <?php echo $info['nal']; ?></span> </h4>
                        </td>
                        <td class="col">
                            <h4><span> <?php echo $info['comm']; ?></span> </h4>
                        </td>

                    </tr>
                    </form>

<?php } ?>
            </tbody>    

        </table></center> 
    <br><br>
</html>



<?php
include 'footer.php';
?>
