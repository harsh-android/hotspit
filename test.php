<?php
include("conn.php");
// Fetch `sadi_main` records
$query = "SELECT * FROM sadi_main";
$result = $conn->query($query);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dynamic Sadi Stock Selection</title>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
</head>
<body>
    <h3>Select Sadi Main Entries</h3>
    <form id="sadiMainForm">
        <?php while ($row = $result->fetch_assoc()) { ?>
            <input type="checkbox" name="sadi_main_ids[]" value="<?php echo $row['id']; ?>">
            <?php echo "CN: " . $row['cn_number'] . " | Date: " . $row['date']; ?><br>
        <?php } ?>
    </form>

    <h3>Selected Stock Details</h3>
    <div id="stockDetails">Select entries to view stock details...</div>

    <script>
        $(document).ready(function () {
            // Trigger AJAX whenever a checkbox is changed
            $('input[name="sadi_main_ids[]"]').change(function () {
                var selectedIds = [];
                $('input[name="sadi_main_ids[]"]:checked').each(function () {
                    selectedIds.push($(this).val());
                });

                // Make AJAX call if at least one checkbox is selected
                if (selectedIds.length > 0) {
                    $.ajax({
                        url: 'test1.php',
                        type: 'POST',
                        data: { sadi_main_ids: selectedIds },
                        success: function (response) {
                            $('#stockDetails').html(response);
                        },
                        error: function () {
                            alert('An error occurred while fetching the stock data.');
                        }
                    });
                } else {
                    // Clear the stock details if no checkbox is selected
                    $('#stockDetails').html('Select entries to view stock details...');
                }
            });
        });
    </script>
</body>
</html>
<?php $conn->close(); ?>
