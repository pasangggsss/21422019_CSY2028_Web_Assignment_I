<!-- THIS TEMPLATE IS TAKEN FROM THE BRIEF CODE PROVIDED  -->

<section class="left">
    <ul>
        <!-- LIST ALL THE CATEGORY AND SETG THE LINK TO GO TO EACH CATEGORY PAGES BY IT'S ID WHILE DISPLAYING IT'S NAME -->
        <?php foreach($categories as $category_list) { ?>
        <li><a href="/cars/category/<?= $category_list->id ?>"><?= $category_list->name ?></a></li>
        <?php } ?>
    </ul>
</section>