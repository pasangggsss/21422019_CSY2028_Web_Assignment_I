
<!-- THIS TEMPLATE IS TAKEN FROM THE BRIEF CODE PROVIDED  -->
<h2>Stories</h2>
<a class="new" href="/add/story">Add new Story</a>
<table>
<thead>
<tr>
<th>Title</th>
<th style="width: 5%">&nbsp;</th>
</tr>

<?php foreach ($stories as $story_list_item) { ?>
    <tr>
    <td><?=$story_list_item->title ?></td>
    <td><form method="post" action="/delete/story">
    <input type="hidden" name="id" value="<?= $story_list_item->id?>" />
    <input type="submit" name="submit" value="Delete" />
    </form></td>
    </tr>
<?php } ?>

</thead>
</table>
