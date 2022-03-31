<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="clientcss.css?v=<?php echo time(); ?>">
    <!-- <script src="https://cdn.tailwindcss.com"></script> -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.7.1/jquery.min.js" type="text/javascript"></script>
    <script src="https://kit.fontawesome.com/742d0b1255.js" crossorigin="anonymous"></script>
    <title>GreenPoints | Home Users  Welcome</title>
</head>

<body>

    <div class="loading">
        <i class="loader"></i>
    </div>

    <?php include 'partials/_headerClient.php' ?>

    <?php
        if(isset($_GET['signupsuccess']))
        {   
            if ($_GET['signupsuccess']=="false") {
                
                echo '<div class="alert alert-danger alert-dismissible fade show mb-0" role="alert" data-tor="show:[rotateX.from(90deg) @--tor-translateZ(-5rem; 0rem) pull.down(full)] slow">
                <strong>Sorry! </strong>'.$_GET['show'].'
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>';
            }
            else {
                echo '<div class="alert alert-success alert-dismissible fade show mb-0" role="alert" data-tor="show:[rotateX.from(90deg) @--tor-translateZ(-5rem; 0rem) pull.down(full)] slow">
                <strong>Congrats! </strong>Signed up Successfully, Your can now Login...
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>';
            }
        }
        ?>

    <?php
        if(isset($_GET['loginsuccess']))
        {   
            if ($_GET['loginsuccess']=="false") {
                
                echo '<div class="alert alert-danger alert-dismissible fade show mb-0" role="alert" data-tor="show:[rotateX.from(90deg) @--tor-translateZ(-5rem; 0rem) pull.down(full)] slow">
                <strong>Sorry! </strong>'.$_GET['loginError'].'
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>';
            }
            else {
                echo '<div class="alert alert-success alert-dismissible fade show mb-0" role="alert" data-tor="show:[rotateX.from(90deg) @--tor-translateZ(-5rem; 0rem) pull.down(full)] slow">
                <strong>Congrats! </strong>You have Logged in Successfully...
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>';
                
            }
        }
        ?>

    <?php
        if(isset($_GET['loggedinsuccess']) && $_GET['loggedinsuccess']=="false")
        {
            echo '<div class="alert alert-danger alert-dismissible fade show mb-0" role="alert" data-tor="show:[rotateX.from(90deg) @--tor-translateZ(-5rem; 0rem) pull.down(full)] slow">
            <strong>Sorry! You are not logged in </strong>'.$_GET['login_errormessage'].'
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
          </div>';
        }
        ?>

    <?php
        if(isset($_GET['loggedoutsuccess']) && $_GET['loggedoutsuccess']=="true")
        {
            echo '<div class="alert alert-danger alert-dismissible fade show mb-0" role="alert" data-tor="show:[rotateX.from(90deg) @--tor-translateZ(-5rem; 0rem) pull.down(full)] slow">
            <strong>Successfully </strong> Logged Out...
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
          </div>';
        }
        ?>

    <section id="banner_section">



        <div class="container ">
            <div class="row">
                <div class="col-md-6 d">
                    <p class="body-title">The Best Ever Organization working for ENVIRONMENT</p>
                    <hr class="w-30 ">
                    <p class="mb-4 ">Let's come together and save our mother earth and our enviroment from Global warming by planting more trees and spreading more enviromental awareness in the society.</p>
                    <a href="greenform.php"><button type="button" class="btn btn-light green-btn">Make A Green
                            Point</button></a>
                    <a href="user_previous_history.php"><button type="button" class="btn btn-light green-btn">View My
                            Tasks</button></a>

                </div>
                <!-- <div class="col-md-1 v1"> -->
                <div class="col-md-6 image-tree text-center d-none d-sm-block">

                    <img src="images/logo.png" alt="">


                </div>

            </div>
        </div>

    </section>

    <!--    services  -->
    <section class="services bg-light my-2">
        <div class="container text-center">
            <h1 class="title">WHAT WE ACTUALLY DO</h1>
            <div class="row">
                <div class="col-md-4 services">
                    <img src="images/social-media.gif" alt="">
                    <h4>Management Infrasture</h4>
                    <p>A method of monitoring and maintaining critical Information Technology (IT) infrastructure to ensure the best use of resources, protect against data loss, and monitor key aspects of local and cloud-based service utilization.</p>
                </div>

                <div class="col-md-4 services">
                    <img src="images/climate.png" alt="">
                    <h4>Helps to Rebuilt Environment</h4>
                    <p>Our goal is to connect the user to the NGO partner whose primary aim is afforestation by which we can help to rebuild our Enviroment, from something that will affect everyone eventually.</p>
                </div>

                <div class="col-md-4 services">
                    <img src="images/social-care.gif" alt="">
                    <h4>Takes care of World</h4>
                    <p>Takes best terms of services and steps to solves environmental problems & should be in endeavor to save our home from losing its stature of a habitable one by collaborating at a platform togather. </div>
            </div>
            <button type="button" class="btn btn-success">All Services</button>
        </div>

    </section>



    <!--  Why we are Here  -->
    <section id="specialities" class="bg-light ">
        <div class="container text-center">
            <h1 class="title">WHY WE ARE HERE</h1>
            <div class="row respo">
                <div class="col-md-6 ">
                    <p class="spec_title">Our Responsibilities</p>
                    <ul class="list-group list-group-flush ">
                        <li>Saving the Enviroment from its harmfull affects</li>
                        <li>Countering the rising <i><b>Global warming</b></i> </li>
                        <li>Help NGO to achieve there proactive or reactive Goals</li>
                        <li>Focus on <i><b>Enviromental</b></i> redefining </li>
                        <li>Maintain a good/responsive User-Ngo partner relationship</li>
                    </ul>
                </div>


                <div class="col-md-6 ">
                    <img src="images/task.png" alt="">
                </div>
            </div>
        </div>

    </section>


    <!-- our executives -->

    <section id="owners">
        <div class="container text-center">
            <h1 class="title">OUR EXECUTIVES</h1>
            <div class="row profile">
                <div class="col-lg-3">
                    <img class="rounded-circle" src="images/profile.png" alt="Generic placeholder image" width="140"
                        height="140">
                    <h2>Sahil Goyal</h2>
                    <p>A BCA student, Worked as Full-Stack Developer, Query Generator & Database Creation. Having Great Interest in Solving Challanging Problems on the go</p>

                </div><!-- /.col-lg-4 -->
                <div class="col-lg-3">
                    <img class="rounded-circle" src="images/profile.png" alt="Generic placeholder image" width="140"
                        height="140">
                    <h2>Kushagra Goyal</h2>
                    <p>A software associate, worked as a Full-Stack web developer, Handle Database Architecture, Security. Love to solve Challanging Coding Problems </p>

                </div><!-- /.col-lg-4 -->
                <div class="col-lg-3">
                    <img class="rounded-circle" src="images/profile.png" alt="Generic placeholder image" width="140"
                        height="140">
                    <h2>Shah Nawaz</h2>
                    <p>A BCA enthiuast who works as Front-End Development, UI/UX Design Elements and Database Connection Strategy. keen Interst to work upon new Technology.</p>

                </div><!-- /.col-lg-4 -->
                <div class="col-lg-3">
                    <img class="rounded-circle" src="images/profile.png" alt="Generic placeholder image" width="140"
                        height="140">
                    <h2>Ritika Chawla</h2>
                    <p>Another BCA enthiuast who works as Front-End Development with Elemntry part, UI/UX Design Elements & Modal Dev. Having Great Interest to learn new thinks</p>

                </div><!-- /.col-lg-4 -->
            </div>
        </div>
    </section>



    <!-- footer section -->
    <?php include 'partials/_footerClient.html' ?>





    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous">
    </script>

    <!-- Option 2: Separate Popper and Bootstrap JS -->
    <!--
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.10.2/dist/umd/popper.min.js" integrity="sha384-7+zCNj/IqJ95wo16oMtfsKbZ9ccEh31eOz1HGyDuCQ6wgnyJNSYdrPa03rtR1zdB" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.min.js" integrity="sha384-QJHtvGhmr9XOIpI6YVutG+2QOK9T+ZnN4kzFN1RtK3zEFEIsxhlmWl5/YESvpZ13" crossorigin="anonymous"></script>
    -->

    <script>
    const alerts = document.getElementsByClassName("alert");

    $(function() {
        setTimeout(function() {
            $(".alert").fadeOut(1000);
        }, 2000)
    })
    </script>

    <script>
    // for loading
    $(window).on('load', function() {
        $('.loading').fadeOut("slow");
    })
    </script>

</body>

</html>