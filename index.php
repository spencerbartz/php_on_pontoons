<?php
    include "util/util.php";
    include_once "controller/abstract_controller.php";
    $siteRootPath = get_relative_root_path	(__FILE__);
    print_page_dec($siteRootPath);
?>
</head>
</head
<body>
<div id="header-wrapper">
	 <h1>Users</h1>	
    <div id="header" class="container">
    </div>
<body>
	<div id="header-wrapper">
		<div id="header" class="container">
			<div id="logo">
				<h1><a href="http://www.horrieinternational.com"> < Back to Horrie International</a></h1>
			</div>
		</div>
		
		<div id="banner" class="container">
			<div class="title">
				<h2>Create Your Own Adventure!</h2>
					<span class="byline">The possibilities are endless...</span>
			</div>
			<ul class="actions">
				<li>Redirecting you to our welcome page now ...</li>
				<meta http-equiv="refresh" content="0;URL=controller/users_controller.php?controller=user&action=new_user_view.php"></li>
			</ul>
		</div>
	</div>
	<?php print_copy_right(); ?>
	</body>
</html>
