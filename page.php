<?php
get_header();
while(have_posts()): the_post();
  $slug=get_post_field('post_name');
  $prod=dt_product_by_slug($slug); $hood=dt_hood_by_page_slug($slug);
  if($prod){ include get_template_directory().'/parts/produto.php'; }
  elseif($hood){ include get_template_directory().'/parts/bairro.php'; }
  elseif(file_exists(get_template_directory().'/parts/page-'.$slug.'.php')){ include get_template_directory().'/parts/page-'.$slug.'.php'; }
  else { ?>
<section class="page-head"><div class="wrap"><h1><?php the_title(); ?></h1></div><div class="cloud" aria-hidden="true"></div></section>
<section class="wrap sec narrow content"><?php the_content(); ?></section>
<?php }
endwhile;
get_footer();
