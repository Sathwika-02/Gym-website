<?php
$insert=false;
//mysql connection 
if(isset($_POST['name'])){
    // Set connection variables 
$server="localhost";
$username="root";
$password="";
//create a connection 
$con=mysqli_connect($server,$username,$password);

// check for connection success 
if(!$con){
    die("Connection to this database failed due to" .mysqli_connect_error());
}

// Collect post varaibles 
$name = $_POST['name'];
$age = $_POST['age'];
$gender=$_POST['gender'];
$email=$_POST['email'];
$phone=$_POST['phone'];
$other=$_POST['desc'];
$sql="INSERT INTO `signup`.`signup` ( `name`, `age`, `gender`, `email`, `phone`, `other`, `dt`) VALUES ('$name','$age','$gender','$email','$phone','$other',current_timestamp());";
//echo $sql;
 
if($con->query($sql)==true){
   // echo "Successfully inserted";

   //Flag for successfull insertion 
   $insert=true;
}
else{
    echo "ERROR :$sql <br> $con->error";
}
$con->close();
}

?>
<!DOCTYPE html>
<html lang="en">
<head>
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sign up Page</title>
    <link rel="stylesheet" href="css\Signupstyle.css">
    <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet" integrity="sha384-wvfXpqpZZVQGK6TAh5PVlGOfQNHSoD2xbE+QkPxCAFlNEevoEH3Sl0sibVcOQVnN" crossorigin="anonymous">
</head>
<body>
<div class="nav">
        <h2><a href="index.php">Gymso Fitness</h2>
        <ul id="item">
            <li><a href="html\Gymclasses.html">Classes</a></li>
            <li><a href="html\personalworkouts.html">Personal workouts </a></li>
            <li><a href="html\pricesandplans.html">Prices & Plans</a></li>
            <li><a href="html\schedule.html">Schedule</a></li>
            <li><a href="signup.php">Sign up</a></li>
            <div class="icon">
                <i class="fa fa-facebook-f" aria-hidden="true"></i>
                <i class="fa fa-twitter" aria-hidden="true"></i>
                <i class="fa fa-youtube-play" aria-hidden="true"></i>
            </div>
        </ul>
        <i id="bar" class="fa fa-bars" aria-hidden="true"></i>
    </div>
    <br>
    <br>
    <div class="container">
        <h3>Signup for a Workout </h3>
        <?php
        if($insert ==true){
            echo "<p class='submitmsg'>Thanks for Submitting </p>";
        }
        ?>
        <form action="signup.php" method="post">
            <input type="text" name="name" id="name" placeholder="Enter your name">
            <input type="text" name="age" id="age" placeholder="Enter your age">
            <input type="text" name="gender" id="gender" placeholder="Enter your gender">
            <input type="email" name="email" id="email" placeholder="Enter your email">
            <input type="phone" name="phone" id="phone" placeholder="Enter your phone number">
            <textarea name="desc" id="desc" cols="30" rows="10" placeholder="Enter any other information here"></textarea>
            <button class="btn">Submit</button>
        </form> 
    </div>
    <div class="footer">
        <p>Copyright @ 2020 Gymso Fitness Co. <br>Design:Tech2 etc</p>
        <a href="mailto:sathwikamadarapu@gamil.com" style="text-decoration:none;color:white"><p><i class="fa fa-envelope-o" aria-hidden="true"></i>sathwika@gmail.com<br></a>
            <a href="tel:9900334455" style="text-decoration:none;color:white"><i class="fa fa-phone" aria-hidden="true"></i>9900334455</p></a>
        
    </div>

</body>
</html>