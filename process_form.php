<?php
$insert = false;
if(isset($_POST['name'])){
    // Set connection variables
    $server = "localhost";
    $username = "root";
    $password = "";

    // Create a database connection
    $con = mysqli_connect($server, $username, $password);

    // Check for connection success
    if(!$con){
        die("connection to this database failed due to" . mysqli_connect_error());
    }
    // echo "Success connecting to the db";

    // Collect post variables
    $id = $_POST['id'];
    $name = $_POST['name'];
    $gender = $_POST['gender'];
    $qualification = $_POST['qualification'];
    $age = $_POST['age'];
    $dob = $_POST['dob'];
    $sql = "INSERT INTO `applicants` (`id`, `name`, `gender`, `qualification`, `age`, `dob`) VALUES ('$id', '$name', '$gender', '$qualification', '$age', '$dob', current_timestamp());";
    // echo $sql;

    // Execute the query
    if($con->query($sql) == true){
        // echo "Successfully inserted";

        // Flag for successful insertion
        $insert = true;
    }
    else{
        echo "ERROR: $sql <br> $con->error";
    }

    // Close the database connection
    $con->close();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Applicant Form</title>
</head>
<body>

    <div class="container">
        <h1>Welcome to Applicant Form</h3>
        <p>Enter your details and submit this form to confirm  </p>
        <?php
        if($insert == true){
        echo "<p class='submitMsg'>Thanks for submitting your form.</p>";
        }
   
        <form action="process_form.php" method="post">
            <input type="number" name="name" id="name" placeholder="Enter your id">
            <input type="text" name="age" id="age" placeholder="Enter your name">
            <input type="text" name="gender" id="gender" placeholder="Enter your gender">
            <input type="text" name="email" id="email" placeholder="Enter your qualification">
            <input type="number" name="phone" id="phone" placeholder="Enter your age">
            <input type="dob" name="phone" id="phone" placeholder="Enter your dob">
            <button class="btn">Submit</button> 
        </form>
    </div>
    
    
</body>
</html>


