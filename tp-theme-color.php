<?php

$ngo_organization_tp_theme_css = '';

//theme-color
$ngo_organization_tp_color_option = get_theme_mod('ngo_organization_tp_color_option');

if($ngo_organization_tp_color_option != false){
$ngo_organization_tp_theme_css .='button[type="submit"],.main-navigation .menu > ul > li.highlight,.more-btn a,.box:before,.box:after,.woocommerce #respond input#submit, .woocommerce a.button, .woocommerce button.button, .woocommerce input.button,.woocommerce #respond input#submit.alt, .woocommerce a.button.alt, .woocommerce button.button.alt, .woocommerce input.button.alt,.page-numbers,.prev.page-numbers,.next.page-numbers,span.meta-nav,#theme-sidebar button[type="submit"],#footer button[type="submit"],#comments input[type="submit"],.site-info,.book-tkt-btn a.register-btn,#slider .carousel-control-prev-icon:hover, #slider .carousel-control-next-icon:hover,#slider h6:before,#about h6:before,#slider .slide_nav span,#slider a.btn-1,#slider a.btn-2:hover,.wc-block-checkout__actions_row .wc-block-components-checkout-place-order-button,.wc-block-cart__submit-container a,.wc-block-grid__product-add-to-cart.wp-block-button .wp-block-button__link,.donate-btn-1,#our-funds .fund-box h6,.woocommerce ul.products li.product .onsale, .woocommerce span.onsale  {';
$ngo_organization_tp_theme_css .='background-color: '.esc_attr($ngo_organization_tp_color_option).';';
$ngo_organization_tp_theme_css .='}';
}
if($ngo_organization_tp_color_option != false){
$ngo_organization_tp_theme_css .='a,#theme-sidebar .textwidget a,#footer .textwidget a,.comment-body a,.entry-content a,.entry-summary a,.page-template-front-page .media-links a:hover,.topbar-home i.fas.fa-phone-volume,#theme-sidebar h3,.main-navigation .current_page_item > a,.page-box h4 a,.readmore-btn a,.box-content a,#about h6 , #about h3 ,.woocommerce-message::before  ,#theme-sidebar label.wp-block-search__label,#theme-sidebar h2.wp-block-heading,.main-navigation .current-menu-item > a,.main-navigation a:hover,#service h6,.box-info i,a.added_to_cart.wc-forward ,.wc-block-components-totals-coupon a,.content-area a,.main-navigation .current_page_item > a, .main-navigation .current-menu-item > a, .main-navigation .current_page_ancestor > a,.topbar i, .woocommerce ul.products li.product .woocommerce-loop-product__title,.woocommerce div.product .product_title,.woocommerce #reviews #comments h2,.woocommerce h1,.wc-block-components-title.wc-block-components-title,.related-post-block h3,h3,h2,h1,h4,h5,h6,label.wp-block-search__label {';
$ngo_organization_tp_theme_css .='color: '.esc_attr($ngo_organization_tp_color_option).';';
$ngo_organization_tp_theme_css .='}';
}
if($ngo_organization_tp_color_option != false){
$ngo_organization_tp_theme_css .='.main-navigation .current_page_item > a,.readmore-btn a{';
	$ngo_organization_tp_theme_css .='border-color: '.esc_attr($ngo_organization_tp_color_option).';';
$ngo_organization_tp_theme_css .='}';
}
if($ngo_organization_tp_color_option != false){
$ngo_organization_tp_theme_css .='.woocommerce-message {';
$ngo_organization_tp_theme_css .='border-top-color: '.esc_attr($ngo_organization_tp_color_option).';';
$ngo_organization_tp_theme_css .='}';
}

if($ngo_organization_tp_color_option != false){
$ngo_organization_tp_theme_css .='@media screen and (max-width:1000px){';
$ngo_organization_tp_theme_css .='.sidenav{';
    $ngo_organization_tp_theme_css .='background: '.esc_attr($ngo_organization_tp_color_option).';';
$ngo_organization_tp_theme_css .='} }';
}

//hover color
$ngo_organization_tp_color_option_link = get_theme_mod('ngo_organization_tp_color_option_link');

