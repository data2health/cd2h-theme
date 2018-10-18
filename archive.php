<?php get_header(); ?>

  <?php get_sidebar(); ?>

  <div class="col-sm-9 mt-3 pb-3">

      <?php if ( have_posts() ) : ?>

        <h2><?php single_cat_title(); ?></h2>
        <div>
          <?php echo category_description(); ?>
        </div>

        <div class="row p-1 font-weight-bold text-muted">
          <div class="col-9">
            Name
          </div>
          <div class="col-3">
            Download
          </div>
        </div>


      <?php while ( have_posts() ): the_post(); ?>

        <div class="row p-1">
          <div class="col-9">
            <a href="<?php the_permalink();?>"><?php the_title(); ?></a>
          </div>
          <div class="col-3">
            <?php if (get_field('attachment')) :?>
            <?php $fileExt = pathinfo(get_field('attachment'))['extension'] ?>
            <a href="#" download="<?php the_field('attachment'); ?>"><img class="file-icon <?php echo $fileExt  ?>-icon" alt="<?php echo $fileExt  ?> file icon" src="<?php echo get_template_directory_uri().'/img/icons/'.$fileExt ?>.png" /></a>
            <?php else : ?>
            <img class="file-icon other-icon" src="<?php echo get_template_directory_uri() ?>/img/icons/other.png" />
            <?php endif; ?>
          </div>
        </div>

      <?php  endwhile; ?>

    <?php  else : ?>

      <div class="alert alert-warning alert-dismissible fade show" role="alert">
        <h4 class="alert-heading">Nothing found</h4>
        <p>Please adjust your filters and/or search terms and try again.</p>
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
        <a href="<?php echo home_url(); ?>" class="btn btn-warning">Clear Filters</a>
      </div>

    <?php endif; ?>
  </div>
</div>

<?php get_footer(); ?>
