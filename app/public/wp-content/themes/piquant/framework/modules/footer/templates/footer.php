<?php
/**
 * Footer template part
 */

piquant_mikado_get_content_bottom_area(); ?>
</div> <!-- close div.content_inner -->
</div>  <!-- close div.content -->

<footer <?php piquant_mikado_class_attribute($footer_classes); ?>>
	<div class="mkdf-footer-inner clearfix">

		<?php

		if($display_footer_top) {
			piquant_mikado_get_footer_top();
		}
		if($display_footer_bottom) {
			piquant_mikado_get_footer_bottom();
		}
		?>

	</div>
</footer>

</div> <!-- close div.mkdf-wrapper-inner  -->
</div> <!-- close div.mkdf-wrapper -->
<?php wp_footer(); ?>
</body>
</html>