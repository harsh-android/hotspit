<?php 

    $type = $_POST['type'];

    if ($type == 'hotfix') {

?>

<div class="mb-3">
    <label for="buttaCount" class="form-label">Butta Count</label>
    <input type="number" class="form-control" id="buttaCount" name="buttaCount" placeholder="Butta count">
</div>

<div class="mb-3">
    <label for="buttaPrice" class="form-label">Butta Price</label>
    <input type="number" class="form-control" id="buttaPrice" name="buttaPrice" placeholder="Price per butta">
</div>

<div class="mb-3">
    <label for="lineCount" class="form-label">Line Count</label>
    <input type="number" class="form-control" id="lineCount" name="lineCount" placeholder="Line Count">
</div>

<div class="mb-3">
    <label for="linePrice" class="form-label">Line Price</label>
    <input type="number" class="form-control" id="linePrice" name="linePrice" placeholder="Line Price">
</div>

<div class="mb-3">
    <label for="sheetUsed" class="form-label">Sheet Used</label>
    <input type="number" class="form-control" id="sheetUsed" name="sheetUsed" placeholder="Sheet Used">
</div>

<div class="mb-3">
    <label for="sheetPrice" class="form-label">Sheet Price</label>
    <input type="number" class="form-control" id="sheetPrice" name="sheetPrice" placeholder="Sheet Price">
</div>

<div class="mb-3">
    <label for="borderPrice" class="form-label">Border Price</label>
    <input type="number" class="form-control" id="borderPrice" name="borderPrice" placeholder="Border Price">
</div>

<?php } ?>