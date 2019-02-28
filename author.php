<?php get_header(); ?>
<main class="Main">
  <section class="Main-container">
    <?php
      get_template_part('template-parts/author-content');
      if(have_posts()):
        while(have_posts()):
          the_posts();
          get_template_part('template-parts/search-content');
        endwhile;
        get_template_part('template-parts/pagination');
      else:
        get_template_part('template-parts/not-found');
      endif;
    ?>
  </section>
</main>
<?php
get_sidebar();
get_footer();
?>
