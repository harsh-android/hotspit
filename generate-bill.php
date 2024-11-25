<?php
include('conn.php');
session_start();

if (isset($_SESSION['bill_data'])) {
   $data = $_SESSION['bill_data'];
   $id = $data['id'];

   $shop_detail_query = "SELECT shop.* FROM shop INNER JOIN sadi_main ON sadi_main.shop = shop.id WHERE sadi_main.id = $id";
   $result = mysqli_query($conn, $shop_detail_query);

   if ($result && mysqli_num_rows($result) > 0) {
      $shop_detail = mysqli_fetch_assoc($result);
   } else {
      $shop_detail = null;
   }
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
   <meta charset="UTF-8">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>Responsive Invoice</title>
   <style>
      body {
         font-family: Arial, sans-serif;
         margin: 0;
         padding: 0;
         line-height: 1.5;
         color: #333;
      }

      .invoice-container {
         max-width: 900px;
         margin: 20px auto;
         padding: 20px;
         border: 1px solid #ddd;
         box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
      }

      .invoice-header {
         text-align: center;
         margin-bottom: 20px;
      }

      .invoice-header h1 {
         margin: 0;
         font-size: 24px;
         text-transform: uppercase;
         color: #000;
      }

      .invoice-header p {
         margin: 5px 0;
         font-size: 14px;
      }

      .party-details,
      .bank-details {
         margin-bottom: 20px;
         font-size: 14px;
      }

      .party-details span,
      .bank-details span {
         display: block;
      }

      .details-row {
         display: flex;
         justify-content: space-between;
      }

      .details-row div {
         width: 48%;
      }

      .invoice-table {
         width: 100%;
         border-collapse: collapse;
         margin-bottom: 20px;
      }

      .invoice-table th,
      .invoice-table td {
         border: 1px solid #ddd;
         padding: 8px;
         text-align: left;
         font-size: 14px;
      }

      .invoice-table th {
         background-color: #f9f9f9;
      }

      .totals {
         margin-top: 20px;
         display: flex;
         justify-content: flex-end;
         font-size: 14px;
      }

      .totals div {
         width: 50%;
      }

      .totals-table {
         width: 100%;
         border-collapse: collapse;
      }

      .totals-table th,
      .totals-table td {
         padding: 8px;
         text-align: right;
         border: none;
      }

      .totals-table th {
         text-align: left;
      }

      .footer {
         font-size: 12px;
         margin-top: 20px;
      }

      .footer p {
         margin: 5px 0;
      }

      @media (max-width: 600px) {
         .details-row {
            flex-direction: column;
         }

         .details-row div {
            width: 100%;
         }

         .totals div {
            width: 100%;
         }
      }
   </style>
</head>

<body>
   <div class="invoice-container">
      <!-- Header / Letter head -->
      <div class="invoice-header">
         <h1>Aadhya Creation</h1>
         <p>62, Suvidha Row House, Simada Gam, Surat - 395006</p>
         <p>GSTIN: 24CHRP8947Q1ZF</p>
      </div>

      <!-- Date & Invoice number -->
      <div style="text-align: end; margin-bottom: 10px; font-size: 15px;">
         <!-- <div class="mb-2">
            <span><strong>Invoice No:</strong></span>
         </div> -->
         <div class="mb-2">
            <span><strong>Date :</strong> <?php echo date('d/m/Y'); ?></span>
         </div>
      </div>

      <!-- Party Details -->
      <div class="party-details">
         <span><strong>Party's Name:</strong> M/S <?php echo $shop_detail['name']; ?></span>
         <span>Address: <?php echo $shop_detail['address']; ?></span>
         <span>GSTIN: <?php echo $shop_detail['gst_number']; ?></span>
      </div>

      <!-- Invoice Table -->
      <table class="invoice-table">
         <thead>
            <tr>
               <th>No.</th>
               <th>Descriptions</th>
               <th>HSN Code</th>
               <th>Used Qty</th>
               <th>Rate</th>
               <th>Amount</th>
            </tr>
         </thead>
         <tbody>
            <!-- Dynamic data rows -->
            <?php
            $total_gross_amount = 0;
            foreach ($data['sadi_stocks'] as $i => $item) { ?>
               <tr>
                  <td><?php echo $i + 1; ?></td>
                  <td><?php echo $item['color_name']; ?> (<?php echo $item['qty']; ?>)</td>
                  <td><?php echo $item['cn_number']; ?></td>
                  <td><?php echo $item['use_qty']; ?></td>
                  <td><?php echo $item['price']; ?></td>
                  <td><?php echo $item['use_qty'] * $item['price']; ?></td>
               </tr>
            <?php
               $total_gross_amount = $total_gross_amount + ($item['use_qty'] * $item['price']);
            } ?>
         </tbody>
      </table>

      <!-- Bank Details -->
      <div class="bank-details">
         <span><strong>Bank Name:</strong> Kotak Mahindra Bank</span>
         <span><strong>A/C No.:</strong> 7545239919</span>
         <span><strong>IFSC Code:</strong> KKBK0000883</span>
      </div>

      <!-- Totals / Amount calculation -->
      <div class="totals">
         <div>
            <table class="totals-table">
               <tr>
                  <th>Total Gross Amount (Before Discount):</th>
                  <td><?php echo number_format($total_gross_amount, 2); ?></td>
               </tr>
               <tr>
                  <?php
                     $discount_rate = floatval($data['discount']);
                     $discount = $total_gross_amount * $discount_rate / 100; 
                  ?>
                  <th>Discount: (<?php echo $discount_rate ?>%)</th>
                  <td><?php echo number_format($discount, 2); ?></td>
               </tr>
               <tr>
                  <?php $net_amt_before_tax = $total_gross_amount - $discount; ?>
                  <th>Net Amount Before Tax:</th>
                  <td><?php echo number_format($net_amt_before_tax, 2); ?></td>
               </tr>
               <tr>
                  <?php
                     $cgst_rate = floatval($data['cgst']);
                     $cgst = $net_amt_before_tax * $cgst_rate / 100; 
                     ?>
                  <th>CGST: (<?php echo $cgst_rate ?>%)</th>
                  <td><?php echo number_format($cgst, 2); ?></td>
               </tr>
               <tr>
                  <?php
                     $sgst_rate = floatval($data['sgst']);
                     $sgst = $net_amt_before_tax * $sgst_rate / 100; 
                  ?>
                  <th>SGST: (<?php echo $sgst_rate ?>%)</th>
                  <td><?php echo number_format($sgst, 2); ?></td>
               </tr>
               <tr>
                  <?php
                     $igst_rate = floatval($data['igst']);
                     $igst = $net_amt_before_tax * $igst_rate / 100; 
                  ?>
                  <th>IGST: (<?php echo $igst_rate ?>%)</th>
                  <td><?php echo number_format($igst, 2); ?></td>
               </tr>
               <tr>
                  <th>Total:</th>
                  <?php $net_amount = $net_amt_before_tax + $cgst + $sgst + $igst; ?>
                  <td><?php echo number_format($net_amount, 2); ?></td>
               </tr>
            </table>
         </div>
      </div>

      <!-- Footer / Conditions -->
      <div class="footer">
         <p>1. Interest 24% per annum will be charged after the due date of the bill.</p>
         <p>2. Any complaint for the goods should be made within 7 days.</p>
         <p>3. Subject to Surat Jurisdictions.</p>
         <p><strong>For Aadhya Creation</strong></p>
         <p>Authorized Signatory</p>
      </div>
   </div>
</body>

</html>