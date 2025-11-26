<?php
/**
 * The template for displaying 404 pages (Not Found).
 *
 * @package Advisory
 */

get_header(); ?>

<div class="container">
    <div id="TabNavigation">
        <div class="site-contentBX">
            <header class="page-header">
                <h1 class="entry-title"><?php esc_html_e( '404 Not Found', 'advisory' ); ?></h1>                
            </header><!-- .page-header -->
            <div class="page-content">
                <p><?php esc_html_e( 'Looks like you have taken a wrong turn....Dont worry... it happens to the best of us.', 'advisory' ); ?></p>  
            </div><!-- .page-content -->
        </div><!-- site-contentBX-->   
        <?php get_sidebar();?>       
        <div class="clear"></div>
    </div>
</div>
<?php get_footer(); ?>