<div class="mkdf-post-info-date mkdf-post-info-item">
    <?php if(!piquant_mikado_post_has_title()) { ?>
    <a href="<?php the_permalink() ?>">
        <?php } ?>
        <span class="mkdf-blog-date-icon">
            <?php echo piquant_mikado_icon_collections()->renderIcon('icon-calender', 'simple_line_icons'); ?>
        </span>
        <span class="mkdf-blog-date"><?php the_time('M d, Y'); ?></span>

        <?php if(!piquant_mikado_post_has_title()) { ?>
    </a>
<?php } ?>
</div>