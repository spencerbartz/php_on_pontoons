<?php
    include "util/util.php";
    include_once "controller/abstract_controller.php";
    $siteRootPath = get_relative_root_path	(__FILE__);
    print_page_dec($siteRootPath);
?>
</head>
<body>
<div id="header-wrapper">
	 <h1>Users</h1>	
    <div id="header" class="container">
    </div>
    
    <div id="banner" class="container">
    </div>
</div>
<?php print_copy_right(); ?>
</body>
</html>
