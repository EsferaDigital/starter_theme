<?php get_header(); ?>
<main class="Main">
  <section class="Main-container">
    <?php
      if(is_category()):
        $term_title = __('Resultados para la categoría:', 'starter');
      endif;

      if(is_tag()):
        $term_title = __('Resultados para la etiqueta:', 'starter');
      endif;
    ?>
    <div class="TermsResults">
      <h3><?php echo $term_title; ?></h3>
      <mark><?php sinle_term_title(); ?></mark>
    </div>
    <?php
      if(have_posts()):
        while(have_posts()):
          the_post();
          get_template_part('template-parts/home-content');
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
