<?php 

    $type = $_POST['type'];

    if ($type == 'hotfix') {

?>

<div class="mb-3">
    <label for="cuttingPrice" class="form-label">Cutting Price</label>
    <input type="number" class="form-control" id="cuttingPrice" name="cuttingPrice">
</div>

<?php } ?>