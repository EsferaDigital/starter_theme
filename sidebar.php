<aside class="Widgets">
  <section>
    <?php
    if(is_active_sidebar('sidebar_main')):
      dynamic_sidebar('sidebar_main');
    else:
    ?>
      <article class="Widget">
        <h3><?php _e('Buscar', 'starter'); ?></h3>
        <?php get_search_for(); ?>
      </article>
    <?php endif; ?>
  </section>
</aside>
