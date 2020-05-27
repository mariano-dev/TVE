<?php
/**
* Template Name: FrontPage
*/
get_header();


get_template_part( 'sections/section', 'slider' );
get_template_part( 'sections/section', 'trip-search' );
get_template_part( 'sections/section', 'why-choose' );
get_template_part( 'sections/section', 'cta' );
get_template_part( 'sections/section', 'tour-package' );
get_template_part( 'sections/section', 'counter' );
get_template_part( 'sections/section', 'popular-destinations' );
get_template_part( 'sections/section', 'testimonials' );
get_template_part( 'sections/section', 'blog' );
get_template_part( 'sections/section', 'clients' );

get_footer();