<?php
/*
Template Name: Search Page
*/

//If no search query is present, redirect to home page
if  (get_search_query() == '') {header('Location: '.get_home_url());}

get_header();
?>
<div id="search-results" class="col-sm-12 mt-3 pb-3">

  <?php
$i = 0;
// check if the repeater field has rows of data
if( have_posts()):

 	// loop through the rows of data
    while ( have_posts() ) : the_post();
      echo '<div class="row mb-sm-3">';
      echo '<div class="col-12">';
      echo '<h2 class="h5 mb-0"><a href="'.get_the_permalink().'">'.get_the_title().'</a></h2>';
      echo '<small class="d-inline-block text-success text-truncate">'.get_the_permalink().'</small>';
      echo '<p>'.get_the_excerpt().'</p>';
      echo '<hr class="d-block d-sm-none mt-4 mb-4"/>';
      echo '</div>';
      echo '</div>';


    endwhile;
?>

  <div id="search-pagination" class="text-center">
    <?php
        echo paginate_links();
        global $wp_query;
        $total_results = $wp_query->found_posts;
        echo '<p><small>Search for "'.get_search_query().'" returned '.$total_results.' results.</small></p>'
    ?>
  </div>


<script> jQuery('#search-results .result-body, #search-results a').html( function(i,h){ return h.replace(/(<?php echo get_search_query();?>)/gi,'<mark>$1</mark>'); }); </script>
<?php
else :

    echo '<div class="alert alert-dark" role="alert"><h3>Nothing found</h3>Sorry no results were found.  Please adjust your search term and try again.</div>';

endif;

?>

</div>
<?php //get_sidebar(); ?>
</div>
<?php get_footer(); ?>
