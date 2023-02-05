<!-- THIS TEMPLATE IS TAKEN FROM THE BRIEF CODE PROVIDED  -->
<!DOCTYPE html>
<html>
	<head>
		<link rel="stylesheet" href="/styles.css"/>
		<title>Claires's Cars - <?= $title ?? ''; ?></title>
	</head>
	<body>
	<header>
		<section>
			<aside>
				<h3>Opening Hours:</h3>
				<p>Mon-Fri: 09:00-17:30</p>
				<p>Sat: 09:00-17:00</p>
				<p>Sundays: Closed</p>
			</aside>
			<img src="/images/logo.png"/>

		</section>
	</header>
	<nav>
		<ul>
			<li><a href="/">Home</a></li>
			<li><a href="/showroom">Showroom</a></li>
			<li><a href="/about.html">About Us</a></li>
			<li><a href="/contact.php">Contact us</a></li>
			<?php 
			if(\Framework\Session::session_user_exists()) {
				echo '<li><a href="/logout">Log Out</a></li>';
			} 
			else {
				echo '<li><a href="/login">Log In</a></li>';
			} 
?>
		</ul>

	</nav>
<img src="/images/randombanner.php"/>

    <?php 
    if(\Framework\Session::session_user_exists()) {
		// echo "if stmt executed";
        require 'admin_main.php';
    } else {
		// echo "else stmt executed";
        require 'normal_main.php';
    }
    ?>
	<footer>
		&copy; Claire's Cars 2023
	</footer>
</body>
</html>
