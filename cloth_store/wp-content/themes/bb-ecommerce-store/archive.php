<?php
/**
 * The template for displaying Archive pages.
 *
 * Learn more: http://codex.wordpress.org/Template_Hierarchy
 *
 * @package BB Ecommerce Store
 */
get_header(); ?>

<main role="main" id="maincontent">
  <div class="container">
    <?php
    $bb_ecommerce_store_left_right = get_theme_mod( 'bb_ecommerce_store_theme_options','Right Sidebar');
    if($bb_ecommerce_store_left_right == 'Left Sidebar'){ ?>
      <div class="row">
        <div class="col-lg-4 col-md-4"><?php get_sidebar(); ?></div>
        <div id="our-services" class="services col-lg-8 col-md-8">
          <?php
              the_archive_title( '<h1 class="page-title">', '</h1>' );
              the_archive_description( '<div class="taxonomy-description">', '</div>' );
          ?>
          <?php if ( have_posts() ) :
            /* Start the Loop */
              
              while ( have_posts() ) : the_post();

                get_template_part( 'template-parts/content', get_post_format() ); 
              
              endwhile;

              else :

                get_template_part( 'no-results' ); 

              endif; 
          ?>
          <?php if( get_theme_mod( 'bb_ecommerce_store_blog_post_pagination',true) != '') { ?>
            <div class="navigation">
              <?php bb_ecommerce_store_pagination_type(); ?>
              <div class="clearfix"></div>
            </div>
          <?php } ?>
        </div>
      </div>
    <?php }else if($bb_ecommerce_store_left_right == 'Right Sidebar'){ ?>
      <div class="row">
        <div id="our-services" class="services col-lg-8 col-md-8">
          <?php
              the_archive_title( '<h1 class="page-title">', '</h1>' );
              the_archive_description( '<div class="taxonomy-description">', '</div>' );
          ?>          
          <?php if ( have_posts() ) :
            /* Start the Loop */
              
              while ( have_posts() ) : the_post();

                get_template_part( 'template-parts/content', get_post_format() ); 
              
              endwhile;

              else :

                get_template_part( 'no-results' ); 

              endif; 
          ?>
          <?php if( get_theme_mod( 'bb_ecommerce_store_blog_post_pagination',true) != '') { ?>
            <div class="navigation">
              <?php bb_ecommerce_store_pagination_type(); ?>
              <div class="clearfix"></div>
            </div>
          <?php } ?>
        </div>
        <div class="col-lg-4 col-md-4"><?php get_sidebar(); ?></div>
      </div>
    <?php }else if($bb_ecommerce_store_left_right == 'One Column'){ ?>
      <div id="our-services" class="services">
        <?php
          the_archive_title( '<h1 class="page-title">', '</h1>' );
          the_archive_description( '<div class="taxonomy-description">', '</div>' );
        ?>
        <div class="row">       
          <?php if ( have_posts() ) :
            /* Start the Loop */
              
              while ( have_posts() ) : the_post();

                get_template_part( 'template-parts/content', get_post_format() ); 
              
              endwhile;

              else :

                get_template_part( 'no-results' ); 

              endif; 
          ?>
        </div>
        <?php if( get_theme_mod( 'bb_ecommerce_store_blog_post_pagination',true) != '') { ?>
          <div class="navigation">
            <?php bb_ecommerce_store_pagination_type(); ?>
            <div class="clearfix"></div>
          </div>
        <?php } ?>
      </div>
    <?php }else if($bb_ecommerce_store_left_right == 'Three Columns'){ ?>
      <div class="row">
        <div id="sidebar" class="col-lg-3 col-md-3"><?php dynamic_sidebar('sidebar-1');?></div>
        <div id="our-services" class="services col-lg-6 col-md-6">
          <?php
              the_archive_title( '<h1 class="page-title">', '</h1>' );
              the_archive_description( '<div class="taxonomy-description">', '</div>' );
          ?>          
          <?php if ( have_posts() ) :
            /* Start the Loop */
              
              while ( have_posts() ) : the_post();

                get_template_part( 'template-parts/content', get_post_format() ); 
              
              endwhile;

              else :

                get_template_part( 'no-results' ); 

              endif; 
          ?>
          <?php if( get_theme_mod( 'bb_ecommerce_store_blog_post_pagination',true) != '') { ?>
            <div class="navigation">
              <?php bb_ecommerce_store_pagination_type(); ?>
              <div class="clearfix"></div>
            </div>
          <?php } ?>
        </div>
        <div id="sidebar" class="col-lg-3 col-md-3"><?php dynamic_sidebar('sidebar-2');?></div>
      </div>
    <?php }else if($bb_ecommerce_store_left_right == 'Four Columns'){ ?>
      <div class="row">
        <div id="sidebar" class="col-lg-3 col-md-3"><?php dynamic_sidebar('sidebar-1');?></div>
        <div id="our-services" class="services col-lg-3 col-md-3">
          <?php
              the_archive_title( '<h1 class="page-title">', '</h1>' );
              the_archive_description( '<div class="taxonomy-description">', '</div>' );
          ?>          
          <?php if ( have_posts() ) :
            /* Start the Loop */
              
              while ( have_posts() ) : the_post();

                get_template_part( 'template-parts/content', get_post_format() ); 
              
              endwhile;

              else :

                get_template_part( 'no-results' ); 

              endif; 
          ?>
          <?php if( get_theme_mod( 'bb_ecommerce_store_blog_post_pagination',true) != '') { ?>
            <div class="navigation">
              <?php bb_ecommerce_store_pagination_type(); ?>
              <div class="clearfix"></div>
            </div>
          <?php } ?>
        </div>
        <div id="sidebar" class="col-lg-3 col-md-3"><?php dynamic_sidebar('sidebar-2');?></div>
        <div id="sidebar" class="col-lg-3 col-md-3"><?php dynamic_sidebar('sidebar-3');?></div>
      </div>
    <?php }else if($bb_ecommerce_store_left_right == 'Grid Layout'){ ?>
      <div id="our-services" class="services">
        <?php
            the_archive_title( '<h1 class="page-title">', '</h1>' );
            the_archive_description( '<div class="taxonomy-description">', '</div>' );
        ?>  
        <div class="row">        
          <?php if ( have_posts() ) :
            /* Start the Loop */
              
              while ( have_posts() ) : the_post();

                get_template_part( 'template-parts/grid-layout' ); 
              
              endwhile;

              else :

                get_template_part( 'no-results' ); 

              endif; 
          ?>
        </div>
        <?php if( get_theme_mod( 'bb_ecommerce_store_blog_post_pagination',true) != '') { ?>
          <div class="navigation">
            <?php bb_ecommerce_store_pagination_type(); ?>
            <div class="clearfix"></div>
          </div>
        <?php } ?>
      </div>    
    <?php }else {?>
      <div class="row">
        <div id="our-services" class="services col-lg-8 col-md-8">
          <?php
              the_archive_title( '<h1 class="page-title">', '</h1>' );
              the_archive_description( '<div class="taxonomy-description">', '</div>' );
          ?>          
          <?php if ( have_posts() ) :
            /* Start the Loop */
              
              while ( have_posts() ) : the_post();

                get_template_part( 'template-parts/content', get_post_format() ); 
              
              endwhile;

              else :

                get_template_part( 'no-results' ); 

              endif; 
          ?>
          <?php if( get_theme_mod( 'bb_ecommerce_store_blog_post_pagination',true) != '') { ?>
            <div class="navigation">
              <?php bb_ecommerce_store_pagination_type(); ?>
              <div class="clearfix"></div>
            </div>
          <?php } ?>
        </div>
        <div class="col-lg-4 col-md-4"><?php get_sidebar(); ?></div>
      </div>
    <?php }?>
  </div>
</main>

<div class="clearfix"></div>

<?php get_footer(); ?>