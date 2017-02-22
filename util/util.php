<?php
	include "print_util.php";
	$default_locale = "en_US";
	date_default_timezone_set("America/Los_Angeles");

	function print_header($file) {
		$path = get_relative_root_path($file);

		println('<h1 id="logo-text"><a href="' . $path . 'index.php">' . "TITLE" . "<span>" . "TITLE" . '</span></a></h1>');
		println('<h2 id="slogan">' . "PHP on Pontoons" . '</h2>');
		println('<div id="header-links">');
		println('<p> <a href="' . $path . 'index.php">' . _("Home") . '</a> | <a href="' . $path . 'contact' . SLASH . 'contactresume.php">' . _("Contact / Resume") . '</a> | <a href="' . $path . 'index.php?locale=ja_JP" class="japanese">' . _("Japanese") . '</a> | <a href="' . $path . 'index.php" class="english">English</a></p>');
		println('</div>');
	}

	function print_page_dec($file) {
		println('<!doctype html>');
		println('<html xmlns="http://www.w3.org/1999/xhtml">');
		println('<head>');
		println('<meta name="Description" content="Information architecture, Web Design, Web Standards." />');
		println('<meta name="Keywords" content="spencer, bartz, software development, software engineering, programming, IT" />');
		println('<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />');
		println('<meta name="Distribution" content="Global" />');

		$path =  get_relative_root_path($file);

		//  <link href="css/fonts.css" rel="stylesheet" type="text/css" media="all" />
		//	println('<link rel="shortcut icon" href="' . $path . 'images' . $DS . 'favicon.ico" />');
		//	println('<script type="text/javascript" src="' . $path . 'js' . $DS . 'jquery-1.11.2.min.js"></script>');
	}

	// TODO bring in search function from spencerbartz.com and use this
	//Print a form allowing the user to search pages
	function print_search_box($file) {
		$path = get_relative_root_path($file);
		println('<div id="close-button" onclick="deactivateSearch();">' . _("Close") . ' [X]</div>');
		println("<h3>" . _("Search spencerbartz.com") . "</h3>");
		println('<form id="searchform" action="' . $path . 'search/searchresult.php" class="searchform" method="post">');
		println("<p>");
		println('<input id="searchquery" name="search_query" class="textbox" type="text" onfocus="activateSearch()" onblur=""/>');
		println('<input name="search" class="button" value="' . _('Search') . '" type="submit" />');
		println("</p>");
		println("</form>");
	}

	function last_updated($filename) {
		if (file_exists($filename)) {
			println( _("Last updated: ") . date ("F d, Y H:i:s", filemtime($filename)) . " PST");
		}
	}

	function delete_directory($dir) {
		if (!file_exists($dir)) {
			return true;
		}

		if (!is_dir($dir)) {
			return unlink($dir);
		}

		foreach(scandir($dir) as $item) {
			if ($item == '.' || $item == '..') {
				continue;
			}

			if (!delete_directory($dir . SLASH . $item)) {
				return false;
			}
		}

		return rmdir($dir);
	}

	// Instead of a captcha, let them do arithmetic!
	function generate_bot_check() {
		$operands  = array(rand(1, 10), rand(1, 8), rand(1, 10));
		$challenge = $operands[0] . " * " . $operands[1] . " - " . $operands[2] . " = ";
		$result    = $operands[0] * $operands[1] - $operands[2];
		return array($challenge, $result);
	}

	// Debug Functions
	function alert($str) {
		echo '<script type="text/javascript">alert("' . $str . '");</script>';
	}

	function console_log($str) {
		echo 'console.log("' . $str . '");';
	}
?>