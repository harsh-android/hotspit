<?php
// Database connection
include("conn.php");

// Check if `sadi_main_ids` are provided
if (isset($_POST['sadi_main_ids']) && !empty($_POST['sadi_main_ids'])) {
    $sadi_main_ids = $_POST['sadi_main_ids'];

    // Sanitize input and prepare SQL query
    $ids = implode(',', array_map('intval', $sadi_main_ids));
    $query = "SELECT sadi_stock.*, sadi_main.cn_number 
              FROM sadi_stock 
              JOIN sadi_main ON sadi_stock.sadi_main_id = sadi_main.id 
              WHERE sadi_main_id IN ($ids)";

    $result = $conn->query($query);

    if ($result->num_rows > 0) {
        echo '<table border="1" cellpadding="10" id="stock-table">';
        echo '<tr><th><input type="checkbox" id="check-all"> Select All</th><th>ID</th><th>CN Number</th><th>Color</th><th>Quantity</th><th>Price</th></tr>';

        while ($row = $result->fetch_assoc()) {
            echo '<tr>';
            echo '<td><input type="checkbox" class="select-stock" id="select-stock" data-id="' . $row['id'] . '" data-cn-number="' . $row['cn_number'] . '" data-color="' . $row['color'] . '" data-qty="' . $row['qty'] . '" data-price="' . $row['price'] . '"></td>';
            echo '<td>' . $row['id'] . '</td>';
            echo '<td>' . $row['cn_number'] . '</td>';
            echo '<td>' . $row['color'] . '</td>';
            echo '<td>' . $row['qty'] . '</td>';
            echo '<td>' . $row['price'] . '</td>';
            echo '</tr>';
        }

        echo '</table>';
    } else {
        echo 'No stock data found for the selected entries.';
    }
} else {
    echo 'No Sadi Main entries selected.';
}

$conn->close();
?>

<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script>
    // let selectedStocks = {};  // Associative array to store selected stock items

    // Function to update selected stocks based on checked boxes
    function updateSelectedStocks() {
        var selectedStocks = {};  // Reset selected stocks

        $('.select-stock:checked').each(function () {
            let stockId = $(this).data('id');  // Get the stock ID
            selectedStocks[stockId] = {
                cn_number: $(this).data('cn-number'),
                color: $(this).data('color'),
                qty: $(this).data('qty'),
                price: $(this).data('price')
            };
        });

        // Send the updated array to the server using AJAX
        $.ajax({
            url: 'test2.php',
            method: 'POST',
            data: { stocks: selectedStocks },
            success: function (response) {
                console.log('Selected Stocks Updated:', response);
            },
            error: function (error) {
                console.error('Error updating selected stocks:', error);
            }
        });
    }

    // Event listener for individual checkbox changes
    $(document).on('change', '.select-stock', function () {
        updateSelectedStocks();
    });

    // Event listener for "Select All" checkbox
    $('#check-all').on('change', function () {
        let isChecked = this.checked;
        
        // Toggle all row checkboxes based on "Select All" checkbox
        $('.select-stock').prop('checked', isChecked);
        updateSelectedStocks();  // Update selected stocks based on the current selection
    });
</script>
