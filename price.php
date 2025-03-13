<?php include 'admin/include/init.php'; ?>
<?php 
$category = Category::find_all();
?>
<!doctype html>
<html lang="en">
<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Celestia Wedding Hub Bliss</title>
<script src="https://kit.fontawesome.com/741424920c.js" crossorigin="anonymous"></script>
    <link href="https://fonts.googleapis.com/css?family=Open+Sans|Roboto" rel="stylesheet">
    <link rel="stylesheet" type="text/css"          href="https://cdn.materialdesignicons.com/2.1.19/css/materialdesignicons.min.css">
    <link rel="stylesheet" href="css/bootstrap.min.css">
<link rel="stylesheet" href="include/footer.css">
    <link rel="stylesheet" href="nav.css">
    
    <style>
    
.card-container {
        display: flex;
        flex-wrap: wrap;
        justify-content: space-between;
        margin-left: -10px !important; /* Adjust margin as needed */
    }
    .card {
        width: calc(33.33% - 20px);
        margin: 10px;
        box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        overflow: hidden;
        transition: transform 0.3s ease-in-out;
        cursor: pointer;
    }

.special-card {
        width: calc(33.33% - 20px);
       margin: 10px;
    margin-left: 170px;
    }

    .card:hover {
        transform: scale(1.05);
    }

    .card img {
        width: 100%;
        height: 370px;
        object-fit: cover;
    }

    .card-content {
        padding: 15px;
        text-align: center;
    }

    .card-title {
        font-size: 18px;
        font-weight: bold;
        margin-bottom: 10px;
    }

    .card-description {
        font-size: 14px;
        margin-bottom: 15px;
    }

    .hover-button {
        display: inline-block;
        padding: 8px 15px;
        background-color: #3498db;
        color: #fff;
        text-decoration: none;
        border-radius: 5px;
        transition: background-color 0.3s ease-in-out;
    }

    .hover-button:hover {
        background-color: #2980b9;
    }
</style>
</head>
<body>
<?php include 'include/nav.php'; ?>

<div class="container" style="width: 70%; font-family: Arial, sans-serif;font-family: Arial, sans-serif;">
<br><br><br>
    <h2 style="text-align:center; font-weight:bold;">Discover Your Perfect Wedding Package</h2><br>
<p style="font-size:18px;">Explore our exclusive wedding packages, each crafted with precision and attention to detail. From intimate gatherings to grand celebrations, we have a package to suit every taste and budget. Our experienced team is dedicated to making your special day truly memorable.</p>
<p style="font-size:18px;">Choose from a range of meticulously designed wedding packages, each offering a distinctive blend of elegance, sophistication, and personalization. Whether you envision a fairy-tale romance, a traditional ceremony, or a contemporary celebration, Celestia Wedding Hub Bliss has the perfect package for you.</p>

<p style="font-size:18px;">Scroll down to explore our featured wedding packages, and embark on the journey to creating cherished memories that will last a lifetime.</p>
  <div class="row">
        <?php foreach ($category as $cat): ?>
            <div class="card ">
                <img src="admin/<?php echo $cat->preview_image_picture(); ?>" alt="">
                <div class="card-content">
                    <div class="card-title" style="font-weight:bold;"><?php echo $cat->wedding_type; ?></div>
<div class="card-price" style="font-weight:bold; font-size:18px;">₹ <?php echo $cat->price; ?></div>
                    <div class="card-description"><?php echo $cat->caption; ?></div>
                    <a href="package_details.php?id=<?php echo $cat->id; ?>" class="hover-button" style="background-color:#fF3b77; font-weight:bold; color:white;">VIEW DETAILS</a>
                </div>
            </div>
        <?php endforeach; ?>
    </div>

</div><br><br><br><br><br>
<?php include 'include/footer.php'; ?>
<script src="js/jquery-3.2.1.slim.min.js"></script>
<script src="js/jquery.min.js"></script>
<script src="js/popper.min.js"></script>
<script src="js/bootstrap.min.js"></script>
</body>
</html>