<?php
// Start the session to store selected stocks
session_start();

// Check if stocks data is received via POST
if (isset($_POST['stocks'])) {
    $selectedStocks = $_POST['stocks'];

    // Save the updated array in the session (or handle as required)
    $_SESSION['selected_stocks'] = $selectedStocks;

    echo json_encode(['status' => 'success', 'message' => 'Stocks updated', 'data' => $selectedStocks]);
} else {
    echo json_encode(['status' => 'error', 'message' => 'No stocks received']);
}
?>
