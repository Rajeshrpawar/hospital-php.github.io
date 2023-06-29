<!-- php code -->
<?php
session_start();
// Change this to your connection info.
$DATABASE_HOST = 'localhost';
$DATABASE_USER = 'root';
$DATABASE_PASS = '';
$DATABASE_NAME = 'hospital';
// Try and connect using the info above.
$con = mysqli_connect($DATABASE_HOST, $DATABASE_USER, $DATABASE_PASS, $DATABASE_NAME);
if ( mysqli_connect_errno() ) {
	// If there is an error with the connection, stop the script and display the error.
	exit('Failed to connect to MySQL: ' . mysqli_connect_error());
}
// Now we check if the data from the login form was submitted, isset() will check if the data exists.
if ( !isset($_POST['username'], $_POST['password']) ) {
	// Could not get the data that should have been sent.
	exit('Please fill both the username and password fields!');
}
// Prepare our SQL, preparing the SQL statement will prevent SQL injection.
if ($stmt = $con->prepare('SELECT id, password FROM accounts WHERE username = ?')) {
	// Bind parameters (s = string, i = int, b = blob, etc), in our case the username is a string so we use "s"
	$stmt->bind_param('s', $_POST['username']);
	$stmt->execute();
	// Store the result so we can check if the account exists in the database.
	$stmt->store_result();


	$stmt->close();
}
?>
<!-- php code -->

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>


    <!-- font awesome cdn link  -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">

    <!-- custom css file link  -->
    <link rel="stylesheet" href="css/style.css">

</head>

<body>
    <!-- header section starts  -->

    <header class="header">

        <a href="#" class="logo"> <i class="fas fa-heartbeat"></i> <strong>IMSRM</strong></a>

        <nav class="navbar">
            <a href="index.html">home</a>
            <a href="index.html#about">about us</a>
            <a href="index.html#courses">courses</a>
            <a href="index.html#faculty">faculty</a>
            <a href="index.html#review">review</a>
            <a href="index.html#blogs">blogs</a>
            <a href="login.html">login</a>
        </nav>

        <div id="menu-btn" class="fas fa-bars"></div>

    </header>

    <!-- header section ends -->
    <section class="appointment" id="appointment">

        <!-- <h1 class="heading" style="margin-top: 10rem;"> <span>Login</h1> -->

        <div class="row">

            <div class="image" style="margin-top: 2rem; flex:1 1 75rem;">
                <img src="image/appointment-img.svg" alt="">
            </div>

            <form action="<?php echo $_SERVER['PHP_SELF'];?>" method="post">
                <?php
                if(isset($message)) {
                    foreach($message as $message) {
                    echo'<p class ="message">'.$message.'</p>';
                    }
                }
            ?>

                <h3 class="heading"><span>Login</span> </h3>
                <!-- <p class="formtext" style=" margin-top: 3rem;">username <span>*</span></p> -->
                <input type="text" name="username" placeholder="Username" class="loginbox" style="text-align: center; margin-top: 5rem;">
                <!-- <p class="formtext">password <span>*</span></p> -->
                <input type="password" name="password" placeholder="Password " class="loginbox" style="text-align: center; margin-top: 2rem;">
                <!-- <input type="email" name="email" placeholder="your email" class="box">
                <input type="date" name="date" class="box"> -->
                <div style="margin-top: 5rem;">

                    <input type="submit" name="submit" value="LOGIN NOW" class="btn">
                </div>
            </form>

        </div>

    </section>

        <!-- footer section starts  -->

        <section class="footer">

            <div class="box-container">
    
                <!-- <div class="box">
                    <h3>quick links</h3>
                    <a href="#home"> <i class="fas fa-chevron-right"></i> home </a>
                    <a href="#about"> <i class="fas fa-chevron-right"></i> about </a>
                    <a href="#services"> <i class="fas fa-chevron-right"></i> services </a>
                    <a href="#doctors"> <i class="fas fa-chevron-right"></i> doctors </a>
                    <a href="#appointment"> <i class="fas fa-chevron-right"></i> appointment </a>
                    <a href="#review"> <i class="fas fa-chevron-right"></i> review </a>
                    <a href="#blogs"> <i class="fas fa-chevron-right"></i> blogs </a>
                </div> -->
    
                <div class="box">
                    <h3>Diploma Courses</h3>
                    <a href="AdvanceCourses/CriticalCare.html"> <i class="fas fa-chevron-right"></i> Critical Care </a>
                    <a href="AdvanceCourses/ChildHealthCareManagement.html"> <i class="fas fa-chevron-right"></i> Child Health Care Management </a>
                    <a href="AdvanceCourses/MaternityHealthCareManagement.html"> <i class="fas fa-chevron-right"></i> Maternity Health Care Management </a>
                    <a href="AdvanceCourses/Diabetology.html"> <i class="fas fa-chevron-right"></i> Diabetology </a>
                    <a href="AdvanceCourses/EmergencyMedicalServices.html"> <i class="fas fa-chevron-right"></i> Emergency Medical Services </a>
                </div>
    
                
                <div class="box">
                    <h3>Certificate Courses</h3>
                    <a href="CertificateCourses/CSVD.html"> <i class="fas fa-chevron-right"></i> Skin And Venereal Disease (CSVD) </a>
                    <a href="CertificateCourses/ChildHealth.html"> <i class="fas fa-chevron-right"></i> Child Health </a>
                    <a href="CertificateCourses/CGO.html"> <i class="fas fa-chevron-right"></i> Gynecology And Obstetrics (CGO) </a>
                    <!-- <a href="#"> <i class="fas fa-chevron-right"></i> diagnosis </a>
                    <a href="#"> <i class="fas fa-chevron-right"></i> ambulance service </a> -->
                </div>
    
    
                <div class="box">
                    <h3>Contact info</h3>
                    <a href="#"> <i class="fas fa-phone"></i> +8801688238801 </a>
                    <a href="#"> <i class="fas fa-phone"></i> +8801782546978 </a>
                    <a href="#"> <i class="fas fa-envelope"></i> wincoder9@gmail.com </a>
                    <a href="#"> <i class="fas fa-envelope"></i> sujoncse26@gmail.com </a>
                    <a href="#"> <i class="fas fa-map-marker-alt"></i> </a>
                </div>
    
                <div class="box">
                    <h3>follow us</h3>
                    <!-- <a href="#"> <i class="fab fa-faceappointment-f"></i> faceappointment </a> -->
                    <a href="#"> <i class="fab fa-twitter"></i> twitter </a>
                    <!-- <a href="#"> <i class="fab fa-twitter"></i> twitter </a> -->
                    <a href="#"> <i class="fab fa-instagram"></i> instagram </a>
                    <a href="#"> <i class="fab fa-linkedin"></i> linkedin </a>
                    <!-- <a href="#"> <i class="fab fa-pinterest"></i> pinterest </a> -->
                </div>
    
            </div>
    
            <div class="credit"> created by <span>Rajesh</span> | all rights reserved </div>
    
        </section>
    
        <!-- footer section ends -->

    <script src="js/script.js"></script>
</body>

</html>