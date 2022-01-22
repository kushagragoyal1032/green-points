<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="clientcss.css">
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
                    <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                        <li class="nav-item">
                            <a class="nav-link" href="#">Home</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#">Features</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#">Pricing</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="partner.php">Partner</a>
                        </li>
                        </li>

                    </ul>
                    <?php
                    echo '<div class="d-flex me-3 gate">';
                    session_start();
                    if(isset($_SESSION['userisloggedin']) && $_SESSION['userisloggedin']==true)
                    {
                        $actual_loggedin_userID = $_SESSION['userid'];
                        echo '<a href="partials/_userhandlelogout.php"><button class="btn btn-light green-btn mx-2 " type="button">Logout</button></a>';
                    }
                    
                    else
                    {
                        echo '<button class="btn btn-light green-btn mx-2 " type="button" data-bs-toggle="modal"
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


</html>
<?php include 'partials/_userSignupModal.php' ?>
<?php include 'partials/_userLoginModal.php' ?>