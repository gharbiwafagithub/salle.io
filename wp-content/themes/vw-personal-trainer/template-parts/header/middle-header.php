<?php
/**
 * The template part for header
 *
 * @package VW Personal Trainer 
 * @subpackage vw_personal_trainer
 * @since VW Personal Trainer 1.0
 */
?>

<div class="main-header">
  <div class="container">
    <div class="row">
      <div class="col-lg-3 col-md-4">
        <div class="logo">
          <?php if ( has_custom_logo() ) : ?>
            <div class="site-logo"><?php the_custom_logo(); ?></div>
          <?php endif; ?>
          <?php $blog_info = get_bloginfo( 'name' ); ?>
            <?php if ( ! empty( $blog_info ) ) : ?>
              <?php if ( is_front_page() && is_home() ) : ?>
                <?php if( get_theme_mod('vw_personal_trainer_logo_title_hide_show',true) != ''){ ?>
                  <h1 class="site-title"><a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><?php bloginfo( 'name' ); ?></a></h1>
                <?php } ?>
              <?php else : ?>
                <?php if( get_theme_mod('vw_personal_trainer_logo_title_hide_show',true) != ''){ ?>
                  <p class="site-title"><a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><?php bloginfo( 'name' ); ?></a></p>
                <?php } ?>
              <?php endif; ?>
            <?php endif; ?>
            <?php
              $description = get_bloginfo( 'description', 'display' );
              if ( $description || is_customize_preview() ) :
            ?>
            <?php if( get_theme_mod('vw_personal_trainer_tagline_hide_show',true) != ''){ ?>
              <p class="site-description">
                <?php echo $description; ?>
              </p>
            <?php } ?>
          <?php endif; ?>
        </div>
      </div>
      <div class="col-lg-7 offset-lg-2 col-md-8">
        <div class="row m-0">
          <div class="col-lg-5 col-md-5">
            <div class="row">
              <?php if( get_theme_mod('vw_personal_trainer_call_text') != '' || get_theme_mod( 'vw_personal_trainer_call' )!= ''){ ?>
                <div class="col-lg-2 col-md-3 col-3">
                  <i class="<?php echo esc_attr(get_theme_mod('vw_personal_trainer_phone_number_icon','fas fa-phone')); ?>"></i>
                </div>
                <div class="col-lg-10 col-md-9 col-9">
                  <h6><?php echo esc_html(get_theme_mod('vw_personal_trainer_call_text',''));?></h6>
                  <p><?php echo esc_html(get_theme_mod('vw_personal_trainer_call',''));?></p>            
                </div>
              <?php }?>
            </div>
          </div>
          <div class="col-lg-7 col-md-7">
            <div class="row">
              <?php if( get_theme_mod( 'vw_personal_trainer_email_text') != ''|| get_theme_mod( 'vw_personal_trainer_email') != ''){ ?>
                <div class="col-lg-2 col-md-3 col-3">
                  <i class="<?php echo esc_attr(get_theme_mod('vw_personal_trainer_email_icon','far fa-envelope')); ?>"></i>
                </div>
                <div class="col-lg-10 col-md-9 col-9">
                  <h6><?php echo esc_html(get_theme_mod('vw_personal_trainer_email_text',''));?></h6>
                  <p><?php echo esc_html(get_theme_mod('vw_personal_trainer_email',''));?></p>            
                </div>
              <?php }?>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
<div id="menu-box">
  <div class="header-menu <?php if( get_theme_mod( 'vw_personal_trainer_sticky_header') != '') { ?> header-sticky"<?php } else { ?>close-sticky <?php } ?>">
    <div class="container">
      <?php get_template_part( 'template-parts/header/navigation' ); ?>
    </div>
  </div>
</div>
