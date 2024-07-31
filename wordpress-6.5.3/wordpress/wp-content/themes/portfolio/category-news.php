<?php
get_header();
?>
<main>
    <div style="height: 50px; background:black; margin-bottom:10px; "></div>
 
  <!-- Marketing messaging and featurettes
  ================================================== -->
  <!-- Wrap the rest of the page in another container to center all the content. -->

  <div class="container marketing">
  <div class="row">
          <div class="col-md-8">
    <?php 
    while (have_posts()) : the_post();
       ?>
        
            <h1 class="featurette-heading">
              <?php the_title() ?>
            </h1>
            <em><?php the_date('F j, Y'); ?> at <?php the_time('g:i a'); ?></em><br>
            <?php the_post_thumbnail('full') ?>
            <p class="lead"><?php the_content() ?></p>
    
    <?php endwhile; ?>
    
    </div>
    <div class="col-4">
    <?php get_sidebar() ?>
    </div>
        </div>




    <!-- /END THE FEATURETTES -->

  </div><!-- /.container -->

  <?php get_footer() ?>