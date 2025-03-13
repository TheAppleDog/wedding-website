<?php include 'admin/include/init.php'; ?>

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
.glass-effect-container {
    position: relative;
    display: inline-block;
 background-color: rgba(12, 12,12, 0.7); /* Darker black glass effect */
}

.glass-image {
    width: 1600px;
    height: 700px;
    filter: blur(2.5px); 
}

.glass-overlay {
    position: absolute;
    top: 0;
    left: 0;
    width: 100%;
    height: 100%;    
}


.text-overlay {
    position: absolute;
    top: 50%;
    left: 50%;
    transform: translate(-50%, -50%);
    padding: 20px;
    margin-top: -25px;
    border-radius: 10px;    
}

.overlay-text {
    color: white;
    font-family: 'Lucida Handwriting', sans-serif;
    font-weight: bold;
    font-size: 60px;
    text-align: center;
}

.contact-form {
    background-color: #f9f9f9;
    padding: 20px;
    border-radius: 8px;
    width: 750px;
    box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
    margin: 0 60px; /* Adds space from left and right margins */
}

.information {
    background-color: #fff;
    border-radius: 8px;
    box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
    padding: 20px;
    margin-right: 60px; /* Add space on the right margin */
}

.contact-details {
    margin-top: 20px;
}

.contact-details span {
    font-weight: bold;
    color: #333;
}

.contact-details p {
    margin-top: 5px;
    color: #666;
}


</style>
</head>
<body>
<?php include 'include/nav.php'; ?> 


<div class="glass-effect-container">
    <img src="images/ban.jpg" alt="" class="glass-image" style="width: 1600px; height:600px;>
    <div class="glass-overlay"></div>
    <div class="text-overlay">
        <p class="overlay-text">Let's talk</p>
    </div>
</div>

<br><br><br><br>


<section id="content" class="section-padding">
    <div class="containers">
        <div class="row">
            <div class="col-lg-8 col-md-8 col-xs-12">

                <form class="contact-form" action="" autocomplete="off">
                    <h2 class="contact-title">Send us a message</h2>
                    <div class="row">
                        <div class="col-md-12">

                            <div class="row">
                                <div class="col-lg-4 col-md-12 col-sm-12 col-xs-12">
                                    <div class="form-group">
                                        <input type="text" class="form-control" id="name" required name="name" placeholder="Name" required data-error="Please enter your name">
                                        <div class="help-block with-errors"></div>
                                    </div>
                                </div>
                                <div class="col-lg-4 col-md-12 col-sm-12 col-xs-12">
                                    <div class="form-group">
                                        <input type="email" name="email" class="form-control" id="email" required placeholder="Email" required data-error="Please enter your email">
                                        <div class="help-block with-errors"></div>
                                    </div>
                                </div>
                                <div class="col-lg-4 col-md-12 col-sm-12 col-xs-12">
                                    <div class="form-group">
                                        <input type="text" class="form-control" id="msg_subject" required name="phone" placeholder="Phone" required data-error="Please enter your phone">
                                        <div class="help-block with-errors"></div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-12 col-md-12 col-lg-12">
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <textarea class="form-control" placeholder="Message" name="message" required rows="7" data-error="Write your message" required></textarea>
                                        <div class="help-block with-errors"></div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-12">
                            <button type="submit" class="btn btn-common" style="background-color:#FF3BB7; color:white;"><b>Send Now</b></button>
                            <div id="msgSubmit" class="h3 text-center hidden"></div>
                            <div class="clearfix"></div>
                        </div>
                    </div>
                </form>
            </div> 
            <div class="col-lg-4 col-md-4 col-xs-12">

                <div class="information">
                    <h3>Contact Info</h3>
                    <div class="contact-details">

                        <div><span>Address : </span><p><?php echo "G-101 sundaram residency, bharuch, Gujarat 392015"; ?></p></div>
                        <div><span>Email : </span><p><?php echo "khushikulkarni24@gmail.com"; ?></p></div>
                        <div><span>Phone : </span><p><?php echo "9601943908"; ?></p></div>

                    </div>
                </div>
            </div>
       </div>
    </div>
</section>
<br><br><br><br>
<?php include 'include/footer.php'; ?>

</body>
</html>