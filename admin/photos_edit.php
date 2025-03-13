<?php include 'include/init.php'; ?>
<?php


    if (!isset($_SESSION['id'])) { redirect_to("../"); }
    $gallery = Gallery::find_by_id($_GET['id']);
    $booking = Booking::find_booking_all();
      
    if (isset($_POST['submit']) || isset($_FILES['file'])) {


        $gallery->alternate_text = clean($_POST['alternate_text']);
   

        if(empty($_FILES['file'])) {
          $gallery->save();
          redirect_to("photos_view.php");
          $session->message("The photo has been updated");
        } else {
          $gallery->set_file($_FILES['file']);
          $gallery->save_image();
          $gallery->save();
          // redirect_to("edit_user.php?id={$room->id}");
          $session->message("
            <div class=\"alert alert-success alert-dismissible fade show\" role=\"alert\">
              <strong><i class='mdi mdi-check'></i></strong>The {$gallery->title} is successfully updated.
              <button type=\"button\" class=\"close\" data-dismiss=\"alert\" aria-label=\"Close\">
                <span aria-hidden=\"true\">&times;</span>
              </button>
            </div>");
          redirect_to("photos_view.php");
        }
    }
?>
<?php $users_profile = Users::find_by_id($_SESSION['id']); ?>
    <!doctype html>
    <html lang="en">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <title>Upload Photos - Administrator</title>
        <link href="css/bootstrap.min.css" rel="stylesheet">
        <link href="css/dashboard.css" rel="stylesheet">
        <link rel="stylesheet" type="text/css" href="https://cdn.materialdesignicons.com/2.1.19/css/materialdesignicons.min.css">
        <link href="https://fonts.googleapis.com/css?family=Roboto:400,500,700" rel="stylesheet">
        <link rel="stylesheet" href="css/dropzone.css">
        <style>
            body {
                margin-bottom: 2%;
            }
            .box-shadow {
                box-shadow: 0 0 2px 1px rgba(0, 0, 0, 0.3);
                font-size: 12px;
            }
            .form-control {
                font-size: 12px;
            }
            .datepicker {
                font-size: 12px;
            }
            .btn.btn-light.btn-sm {
                color: #212529;
                background-color: #dae0e5;
                border-color: #d3d9df;
                font-size: 13px;
            }
            .btn.btn-danger.btn-sm {
                font-size: 13px;
            }
        </style>
    </head>

<body>

<?php include_once 'include/sidebar.php'; ?>

    <div class="container">
    
        <div class="row">

            <div class="col-lg-8 pl-3 pb-3 box-shadow mt-4 pt-3">
                <h5>Edit Image</h5>
                <?= (isset($msg) ? $msg : ''); ?>
                <form method="post" action="" enctype="multipart/form-data">
                
                 
                    <div class="form-group">
                       <label for="">Alternate Text:</label>
                       <input type="text" name="alternate_text" value="<?= $gallery->alternate_text; ?>" class="form-control" placeholder="Enter text">
                   </div>
             
                   </div>
                   <div class="form-group">
                       <input type="file" name="file">
                   </div>
                   <input type="submit" name="submit" value="Edit" class="btn btn-light btn-sm">
                   <input type="reset" name="Clear" class="btn btn-danger btn-sm">
                   <a href="photos_view.php" class="btn btn-light btn-sm float-right">Back</a>
                </form><!-- end of input form -->
            </div>
            <style>
                .photos-view {
                    /*width: 400px;*/
                }
            </style>
            <div class="col-lg-4">
                <div class="photos-view mt-4">
                    <div class="card" style="width: 100%;">
                      <img class="card-img-top" src="<?= $gallery->picture_path(); ?>" alt="Card image cap">
                      
                      <ul class="list-group list-group-flush">
                        <li class="list-group-item"><i class="mdi mdi-file-document"></i> File name: <?= $gallery->filename; ?></li>
                        <li class="list-group-item"><i class="mdi mdi-file-document"></i> File size: <?= formatBytes($gallery->size); ?></li>
                        <li class="list-group-item"><i class="mdi mdi-file-document"></i> File Type: <?= $gallery->type; ?></li>
                      </ul>
                     
                    </div>
                </div>    
            </div>

        </div>
    </div>



<?php include_once 'include/footer.php';?>
