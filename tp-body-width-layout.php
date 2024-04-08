<?php

	$ngo_organization_tp_theme_css = "";

//body layout//

$ngo_organization_theme_lay = get_theme_mod( 'ngo_organization_tp_body_layout_settings','Full');
if($ngo_organization_theme_lay == 'Container'){
$ngo_organization_tp_theme_css .='body{';
$ngo_organization_tp_theme_css .='max-width: 1140px; width: 100%; padding-right: 15px; padding-left: 15px; margin-right: auto; margin-left: auto;';
$ngo_organization_tp_theme_css .='}';
$ngo_organization_tp_theme_css .='.page-template-front-page .top-header{';
$ngo_organization_tp_theme_css .='position: static;';
$ngo_organization_tp_theme_css .='}';
$ngo_organization_tp_theme_css .='@media screen and (max-width:575px){';
$ngo_organization_tp_theme_css .='body{';
	$ngo_organization_tp_theme_css .='max-width: 100%; padding-right:0px; padding-left: 0px';
$ngo_organization_tp_theme_css .='} }';
$ngo_organization_tp_theme_css .='.scrolled{';
$ngo_organization_tp_theme_css .='width: auto; left:0; right:0;';
$ngo_organization_tp_theme_css .='}';
}else if($ngo_organization_theme_lay == 'Container Fluid'){
$ngo_organization_tp_theme_css .='body{';
$ngo_organization_tp_theme_css .='width: 100%;padding-right: 15px;padding-left: 15px;margin-right: auto;margin-left: auto;';
$ngo_organization_tp_theme_css .='}';
$ngo_organization_tp_theme_css .='.page-template-front-page .top-header{';
$ngo_organization_tp_theme_css .='position: static;';
$ngo_organization_tp_theme_css .='}';
$ngo_organization_tp_theme_css .='@media screen and (max-width:575px){';
$ngo_organization_tp_theme_css .='body{';
	$ngo_organization_tp_theme_css .='max-width: 100%; padding-right:0px; padding-left:0px';
$ngo_organization_tp_theme_css .='} }';
$ngo_organization_tp_theme_css .='.scrolled{';
$ngo_organization_tp_theme_css .='width: auto; left:0; right:0;';
$ngo_organization_tp_theme_css .='}';
}else if($ngo_organization_theme_lay == 'Full'){
$ngo_organization_tp_theme_css .='body{';
$ngo_organization_tp_theme_css .='max-width: 100%;';
$ngo_organization_tp_theme_css .='}';
}

//scroll-top-alignmemt
$ngo_organization_scroll_position = get_theme_mod( 'ngo_organization_scroll_top_position','Right');
if($ngo_organization_scroll_position == 'Right'){
$ngo_organization_tp_theme_css .='#return-to-top{';
    $ngo_organization_tp_theme_css .='right: 20px;';
$ngo_organization_tp_theme_css .='}';
}else if($ngo_organization_scroll_position == 'Left'){
$ngo_organization_tp_theme_css .='#return-to-top{';
    $ngo_organization_tp_theme_css .='left: 20px;';
$ngo_organization_tp_theme_css .='}';
}else if($ngo_organization_scroll_position == 'Center'){
$ngo_organization_tp_theme_css .='#return-to-top{';
    $ngo_organization_tp_theme_css .='right: 50%;left: 50%;';
$ngo_organization_tp_theme_css .='}';
}

// site title font size option
$ngo_organization_site_title_font_size = get_theme_mod('ngo_organization_site_title_font_size', 30);{
$ngo_organization_tp_theme_css .='.logo h1 a, .logo p a{';
$ngo_organization_tp_theme_css .='font-size: '.esc_attr($ngo_organization_site_title_font_size).'px;';
$ngo_organization_tp_theme_css .='}';
}


// site tagline font size option
$ngo_organization_site_tagline_font_size = get_theme_mod('ngo_organization_site_tagline_font_size', 15);{
$ngo_organization_tp_theme_css .='.logo p{';
$ngo_organization_tp_theme_css .='font-size: '.esc_attr($ngo_organization_site_tagline_font_size).'px;';
$ngo_organization_tp_theme_css .='}';
}



// return to header mobile width
$ngo_organization_return_to_header_mob = get_theme_mod( 'ngo_organization_return_to_header_mob',false);
if($ngo_organization_return_to_header_mob == true && get_theme_mod( 'ngo_organization_return_to_header',true) != true){
$ngo_organization_tp_theme_css .='.return-to-header{';
	$ngo_organization_tp_theme_css .='display:none;';
$ngo_organization_tp_theme_css .='} ';
}
if($ngo_organization_return_to_header_mob == true){
$ngo_organization_tp_theme_css .='@media screen and (max-width:575px) {';
$ngo_organization_tp_theme_css .='.return-to-header{';
	$ngo_organization_tp_theme_css .='display:block;';
$ngo_organization_tp_theme_css .='} }';
}else if($ngo_organization_return_to_header_mob == false){
$ngo_organization_tp_theme_css .='@media screen and (max-width:575px){';
$ngo_organization_tp_theme_css .='.return-to-header{';
	$ngo_organization_tp_theme_css .='display:none;';
$ngo_organization_tp_theme_css .='} }';
}


