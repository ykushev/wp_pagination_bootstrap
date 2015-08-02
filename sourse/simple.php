<?php
    $pagination =  paginate_links( array(
        'base'         => esc_url_raw( str_replace( 999999999, '%#%', remove_query_arg( 'add-to-cart', get_pagenum_link( 999999999, false ) ) ) ),
        'format'       => '',
        'add_args'     => '',
        'current'      => max( 1, get_query_var( 'paged' ) ),
        'total'        => $wp_query->max_num_pages,
        'prev_next'    => FALSE,
        'type'         => 'array',
        'end_size'     => 10,
        'mid_size'     => 10
    ) );
    $current = max( 1, get_query_var( 'paged' ) )-1;
	?>
    <ul class="pagination pagination-lg text-center">
        <?php if (get_previous_posts_link()) { ?>
            <li><?php previous_posts_link( '<i class="fa fa-angle-left"></i>', 0 );?></li>
        <?php } else { ?>
            <li class="disabled"><a><i class="fa fa-angle-left"></i></a></li>
        <?php } ?>

        <?php foreach ($pagination as $key=> $link) { ?>
            <li class="<?php if ($key == $current) echo 'active'; ?>"><?php echo $link?></li>
        <?php }?>

        <?php if (get_next_posts_link()) { ?>
            <li><?php next_posts_link( '<i class="fa fa-angle-right"></i>', 0 );?></li>
        <?php } else { ?>
            <li class="disabled"><a><i class="fa fa-angle-right"></i></a></li>
        <?php } ?>
    </ul>