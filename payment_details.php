<?php

include 'admin/include/init.php';

$amount = 0;
$cash = 0;
$credit = 0;
$liquidate = []; // Assuming it's safe to initialize $liquidate as an empty array

$booking_id = isset($_POST['booking_id']) ? $_POST['booking_id'] : null;

// Check if user is logged in and $booking_id is not null
if (isset($_SESSION['user_name']) && $booking_id !== null) {
    $user_name = $_SESSION['user_name'];
  //var_dump($booking_id);

    // Assuming these methods are safe to call and return numeric values
    $booking_detail = Booking::find_by_booking_id($booking_id);
    $category_details = Category::find_by_name($booking_detail->wedding_type);    
    $amount = Liquidation::getTotalAmount($booking_id);
    $cash = Liquidation::getTotalAmountCash($booking_id);
    $credit = Liquidation::getTotalAmountCredit($booking_id);

    // Assuming find_by_username_all returns an array or an iterable object
    $liquidate = Liquidation::find_by_username_all($user_name);
//var_dump($amount);
$liquidate = array_filter($liquidate, function ($item) use ($booking_id) {
        return $item->booking_id == $booking_id;
    });
}
else{
echo "no booking id found";}
?>
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
 <link rel="stylesheet" href="include/footer.css">
    <link rel="stylesheet" href="nav.css">
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
<h5><b>Booking ID: #<?=$booking_detail->booking_id?></b></h5>
<h5><b>Wedding Payment Account</b></h5>

<table id="example" class="table table-striped table-hover table-bordered table-sm" cellspacing="0" width="100%" style="background: white;padding: 0 5px;">

    <thead>
        <tr>
            <th>Package</th>
            <th>Package Price</th>
            <th>Amount Paid</th>            
            <th>Balance Due</th>
            
        </tr>
    </thead>

    <!-- <tfoot>
        <tr>
            <th>Package</th>
            <th>Package Price</th>
            <th>Amount Paid</th>            
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
    ₹ <?= is_numeric($booking_detail->cash_advance) ? number_format(floatval($booking_detail->cash_advance), 2) : '0.00'; ?>
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
<h5><b>Add Ons Payment Account</b></h5>
<table id="liquidate" class="table table-striped table-hover table-bordered table-sm" cellspacing="0" width="100%">

    <thead>
        <tr>
            <th>Event Name</th>
            <th>Payment</th>
            <th>Cash</th>
            <th>Credit</th>
            <th>Date Issue</th>           
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
<script>
  
   
</script>

</body>
</html>