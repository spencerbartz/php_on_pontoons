<?php
	include "router/router.php";
?>
</head>
	<body>
		<div id="header-wrapper">
			<div id="header" class="container">
				<div>
					<h1>Welcome to PHP on Pylons!</h1>
				</div>

				<div id="center" class="container">
					An MVC framework by Spencer Bartz
				</div>

				<div id="footer" class="container">
					<?php Router::link_to("users", "create", "Users Page"); ?>
				</div>
			</div>
		</div>

	</body>
</html>
