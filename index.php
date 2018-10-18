<?php get_header(); ?>

  <div class="col-12 mt-3 pb-3 border-bottom">
    <h1 class="font-weight-bold text-uppercase"><?php the_title(); ?></h1>
  </div>
  
  <div class="col-12 mt-3 pb-3">
    <?php if ( have_posts() ) : ?>
      <div>
        <?php while ( have_posts() ): the_post(); ?>
          <div class="row p-2 <?php echo (basename(get_permalink()));?> border-top">
            <div class="col-sm-2 border-right text-center d-flex flex-row flex-sm-column">
              <?php if (class_exists('acf')) : ?>
                  <div class="season text-uppercase font-weight-bold pr-1"><?php echo get_field('season'); ?></div>
              <?php endif; ?>
              <div class="year pr-1"><?php echo get_the_date('Y'); ?></div>
              <div class="author mt-auto">by <?php the_author(); ?></div>
            </div>
            <div class="col-sm-10">
              <h4 class="mb-3"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h4>
              <?php if( class_exists('acf') && have_rows('article') ):
              	// loop through the rows of data
              	 while ( have_rows('article') ) : the_row();
              			 $headline = '';
              			 $headline = get_sub_field('headline');
              			 echo '<a href="'.get_the_permalink().'#'.sanitize_title($headline).'">'.$headline.'</a><br/>';
              	 endwhile;
              endif; ?>
            </div>
          </div>
      <?php  endwhile; ?>

      </div>
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
  <?php //get_sidebar(); ?>
</div>

<?php get_footer(); ?>
