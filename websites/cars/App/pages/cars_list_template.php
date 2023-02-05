<!-- THIS TEMPLATE IS TAKEN FROM THE BRIEF CODE PROVIDED  -->

<h1>Our cars</h1>

<ul class="cars">
<?php
// LOOP THROUGH ALL THE CARS PROVIDED BY THE CONTROLLER AND SET THEIR CATEGORIES WHILE ALSO DISPLAYING THEIR INFORMATION AND IMAGE
foreach ($cars as $car_list) {
    foreach ($categories as $cateogriues_list) {
        if($car_list->manufacturerId == $cateogriues_list->id) {
            $car_list->manufacturer =$cateogriues_list; 
        }
    }
    $image = '';
    if (file_exists('images/cars/' . $car_list->id . '.jpg')) {
        $image =  '<a href="/images/cars/' . $car_list->id . '.jpg"><img src="/images/cars/' . $car_list->id . '.jpg" /></a>';
    }
 ?>
  <li>
    <?= $image ?> 
      <div class="details">
		<h2><?= $car_list->manufacturer->name ?> <?= $car_list->name ?></h2>
        <h3>Engine: <?= $car_list->car_engine?></h3>
        <h3>mileage: <?= $car_list->car_mileage?></h3>
        
		<h3>
        <?php
        if($car_list->new_price != '') {
            echo 'Was £'.$car_list->price.' Now: £'.$car_list->new_price ;
        } else {
            echo '£'.$car_list->price;
        }
        ?></h3>
		<p> <?= $car_list->description  ?></p>
		</div>
		</li>
    
 <?php }

?>

</ul>