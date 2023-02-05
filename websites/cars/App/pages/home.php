<!-- THIS TEMPLATE IS TAKEN FROM THE BRIEF CODE PROVIDED  -->
<h1>Stories</h1>

<?php 
foreach($stories as $story_item)
{ ?>
    <h2><?= $story_item->title; ?></h2>
    <!-- <p><?= $story_item->content;?></p> -->
    <em> Story by <?=  $story_item->user;?></em>
<?php } ?>