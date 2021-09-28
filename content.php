<div class="content">
    <div class="conveyor">

        <?php query_posts('post_type=post&post_status=publish&posts_per_page=10&paged='. get_query_var('paged')); ?>

        <?php 
                // Get total posts
                $total = $wp_query->post_count;

                // Set indicator to 0;
                $i = 0;
                ?>



        <?php while( have_posts() ): the_post(); ?>
        <?php if ( $i == 0 );?>
        <div class="tile">
            <?php if(has_post_thumbnail()):?>
                        <div class="card-thumbnail"><a href="<?php the_permalink();?>"><img
                                    src="<?php the_post_thumbnail_url('thumb_image');?>" class="post-thumbnail"
                                    alt="<?php the_title();?>"></a></div>
                        <?php endif;?> <a class="card-title" href="<?php the_permalink();?>">
                                <h5><?php the_title();?></h5>
                            </a>
                            <p class="card-excerpt"> <?php echo wp_trim_words( get_the_excerpt(), 15, '...' ); ?> </p></div>
        <?php $i++; ?>  


       
        <?php endwhile; ?>
        </div>
       
        </div>
