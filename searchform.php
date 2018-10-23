<form role="search" method="get" class="" action="<?php echo home_url( '/' ); ?>">
 <div class="form-row">
   <?php if (is_search()) : ?>
   <div class="col-8 col-sm-10">
       <label class="sr-only">Search for:</label>
       <input type="search" class="form-control" placeholder="Search <?php echo get_bloginfo('name') ?>..." value="<?php if ($_GET["s"]){ echo $_GET["s"]; } ?>" name="s" title="Search for:" />
   </div>
   <div class="col-4 col-sm-2">
     <input type="submit" class="form-control border btn btn-light borderd" value="Search" />
   </div>
   <?php else : ?>
     <div class="col-8 col-md-7">
         <label class="sr-only">Search for:</label>
         <input type="search" class="form-control" placeholder="Search <?php echo get_bloginfo('name') ?>..." value="<?php if ($_GET["s"]){ echo $_GET["s"]; } ?>" name="s" title="Search for:" />
     </div>
     <div class="col-4 col-md-5">
       <input type="submit" class="form-control border btn btn-light borderd" value="Search" />
     </div>
   <?php endif; ?>
 </div>
</form>
