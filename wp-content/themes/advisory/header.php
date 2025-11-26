<?php
/**
 * The Header for our theme.
 *
 * Displays all of the <head> section and everything up till <div class="container">
 *
 * @package Advisory
 */
?><!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
<meta charset="<?php bloginfo( 'charset' ); ?>">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="profile" href="http://gmpg.org/xfn/11">
<?php if ( is_singular() && pings_open( get_queried_object() ) ) : ?>
	<link rel="pingback" href="<?php echo esc_url( get_bloginfo( 'pingback_url' ) ); ?>">
<?php endif; ?>
<?php wp_head(); ?>
</head>
<body <?php body_class(); ?>>
<?php
	if ( function_exists( 'wp_body_open' ) ) {
		wp_body_open();
	} else {
		do_action( 'wp_body_open' );
	}
?>
<a class="skip-link screen-reader-text" href="#TabNavigation">
<?php esc_html_e( 'Skip to content', 'advisory' ); ?>
</a>
<?php
$advisory_show_maincarousel 	      		= esc_attr( get_theme_mod('advisory_show_maincarousel', false) );
$advisory_show_themewelomesection              	= esc_attr( get_theme_mod('advisory_show_themewelomesection', false) ); 
$advisory_show_3circle_servicessection   		= esc_attr( get_theme_mod('advisory_show_3circle_servicessection', false) );
?>
<div id="themegripper" <?php if( get_theme_mod( 'advisory_BXtype' ) ) { echo 'class="boxlayout"'; } ?>>
<?php
if ( is_front_page() && !is_home() ) {
	if( !empty($advisory_show_maincarousel)) {
	 	$innerpage_cls = '';
	}
	else {
		$innerpage_cls = 'innerpage_header';
	}
}
else {
$innerpage_cls = 'innerpage_header';
}
?>

<div class="site-header <?php echo esc_attr($innerpage_cls); ?> ">           
  <div class="logo_and_navibar">    
       <div class="container">      
        <div class="logo">
           <?php advisory_the_custom_logo(); ?>
            <h1><a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><?php bloginfo('name'); ?></a></h1>
            <?php $description = get_bloginfo( 'description', 'display' );
            if ( $description || is_customize_preview() ) : ?>
                <p><?php echo esc_html($description); ?></p>
            <?php endif; ?>
        </div><!-- logo --> 
        <div class="menuarea_hdr">      
         <div id="navigationpanel">       
		     <button class="menu-toggle" aria-controls="main-navigation" aria-expanded="false" type="button">
			    <span aria-hidden="true"><?php esc_html_e( 'Menu', 'advisory' ); ?></span>
			    <span class="dashicons" aria-hidden="true"></span>
		     </button>
		    <nav id="main-navigation" class="header-menubar primary-navigation" role="navigation">
				<?php
                wp_nav_menu( array(
                    'theme_location' => 'primary',
                    'container' => 'ul',
                    'menu_id' => 'primary',
                    'menu_class' => 'primary-menu menu',
                ) );
                ?>
		     </nav><!-- .header-menubar -->
	       </div><!-- #navigationpanel -->     
         </div><!-- .menuarea_hdr -->     
        <div class="clear"></div>
     </div><!-- .container -->   
 </div><!-- .logo_and_navibar -->  
</div><!--.site-header --> 
 
<?php 
if ( is_front_page() && !is_home() ) {
if($advisory_show_maincarousel != '') {
	for($i=1; $i<=3; $i++) {
	  if( get_theme_mod('advisory_carouselpge'.$i,false)) {
		$slider_Arr[] = absint( get_theme_mod('advisory_carouselpge'.$i,true));
	  }
	}
?> 
<div class="homepageslider">              
<?php if(!empty($slider_Arr)){ ?>
<div id="slider" class="nivoSlider">
<?php 
$i=1;
$slidequery = new WP_Query( array( 'post_type' => 'page', 'post__in' => $slider_Arr, 'orderby' => 'post__in' ) );
while( $slidequery->have_posts() ) : $slidequery->the_post();
$image = wp_get_attachment_url( get_post_thumbnail_id($post->ID)); 
$thumbnail_id = get_post_thumbnail_id( $post->ID );
$alt = get_post_meta($thumbnail_id, '_wp_attachment_image_alt', true); 
?>
<?php if(!empty($image)){ ?>
<img src="<?php echo esc_url( $image ); ?>" title="#slidecaption<?php echo esc_attr( $i ); ?>" alt="<?php echo esc_attr($alt); ?>" />
<?php }else{ ?>
<img src="<?php echo esc_url( get_template_directory_uri() ) ; ?>/images/slides/slider-default.jpg" title="#slidecaption<?php echo esc_attr( $i ); ?>" alt="<?php echo esc_attr($alt); ?>" />
<?php } ?>
<?php $i++; endwhile; ?>
</div>   

<?php 
$j=1;
$slidequery->rewind_posts();
while( $slidequery->have_posts() ) : $slidequery->the_post(); ?>                 
    <div id="slidecaption<?php echo esc_attr( $j ); ?>" class="nivo-html-caption">         
    	<h2><?php the_title(); ?></h2>
    	<?php the_excerpt(); ?>
		<?php
        $advisory_carouselpgebutton = get_theme_mod('advisory_carouselpgebutton');
        if( !empty($advisory_carouselpgebutton) ){ ?>
            <a class="buttonforslider" href="<?php the_permalink(); ?>"><?php echo esc_html($advisory_carouselpgebutton); ?></a>
        <?php } ?>                  
    </div>   
<?php $j++; 
endwhile;
wp_reset_postdata(); ?>   
<?php } ?>
 </div><!-- .homepageslider -->    
<?php } } ?>   
        
