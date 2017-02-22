<h1>The requested page was not found. Sorry about that chief!</h1>
<?php
	$path = get_relative_root_path($_SERVER["REQUEST_URI"], true);
	echo '<img src="' . $path . 'util/404.jpg"/>';
?>
