<div class="mkdf-post-info-author mkdf-post-info-item">
    <span class="mkdf-blog-author-icon">
        <?php echo piquant_mikado_icon_collections()->renderIcon('icon-note', 'simple_line_icons'); ?>
    </span>
    <a class="mkdf-post-info-author-link" href="<?php echo esc_url(get_author_posts_url( get_the_author_meta( 'ID' ) )); ?>">
        <?php the_author_meta('display_name'); ?>
    </a>
</div>