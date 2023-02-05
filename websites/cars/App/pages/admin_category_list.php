
<!-- THIS TEMPLATE IS TAKEN FROM THE BRIEF CODE PROVIDED  -->
<h2>Manufacturers</h2>

<a class="new" href="/add/category/">Add new manufacturer</a>
<table>
<thead>
<tr>
<th>Name</th>
<th style="width: 5%">&nbsp;</th>
<th style="width: 5%">&nbsp;</th>
</tr>


<?php foreach ($categories as $category) { ?>
    <tr>
    <td><?= $category->name ?></td>
    <td><a style="float: right" href="/edit/category/<?= $category->id ?>">Edit</a></td>
    <td><form method="post" action="/delete/category">
    <input type="hidden" name="id" value="<?= $category->id ?>" />
    <input type="submit" name="submit" value="Delete" />
    </form></td>
    </tr>
<?php } ?>

</thead>
</table>