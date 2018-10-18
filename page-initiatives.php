<?php get_header(); ?>

  <div class="col-12 mt-3 pb-3 mb-3 border-bottom">
    <h1 id="content-title" class="font-weight-bold text-uppercase"><?php the_title(); ?></h1>
  </div>

  <div class="col-12 mt-3 pb-3">
    <?php if ( have_posts() ) : ?>
      <?php while ( have_posts() ): the_post(); ?>
          <?php if (is_page('initiatives')) : ?>

            <?php if( have_rows('initiatives_list') ):
                while ( have_rows('initiatives_list') ) : the_row(); ?>

                <div class="row border-bottom mb-4 pb-4">
                  <?php $details = get_sub_field('initiative_details'); ?>
                    <div class="col-4 col-md-2">
                      <img id="<?php echo sanitize_title($details['initiative_name']); ?>-img" class="initiative-logo mx-auto d-block" src="<?php the_sub_field('initiative_logo'); ?>" alt="thumbnail image of <?php echo $details['initiative_name']; ?>"/>
                    </div>

                    <div class="col-8 col-md-10">
                      <h3 class="pb-2"><?php echo $details['initiative_name']; ?></h3>
                      <div class="content pb-3"><?php echo $details['initiative_content']; ?></div>
                      <a href="<?php echo $details['initiative_url']; ?>" target="_blank">More &raquo;</a>
                    </div>

                </div>

              <?php endwhile; ?>
            <?php endif; ?>

          <?php else : ?>

            <?php the_content(); ?>

          <?php endif; ?>
        </div>
      <?php endwhile; ?>
    <?php else : ?>
      <div class="alert alert-warning alert-dismissible fade show" role="alert">
        <h4 class="alert-heading">Nothing found</h4>
      </div>
    <?php endif; ?>

<?php get_footer(); ?>
