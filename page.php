<?php get_header(); ?>

  <?php
    /* Get an array of Ancestors and Parents if they exist */
    $parents = get_post_ancestors( $post->ID );
    /* Get the top Level page->ID count base 1, array base 0 so -1 */
    $parentid = ($parents) ? $parents[count($parents)-1]: $post->ID;

    $govPage = get_page_by_path( 'governance-guidelines' );
    if ( $parentid === $govPage->ID || (($govPage) && is_page($govPage))) :

    $currentParent = wp_get_post_parent_id($post->ID);
  ?>
  <div class="col-12 mt-3 pb-3 mb-3 border-bottom">
    <h1 id="content-title" class="font-weight-bold text-uppercase"><?php echo get_the_title($govPage->ID); ?></h1>
  </div>

  <div class="col-md-3 border-right p-0 pr-3">

    <ul id="collapse-nav" class="fa-ul p-0 ml-0">

    <?php
    $args = array(
    	'posts_per_page'   => -1,
    	'post_type'        => 'page',
    	'post_parent'      => $govPage->ID,
    );
    $navitems = get_posts( $args );
    foreach ( $navitems as $post ) : setup_postdata( $post ); ?>
    	<li class="parent p-1">
    		<a class="<?php if ($currentParent != get_the_ID()) {echo 'collapsed';} ?> text-uppercase h5" href="#collapse-<?php the_ID(); ?>" data-toggle="collapse" aria-controls="collapse-<?php the_ID(); ?>">
          <i class="fa fa-caret-down" aria-hidden="true"></i> <?php the_title(); ?>
        </a>

        <?php if(has_children()) : ?>

          <ul class="collapse<?php if ($currentParent == get_the_ID()) {echo ' show';} ?>" id="collapse-<?php the_ID(); ?>">
            <?php wp_list_pages( array( 'title_li' => '', 'child_of' => $post->ID ) ); ?>
          </ul>

        <?php endif; ?>

    	</li>
    <?php endforeach;
    wp_reset_postdata();?>

    </ul>
  </div>

    <div class="col-md-9 mt-3 pb-3">
<?php else: ?>

  <div class="col-12 mt-3 pb-3 mb-3 border-bottom">
    <h1 id="content-title" class="font-weight-bold text-uppercase"><?php the_title(); ?></h1>
  </div>

  <div class="col-sm-12 mt-3 pb-3">

<?php endif; ?>


    <?php if ( have_posts() ) : ?>
      <?php while ( have_posts() ): the_post(); ?>

            <?php if ( $parentid == $govPage->ID && !is_page($govPage)) : ?>
              <h2><?php the_title(); ?></h2>
              <strong>Date: <?php the_date(); ?><br/></strong>
              <strong>Last Revision: <?php the_modified_date(); ?></strong>
            <?php endif; ?>

            <?php the_content(); ?>

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
                          This browser does not support this file type. Please download the file to view it: <a href="#" download="'.$fileUrl.'">Download the attached '.strtoupper($fileExt).'</a>
                        </object>';
                }
                ?>
              </div>
            <?php endif; ?>

      <?php endwhile; ?>

    <?php else : ?>
      <div class="alert alert-warning alert-dismissible fade show" role="alert">
        <h4 class="alert-heading">Nothing found</h4>
      </div>
    <?php endif; ?>

  </div>

<?php get_footer(); ?>
