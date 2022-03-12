<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="clientcss.css?v=<?php echo time(); ?>">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <title>Hello, world!</title>
</head>

<body>
    <section id="nav_bar">
        <nav class="navbar navv navbar-expand-lg navbar-light ">
            <div class="container-fluid">
                <a class="navbar-brand" href="#"><img src="images/logo.png" alt=""></a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav"
                    aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse" id="navbarNav">
                    <ul class="navbar-nav me-auto mb-2 mb-lg-0 ">
                        <li class="nav-item ">
                            <a class="nav-link navbtn" href="#">Home</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link navbtn" href="#">Features</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link navbtn" href="#">Pricing</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link navbtn" href="partner.php">Partner</a>
                        </li>


                    </ul>
                    <?php
                    echo '<div class="d-flex me-3 gate">';
                    session_start();
                    if(isset($_SESSION['userisloggedin']) && $_SESSION['userisloggedin']==true)
                    {
                        $actual_loggedin_userID = $_SESSION['userid'];
                        echo '
                        
                        <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                        <img alt="SourceLink" style="height: 34px; width:34px" src="images/manprofile.png"/>
        <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle navbtn" class="dropdown-switch" id="navbarDropdownMenuLink" role="button" data-bs-toggle="dropdown" aria-expanded="false">
            '.$_SESSION['username'].'   
          </a>
          <ul class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
            <li><a class="dropdown-item" href="user_profile.php?showuserid='.$actual_loggedin_userID.'">View Profile</a></li>
            <li><a class="dropdown-item" href="greenform.php">Make Green Point</a></li>
            <li><a class="dropdown-item" href="user_previous_history.php">My Tasks</a></li>
          </ul>
        </li>
                       
        <a href="partials/_userhandlelogout.php"><button class="btn btn-light green-btn mx-2 " type="button">Logout</button></a>
                    </ul>
                    
                    ';
                        
                    }
                    
                    else
                    {
                        echo '
                        <button class="btn btn-light green-btn mx-2 " type="button" data-bs-toggle="modal"
                        data-bs-target="#loginModal">Login</button>
                        <button class="btn btn-light green-btn " type="button"  data-bs-toggle="modal"
                        data-bs-target="#signupModal">Signup</button>';

                    }
                    ?>
                </div>
            </div>
            </div>

        </nav>
    </section>

</body>
<!-- <script type="text/javascript" src="Scripts/bootstrap.min.js"></script>
<script type="text/javascript" src="Scripts/jquery-2.1.1.min.js"></script> -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous">
</script>

<!-- <script>
function droptoggle(x) {
    console.log("nkjd");
}
</script> -->

</html>
<?php include 'partials/_userSignupModal.php' ?>
<?php include 'partials/_userLoginModal.php' ?>