<?php if ( is_front_page() && ! is_home() ) { ?>
   <?php if( $advisory_show_3circle_servicessection != ''){ ?> 
   <section id="PageSection1">
     <div class="container">       
       <div class="area_row">
    	<div class="left-column-40">
            <?php
        $advisory_servicestitle = get_theme_mod('advisory_servicestitle');
        if( !empty($advisory_servicestitle) ){ ?>
            <h2 class="section_title"><?php echo esc_html($advisory_servicestitle); ?></h2>
         <?php } ?>  
        </div>
        
        <div class="right-column-60">
			<?php
            $advisory_servicesbutton = get_theme_mod('advisory_servicesbutton');
            if( !empty($advisory_servicesbutton) ){ ?>        
               <?php $advisory_titlelink = get_theme_mod('advisory_titlelink');
                     if( !empty($advisory_titlelink) ){ ?>        
                      <a href="<?php echo esc_url($advisory_titlelink); ?>" class="servicesemore"><?php echo esc_html($advisory_servicesbutton); ?></a>            
                  <?php } ?> 
             <?php } ?> 
        </div>
        <div class="clear"></div>
      </div><!-- .area_row -->   
      
        <div class="box-equal-height">          
               <?php 
                for($n=1; $n<=3; $n++) {    
                if( get_theme_mod('advisory_3circlepge'.$n,false)) {      
                    $queryvar = new WP_Query('page_id='.absint(get_theme_mod('advisory_3circlepge'.$n,true)) );		
                    while( $queryvar->have_posts() ) : $queryvar->the_post(); ?>     
                     <div class="circle3pageBox <?php if($n % 3 == 0) { echo "last_column"; } ?>">
                        <div class="circleboxbg">                                                   
							 <?php if(has_post_thumbnail() ) { ?>
                                <div class="smallthumbbox">
                                  <a href="<?php the_permalink(); ?>"><?php the_post_thumbnail(); ?></a>
                                   <div class="box-count"><h4>0<?php echo esc_attr( $n ); ?></h4></div>
                                </div>        
                             <?php } ?>
                             <div class="shortdescbox">              	
                                <h4><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h4> 
                                <?php the_excerpt(); ?>                                     
                             </div> 
                        </div>                                     
                     </div>
                    <?php endwhile;
                    wp_reset_postdata();                                  
                } } ?>                                 
               <div class="clear"></div> 
          </div><!-- .box-equal-height -->       
      </div><!-- .container -->
    </section><!-- #PageSection1 -->
  <?php } ?>

<?php if( $advisory_show_themewelomesection != ''){ ?>  
  <section id="PageSection2">
    <div class="container">                               
		<?php 
        if( get_theme_mod('advisory_onlyonewelcome',false)) {     
        $queryvar = new WP_Query('page_id='.absint(get_theme_mod('advisory_onlyonewelcome',true)) );			
            while( $queryvar->have_posts() ) : $queryvar->the_post(); ?>              
              <div class="WelcomeBX-45">              
				<?php
                $advisory_welcome_subtitle = get_theme_mod('advisory_welcome_subtitle');
                if( !empty($advisory_welcome_subtitle) ){ ?>
                <h4 class="sub_title"><?php echo esc_html($advisory_welcome_subtitle); ?></h4>
                <?php } ?>    
                <h3><?php the_title(); ?></h3>   
                <?php the_content();  ?> 
                <a href="<?php the_permalink(); ?>" class="servicesemore"><?php esc_html_e( 'Read More', 'advisory' ); ?></a>        
              </div> 
              <div class="WelcomeIMGBX-45">
			    <?php the_post_thumbnail();?>
              </div>                                         
            <?php endwhile;
             wp_reset_postdata(); ?>                                    
            <?php } ?>                                 
       <div class="clear"></div>                       
     </div><!-- .container -->
    </section><!-- #PageSection2-->
 <?php } ?>
<?php } ?>