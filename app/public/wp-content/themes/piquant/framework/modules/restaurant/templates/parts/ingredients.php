<?php if(is_array($ingredients) && count($ingredients)) : ?>
	<div class="mkdf-smi-ingredients-holder">
		<h3><?php esc_html_e('Ingredients', 'piquant'); ?></h3>

		<div class="mkdf-smi-ingredients-content">
			<ul class="mkdf-smi-ingredients-list">
				<?php foreach($ingredients as $ingredient) : ?>
					<li><?php echo esc_html($ingredient); ?></li>
				<?php endforeach; ?>
			</ul>
		</div>
	</div>
<?php endif; ?>