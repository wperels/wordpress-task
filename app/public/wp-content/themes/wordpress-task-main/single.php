<?php

get_header(); ?>

<div class="max-w-4xl mx-auto px-4">

  <?php if (have_posts()) {
    while (have_posts()) {
      the_post(); ?>
      <!-- start your html here -->
       <div class="flex items-center pt-5 mb-10">
          <div class="w-24 rounded-2xl overflow-hidden text-center shrink-0 bg-teal-500">
              <span class="text-white block text-xl uppercase leading-8"><?php the_time('M'); ?></span>
              <span class=" block bg-teal-100 text-teal-700 text-5xl py-2"><span class="relative bottom-1"><?php the_time('d'); ?></span></span>
        </div>
        <div class="pl-6">
          <h1 class="text-3xl sm:text-4xl font-bold"><?php the_title(); ?></h1>
          <p class="text-xl text-gray-400">by <?php the_author_meta('display_name'); ?></p>
        </div>
       </div>
     <div class="prose max-w-full mb-10">
      <?php the_content();  ?>
      </div>
          <!-- end your html here -->
      <?php }
  } ?>
  <!-- Our recent posts area near the bottom of the page -->
  <div class="sm:grid sm:grid-cols-2 bg-teal-700 text-white rounded-2xl overflow: overflow-hidden" >
    <div class="py-5 px-7">
      <h3 class="text-2xl font-bold mb-2">Most Recent Posts</h3>
        <ul class="list-disc pl-4 text-sm leading-loose">
          <?php 
          $latestPosts = new WP_Query(array(
            'posts_per_page' => 5
          ));
          while($latestPosts->have_posts()) {
            $latestPosts->the_post(); ?>
            <!-- Our list item html can go here -->
            <li><a class="hover:text-teal-200 hover:underline" href="<?php the_permalink(); ?>"><?php the_title(); ?></a></li>

          <?php } ?>

      </ul>
    </div>
    <div class="hidden sm:block bg-cover bg-center" style="background-image: url('<?php echo get_theme_file_uri('/images/beach.jpg'); ?>');"></div>
  </div>

</div>

<?php get_footer();


