<div class="wrap">
	<h1>Sample Page</h1>
	<?php settings_errors(); ?>

	<ul class="nav nav-tabs">
		<li class="active"><a href="#tab-1">Manage Settings</a></li>
		<li><a href="#tab-2">Link</a></li>
	</ul>

	<div class="tab-content">
		<div id="tab-1" class="tab-pane active">

			<form method="post" action="options.php">
				<?php
				settings_fields('sample_options_group');
				do_settings_sections('sample_page');
				submit_button();
				?>
			</form>

		</div>


	</div>
</div>