<?php
$p=$prod; $others=[]; foreach(dt_products() as $o){ if($o['slug']!==$p['slug']) $others[]=$o; } $others=array_slice($others,0,3);
?>
<section class="page-head"><div class="wrap"><nav class="crumbs" aria-label="Você está em"><a href="<?php echo esc_url(home_url('/')); ?>">Início</a> / <a href="<?php echo esc_url(home_url('/servicos/')); ?>">Serviços</a> / <?php echo esc_html($p['menu']); ?></nav>
  <h1>Aluguel de <?php echo esc_html($p['title']); ?> na <?php echo esc_html(dt('region')); ?></h1><p class="lead"><?php echo esc_html($p['short']); ?></p></div><div class="cloud" aria-hidden="true"></div></section>
<section class="wrap sec prod"><div class="prod-img"><?php echo dt_link_images(dt_thumb($p,'tall'),dt_wa('Olá! Quero orçamento de aluguel de '.$p['menu'].' na Zona Norte.'),dt('brand').' - Peça orçamento de '.$p['menu'],true); ?></div>
  <div><h2><?php echo esc_html($p['menu']); ?> para sua festa</h2>
    <p><?php echo esc_html($p['long']); ?></p>
    <ul class="checks"><?php foreach($p['bullets'] as $b) echo '<li>'.esc_html($b).'</li>'; ?></ul>
    <p>Atendemos a <?php echo esc_html(dt('region')); ?> de São Paulo, incluindo <?php echo esc_html(implode(', ',array_slice(dt_hoods(),0,6))); ?> e região. <a class="link-i" href="<?php echo esc_url(home_url('/onde-atendemos/')); ?>">Veja todos os bairros</a>.</p>
    <?php if(trim(get_the_content())) echo '<div class="content">'.apply_filters('the_content',get_the_content()).'</div>'; ?>
    <?php echo dt_cta_btn('Pedir orçamento no WhatsApp','Olá! Quero orçamento de aluguel de '.$p['menu'].' na Zona Norte.'); ?></div></section>
<?php $ex=dt_extra($p['slug']); if($ex): ?>
<section class="band"><div class="wrap sec"><h2>O que saber antes de alugar</h2><div class="cols3">
  <div><h3>Ideal para</h3><p><?php echo esc_html($ex['para']); ?></p></div>
  <div><h3>Espaço e instalação</h3><p><?php echo esc_html($ex['espaco']); ?></p></div>
  <div><h3>Dica da equipe</h3><p><?php echo esc_html($ex['dica']); ?></p></div></div></div></section>
<?php endif; ?>
<section class="wrap sec"><h2>Como funciona o aluguel</h2><?php echo dt_steps_html(); ?>
  <p class="center">Segurança em primeiro lugar: a equipe orienta o uso na entrega, e as crianças devem brincar sempre com a supervisão de um adulto.</p></section>
<section class="band"><div class="wrap sec"><h2>Perguntas frequentes sobre <?php echo esc_html(mb_strtolower($p['menu'])); ?></h2><?php echo dt_faq_html(dt_faq_list()); ?></div></section>
<section class="wrap sec"><h2>Veja também</h2><div class="tiles"><?php foreach($others as $i=>$o) echo dt_card($o,$i+1); ?></div></section>
