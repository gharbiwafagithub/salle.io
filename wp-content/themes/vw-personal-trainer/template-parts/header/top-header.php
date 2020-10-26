<?php
/**
 * The template part for top header
 *
 * @package VW Personal Trainer 
 * @subpackage vw_personal_trainer
 * @since VW Personal Trainer 1.0
 */
?>
<?php if( get_theme_mod('vw_personal_trainer_topbar_hide_show',true) != ''){ ?>
  <div id="topbar">
    <div class="container">
      <div class="row">
        <div class="col-lg-6 col-md-6">
          <?php if( get_theme_mod( 'vw_personal_trainer_opening_time') != '') { ?>
            <i class="<?php echo esc_attr(get_theme_mod('vw_personal_trainer_timing_icon','far fa-clock')); ?>"></i><span><?php echo esc_html(get_theme_mod('vw_personal_trainer_opening_time',''));?></span>
          <?php }?>
        </div>
        <div class="<?php if( get_theme_mod( 'vw_personal_trainer_search_hide_show',true) != '') { ?>col-lg-5 col-md-5"<?php } else { ?>col-lg-6 col-md-6"<?php } ?>">
          <?php dynamic_sidebar('social-links'); ?>
        </div>
        <?php if( get_theme_mod( 'vw_personal_trainer_search_hide_show',true) != '') { ?>
          <div class="col-lg-1 col-md-1">
            <div class="search-box">
              <button type="button" data-toggle="modal" data-target="#myModal"><i class="fas fa-search"></i></button>
            </div>
          </div>
        <?php }?>
      </div>
      <div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
        <div class="modal-dialog" role="document">
          <div class="modal-body">
            <div class="serach_inner">
              <?php get_search_form(); ?>
            </div>
          </div>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        </div>
      </div>
    </div>
  </div>
<?php }?>