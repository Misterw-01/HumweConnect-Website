<?php
/**
 * Advisory About Theme
 *
 * @package Advisory
 */

//about theme info
add_action( 'admin_menu', 'advisory_abouttheme' );
function advisory_abouttheme() {    	
	add_theme_page( __('About Theme Info', 'advisory'), __('About Theme Info', 'advisory'), 'edit_theme_options', 'advisory_guide', 'advisory_mostrar_guide');   
} 

//Info of the theme
function advisory_mostrar_guide() { 	
?>

<h1><?php esc_html_e('About Theme Info', 'advisory'); ?></h1>
<hr />  

<p><?php esc_html_e('Advisory is a clever, tech-savvy, polished, extremely professional and graphically serious advisor WordPress theme. This finance multipurpose website theme is perfect for developing attractive and impressive website to grow your financial business. This theme is specially designed to create website for financial firms, economist, investment, consulting, broker, legal assistance, financial institutions and advisor agencies. It is also perfect to fit all corporate, business, online consulting, insurance, planning and corporations with financial services. This theme is very flexible and adaptive. Its use is not only restricted to financial advisory companies, but also it can be used for any business niche.', 'advisory'); ?></p>

<h2><?php esc_html_e('Theme Features', 'advisory'); ?></h2>
<hr />  
 
<h3><?php esc_html_e('Theme Customizer', 'advisory'); ?></h3>
<p><?php esc_html_e('The built-in customizer panel quickly change aspects of the design and display changes live before saving them.', 'advisory'); ?></p>


<h3><?php esc_html_e('Responsive Ready', 'advisory'); ?></h3>
<p><?php esc_html_e('The themes layout will automatically adjust and fit on any screen resolution and looks great on any device. Fully optimized for iPhone and iPad.', 'advisory'); ?></p>


<h3><?php esc_html_e('Cross Browser Compatible', 'advisory'); ?></h3>
<p><?php esc_html_e('Our themes are tested in all mordern web browsers and compatible with the latest version including Chrome,Firefox, Safari, Opera, IE11 and above.', 'advisory'); ?></p>


<h3><?php esc_html_e('E-commerce', 'advisory'); ?></h3>
<p><?php esc_html_e('Fully compatible with WooCommerce plugin. Just install the plugin and turn your site into a full featured online shop and start selling products.', 'advisory'); ?></p>

<hr />  	
<p><a href="http://www.gracethemesdemo.com/documentation/advisory/#homepage-lite" target="_blank"><?php esc_html_e('Documentation', 'advisory'); ?></a></p>

<?php } ?>