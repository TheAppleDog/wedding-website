<?php include 'include/init.php'; ?>

<?php
    if (!isset($_SESSION['id'])) { redirect_to("../");}

    $booking_id = $_GET['booking_id'];
    $user_name = $_GET['user_name'];
    $links='booking_id='.$booking_id.'&user_name='.$user_name;
    // $account_details = Account_Details::find_by_user_id($user_id);
    // $booking_details = Booking::find_by_booking_id($booking_id);
    // $category_details = Category::find_by_id($booking_details->wedding_type);
    $luquidate = Events::getLiquidation_by_id($booking_id);
    $liquidate = Liquidation::find_by_username_all($user_name);
    $amount = Liquidation::getTotalAmount($booking_id);
    $cash = Liquidation::getTotalAmountCash($booking_id);
    $credit = Liquidation::getTotalAmountCredit($booking_id);
    //$events =  Events::find_by_event_all($id);

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
        td.special-budget {
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

    <a class="btn btn-sm btn-success mr-2 active mb-3" style="font-size: 12px;" href="budget_add.php?<?= $links; ?>"><i class="mdi mdi-plus mr-2"></i> Add</a>

</div>

<table id="liquidate" class="table table-striped table-hover table-bordered table-sm" cellspacing="0" width="100%">

    <thead>
        <tr>
            <th>Event Name</th>
            <th>Payment</th>
            <th>Cash</th>
            <th>Credit</th>
            <th>Date Issue</th>
            <th>Action</th>
        </tr>
    </thead>

    <tbody>        
        <?php foreach($liquidate as $liquidate_item) : ?>
               <tr>
            <td class="special-budget">
                <?php echo $liquidate_item->title; ?> 
            </td>
            <td class="special-budget">
                ₹ <?= number_format($liquidate_item->payment, 2); ?>
            </td>
            <td class="special-budget">
                ₹ <?= number_format($liquidate_item->cash, 2); ?>
            </td>
            <td class="special-budget">
                ₹ <?= number_format($liquidate_item->credit, 2); ?>
            </td>
            <td class="special-budget">
                <?= $liquidate_item->date_issue; ?>
            </td>
            <td>
                <a href="budget_edit.php?<?= $links; ?>&budget_id=<?= $liquidate_item->title;?>" class="btn btn-warning btn-sm" style="font-size: 12px;">Change</a>
            </td>
        </tr>
      <?php endforeach; ?>
    </tbody>
    <tfooter>
        <tr>
            <td align="right"><b>Total</b></td>
            <td><b><?= number_format($amount, 2); ?></b></td>
            <td><b><?= number_format($cash, 2); ?></b></td>
            <td><b><?= number_format($credit, 2); ?></b></td>
        </tr>
    </tfooter>
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
        $('#liquidate').DataTable();
    });
    
</script>

</body>
</html>