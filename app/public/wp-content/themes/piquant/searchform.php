<form role="search" method="get" id="searchform" class="searchform" action="<?php echo esc_url( home_url( '/' ) ); ?>">
    <div class="clearfix">
        <input placeholder="<?php esc_attr_e('Search...', 'piquant'); ?>" type="text" value="<?php echo esc_attr(get_search_query()); ?>" name="s" id="s" />
        <input type="submit" id="searchsubmit" value="&#xf002;" />
    </div>
</form>