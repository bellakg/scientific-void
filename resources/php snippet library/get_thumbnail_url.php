if ( have_posts() ) {
    while ( have_posts() ) {
        the_post();
   
        /* grab the url for the full size featured image */
        $featured_img_url = get_the_post_thumbnail_url(get_the_ID(),'full'); 
  
        /* link thumbnail to full size image for use with lightbox*/
        echo '<a href="'.esc_url($featured_img_url).'" rel="lightbox">'; 
            the_post_thumbnail('thumbnail');
        echo '</a>';
    endwhile; 
endif;