if($ngo_organization_tp_color_option_link != false){
$ngo_organization_tp_theme_css .='.prev.page-numbers:focus, .prev.page-numbers:hover, .next.page-numbers:focus, .next.page-numbers:hover, #comments input[type="submit"]:hover,.woocommerce #respond input#submit:hover, .woocommerce a.button:hover, .woocommerce button.button:hover,span.meta-nav:hover, .woocommerce input.button:hover, .woocommerce #respond input#submit.alt:hover, .woocommerce a.button.alt:hover, .woocommerce button.button.alt:hover, .woocommerce input.button.alt:hover, #footer button[type="submit"]:hover, #theme-sidebar button[type="submit"]:hover,.book-tkt-btn a.register-btn:hover,.book-tkt-btn a.bar-btn i:hover,.more-btn a:hover,.search-box i,#slider .slide_nav span:hover,#slider a.btn-2,#slider a.btn-1:hover,.wc-block-grid__product-add-to-cart.wp-block-button .wp-block-button__link:hover,.main-navigation ul ul,.donate-btn-2,#our-funds .box-btn,.wc-block-cart__submit-container a:hover {';
	$ngo_organization_tp_theme_css .='background: '.esc_attr($ngo_organization_tp_color_option_link).';';
$ngo_organization_tp_theme_css .='}';
}
if($ngo_organization_tp_color_option_link != false){
$ngo_organization_tp_theme_css .='a:hover,#theme-sidebar a:hover,.media-links i:hover ,.page-box h4 a:hover,.readmore-btn a:hover , .page-numbers a:hover,#theme-sidebar li a:hover,#footer li a:hover, .post_tag a:hover,#slider h6, #theme-sidebar .widget_tag_cloud a:hover,#theme-sidebar li:hover,#footer p.wp-block-tag-cloud a:hover,#footer .tagcloud a:hover {';
	$ngo_organization_tp_theme_css .='color: '.esc_attr($ngo_organization_tp_color_option_link).'';
$ngo_organization_tp_theme_css .='}';
}
if($ngo_organization_tp_color_option_link != false){
$ngo_organization_tp_theme_css .='#footer .tagcloud a:hover,p.wp-block-tag-cloud a:hover,.post_tag a:hover,#theme-sidebar .tagcloud a:hover, #theme-sidebar .widget_tag_cloud a:hover,.readmore-btn a:hover,#footer p.wp-block-tag-cloud a:hover{';
	$ngo_organization_tp_theme_css .='border-color: '.esc_attr($ngo_organization_tp_color_option_link).';';
$ngo_organization_tp_theme_css .='}';
}
if($ngo_organization_tp_color_option_link != false){
$ngo_organization_tp_theme_css .='@media screen and (max-width:1000px){';
$ngo_organization_tp_theme_css .='.menubar .nav ul li, .menubar.scrolled .main-navigation li{';
    $ngo_organization_tp_theme_css .='border-color: '.esc_attr($ngo_organization_tp_color_option_link).';';
$ngo_organization_tp_theme_css .='} }';
}
//preloader//

$ngo_organization_tp_preloader_color1_option = get_theme_mod('ngo_organization_tp_preloader_color1_option');
$ngo_organization_tp_preloader_color2_option = get_theme_mod('ngo_organization_tp_preloader_color2_option');
$ngo_organization_tp_preloader_bg_option = get_theme_mod('ngo_organization_tp_preloader_bg_option');


if($ngo_organization_tp_preloader_color1_option != false){
$ngo_organization_tp_theme_css .='.center1{';
	$ngo_organization_tp_theme_css .='border-color: '.esc_attr($ngo_organization_tp_preloader_color1_option).' !important;';
$ngo_organization_tp_theme_css .='}';
}
if($ngo_organization_tp_preloader_color1_option != false){
$ngo_organization_tp_theme_css .='.center1 .ring::before{';
	$ngo_organization_tp_theme_css .='background: '.esc_attr($ngo_organization_tp_preloader_color1_option).' !important;';
$ngo_organization_tp_theme_css .='}';
}
if($ngo_organization_tp_preloader_color2_option != false){
$ngo_organization_tp_theme_css .='.center2{';
	$ngo_organization_tp_theme_css .='border-color: '.esc_attr($ngo_organization_tp_preloader_color2_option).' !important;';
$ngo_organization_tp_theme_css .='}';
}
if($ngo_organization_tp_preloader_color2_option != false){
$ngo_organization_tp_theme_css .='.center2 .ring::before{';
	$ngo_organization_tp_theme_css .='background: '.esc_attr($ngo_organization_tp_preloader_color2_option).' !important;';
$ngo_organization_tp_theme_css .='}';
}
if($ngo_organization_tp_preloader_bg_option != false){
$ngo_organization_tp_theme_css .='.loader{';
	$ngo_organization_tp_theme_css .='background: '.esc_attr($ngo_organization_tp_preloader_bg_option).';';
$ngo_organization_tp_theme_css .='}';
}

// footer-bg-color
$ngo_organization_tp_footer_bg_color_option = get_theme_mod('ngo_organization_tp_footer_bg_color_option');

if($ngo_organization_tp_footer_bg_color_option != false){
$ngo_organization_tp_theme_css .='#footer{';
	$ngo_organization_tp_theme_css .='background: '.esc_attr($ngo_organization_tp_footer_bg_color_option).' !important;';
$ngo_organization_tp_theme_css .='}';
}
