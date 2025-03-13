<?php include 'admin/include/init.php'; ?>
<?php
$id = $_GET['id'];
$blogspot = EventWedding::find_by_id($id);

?>
<!doctype html>
<html lang="en">
<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Blogs</title>
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
       

      img.img-fluid.img-custom {
            width: 354px;
            height:350px;
        }
       
    </style>
</head>
<body>

<?php include 'include/nav.php'; ?>
<br><br>
<div class="container">

    <div class="row">

        <div class="col-md-12 p-0" style="margin-bottom: 20px;"> <!-- border:1px solid rgba(0,0,0,.125) -->
            
            <h2 class="h2 text-uppercase text-center mb-4" style="font-family: calibri, sans-serif;"><b><?= $blogspot->wedding_type; ?></b></h2>
            <div class="text-center">
                <img src="admin/<?= $blogspot->preview_image_picture(); ?>" class="img-fluid rounded-circle" style="width:350px;height:350px;" alt="">
            </div>
            <h5 class="h5 text-uppercase text-center mt-3" style="font-size:22px; font-family: calibri, sans-serif;"><b><?= $blogspot->title; ?></b></h5>
            <div class="font-weight-light text-center mb-3" style="font-size:18px; font-family: calibri, sans-serif;"><strong><i class="mdi mdi-map-marker"></i><?= $blogspot->location; ?></strong></div>
           <p class="text-center" style="font-size: 20px; font-family: calibri, sans-serif;"><i><?= $blogspot->description; ?></i>❤️</p>


        </div><!-- end of col-md-8 p-0 pl-3 -->
    </div>
</div><!-- end of container -->



<!-- Optional JavaScript -->
<!-- jQuery first, then Popper.js, then Bootstrap JS -->
<script src="js/jquery-3.2.1.slim.min.js"></script>
<script src="js/jquery.min.js"></script>
<script src="js/popper.min.js"></script>
<script src="js/bootstrap.min.js"></script>
<script src="js/bootstrap-datepicker.min.js"></script>

<script>

    $(document).ready(function () {
        $('#wedding_date').datepicker();
    });
</script>
</body>
</html>