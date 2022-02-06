<!doctype html>
<html lang="en">
<?php 
      session_start();
    ?>
<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="partnercss.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <title>Hello, world!</title>
</head>

<body>
    <section id="nav_bar1">
        <nav class="navbar navbar-expand-lg navbar-light ">
            <div class="container-fluid">
                <a class="navbar-brand" href="#"><img src="images/logo.png" alt=""></a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav"
                    aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarNav1">
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
                        <!-- <li class="nav-item">
                            <a class="nav-link ">Client</a>
                        </li> -->
                        </li>

                    </ul>
                    <div class="d-flex me-3 gate">
                      <?php
                        // echo isset($_SESSION['partnerisloggedin']);
                         if(isset($_SESSION['partnerisloggedin']) && $_SESSION['partnerisloggedin']==true)
                         {
                            echo '<a href="partials/_partnerhandlelogout.php"><button class="btn btn-light green-btn mx-2 " type="button">Logout</button></a>';
                         }
                         else
                         {
                            echo '<button class="btn btn-light green-btn mx-2" type="button" data-bs-toggle="modal"
                        data-bs-target="#loginModal">Login</button>
                        <button class="btn btn-light green-btn" type="button" data-bs-toggle="modal"
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
<?php include 'partials/_partnerLoginModal.php'; ?>
<?php include 'partials/_partnerSignupModal.php'; ?>