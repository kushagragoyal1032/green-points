<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="partnercss.css?v=<?php echo time(); ?>">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.7.1/jquery.min.js" type="text/javascript"></script>

    <title>Hello, world!</title>
</head>

<body>
    <!-- <section id="nav_bar">
        <nav class="navbar navbar-expand-lg navbar-light ">
            <div class="container-fluid">
                <a class="navbar-brand" href="#"><img src="images/logo.png" alt=""></a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav"
                    aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarNav">
                    <ul class="navbar-nav ml-auto">
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
                            <a class="nav-link ">Disabled</a>
                        </li>
                    </ul>
                </div>
            </div>
        </nav>
    </section>  -->
    <?php include 'partials/_headerPartner.php' ?> 


    <?php
        if(isset($_GET['psignupsuccess']))
        {   
            if ($_GET['psignupsuccess']=="false") {
                
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
        if(isset($_GET['ploginsuccess']))
        {   
            if ($_GET['ploginsuccess']=="false") {
                
                echo '<div class="alert alert-danger alert-dismissible fade show mb-0" role="alert" data-tor="show:[rotateX.from(90deg) @--tor-translateZ(-5rem; 0rem) pull.down(full)] slow">
                <strong>Sorry! </strong>'.$_GET['ploginError'].'
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
        if(isset($_GET['Ploggedinsuccess']) && $_GET['Ploggedinsuccess']=="false")
        {
            
                echo '<div class="alert alert-danger alert-dismissible fade show mb-0" role="alert" data-tor="show:[rotateX.from(90deg) @--tor-translateZ(-5rem; 0rem) pull.down(full)] slow">
                <strong>Sorry! You are not logged in </strong>'.$_GET['Plogin_errormessage'].'
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>';
        }
        ?>

    <?php
        if(isset($_GET['ploggedoutsuccess']) && $_GET['ploggedoutsuccess']=="true")
        {
            echo '<div class="alert alert-danger alert-dismissible fade show mb-0" role="alert" data-tor="show:[rotateX.from(90deg) @--tor-translateZ(-5rem; 0rem) pull.down(full)] slow">
            <strong>Successfully </strong> Logged Out...
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
          </div>';
        }
        ?>



    <!--    banner  -->
    <section id="banner_section1">
        <div class="container ">
            <div class="row">
                <div class="col-md-6 d">
                    <p class="body-title">The Best Ever Organization works for ENVIRONMENT</p>
                    <hr class="w-30 ">
                    <p>Lorem, ipsum dolor sit amet consectetur adipisicing elit. Quaerat
                        corrupti modi ratione aliquam quae vero fuga atque at laudantium nemo? Excepturi non quisquam
                        praesentium aperiam corrupti laudantium quos totam perferendis.</p>
                        <a href="partner_previous_history.php"> <button type="button" class="btn btn-light green-btn">Take My Case</button></a>
                </div>
                <!-- <div class="col-md-1 v1"> -->
                <div class="col-md-6 image-tree text-center d-none d-sm-block">

                    <img src="images/logo.png" alt="">


                </div>

            </div>
        </div>

        <!-- <img src="/images/wave1.png" class="bottom_wabe" alt=""> -->
    </section>

    <!--    services  -->
    <section class="services bg-light my-2">
        <div class="container text-center">
            <h1 class="title">WHAT WE ACTUALLY DO</h1>
            <div class="row">
                <div class="col-md-4 services">
                    <img src="images/management.png" alt="">
                    <h4>Management Infrasture</h4>
                    <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Alias, temporibus quis reborum fuga
                        earumtibus Lorem ipsum dolor sit amet, consectetur adipisicing elit. Quoue cum modi in.
                    </p>
                </div>

                <div class="col-md-4 services">
                    <img src="images/climate.png" alt="">
                    <h4>Help to Rebuilt Environment</h4>
                    <p>Lortetur adipisicing elit. Alias, temporibus quis rerum culpa quaerat autem laborum fuga earum
                        necessitatibus Lorem ipsum dolor sit amet consectetur adipisicing elit. iciis est.</p>
                </div>

                <div class="col-md-4 services">
                    <img src="images/management.png" alt="">
                    <h4>Management Infrasture</h4>
                    <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Alias, temporibus quim fuga etqueum fuga
                        delectus, saepe quos voluptas odit suscipit! Cumque, facere nihil?</p>
                </div>
            </div>
            <button type="button" class="btn btn-success">All Services</button>
        </div>

    </section>



    <!--  Why we are Here  -->
    <section id="specialities1" class="bg-light ">
        <div class="container text-center">
            <h1 class="title">WHY WE ARE HERE</h1>
            <div class="row respo">
                <div class="col-md-6 ">
                    <p class="spec_title">Our Responsibilities</p>
                    <ul class="list-group list-group-flush ">
                        <li>Cras justo odio</li>
                        <li>Dapibus ac facilisis in</li>
                        <li>Morbi leo risus</li>
                        <li>Porta ac consectetur ac</li>
                        <li>Vestibulum at eros</li>
                    </ul>
                </div>


                <div class="col-md-6 ">
                    <img src="images/task.png" alt="">
                </div>
            </div>
        </div>

    </section>


    <!-- our executives -->

    <section id="owners1">
        <div class="container text-center">
            <h1 class="title">OUR EXECUTIVES</h1>
            <div class="row profile">
                <div class="col-lg-4">
                    <img class="rounded-circle" src="images/profile.png" alt="Generic placeholder image" width="140"
                        height="140">
                    <h2>Sahil Goyal</h2>
                    <p>Donec sed odio dui. Etiam porta sem malesuada magna mollis euismod. Nullam id dolor id nibh
                        ultricies vehicula ut id elit. Morbi leo risus, porta ac consectetur ac, vestibulum at eros.
                        Praesent commodo cursus magna.</p>

                </div><!-- /.col-lg-4 -->
                <div class="col-lg-4">
                    <img class="rounded-circle" src="images/profile.png" alt="Generic placeholder image" width="140"
                        height="140">
                    <h2>Kushagra Goyal</h2>
                    <p>Duis mollis, est non commodo luctus, nisi erat porttitor ligula, eget lacinia odio sem nec elit.
                        Cras mattis consectetur purus sit amet fermentum. Fusce dapibus, tellus ac cursus commodo,
                        tortor mauris condimentum nibh.</p>

                </div><!-- /.col-lg-4 -->
                <div class="col-lg-4">
                    <img class="rounded-circle" src="images/profile.png" alt="Generic placeholder image" width="140"
                        height="140">
                    <h2>Shah Nawaz</h2>
                    <p>Donec sed odio dui. Crus ac cursuas justo odio, dapibus ac facilisis in, egestas eget quam. Vesus
                        ac cursutibulum id dimeus ac cursuus ac cursuntuuus ac cursus ac cursum nibh, ut fermentum massa
                        justo sit amet risus.</p>

                </div><!-- /.col-lg-4 -->
            </div>
        </div>
    </section>



    <!-- footer section -->
    <?php include 'partials/_footerPartner.html' ?>

  
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p"
        crossorigin="anonymous"></script>


    <script>
        const alerts = document.getElementsByClassName("alert");
        // setTimeout(function(){
        //     alerts.style.display='none';
        // }, 500);
        //     console.log("hello");

        // $("#ss").delay(0).hide(0);
        // $('#ss').delay(1000).fadeOut(300); 

        $(function() {
        setTimeout(function() { $(".alert").fadeOut(1000); }, 1200)
        })
    </script>

    
</body>

</html>