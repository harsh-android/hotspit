<?php
include('conn.php');
session_start();

if (isset($_POST['id'])) {
  $bill_id = $_POST['id'];

  $sql_select_bill_data = "SELECT generate_bill_data.*, shop.* FROM generate_bill_data INNER JOIN shop ON shop.id = generate_bill_data.shop_id WHERE generate_bill_data.id = $bill_id";
  $res = mysqli_query($conn, $sql_select_bill_data);

  if ($res && mysqli_num_rows($res) > 0) {
    $row = mysqli_fetch_assoc($res);

    $shop_detail = [
      'name' => $row['name'],
      'owner_name' => $row['owner_name'],
      'address' => $row['address'],
      'gst_number' => $row['gst_number']
    ];

    $descriptions = explode(',|,', $row['color']);
    $quantities = explode(',|,', $row['qty']);
    $chalan_numbers = explode(',|,', $row['cn_number']);
    $used_quantities = explode(',|,', $row['use_qty']);
    $prices = explode(',|,', $row['price']);

    $sadi_stocks = [];
    for ($i = 0; $i < count($descriptions); $i++) {
      $description = $descriptions[$i];
      $qty = $quantities[$i];
      $cn_number = $chalan_numbers[$i];
      $use_qty = $used_quantities[$i];
      $price = $prices[$i];

      $sadi_stocks[] = [
        'description' => $description,
        'cn_number' => $cn_number,
        'qty' => $qty,
        'use_qty' => $use_qty,
        'price' => $price
      ];
    }

    $data = [
      'invoice_number' => $bill_id,
      'bill_date' => $row['bill_date'],
      'sadi_stocks' => $sadi_stocks,
      'discount' => $row['discount'],
      'cgst' => $row['cgst'],
      'sgst' => $row['sgst'],
      'igst' => $row['igst']
    ];
  } else {
    echo "Bill not found.";
    exit;
  }
} else if (isset($_SESSION['bill_data'])) {
  $data = $_SESSION['bill_data'];
  $id = $data['id'];

  $sql_select_party = "SELECT * FROM shop WHERE id = $id";
  $result_party = mysqli_query($conn, $sql_select_party);

  if ($result_party && mysqli_num_rows($result_party) > 0) {
    $shop_detail = mysqli_fetch_assoc($result_party);
  } else {
    $shop_detail = null;
  }
} else {
  echo "Bill not found.";
  exit;
}
?>


<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Tax Invoice</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">

  <style>
    @font-face {
      font-family: "algeria";
      src: url("src/assets/Algeria-mZ9.ttf") format("truetype");
    }

    .font-algeria {
      font-family: "algeria";
      font-size: 30px;
      font-weight: 500;
    }

    /* ========== style ========= */
    body {
      padding: 20px;
      color: #000;
    }

    h1,
    h2,
    h3,
    h4,
    h5,
    h6,
    p {
      padding: 0;
      margin: 0;
    }

    .containers {
      border: 1px solid #000;
      padding: 10px;
      width: 100%;
      height: 100%;
      position: relative;
      margin: 0 auto;
    }

    .invoice-box {
      border: 2px solid #000;
      height: 100%;
    }

    .god-name {
      display: flex;
      justify-content: space-between;
      font-weight: 900;
      font-size: 13px;
    }

    .footer {
      margin-top: -100px;
      padding: 0px 20px 40px 0px;
      height: 100px;
      font-size: 15px;
      font-weight: 700;
      font-style: italic;
      text-align: right;
    }

    .header-border {
      border-bottom: 2px solid #000;
      width: 100%;
    }

    .invoice-title {
      text-align: center;
      background-color: #d3ebff;
      font-size: 18px;
      font-style: italic;
      font-weight: 900;
      padding: 5px;
    }

    .adress {
      font-size: 13px;
      font-weight: 500;
    }

    .party-details {
      padding: 0px 20px;
      font-size: 13px;
    }

    .table-bordered th,
    .table-bordered td {
      border: 1px solid #000;
    }

    .warranty-terms {
      font-size: 13px;
      margin-top: 20px;
      margin-left: 40px;
      margin-bottom: 50px;
      font-weight: 600;
    }

    .total-box {
      background-color: #e9f5ff;
    }

    .underline-input {
      border: none;
      border-bottom: 1px solid black;
      width: 78%;
      outline: none;
      font-size: 16px;
    }

    /* ========== Watermark =========== */

    .watermark {
      position: absolute;
      top: 50%;
      left: 50%;
      transform: translate(-50%, -50%);
    }

    .watermark img {
      opacity: 0.1;
      width: 400px;
      z-index: -1;
    }
  </style>