//footer bg image
$ngo_organization_footer_widget_image = get_theme_mod('ngo_organization_footer_widget_image');
if($ngo_organization_footer_widget_image != false){
$ngo_organization_tp_theme_css .='#footer{';
	$ngo_organization_tp_theme_css .='background: url('.esc_attr($ngo_organization_footer_widget_image).');';
$ngo_organization_tp_theme_css .='}';
}


//menu font size
$ngo_organization_menu_font_size = get_theme_mod('ngo_organization_menu_font_size', 15);{
$ngo_organization_tp_theme_css .='.main-navigation a , .main-navigation li.page_item_has_children:after, .main-navigation li.menu-item-has-children:after{';
	$ngo_organization_tp_theme_css .='font-size: '.esc_attr($ngo_organization_menu_font_size).'px;';
$ngo_organization_tp_theme_css .='}';
}

// menu text transform
$ngo_organization_menu_text_tranform = get_theme_mod( 'ngo_organization_menu_text_tranform','Capitalize');
if($ngo_organization_menu_text_tranform == 'Uppercase'){
$ngo_organization_tp_theme_css .='.main-navigation a {';
	$ngo_organization_tp_theme_css .='text-transform: uppercase;';
$ngo_organization_tp_theme_css .='}';
}else if($ngo_organization_menu_text_tranform == 'Lowercase'){
$ngo_organization_tp_theme_css .='.main-navigation a {';
	$ngo_organization_tp_theme_css .='text-transform: lowercase;';
$ngo_organization_tp_theme_css .='}';
}
else if($ngo_organization_menu_text_tranform == 'Capitalize'){
$ngo_organization_tp_theme_css .='.main-navigation a {';
	$ngo_organization_tp_theme_css .='text-transform: capitalize;';
$ngo_organization_tp_theme_css .='}';
}


//related products
$ngo_organization_related_product = get_theme_mod('ngo_organization_related_product',true);
if($ngo_organization_related_product == false){
	$ngo_organization_tp_theme_css .='.related.products{';
		$ngo_organization_tp_theme_css .='display: none;';
	$ngo_organization_tp_theme_css .='}';
}


//Social icon Font size
$ngo_organization_social_icon_fontsize = get_theme_mod('ngo_organization_social_icon_fontsize');
$ngo_organization_tp_theme_css .='.media-links a i{';
	$ngo_organization_tp_theme_css .='font-size: '.esc_attr($ngo_organization_social_icon_fontsize).'px;';
$ngo_organization_tp_theme_css .='}';


// slider button mobile width
$ngo_organization_slider_buttom_mob = get_theme_mod( 'ngo_organization_slider_buttom_mob',true);
if($ngo_organization_slider_buttom_mob == true && get_theme_mod( 'ngo_organization_slider_button',true) != true){
$ngo_organization_tp_theme_css .='#slider .more-btn{';
	$ngo_organization_tp_theme_css .='display:none;';
$ngo_organization_tp_theme_css .='} ';
}
if($ngo_organization_slider_buttom_mob == true){
$ngo_organization_tp_theme_css .='@media screen and (max-width:575px) {';
$ngo_organization_tp_theme_css .='#slider .more-btn{';
	$ngo_organization_tp_theme_css .='display:block;';
$ngo_organization_tp_theme_css .='} }';
}else if($ngo_organization_slider_buttom_mob == false){
$ngo_organization_tp_theme_css .='@media screen and (max-width:575px){';
$ngo_organization_tp_theme_css .='#slider .more-btn{';
	$ngo_organization_tp_theme_css .='display:none;';
$ngo_organization_tp_theme_css .='} }';
}
//======================= slider Content layout ===================== //

$ngo_organization_slider_content_layout = get_theme_mod('ngo_organization_slider_content_layout', 'CENTER-ALIGN'); 
$ngo_organization_tp_theme_css .= '#slider .carousel-caption{';
switch ($ngo_organization_slider_content_layout) {
    case 'LEFT-ALIGN':
        $ngo_organization_tp_theme_css .= 'text-align:left;';
        break;
    case 'CENTER-ALIGN':
        $ngo_organization_tp_theme_css .= 'text-align:center;';
        break;
    case 'RIGHT-ALIGN':
        $ngo_organization_tp_theme_css .= 'text-align:right;';
        break;
    default:
        $ngo_organization_tp_theme_css .= 'text-align:left;';
        break;
}
$ngo_organization_tp_theme_css .= '}';