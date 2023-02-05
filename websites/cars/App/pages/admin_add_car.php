
<h2>Add Car</h2>
<!-- THIS TEMPLATE IS TAKEN FROM THE BRIEF CODE PROVIDED  -->
<form action="" method="POST" enctype="multipart/form-data">
    <label>Car Model</label>
    <input type="text" name="name" />

    <label>Description</label>
    <textarea name="description"></textarea>

    <label>Price</label>
    <input type="text" name="price" />

    <label>new_price</label>
    <input type="text" name="new_price" />

    <label>Car Engine type</label>
    <input type="text" name="car_engine" />
    <label>Car Mileage</label>
        <input type="text" name="car_mileage" />
    <label>Category</label>

    <select name="manufacturerId">
    <?php
        foreach ($categories as $category_list_item) {
            echo '<option value="' . $category_list_item->id . '">' . $category_list_item->name . '</option>';
        }

    ?>

    </select>

    <label>Image</label>

    <input type="file" name="image" />

    <input type="submit" name="submit" value="Add Car" />
</form>
