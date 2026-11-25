<?php get_header(); ?>
<section class="page-head"><div class="wrap"><nav class="crumbs" aria-label="Você está em"><a href="<?php echo esc_url(home_url('/')); ?>">Início</a> / Blog</nav>
  <h1><?php echo is_home()?'Blog Dani Toys':esc_html(wp_strip_all_tags(get_the_archive_title())); ?></h1>
  <p class="lead">Dicas e ideias para organizar a festa infantil na <?php echo esc_html(dt('region')); ?> de São Paulo.</p></div><div class="cloud" aria-hidden="true"></div></section>
<?php if(is_home()): $cats=get_categories(['hide_empty'=>false,'exclude'=>[1],'orderby'=>'id']); ?>
<section class="wrap sec narrow blog-intro"><h2>Dicas para a festa dar certo</h2>
  <p>Aqui você encontra conteúdos da equipe da <?php echo esc_html(dt('brand')); ?> para planejar a festa infantil, escolher o brinquedo ideal para o seu espaço e entender como funciona o aluguel de brinquedos na <?php echo esc_html(dt('region')); ?> de São Paulo. Escolha um assunto abaixo ou leia os artigos mais recentes.</p>
  <?php if($cats): ?><ul class="hoods"><?php foreach($cats as $c) echo '<li><a href="'.esc_url(get_category_link($c)).'">'.esc_html($c->name).'</a></li>'; ?></ul><?php endif; ?></section>
<?php endif; ?>
<section class="wrap sec">
<?php if(have_posts()): ?><div class="posts"><?php while(have_posts()){ the_post(); echo dt_post_card(); } ?></div>
  <div class="pager"><?php the_posts_pagination(['mid_size'=>1,'prev_text'=>'←','next_text'=>'→']); ?></div>
<?php else: ?><p class="center">Os primeiros artigos chegam em breve. Enquanto isso, veja nossos brinquedos.</p><p class="center"><a class="btn btn-grad" href="<?php echo esc_url(home_url('/servicos/')); ?>">Ver brinquedos</a></p><?php endif; ?>
</section>
<?php if(is_home()): ?>
<section class="wrap sec"><div class="cols3">
  <div><h3>Dicas de festa infantil</h3><p>Ideias de organização, espaço, tempo de brincadeira e cuidados para a festa ser tranquila para os pais e divertida para as crianças.</p></div>
  <div><h3>Guia de brinquedos</h3><p>Como escolher castelo pula-pula, tobogã, piscina de bolinhas, cama elástica e outras atrações de acordo com a idade e o local.</p></div>
  <div><h3>Festas na Zona Norte</h3><p>Informações sobre entrega, montagem e retirada nos bairros que atendemos, de Santana ao Tucuruvi, da Casa Verde à Freguesia do Ó.</p></div></div></section>
<section class="wrap sec"><div class="cta"><h2>Quer ajuda para escolher o brinquedo da sua festa?</h2><p>Fale com a nossa equipe, conte a data, o endereço e o espaço disponível, e receba o orçamento.</p>
  <?php echo dt_cta_btn('Pedir orçamento no WhatsApp','Olá! Vim pelo blog e quero um orçamento de aluguel de brinquedos na Zona Norte.'); ?> <a class="btn btn-white" href="<?php echo esc_url(home_url('/contato/')); ?>">Falar com a Dani Toys</a></div></section>
<?php endif; ?>
<?php get_footer();
