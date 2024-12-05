<?php
include("../conn.php");

$type = $_POST['type'];

for ($i = 0; $i < $type; $i++) { ?>

    <div class="row" id="sadityperesult">
        <div class=" col-lg-4 col-12 mb-3">
            <label for="color" class="form-label">Select Color</label>
            <?php $typeque = mysqli_query($conn, "SELECT * FROM color"); ?>
            <select class="form-control" id="color<?php echo $i; ?>" name="color<?php echo $i; ?>" required>
                <?php while ($row = mysqli_fetch_assoc($typeque)) { ?>
                    <option value="<?php echo $row['id'] ?>"><?php echo $row['name'] ?></option>
                <?php } ?>
            </select>
        </div>

        <div class=" col-lg-4 col-12 mb-3">
            <label for="qty" class="form-label">Qty</label>
            <input type="number" name="qty<?php echo $i; ?>" class="form-control" id="qty" placeholder="Enter quantity" required>
        </div>

        <!-- <dl̥iv class=" col-lg-4 col-12 mb-3">
            <label for="price" class="form-label">Price</label>
            <input type="number" name="price<?php echo $i; ?>" class="form-control" id="price" placeholder="1000">
        </div> -->
    </div>

<?php } ?>