<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="about_us.css?v=<?php echo time(); ?>">
    <!-- <script src="https://cdn.tailwindcss.com"></script> -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.7.1/jquery.min.js" type="text/javascript"></script>
    <script src="https://kit.fontawesome.com/742d0b1255.js" crossorigin="anonymous"></script>
    <title>About Us | GreenPoints</title>
</head>

<body>

    <div class="loading">
        <i class="loader"></i>
    </div>

    <?php include 'partials/_headerClient.php' ?>





    <section>

        <div id="carouselExampleCaptions" class="carousel slide" data-bs-ride="carousel">
            <div class="carousel-indicators">
                <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="0" class="active"
                    aria-current="true" aria-label="Slide 1"></button>
                <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="1"
                    aria-label="Slide 2"></button>
                <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="2"
                    aria-label="Slide 3"></button>
            </div>
            <div class="carousel-inner">
                <div class="carousel-item active">
                    <img src="images/windmill.jpg" class="d-block w-100" alt="...">
                    <div class="carousel-caption d-none d-md-block">
                        <h3>ABOUT US</h3>
                        <p>We build Awesome, Create Awesome & Execute Awesome | We are on the way to archive better</p>
                    </div>
                </div>
                <div class="carousel-item">
                    <img src="images/mountain.jpg" class="d-block w-100" alt="...">
                    <div class="carousel-caption d-none d-md-block">
                        <h3>WHO WE ARE</h3>
                        <p>We are GreenPoints, Works for promote afforestation | Collaborate community by making
                            Connection at one Place</p>
                    </div>
                </div>
                <div class="carousel-item">
                    <img src="images/sky.jpg" class="d-block w-100" alt="...">
                    <div class="carousel-caption d-none d-md-block">
                        <h3>WHAT IS OUR AIM</h3>
                        <p>We are connected with major Organizations | Assign the ask and make them complete</p>
                    </div>
                </div>
            </div>
            <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleCaptions"
                data-bs-slide="prev">
                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Previous</span>
            </button>
            <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleCaptions"
                data-bs-slide="next">
                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Next</span>
            </button>
        </div>
    </section>

    <!--  Why we are Here  -->
    <section id="specialities" class="bg-light ">
        <div class="container text-left">
            <h1 class="title1">OUR STORY | WHAT WE DO</h1>
            <div class="row">
                <div class="col-md-7 ">
                    <p class="desc">We are connected with major Organizations | Assign the ask and make them complete Lorem ipsum dolor sit amet consectetur adipisicing elit. Odio labore placeat laborum doloremque, quaerat reiciendis a recusandae quos culpa tenetur vel sed reprehenderit, quis perferendis eos! Animi illo nostrum fugiat delectus dolorem fuga, ipsum non accusamus earum labore exercitationem excepturi obcaecati dolores nobis magni, esse corporis laudantium ipsam, unde incidunt cum perferendis. Lorem ipsum dolor sit amet, consectetur adipisicing elit. Cum laboriosam hic beatae id culpa facere explicabo tenetur omnis? Nulla, mollitia.</p>
                    </ul>
                </div>
                <div class="col-md-5">
                    <img class="gr_img" src="images/untrain.jpg" alt="">
                </div>
            </div>
        </div>
    </section>
    <hr class="mt-5">
    <section id="specialities" class="bg-light mb-5">
        <div class="container text-left">
            <h1 class="title2">VISION AND MISSION</h1>
            <div class="row">
            <div class="col-md-5">
                    <img class="gr_img" src="images/unfuture.jpg" alt="">
                </div>
                <div class="col-md-7 ">
                    <p class="desc">We are connected with major Organizations | Assign the ask and make them complete Lorem ipsum dolor sit amet consectetur adipisicing elit. Odio labore placeat laborum doloremque, quaerat reiciendis a recusandae quos culpa tenetur vel sed reprehenderit, quis perferendis eos! Animi illo nostrum fugiat delectus dolorem fuga, ipsum non accusamus earum labore exercitationem excepturi obcaecati dolores nobis magni, esse corporis laudantium ipsam, unde incidunt cum perferendis. Lorem ipsum dolor sit amet, consectetur adipisicing elit. Cum laboriosam hic beatae id culpa facere explicabo tenetur omnis? Nulla, mollitia.</p>
                    </ul>
                </div>
                
            </div>
        </div>
    </section>
<hr>
    <section >
        <div class="container my-5">
        <h1 class="title3">FUTURE PLANS</h1>

            <div class="row">
                <div class="col-md-4">
                    <div class="card" style="width: 22rem;">
                    <img src="images/unforest.jpg" class="card-img-top" alt="...">
                    <div class="card-body">
                    <h5 class="card-title text-center">Planning & Analysis</h5>
                        <p class="card-text desc1">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
                    </div>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="card" style="width: 22rem;">
                    <img src="images/unoptimize.jpg" class="card-img-top" alt="...">
                    <div class="card-body ">
                    <h5 class="card-title text-center">Implementation</h5>
                        <p class="card-text desc1">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
                    </div>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="card" style="width: 22rem;">
                    <img src="images/unmountain.jpg" class="card-img-top" alt="...">
                    <div class="card-body">
                    <h5 class="card-title text-center">Optimization</h5>
                        <p class="card-text desc1">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
                    </div>
                    </div>
                </div>
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
    // for loading
    $(window).on('load', function() {
        $('.loading').fadeOut("slow");
    })
    </script>




</body>

</html>