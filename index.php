<?php
$insert = false;
if(isset($_POST['name'])){
    //set conn. variable
    $server = "localhost";
    $username = "root";
    $password = "";

    //create a db conn..
    $con = mysqli_connect($server, $username, $password);

    //conncection checking..
    if(!$con){
        die("connection to this database failed due to".
        mysqli_connect_error());
    }
    else{
        //echo "Success fully connecting to Database";
    }

    //collect post variable
    $name = $_POST['name'];
    $DOB = $_POST['DOB'];
    $gender = $_POST['gender'];
    $email = $_POST['email'];
    $collegeName = $_POST['collegeName'];
    $phone = $_POST['phone'];
    $course = $_POST['course'];
    $branch = $_POST['branch'];
    $session = $_POST['session'];

    $sql = "INSERT INTO `student_detail`.`student_record` (`name`, `DOB`, `gender`, `email`, `collegeName`, `phone`, `course`, `branch`, `session`, `dt`) VALUES ('$name', '$DOB', '$gender', '$email', '$collegeName', '$phone', '$course', '$branch', '$session', current_timestamp())";
    // echo $sql;

    //execute query
    if($con->query($sql)==true){

        //flag for insertion
        $insert = true;
        // echo "Successfully inserted";
    }
    else{
        echo "Error: $sql <br> $con->error";
    }

    //close the connection
    $con->close();
}
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Student Record Form</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <img class=bg src="bg.jpg" alt="Central University of Haryana" class="src">
    <div class="container">
        <h3>Central University of Haryana</h3>
        <p>Students, Enter you Examination details here and submit it!!!<br><br></p>
        <?php
        if($insert == true){
        echo "<p class='SubMes'> Thanks for submitthing!!! </p>";
        }
        ?>

        <form action="index.php" method="post">
            <input type="text" name="name" id="name" placeholder="Enter Your Name:">
            <input type="text" name="DOB" id="DOB" placeholder="Enter Your DOB:">
            <input type="text" name="gender" id="gender" placeholder="Enter Your Gender:">
            <input type="email" name="email" id="email" placeholder="Enter Your E-mail:">
            <input type="text" name="collegeName" id="collegeName" placeholder="Enter your college name:">
            <input type="phone" name="phone" id="phone" placeholder="Enter Your Phone no:">
            <input type="text" name="course" id="course" placeholder="Enter Your Course:">
            <input type="text" name="branch" id="branch" placeholder="Enter Your Branch:">
            <input type="text" name="session" id="session" placeholder="Enter Session (eg: 2020-2024)">
            <button class="btn">Submit</button>
            <!-- <button class="btn">Reset</button> -->
        </form>
    </div>
    <script src="index.js"></script>
</body>
</html>