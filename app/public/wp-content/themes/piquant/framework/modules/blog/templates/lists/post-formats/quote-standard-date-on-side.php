<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
    <a href="<?php the_permalink() ?>">
        <div class="mkdf-post-content clearfix">
            <div class="mkdf-post-text">
                <div class="mkdf-post-text-inner">
                    <div class="mkdf-post-mark">
                        <?php echo piquant_mikado_icon_collections()->renderIcon('icon_quotations', 'font_elegant'); ?>
                    </div>
                    <div class="mkdf-post-title-holder">
                        <h4 class="mkdf-post-title"><?php echo esc_html(get_post_meta(get_the_ID(), 'mkdf_post_quote_text_meta', true)); ?></h4>
                        <p class="mkdf-quote-author"><?php the_title(); ?></p>
                    </div>
                </div>
            </div>
        </div>
    </a>
</article>