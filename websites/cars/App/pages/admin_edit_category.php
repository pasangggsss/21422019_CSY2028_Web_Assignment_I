<!-- THIS TEMPLATE IS TAKEN FROM THE BRIEF CODE PROVIDED  -->

<h2>Edit Manufacturer</h2>

<form action="" method="POST">

    <input type="hidden" name="id" value="<?= $currentMan->id; ?>" />
    <label>Name</label>
    <input type="text" name="name" value="<?= $currentMan->name; ?>" />


    <input type="submit" name="submit" value="Save Manufacturer" />

</form>

