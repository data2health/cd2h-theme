<?php get_header(); ?>

<?php get_sidebar(); ?>

<div id="single" <?php post_class('col-sm-9 mt-3 pb-3 post-content'); ?>>

  <?php if (!is_front_page()) : ?>
    <div id="top"></div>
  <?php endif; ?>

    <?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
      <div id="content">

      <?php if (in_category('newsletters')) : ?>
        <div class="row mb-3">
          <div id="social-icons" class="col-12 text-right">
            <a class="p-2" href="javascript:window.print()"><i class="fas fa-print"></i></a>
            <a class="p-2" href="mailto:?subject=<?php the_title(); ?>&body=<?php the_title(); ?>%0D%0A<?php the_permalink(); ?>"><i class="far fa-envelope"></i></a>
            <a class="p-2" href="https://plus.google.com/share?url=<?php the_permalink(); ?>" onclick="javascript:window.open(this.href,'', 'menubar=no,toolbar=no,resizable=yes,scrollbars=yes,height=600,width=600');return false;" target="_blank"><i class="fab fa-google-plus-g"></i></a>
            <a class="p-2" href="http://twitter.com/home/?status=<?php the_title(); ?> - <?php the_permalink(); ?>" title="Tweet this!" onclick="javascript:window.open(this.href,'', 'menubar=no,toolbar=no,resizable=yes,scrollbars=yes,height=600,width=600');return false;"><i class="fab fa-twitter"></i></a>
            <a class="p-2" href="http://www.facebook.com/sharer.php?u=<?php the_permalink();?>&amp;t=<?php the_title(); ?>" title="Share on Facebook." onclick="javascript:window.open(this.href,'', 'menubar=no,toolbar=no,resizable=yes,scrollbars=yes,height=600,width=600');return false;"><i class="fab fa-facebook-f"></i></a>
          </div>
        </div>
      <?php endif; ?>

        <h2 id="content-title" class="font-weight-bold mb-3 h3"><?php the_title(); ?></h2>
        <div id="post-content-<?php the_ID(); ?>">
          <?php the_content(); ?>
        </div>
        <?php if (get_field('attachment')) : ?>
          <div>
            <?php
            $fileUrl = get_field('attachment');
            $fileExt = pathinfo($fileUrl)['extension'];
            $vidExt = array('mp4', 'm4v', 'webm', 'ogv', 'wmv', 'flv', 'mov', 'avi');
            $audExt = array('mp3', 'wav', 'ogg');
            $docExt = array('ppt', 'pptx', 'doc', 'docx', 'xls', 'xlsx', 'zip');

            if (in_array($fileExt, $vidExt)) {
              echo '<video controls="controls" width="100%" height="auto" name="'.get_the_title().'" src="'.$fileUrl.'" autoplay></video>';
            } elseif (in_array($fileExt, $audExt)) {
              echo '<audio controls="controls" name="'.get_the_title().'" src="'.$fileUrl.'" autoplay></audio>';
            } elseif (in_array($fileExt, $docExt)) {
              echo '<div class="media pt-4">
                      <a href="'.$fileUrl.'"><img class="mr-3 align-self-center '.$fileExt.'-icon" src="'.get_template_directory_uri().'/img/icons/'.$fileExt.'.png" alt="'.$fileExt.' file icon" /></a>
                      <div class="media-body">
                        <h6 class="pb-0 mb-0"><a href="#" download="'.$fileUrl.'">Download '.get_the_title().' Attachment</a></h6>
                        <small class="text-muted">file type: '.$fileExt.'</small>
                      </div>
                    </div>';
            } else {
              echo '<object data="'.$fileUrl.'" width="100%" style="height:60vh;">
                      This browser does not support this file type. Please download the file to view it: <a href="#" download="'.$fileUrl.'">Download '.get_the_title().' Attachment</a>
                    </object>';
            }
            ?>
          </div>
        <?php endif; ?>
      </div>

    <?php endwhile; ?>
   <?php endif; ?>
</div>

<?php get_footer(); ?>
