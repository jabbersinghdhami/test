<?php
$icon_html = piquant_mikado_icon_collections()->renderIcon($icon, $icon_pack);
?>

<div class="mkdf-message-icon-holder">
	<div class="mkdf-message-icon" <?php piquant_mikado_inline_style($icon_attributes); ?>>
		<div class="mkdf-message-icon-inner">
			<?php
				print $icon_html;
			?>			
		</div> 
	</div>	 
</div>

