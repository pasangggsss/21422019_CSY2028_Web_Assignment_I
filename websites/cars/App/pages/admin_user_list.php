
<!-- THIS TEMPLATE IS TAKEN FROM THE BRIEF CODE PROVIDED  -->
<h2>USERS</h2>
<a class="new" href="/add/user">Add new user</a>

<table>
<thead>
<tr>
<th>username</th>
<th style="width: 5%">&nbsp;</th>
</tr>

<?php foreach ($users as $user_list_item) { ?>
    <tr>
    <td><?=$user_list_item->username ?></td>
    <td><form method="post" action="/delete/user">
    <input type="hidden" name="id" value="<?=$user_list_item->id?>" />
    <input type="submit" name="submit" value="Delete" />
    </form></td>
    </tr>
<?php } ?>

</thead>
</table>
