<?php

$customer_type = filter_input(INPUT_POST, 'type');
$invoice_subtotal = filter_input(INPUT_POST, 'subtotal');

//Switch_statements
switch ($customer_type) {
    case 'R' || 'r':
         if ($invoice_subtotal < 100) {
        $discount_percent = .0;
        }else if ($invoice_subtotal >= 100 && $invoice_subtotal < 250) {
        $discount_percent = .1;
        }else if ($invoice_subtotal >= 250 && $invoice_subtotal < 500) { $discount_percent = .25;
        }else if ($invoice_subtotal >= 500) {
        $discount_percent = .30;
        }
        break;

    case 'C' || 'c':
        $discount_percent = .2;
        break;

    case 'T' || 't':
        if($invoice_subtotal < 500){
        $discount_percent = .40;
        }else if($invoice_subtotal >= 500){
        $discount_percent = .50;
        }
        break;

    default:
        $discount_percent = .10;
        break;
}

// Alternative way: If-else statement:
// Customer Type: R
// if ($customer_type == 'R' || $customer_type == 'r' ) {
//     if ($invoice_subtotal < 100) {
//         $discount_percent = .0;
//     }else if ($invoice_subtotal >= 100 && $invoice_subtotal < 250) {
//         $discount_percent = .1;
//     }else if ($invoice_subtotal >= 250 && $invoice_subtotal < 500) { $discount_percent = .25;
//     }else if ($invoice_subtotal >= 500) {
//         $discount_percent = .30;
//     }
// // Customer Type: C
// }else if ($customer_type == 'C' || $customer_type == 'c' ) {
//     $discount_percent = .2;
// // Customer Type: T
// }else if ($customer_type == 'T' || $customer_type == 't') {
//     if($invoice_subtotal < 500){
//         $discount_percent = .40;
//     }else if($invoice_subtotal >= 500){
//         $discount_percent = .50;
//     }
// // Other Customers. 
// }else {
//     $discount_percent = .10;
// }

$discount_amount = $invoice_subtotal * $discount_percent;
$invoice_total = $invoice_subtotal - $discount_amount;

$percent = number_format(($discount_percent * 100));
$discount = number_format($discount_amount, 2);
$total = number_format($invoice_total, 2);

include 'invoice_total.php';

?>
