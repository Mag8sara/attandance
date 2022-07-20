<?php
include 'Header.php';
include 'connect-db.php';
session_start();
?>
<head>
    <title>Registration</title>
</head>
<body>
    <div id="wrapper">


        <?php
        if (isset($_POST['sub'])) {
            //Create variables 
            $fname = $_POST['userfullname'];
            $email = $_POST['email'];
            $phone = $_POST['phone'];
            $username = $_POST['username'];
            $password = md5($_POST['password']);


            //Create query
            $query = "INSERT INTO users (userfullname, email,phone, username,password)
        VALUES('$fname','$email','$phone','$username','$password')";
            // run query

            $res = mysqli_query($con, $query);

            //checking the result
            if ($res == 1) {
                $status = "done";

                header("Location: thanx.php?status=$status");
            } else {
                $status = "notdone";
                echo 'لم تتمكن من التسجيل بنجاح ';
            }
        }
        ?>

    </div>
</body>
<?php include 'footer.php'; ?>