</head>

<body>
  <div class="containers">
    <div class="watermark">
      <img src="src/assets/images/logos/logo.png" alt="" />
    </div>
    <div class="invoice-box">
      <div class="header">
        <div style="border-bottom: 2px solid #000;" class="invoice-title">TAX INVOICE</div>
        <div class="god-name">
          <div style="font-size: smaller;">&nbsp;&nbsp;|| શ્રી ગણેશાય નમઃ ||</div>
          <div style="font-size: smaller;">|| શ્રી ૧| ||</div>
          <div style="font-size: smaller;">|| જય કષ્ટભંજનદેવ || &nbsp;&nbsp;</div>
        </div>
        <div class="god-name">
          <div>&nbsp;&nbsp;+91 95373 50571</div>
          <div style="font-size: smaller;">|| આય શ્રી ખોડિયાર કૃપા ||</div>
          <div>+91 99242 86671&nbsp;&nbsp;</div>
        </div>
        <div class="god-name">
          <div></div>
          <div style="font-size: smaller;">|| જય કાના બાપા ||</div>
          <div></div>
        </div>
      </div>
      <div class="header-border"></div>
      <div class="brand-name">
        <div class="row px-3 py-2">
          <div class="col-md-3 col-3">
            <img
              src="src/assets/images/logos/logo.png"
              alt="Logo"
              style="width: 80px; margin-left: 30px" />
          </div>
          <div class="col-md-6 col-6 text-center p-0">
            <h4 class="m-0" style="font-weight:bold; font-size:30px">AADHYA CREATION</h4>
            <p class="m-0 adress">
              50, Radhika Park Society, Opp. Sasvat Nagar, Puna Gam, Surat - 395006
            </p>
            <p style="font-weight: 500; font-size: 12px">
              GSTIN: 24CHRPB9473Q1ZF
            </p>
          </div>
        </div>
        <div class="header-border"></div>
      </div>
      <div class="row px-4 mt-2">
        <div class="col-md-9 col-9 party-details mb-3">
          <p><strong>PARTY'S NAME : </strong>M/S <?php echo $shop_detail['owner_name']; ?></p>
          <p><?php echo $shop_detail['name']; ?></p>
          <p><?php echo $shop_detail['address']; ?></p>
          <p>GSTIN: <?php echo $shop_detail['gst_number']; ?></p>
        </div>
        <div class="col-md-3 col-3 text-right" style="font-size: 13px">
          <p class="m-0">
            <strong>INVOICE NO :</strong> <?php echo $data['invoice_number']; ?> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
          </p>
          <p>
            <?php
            // convert date fomate to dd/mm/yyyy
            $bill_date_get = $data['bill_date'];
            $bill_date = date('d/m/Y', strtotime($bill_date_get));
            ?>
            <strong>DATE :</strong> <?php echo $bill_date; ?>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
          </p>
        </div>
      </div>

      <div>
        <table class="table table-bordered m-0">
          <thead>
            <tr
              text-align="center"
              style="border-top: solid; border-bottom: solid; font-size: 15px">
              <th width="7%" style="border-right: solid">No.</th>
              <th width="45%" style="border-right: solid">Descriptions</th>
              <th width="13%" style="border-right: solid">HSN Code</th>
              <th width="9%" style="border-right: solid">Qty</th>
              <th width="11%" style="border-right: solid">Rate</th>
              <th width="15%">Amount</th>
            </tr>
          </thead>
          <tbody>
            <tr height="200px">
              <td style="text-align:center;">
                <?php
                $total_gross_amount = 0;
                foreach ($data['sadi_stocks'] as $i => $item) { ?>
                  <?php echo $i + 1; ?>
                  <br>
                <?php
                  $total_gross_amount = $total_gross_amount + ($item['use_qty'] * $item['price']);
                } ?>
              </td>
              <td>
                <?php foreach ($data['sadi_stocks'] as $i => $item) { ?>

                  <?php echo $item['description']; ?> (<?php echo $item['qty']; ?>) <br><?php } ?>
              </td>
              <td style="text-align:center;">
                <?php foreach ($data['sadi_stocks'] as $i => $item) { ?>

                  <?php echo $item['cn_number']; ?><br><?php } ?>
              </td>
              <td style="text-align:center;">
                <?php foreach ($data['sadi_stocks'] as $i => $item) { ?>

                <?php echo $item['use_qty'] . "<br>";
                } ?>
              </td>
              <td style="text-align:center;">
                <?php foreach ($data['sadi_stocks'] as $i => $item) { ?>

                <?php echo $item['price'] . "<br>";
                } ?>
              </td>
              <td style="text-align:center;">
                <?php foreach ($data['sadi_stocks'] as $i => $item) { ?>

                  <?php echo $item['use_qty'] * $item['price']; ?><br><?php } ?>
              </td>
            </tr>

          </tbody>
        </table>
      </div>
      <div>
        <table class="table table-bordered m-0 total-table">
          <tbody>
            <tr style="font-size: 16px">
              <td
                width="65%"
                rowspan="3"
                style="padding: 10px 20px; font-size: 14px; font-weight: 700">
                Bank Name : &nbsp;&nbsp;&nbsp;Kotak Mahindra Bank <br />
                A/C No. :
                &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;7545239919
                <br />
                IFSC Code : &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;KKBK0000883
              </td>
              <td width="20%" style="padding: 1px 6px; font-weight: 500">
                Total Gross Amount
              </td>
              <td width="15%" style="font-weight: 500; text-align:center;"><?php echo number_format($total_gross_amount, 2); ?></td>
            </tr>
            <tr style="font-size: 14px">
              <?php
              $discount_rate = floatval($data['discount']);
              $discount = $total_gross_amount * $discount_rate / 100;
              ?>
              <td style="padding: 1px 6px; font-weight: 500">
                Discount: (<?php echo $discount_rate ?>%)
              </td>
              <td style="font-weight: 500; text-align:center"><?php echo number_format($discount, 2); ?></td>
            </tr>
            <tr style="font-size: 14px">
              <?php $net_amt_before_tax = $total_gross_amount - $discount; ?>
              <td style="padding: 1px 6px; font-weight: 500">Net Amount Before Tax</td>
              <td style="font-weight: 500; text-align:center"><?php echo number_format($net_amt_before_tax, 2); ?></td>
            </tr>
            <tr style="font-size: 14px">
              <td
                width="705px"
                rowspan="2"
                style="font-weight: 500">
                <div>
                  <label class="label"></label>
                  &nbsp;&nbsp;
                  <label class="label"></label>
                </div>
                <div>
                  <label class="label"></label>
                  &nbsp;&nbsp;
                  <label class="label"></label>
                </div>
              </td>
              <?php
              $cgst_rate = floatval($data['cgst']);
              $cgst = $net_amt_before_tax * $cgst_rate / 100;
              ?>
              <td style="padding: 1px 6px; font-weight: 500">CGST: (<?php echo $cgst_rate ?>%)</td>
              <td style=" font-weight: 500; text-align:center;"><?php echo number_format($cgst, 2); ?></td>
            </tr>
            <tr style="font-size: 14px">
              <?php
              $sgst_rate = floatval($data['sgst']);
              $sgst = $net_amt_before_tax * $sgst_rate / 100;
              ?>
              <td style="padding: 1px 6px; font-weight: 500">SGST: (<?php echo $sgst_rate ?>%)</td>
              <td style="font-weight: 500; text-align:center;"><?php echo number_format($sgst, 2); ?></td>
            </tr>
            <tr style="font-size: 14px">
              <td width="705px" style="padding: 2px 8px; font-weight: 500">
                <label class="label"></label>
              </td>
              <?php
              $igst_rate = floatval($data['igst']);
              $igst = $net_amt_before_tax * $igst_rate / 100;
              ?>
              <td style="padding: 1px 6px; font-weight: 500">IGST: (<?php echo $igst_rate ?>%)</td>
              <td style="font-weight: 500; text-align:center;"><?php echo number_format($igst, 2); ?></td>
            </tr>
            <tr style="font-size: 14px">
              <td width="705px" style="padding: 2px 8px; font-weight: 500">
                <label class="label"></label>
              </td>
              <td style="padding: 1px 6px; font-weight: 500">Total</td>
              <?php $net_amount = $net_amt_before_tax + $cgst + $sgst + $igst; ?>
              <td style="font-weight: 500; text-align:center;"><?php echo number_format($net_amount, 2); ?></td>
            </tr>
          </tbody>
        </table>
      </div>

      <div class="warranty-terms">
        <ol>
          <li>
            Intrest 24% per annum will be charged after due date of the bill.
          </li>
          <li>Any Complain for the Goods should be made within 7 days.</li>
          <li>Subject to SURAT Jurisdictions.</li>
        </ol>
      </div>

      <div class="footer">
        <p style="height: 70px">For AADHYA CREATION</p>
        <p>Authorised Signatory</p>
      </div>
    </div>
  </div>
</body>

</html>