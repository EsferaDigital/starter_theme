<?php get_header(); the_post(); ?>
<main class="Main">
  <section class="Main-container">
    <?php the_post_thumbnail(); ?>
    <h2><?php the_title(); ?></h2>
    <article class="Content">
      <?php the_content(); ?>
    </article>
  </section>
</main>
<?php
get_sidebar();
get_footer();
?>
