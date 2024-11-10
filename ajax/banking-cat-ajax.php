<?php 
include("../conn.php");


    $type = $_POST['type'];

    if ($type == 'income') {

?>

<div class="mb-3">
    <label for="category" class="form-label">Category</label>
    <select class="form-control" id="category" name="category">
        <option value="dealer">From Dealer</option>
        <option value="product">Sell Product</option>
    </select>
</div>

<?php } else { ?>

<div class="mb-3">
    <label for="category" class="form-label">Category</label>
    <select class="form-control" id="category" name="category">
        <option value="salary">Salary</option>
        <option value="material">Material</option>
    </select>
</div>

<?php } ?>

