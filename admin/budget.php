<?php include 'include/init.php'; ?>

<?php
    if (!isset($_SESSION['id'])) { redirect_to("../");}

    $booking_id = $_GET['booking_id'];
    $user_name = $_GET['user_name'];
    $links='booking_id='.$booking_id.'&user_name='.$user_name;
    //$account_details = Account_Details::find_by_user_id($user_id);
    $booking_detail = Booking::find_by_booking_id($booking_id);
    $category_details = Category::find_by_name($booking_detail->wedding_type);
    $cash = Liquidation::getTotalAmountCash($booking_id);
?>
<?php $users_profile = Users::find_by_id($_SESSION['id']); ?>

<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Budget - Administrator</title>
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link href="css/dashboard.css" rel="stylesheet">
    <link href="css/dataTables.bootstrap4.min.css" rel="stylesheet">
    <link rel="stylesheet" type="text/css"
          href="https://cdn.materialdesignicons.com/2.1.19/css/materialdesignicons.min.css">
    <link href="https://fonts.googleapis.com/css?family=Roboto:400,500,700" rel="stylesheet">
    <style>

        table.table.table-striped.table-bordered.table-sm {
            font-size:12px;
        }
        .tooltip {
            font-size: 12px;
        }

        div.dataTables_wrapper div.dataTables_paginate {
            font-size: 11px;
        }
        .special-budget {
            padding-top: 10px !important;
        }

    </style>
</head>

<body>

<?php include_once 'include/sidebar.php'; ?>


<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pb-2 mb-3 border-bottom">
    <h4 class="h4 mt-4">Budget Grand Totals For All Add-Ons</h4>
    <div class="btn-toolbar mb-2 mb-md-0">
        <div class="btn-group mr-2">
           <a class="btn btn-sm btn-primary mr-2 active" style="font-size: 13px;" href="client_manage_account_details.php?<?= $links; ?>"><i class="mdi mdi-buffer mr-2"></i><b>Overview</b></a>

            <a class="btn btn-sm btn-info mr-2 active" style="font-size: 13px;" href="guest_list.php?<?= $links; ?>"><i class="mdi mdi-account-plus mr-2"></i><b>VIP Guest List</b></a>

            <a class="btn btn-sm btn-warning mr-2 active" style="font-size: 13px;" href="budget.php?<?= $links; ?>"><b>₹   Budget</b></a>

        </div>
    </div>
</div>

<?php
    if ($session->message()) {
        echo $session->message();
    }
?>

<div class="text-right">

    <a class="btn btn-sm btn-success mr-2 mb-3"  href="budget_add.php?<?= $links; ?>"><i class="mdi mdi-plus mr-2"></i> Add</a>

    <a class="btn btn-sm btn-light mr-2 mb-3 mr-3"  href="budget_liquidate.php?<?= $links; ?>"><i class="mdi mdi-bulletin-board mr-2"></i> Liquidate</a>

</div>

<table id="example" class="table table-striped table-hover table-bordered table-sm" cellspacing="0" width="100%" style="background: white;padding: 0 5px;">

    <thead>
        <tr>
            <th>Package</th>
            <th>Budgeted Amount</th>
            <th>Actual Amount</th>
            <th>Amount Paid To Date</th>
            <th>Balance Due</th>
            
        </tr>
    </thead>

    <!-- <tfoot>
        <tr>
            <th>Package</th>
            <th>Budgeted Amount</th>
            <th>Actual Amount</th>
            <th>Amount Paid To Date</th>
            <th>Balance Due</th>
            
        </tr>
    </tfoot> -->

    <tbody>
        <tr>

            <td class="special-budget">
                <?=  $booking_detail->wedding_type?>
            </td>
            <td class="special-budget">
                ₹ <?= $category_details->price?>
            </td>
            <td class="special-budget">
                ₹ <?= @number_format($booking_detail->cash_advance,2); ?>
            </td>
            <td class="special-budget">
                ₹ <?= @number_format($cash,2); ?>
            </td>
           <td class="special-budget">
    <?php
    // Convert string values to float and remove commas
    $price = floatval(str_replace(',', '', $category_details->price));
    $cash_advance = floatval(str_replace(',', '', $booking_detail->cash_advance));

    // Perform the subtraction
    $result = $price - $cash_advance;

    // Format the result with 2 decimal places and add ₹ symbol
    echo '₹ ' . number_format($result, 2);
    ?>
</td>

           
        </tr>
    </tbody>

</table>

</main>
</div>
</div>

<!-- Bootstrap core JavaScript
================================================== -->
<!-- Placed at the end of the document so the pages load faster -->
<script src="js/jquery-3.2.1.slim.min.js"></script>
<script>window.jQuery || document.write('<script src="../../../../assets/js/vendor/jquery-slim.min.js"><\/script>')</script>
<script src="js/popper.min.js"></script>
<script src="../js/jquery.min.js"></script>
<script src="js/bootstrap.min.js"></script>
<script src="js/jquery.dataTables.min.js"></script>
<script src="js/dataTables.bootstrap4.min.js"></script>
<script>
  
    $(document).ready(function() {
        $('#example').DataTable();
    });
    
</script>

</body>
</html>