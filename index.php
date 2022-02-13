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
    <!-- <link rel="stylesheet" href="path/to/font-awesome/css/font-awesome.min.css"> -->
    <title>My, world!</title>
</head>

<body>
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
                    <p class="body-title">The Best Ever Organization works for ENVIRONMENT</p>
                    <hr class="w-30 ">
                    <p class="mb-4 ">Lorem, ipsum dolor sit amet consectetur adipisicing elit. Quaerat
                        corrupti modi ratione aliquam quae vero fuga atque at laudantium nemo? Excepturi non quisquam
                        praesentium aperiam corrupti laudantium quos totam perferendis.</p>
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
    <section id="specialities" class="bg-light ">
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

    <section id="owners">
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
    <?php include 'partials/_footerClient.html' ?>





    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous">
    </script>

    <!-- Option 2: Separate Popper and Bootstrap JS -->
    <!--
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.10.2/dist/umd/popper.min.js" integrity="sha384-7+zCNj/IqJ95wo16oMtfsKbZ9ccEh31eOz1HGyDuCQ6wgnyJNSYdrPa03rtR1zdB" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.min.js" integrity="sha384-QJHtvGhmr9XOIpI6YVutG+2QOK9T+ZnN4kzFN1RtK3zEFEIsxhlmWl5/YESvpZ13" crossorigin="anonymous"></script>
    -->
</body>

</html>