<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
    <a href="<?php the_permalink(); ?>">
        <div class="mkdf-post-content clearfix">
            <div class="mkdf-post-text">
                <div class="mkdf-post-text-inner">
                    <div class="mkdf-post-mark">
                        <?php echo piquant_mikado_icon_collections()->renderIcon('icon-link', 'simple_line_icons'); ?>
                    </div>
                    <h4 class="mkdf-post-title"><?php the_title(); ?></h4>
                </div>
            </div>
        </div>
    </a>
</article>