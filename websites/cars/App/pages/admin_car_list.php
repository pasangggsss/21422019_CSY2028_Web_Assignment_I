<!-- THIS TEMPLATE IS TAKEN FROM THE BRIEF CODE PROVIDED  -->

<h2>Cars</h2>
<a class="new" href="/add/car">Add new car</a>

<table>
<thead>
<tr>
<th>Model</th>
<th style="width: 10%">Price</th>
<th style="width: 5%">&nbsp;</th>
<th style="width: 5%">&nbsp;</th>
</tr>

<?php foreach ($cars as $car_list_item) { ?>
    <tr>
    <td><?=$car_list_item->name ?></td>
    <td>£<?=$car_list_item->price ?></td>
    <td><a style="float: right" href="/edit/car/<?=$car_list_item->id ?>">Edit</a></td>
    <td><form method="post" action="/delete/car">
    <input type="hidden" name="id" value="<?=$car_list_item->id?>" />
    <input type="submit" name="submit" value="Delete" />
    </form></td>
    </tr>
<?php } ?>

</thead>
</table>
