<?php
// Database connection
include("../conn.php");

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
        echo '<div class="table-responsive">';
        echo '<table class="table search-table align-middle text-nowrap" border="1" cellpadding="10" id="stock-table">';
        echo '<tr><th><input type="checkbox" id="check-all"></th><th>ID</th><th>CN Number</th><th>Color</th><th>Quantity</th><th>Use Quantity</th></tr>';

        while ($row = $result->fetch_assoc()) {
            $colorId = $row['color'];
            ?>
<tr>

    <td><input type="checkbox" class="select-stock" id="select-stock" data-id="<?php echo $row['id'] ?>"
            data-cn-number="<?php echo $row['cn_number'] ?>" data-color="<?php echo $row['color'] ?>"
            data-qty="<?php echo $row['qty'] - $row['use_qty']; ?>" data-price="<?php echo $row['price'] ?>">
    </td>
    <td><?php echo $row['id']; ?></td>
    <td><?php echo $row['cn_number']; ?></td>
    <td>
        <span class="usr-name"><?php @$typeData = mysqli_fetch_assoc(mysqli_query($conn,"SELECT * FROM color WHERE `id`='$colorId'"));
                                            echo @$typeData["name"];
                                            ?></span>
    </td>
    <td><span class="total_qty<?php echo $row['id']; ?>"><?php echo $row['qty'] - $row['use_qty']; ?></span></td>
    <td><input type="number" id="use<?php echo $row['id']; ?>" name="use<?php echo $row['id']; ?>" value="<?php echo $row['qty'] - $row['use_qty']; ?>" class="used-qty-input" style="color:green;"></td>
</tr>

<?php
            // echo '<tr>';
            // echo '<td><input type="checkbox" class="select-stock" id="select-stock" data-id="' . $row['id'] . '" data-cn-number="' . $row['cn_number'] . '" data-color="' . $row['color'] . '" data-qty="' . $row['qty'] . '" data-price="' . $row['price'] . '"></td>';
            // echo '<td>' . $row['id'] . '</td>';
            // echo '<td>' . $row['cn_number'] . '</td>';
            // echo '<td>' . $row['color'] . '</td>';
            // echo '<td>' . $row['qty'] . '</td>';
            // echo '<td>' . $row['price'] . '</td>';
            echo '</tr>';
        }

        echo '</table>';
        echo '</div>';

        echo '<a href="add-process.php" class="qty-submit-button" style="pointer-events: none; opacity: 0.5;"><button class="btn btn-success ms-2" type="submit">Submit</button></a>';

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
    var selectedStocks = {}; // Reset selected stocks
    let used_qty_high = false;

    if($('.select-stock:checked').length === 0){
        used_qty_high = false;
        $('.qty-submit-button').attr('disabled', true).css('pointer-events', 'none').css('opacity', '0.5');
    }
    
    $('.select-stock:checked').each(function() {
        let stockId = $(this).data('id'); // Get the stock ID
        const use = document.getElementById("use"+stockId).value;
        const total_qty = $(this).data('qty');

        if(use == "" || use > total_qty){
            used_qty_high = true;
            $("#use"+stockId).css("color","red");
        } else {
            $("#use"+stockId).css("color","green");
        }
        if(used_qty_high) {
            $('.qty-submit-button').attr('disabled', true).css('pointer-events', 'none').css('opacity', '0.5');
        } else {
            $('.qty-submit-button').attr('disabled', false).css('pointer-events', 'auto').css('opacity', '1');
        }
        selectedStocks[stockId] = {
            stock_id: stockId,
            cn_number: $(this).data('cn-number'),
            color: $(this).data('color'),
            qty: $(this).data('qty'),
            use: use
        };
    });
    
    // Send the updated array to the server using AJAX
    $.ajax({
        url: 'ajax/select-list.php',
        method: 'POST',
        data: {
            stocks: selectedStocks
        },
        success: function(response) {
            console.log('Selected Stocks Updated:', response);
        },
        error: function(error) {
            console.error('Error updating selected stocks:', error);
        }
    });
}

$(document).on('input', '.used-qty-input', function(){
    updateSelectedStocks();
});

// Event listener for individual checkbox changes
$(document).on('change', '.select-stock', function() {
    updateSelectedStocks();
});

// Event listener for "Select All" checkbox
$('#check-all').on('change', function() {
    let isChecked = this.checked;

    // Toggle all row checkboxes based on "Select All" checkbox
    $('.select-stock').prop('checked', isChecked);
    updateSelectedStocks(); // Update selected stocks based on the current selection
});
</script>