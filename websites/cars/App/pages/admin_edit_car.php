
<!-- THIS TEMPLATE IS TAKEN FROM THE BRIEF CODE PROVIDED  -->
<h2>Edit Car</h2>

<form action="" method="POST" enctype="multipart/form-data">

<input type="hidden" name="id" value="<?= $car->id; ?>" />
<label>Name</label>
<input type="text" name="name" value="<?= $car->name; ?>" />

<label>Description</label>
<textarea name="description"><?= $car->description; ?></textarea>

<label>Price</label>
<input type="text" name="price" value="<?= $car->price; ?>" />
<label>new_price</label>
<input type="text" name="new_price" value="<?= $car->new_price; ?>" />

<label>Car Engine type</label>
<input type="text" name="car_engine" value="<?= $car->car_engine; ?>" />
<label>Car Mileage</label>
<input type="text" name="car_mileage" value="<?= $car->car_mileage; ?>" />

<label>Category</label>

<select name="manufacturerId">
<?php
    foreach ($categories as $data_items_each) {
        if ($car->manufacturerId == $data_items_each->id) {
            echo '<option selected="selected" value="' . $data_items_each->id . '">' . $data_items_each->name . '</option>';
        }
        else {
            echo '<option value="' . $data_items_each->id . '">' . $data_items_each->name . '</option>';	
        }
        
    }

?>

</select>
<?php
    if (file_exists('../productimages/' . $car->id . '.jpg')) {
        echo '<img src="../productimages/' . $car->id . '.jpg" />';
    }
?>
<label>Product image</label>

<input type="file" name="image" />

<input type="submit" name="submit" value="Save Product" />

</form>