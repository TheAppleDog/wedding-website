<?php include 'admin/include/init.php'; 
    $gallery = Gallery::find_all(); 
?>

<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Celestial Wedding Hub Bliss</title>
    <link href="https://fonts.googleapis.com/css?family=Open+Sans|Roboto" rel="stylesheet">
<script src="https://kit.fontawesome.com/741424920c.js" crossorigin="anonymous"></script>
    <link rel="stylesheet" type="text/css"
       <link
      rel="stylesheet"
      href="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.css"/>   
 <link
      rel="stylesheet"href="https://cdn.materialdesignicons.com/2.1.19/css/materialdesignicons.min.css">
    <link rel="stylesheet" href="css/bootstrap.min.css">
<link rel="stylesheet" href="include/footer.css">
<link rel="stylesheet" href="nav.css">
    <link rel="stylesheet" href="css/bootstrap-datepicker.css">
    
    <style>
          .background-image {
            width: 100%;
            height: 100vh; /* Set height to viewport height */
            display: block;
            object-fit: cover; /* Maintain aspect ratio and cover the entire container */
        }
.swiper-wrapper {
    width: 20%;
    height: 500px; /* Set the height as needed */
}

.swiper-slide {
    background-position: center;
    background-size: cover;
    width: 135% !important; /* Make each slide take 15% of the width */
    height: 95% !important; /* Set the height as needed */
}

       .glass-effect {
    background: rgba(255, 182, 193, 0.3);
    padding: 20px;
    margin: 430px 0 0;
    margin-left:300px;
    margin-right:300px;
    margin-bottom:160px;
    border-radius: 10px;
    backdrop-filter: blur(10px);
    box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
    position: absolute;
    inset: 0; /* Set top, right, bottom, left to 0 */
    align-items: center;
    justify-content: center;
}
    </style>
</head>
<body>
<?php include 'include/nav.php'; ?>                   
                    <?php
                        if ($session->message()) {
                            echo $session->message();
                        }
                    ?> <img class="background-image" src="https://assets-global.website-files.com/60829aab76a98d17b68f30ae/63e0a5fc6aaa511e9d920fce_Indian%20Wedding%20Planning%20Guide%20shaadivaale.jpeg" alt="Background Image">

       <div class="glass-effect">
        <h1 style="color:black; font-weight:bold; text-align: center; ">Welcome to Celestial Wedding Hub Bliss</h1>
        <p style="color:black; font-weight:bold; font-size:15px; text-align: center;">Your premier destination for exquisite wedding planning services.</p>
        <!-- Add more content as needed -->
    </div>
            <br><br>       
 <!-- Wedding Planner Content -->
        <h2 style="color:black; font-weight:bold; text-align: center; ">Our Promise</h2>
        <p style="color:black; font-weight:bold; font-size:16px; text-align: center;">We bring a fresh perspective to wedding planning, infusing creativity into every aspect. <br>From the theme to the decor, we're here to ensure that your wedding is a true reflection of your style and personality.</p><br>
<p style="color:black; font-weight:bold; font-size:16px; text-align: center;">Say goodbye to wedding planning stress!<br>Our dedicated team is committed to handling all the details, leaving you free to enjoy the excitement and anticipation of your big day.</p><br><br>
   <div class="swiper">
      <div class="swiper-wrapper">
 <?php foreach($gallery as $galleries) : ?>
        <div
          class="swiper-slide"><img class="card-img-top" src="admin/<?= $galleries->picture_path(); ?>" alt="Card image cap"></div>
        <?php endforeach; ?>
      </div>
    </div><br><br>
 <h2 style="color:black; font-weight:bold; text-align: center; ">Start your journey with us</h2><p style="color:black; font-weight:bold; font-size:16px; text-align: center;">Ready to embark on the exciting journey of planning your wedding?<br>Contact us to schedule a complimentary consultation. We look forward to getting to know you,<br> hearing your story, and working together to create a wedding day that exceeds your expectations.</p><br><br><br><br>

<?php include 'include/footer.php'; ?>
<script type="module" src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.esm.js"></script>
<script nomodule src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.js"></script>
<script type="module" src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.esm.js"></script>
<script nomodule src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.js"></script>
    <script>
var swiper = new Swiper(".swiper", {
  effect: "coverflow",
  grabCursor: true,
  loop: true,
  loopAdditionalSlides: 2, // Adjust the number as needed
  preloadImages: true,
  lazy: {
    enabled: true,
    loadPrevNext: true,
  },
  centeredSlides: true,
  slidesPerView: 3,
  speed: 600,
  coverflowEffect: {
    rotate: 50,
    stretch: 0,
    depth: 100,
    modifier: 1,
    slideShadows: true,
  },
  loop: true,
});</script>
<script src="js/jquery-3.2.1.slim.min.js"></script>
<script src="js/jquery.min.js"></script>
<script src="js/popper.min.js"></script>
<script src="js/bootstrap.min.js"></script>
</body></html>