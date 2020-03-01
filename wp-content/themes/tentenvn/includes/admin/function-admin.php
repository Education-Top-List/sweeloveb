<?php
add_action('admin_menu', 'ch_essentials_admin');
function ch_essentials_admin() {

	register_setting('zang-settings-header', 'phone');
	register_setting('zang-settings-header', 'address_header');
	register_setting('zang-settings-socials', 'footer_insta');
	register_setting('zang-settings-socials', 'footer_fb');
	register_setting('zang-settings-socials', 'footer_ytb');
	register_setting('zang-settings-socials', 'footer_shopee');
	register_setting('zang-settings-socials', 'footer_lazada');
	/* Base Menu */
	add_menu_page('Zang Theme Option','Tenten Framework','manage_options','template_admin_zang','zang_theme_create_page',get_template_directory_uri() . '/images/setting_icon.png',110);
}
add_action('admin_init', 'zang_custom_settings');
function zang_custom_settings() { 

	/* Header Options Section */
	add_settings_section('zang-header-options', 'Chỉnh sửa header','zang_header_options_callback','zang-settings-header' );
	add_settings_field('address-hd','Số điện thoại', 'zang_phone_header','zang-settings-header', 'zang-header-options');
	add_settings_field('phone-hd','Địa chỉ', 'zang_address_header','zang-settings-header', 'zang-header-options');

	/* Social Options Section */
	add_settings_section('zang-social-options','Chỉnh sửa social','zang_social_options_callback','zang-settings-socials' );
	add_settings_field('insta','Instagram Link', 'zang_footer_insta','zang-settings-socials', 'zang-social-options');
	add_settings_field('facebook','Facebook Link', 'zang_footer_fb','zang-settings-socials', 'zang-social-options');
	add_settings_field('youtube','Youtube Link', 'zang_footer_ytb','zang-settings-socials', 'zang-social-options');
	add_settings_field('shopee','Shopee Link', 'zang_footer_shopee','zang-settings-socials', 'zang-social-options');
	add_settings_field('lazada','Lazada Link', 'zang_footer_lazada','zang-settings-socials', 'zang-social-options');
}

function zang_header_options_callback(){
	echo '';
}

function zang_social_options_callback(){
	echo '';
}

function zang_commit_options_callback(){
	echo '';
}

function zang_phone_header(){
	$phone = esc_attr(get_option('phone'));
	echo '<input type="text" class="iptext_adm" name="phone" value="'.$phone.'" >';
}
function zang_address_header(){
	$address_header = esc_attr(get_option('address_header'));
	echo '<input type="text" class="iptext_adm" name="address_header" value="'.$address_header.'" placeholder="" ';
}
function zang_footer_insta(){
	$footer_insta = esc_attr(get_option('footer_insta'));
	echo '<input type="text" class="iptext_adm" name="footer_insta" value="'.$footer_insta.'" placeholder="" ';
}
function zang_footer_fb(){
	$footer_fb = esc_attr(get_option('footer_fb'));
	echo '<input type="text" class="iptext_adm" name="footer_fb" value="'.$footer_fb.'" placeholder="" ';
}
function zang_footer_ytb(){
	$footer_ytb = esc_attr(get_option('footer_ytb'));
	echo '<input type="text" class="iptext_adm" name="footer_ytb" value="'.$footer_ytb.'" placeholder="" ';
}
function zang_footer_shopee(){
	$footer_shopee = esc_attr(get_option('footer_shopee'));
	echo '<input type="text" class="iptext_adm" name="footer_shopee" value="'.$footer_shopee.'" placeholder="" ';
}
function zang_footer_lazada(){
	$footer_lazada = esc_attr(get_option('footer_lazada'));
	echo '<input type="text" class="iptext_adm" name="footer_lazada" value="'.$footer_lazada.'" placeholder="" ';
}




function myshortcode(){
	ob_start();
	if(get_option('footer_fb') || get_option('footer_twitter') || get_option('footer_ggplus') || get_option('footer_insta') ){
		?>
		<ul class="social_ft">
			<?php if(get_option('footer_fb')){ ?>
				<li class="fb_ft"><a href="<?php echo get_option('footer_fb'); ?>" target="_blank"><i class="fa fa-facebook" aria-hidden="true"></i></a></li>
			<?php }?>
			<?php if(get_option('footer_twitter')){ ?>
				<li class="twitter"><a href="<?php echo get_option('footer_twitter'); ?>" target="_blank"><i class="fa fa-twitter" aria-hidden="true"></i></i></a></li>
			<?php }?>
			<?php if(get_option('footer_ggplus')){ ?>
				<li class="ggplus"><a href="<?php echo get_option('footer_ggplus'); ?>" target="_blank"><i class="fa fa-google" aria-hidden="true"></i></a></li>
			<?php }?>
			<?php if(get_option('footer_insta')){ ?>
				<li class="instagram"><a href="<?php echo get_option('footer_insta'); ?>" target="_blank"><i class="fa fa-instagram" aria-hidden="true"></i></a></li>
			<?php }?>
		</ul>	
		<?php
	}
	return ob_get_clean();
}
add_shortcode('social_ft','myshortcode');



/* Display Page
-----------------------------------------------------------------*/
function zang_theme_create_page() {
	?>
	<div class="wrap">  
		<?php settings_errors(); ?>  

		<?php  
		$active_tab = isset( $_GET[ 'tab' ] ) ? $_GET[ 'tab' ] : 'header_page_options';  
		?>  

		<ul class="nav-tab-wrapper"> 
		<li><a href="?page=template_admin_zang&tab=header_page_options" class="nav-tab <?php echo $active_tab == 'header_page_options' ? 'nav-tab-active' : ''; ?>">Header</a> </li>
		<li><a href="?page=template_admin_zang&tab=social_page_options" class="nav-tab <?php echo $active_tab == 'social_page_options' ? 'nav-tab-active' : ''; ?>">Social Footer</a></li>	
		</ul>  

		<form method="post" action="options.php">  
			<?php 
			if( $active_tab == 'header_page_options' ) {  
				settings_fields( 'zang-settings-header' );
				do_settings_sections( 'zang-settings-header' ); 
			} else if( $active_tab == 'social_page_options' ) {
				settings_fields( 'zang-settings-socials' );
				do_settings_sections( 'zang-settings-socials' ); 
			}
			?>             
			<?php submit_button(); ?>  
		</form> 

	</div> 

	<?php
}

