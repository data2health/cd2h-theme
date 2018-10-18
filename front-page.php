<?php get_header(); ?>

  <div class="col-12 mt-3 pb-3 border-bottom">
    <h1 id="content-title" class="font-weight-bold text-uppercase"><?php the_title(); ?></h1>
  </div>

  <div class="col-12 mt-3 pb-3">
    <?php if ( have_posts() ) : ?>
      <?php while ( have_posts() ): the_post(); ?>
        <div class="row">
          <div class="col-12">
            <?php the_content(); ?>
          </div>
        </div>
        <div class="row">
          <div class="col-sm-6">
          <?php if (class_exists('acf')) : ?>
            <?php the_field('left_about_content_value'); ?>
          <?php endif; ?>
          </div>
          <div class="col-sm-6">
          <?php if (class_exists('acf')) : ?>
            <?php the_field('right_about_content_value'); ?>
          <?php endif; ?>
          </div>
        </div>
      <?php endwhile; ?>
    <?php else : ?>
      <div class="alert alert-warning alert-dismissible fade show" role="alert">
        <h4 class="alert-heading">Nothing found</h4>
      </div>
    <?php endif; ?>
  </div>
</div>

<?php get_footer(); ?>
