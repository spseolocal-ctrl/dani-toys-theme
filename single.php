<?php get_header(); while(have_posts()): the_post();
  $cats=get_the_category(); $html=dt_article_html(apply_filters('the_content',get_the_content())); ?>
<section class="page-head"><div class="wrap narrow"><nav class="crumbs" aria-label="Você está em"><a href="<?php echo esc_url(home_url('/')); ?>">Início</a> / <a href="<?php echo esc_url(home_url('/blog/')); ?>">Blog</a><?php if($cats) echo ' / '.esc_html($cats[0]->name); ?></nav>
  <h1><?php the_title(); ?></h1>
  <p class="lead"><?php echo esc_html(get_the_date()); ?> · <?php echo (int)dt_reading_time(); ?> min de leitura · <?php echo esc_html(dt('brand')); ?></p></div><div class="cloud" aria-hidden="true"></div></section>
<div class="wrap sec article-wrap">
  <article class="article">
    <?php if(has_post_thumbnail()) echo dt_link_images(get_the_post_thumbnail(null,'large',['class'=>'article-img','alt'=>dt_alt(get_the_title())])); ?>
    <?php echo dt_toc_html(); ?>
    <div class="content article-body"><?php echo dt_link_images($html); ?></div>
    <div class="cta-box"><b>Gostou das dicas? Peça o orçamento da sua festa na <?php echo esc_html(dt('region')); ?>.</b><?php echo dt_cta_btn(); ?></div>
  </article>
  <aside class="side">
    <div class="side-card"><h3>Brinquedos para sua festa</h3><ul class="checks"><?php foreach(array_slice(dt_products(),0,6) as $p) echo '<li><a href="'.esc_url(dt_url($p)).'">'.esc_html($p['menu']).'</a></li>'; ?></ul><?php echo dt_cta_btn('Falar no WhatsApp'); ?></div>
    <?php $r=new WP_Query(['posts_per_page'=>4,'post__not_in'=>[get_the_ID()],'ignore_sticky_posts'=>1]); if($r->have_posts()): ?>
    <div class="side-card"><h3>Mais artigos</h3><ul class="side-list"><?php while($r->have_posts()){ $r->the_post(); echo '<li><a href="'.esc_url(get_permalink()).'">'.esc_html(get_the_title()).'</a></li>'; } wp_reset_postdata(); ?></ul></div><?php endif; ?>
  </aside>
</div>
<?php endwhile; get_footer();
