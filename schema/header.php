<?php

/*
Header Style 8
*/

global $konstruk_option;

$sticky      = !empty($konstruk_option['off_sticky']) ? $konstruk_option['off_sticky'] : ''; 
$sticky_menu = ($sticky == 1) ? ' menu-sticky stuck' : '';
$logo_height = !empty($konstruk_option['logo-height']) ? 'style = "max-height: '.$konstruk_option['logo-height'].'"' : '';
// Header Options here
require get_parent_theme_file_path('inc/header/header-options.php');

//off convas here
get_template_part('inc/header/off-canvas');
$btn_text_page = get_post_meta(get_the_ID(), 'quote_btn_text', true);
$header_logos  = get_post_meta(get_the_ID(), 'header_logo_img', true);
?> 


<!-- Mobile Menu Start -->
<div class="responsive-menus"><?php require get_parent_theme_file_path('inc/header/responsive-menu.php');?></div>
<!-- Mobile Menu End -->

<header id="rs-header" class="single-header header-style8 rs_header_7 mainsmenu<?php echo esc_attr($main_menu_hides);?> <?php echo esc_attr($main_menu_center);?> <?php echo esc_attr($main_menu_icon);?>">
    
    <div class="header-inner <?php echo esc_attr($sticky_menu);?>">
        <!-- Toolbar Start -->
        <?php       
           get_template_part('inc/header/top-head/top-head','four');
        ?>
        <!-- Toolbar End -->
        
        <!-- Header Menu Start -->
        <?php
            $menu_bg_color = !empty($menu_bg) ? 'style = background:'.$menu_bg.'' : '';
        ?>
        <div class="rs-middel-header menu_type_<?php echo esc_attr($main_menu_type);?>">
            <div class="<?php echo esc_attr($header_width);?>">

                <div class="row-table">
                    <div class="col-cell header-logo">
                        <?php get_template_part('inc/header/logo');  ?>
                    </div>
                    <div class="col-cell header-quote">  
                        <?php if(!empty($konstruk_option['top_address'])) { ?>
                        <div class="rs-address-area">
                            <div class="rs-address-list">
                                <div class="info-icon">
                                    <i class="fi fi-rr-map-marker-home"></i>
                                </div>
                                <div class="info-title">
                                    <?php if (!empty($konstruk_option['address__text'])) { ?>
                                        <?php echo esc_html($konstruk_option['address__text'])?>
                                    <?php } else { ?>
                                        <?php echo esc_html("Location", "konstruk"); ?>
                                    <?php } ?>
                                </div>
                                <div class="info-des">
                                    <?php echo esc_html($konstruk_option['top_address']); ?>
                                </div>
                            </div>
                        </div>
                        <?php } ?> 

                        <?php if(!empty($konstruk_option['top-email'])) { ?>
                        <div class="rs-address-area">
                            <div class="rs-address-list">
                                <div class="info-icon">
                                    <i class="fi fi-rr-envelope-plus"></i>
                                </div>
                                <div class="info-title">
                                    <?php if (!empty($konstruk_option['email__text'])) { ?>
                                        <?php echo esc_html($konstruk_option['email__text'])?>
                                    <?php } else { ?>
                                        <?php echo esc_html("Mail us", "konstruk"); ?>
                                    <?php } ?>
                                </div>
                                <div class="info-des">
                                    <a href="mailto:<?php echo esc_attr($konstruk_option['top-email'])?>"><?php echo esc_html($konstruk_option['top-email'])?></a> 
                                </div>
                            </div>
                        </div> 
                        <?php } ?>


                        <?php if(!empty($konstruk_option['phone'])) { ?>
                        <div class="rs-address-area">
                            <div class="rs-address-list">
                                <div class="info-icon">
                                    <i class="fi fi-rr-phone-call"></i>
                                </div>
                                <div class="info-title">
                                    <?php if (!empty($konstruk_option['phone_line'])) { ?>
                                        <?php echo esc_html($konstruk_option['phone_line'])?>
                                    <?php } else { ?>
                                        <?php echo esc_html("Call us", "konstruk"); ?>
                                    <?php } ?>
                                </div>
                                <div class="info-des">
                                    <?php echo esc_html($konstruk_option['phone']); ?>
                                </div>
                            </div>
                        </div>
                        <?php } ?> 
                               
                    </div>
                </div>
            </div> 
        </div>

        <div class="rs-full-menuarea menu-area" <?php echo wp_kses($menu_bg_color, 'konstruk');?>>
            <div class="<?php echo esc_attr($header_width);?>">
                <?php 
                  //include sticky search here
                  get_template_part('inc/header/search');
                ?>
                <div class="row-table">
                    <?php 
                    
                    $has_mobile_logo = !empty($konstruk_option['logo-mobile']['url'] ) ? 'has-mobile-logo' : ''; ?>

                    <div class="col-cell header-logo <?php echo esc_attr($has_mobile_logo);?>">
                        <?php get_template_part('inc/header/logo');  ?>
                    </div>
                    <div class="col-cell menu-responsive">  
                        <?php

                        if(!empty($header_logos )){ ?>
                            <a class="mobile-logos" href="<?php echo esc_url( home_url( '/' ) ); ?>">

                            <img <?php echo wp_kses($logo_height, 'konstruk');?> src="<?php echo esc_url($header_logos); ?>" alt="<?php echo esc_attr( get_bloginfo( 'name' )); ?>">
                            </a>


                        <?php } elseif (!empty( $konstruk_option['logo']['url'] ) ) { ?>
                          <a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home" class="mobile-logos"><img <?php echo wp_kses($logo_height, 'konstruk');?> src="<?php echo esc_url( $konstruk_option['logo']['url']); ?>" alt="<?php echo esc_attr( get_bloginfo( 'name' ) ); ?>"></a>
                        <?php }
                         else{?>
                            <div class="site-title mobile-logos"><a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><?php bloginfo( 'name' ); ?></a></div>   
                           
                           <?php  } 
                        ?> 
                        <?php              
                        if(is_page_template('page-single.php')){
                            require get_parent_theme_file_path('inc/header/menu-single.php'); 
                        }
                        elseif(is_page_template('page-single2.php')){
                            require get_parent_theme_file_path('inc/header/menu-single2.php'); 
                        }
                        else{
                            require get_parent_theme_file_path('inc/header/menu.php'); 
                        }?>
                    </div>
                    <div class="rs-rightbar-menu">
                        <?php if($rs_top_search != 'hide'){
                            if(!empty($konstruk_option['off_search'])): ?>
                                <div class="sidebarmenu-search text-right">
                                    <div class="sidebarmenu-search">
                                        <div class="sticky_search"> 
											<p>
												call
											</p>
                                          <i class="flaticon-search"></i> 
                                        </div>
                                    </div>
                                </div>                        
                            <?php endif; 
                        }

                        //include Cart here 
                        if($rs_show_cart != 'hide'){
                            if(!empty($konstruk_option['wc_cart_icon']) || ($rs_show_cart == 'show') ) {
                              get_template_part('inc/header/cart');
                            }
                        } ?>

                        <div class="sidebarmenu-area text-right mobilehum">                
                            <ul class="offcanvas-icon">
                                <li class="nav-link-container"> 
                                    <a href='#' class="nav-menu-link menu-button">
                                        <span class="dot1"></span>
                                        <span class="dot2"></span>
                                        <span class="dot3"></span>
                                        <span class="dot4"></span>
                                        <span class="dot5"></span>
                                        <span class="dot6"></span>
                                        <span class="dot7"></span>
                                        <span class="dot8"></span>
                                        <span class="dot9"></span>
                                    </a> 
                                </li>
                            </ul>                                       
                        </div> 

                        <?php if($rs_show_quote != 'hide'){
                            if(!empty($konstruk_option['quote_btns']) || ($rs_show_quote == 'show') ){ ?>
                            <div class="btn_quote"><a href="<?php echo esc_url($konstruk_option['quote_link']); ?>" class="quote-button">

                                
                                <?php if($btn_text_page !=''){

                                    echo esc_html($btn_text_page); 

                                }else{
                                    echo esc_html($konstruk_option['quote']);
                                } ?>

                                 <i class="eicon-arrow-right"></i></a></div>
                        <?php } } ?>
                         
                        
                    </div>
                </div>
            </div>
        </div>
        <!-- Header Menu End -->
    </div>
     <!-- End Slider area  -->
   <?php 
    get_template_part( 'inc/breadcrumbs' );
  ?>
</header>

<?php  
    get_template_part('inc/header/slider/slider');
?>
