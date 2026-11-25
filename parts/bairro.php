<?php
$h=$hood; $d=$GLOBALS['dt_hood_data'][$h]; $z=dt('region');
$msg='Olá! Quero orçamento de aluguel de brinquedos em '.$h.' ('.$z.').';
?>
<section class="page-head"><div class="wrap"><nav class="crumbs" aria-label="Você está em"><a href="<?php echo esc_url(home_url('/')); ?>">Início</a> / <a href="<?php echo esc_url(home_url('/onde-atendemos/')); ?>">Onde atendemos</a> / <?php echo esc_html($h); ?></nav>
  <h1>Aluguel de brinquedos em <?php echo esc_html($h); ?>, <?php echo esc_html($z); ?> de SP</h1>
  <p class="lead">Entrega, montagem e retirada de brinquedos para festas em <?php echo esc_html($h); ?>, com equipe própria e atendimento direto no WhatsApp.</p></div><div class="cloud" aria-hidden="true"></div></section>
<section class="wrap sec narrow"><h2>Brinquedos para festa em <?php echo esc_html($h); ?></h2>
  <p><?php echo esc_html($d['ref']); ?> A <?php echo esc_html(dt('brand')); ?> atende esse bairro com castelo pula-pula, tobogã inflável, piscina de bolinhas, cama elástica, futebol de sabão e outras atrações para aniversários, escolas, condomínios e eventos.</p>
  <p><?php echo esc_html($d['perfil']); ?></p>
  <?php echo dt_cta_btn('Pedir orçamento para '.$h,$msg); ?></section>
<section class="band"><div class="wrap sec"><h2>Escolha o brinquedo para a sua festa em <?php echo esc_html($h); ?></h2>
  <div class="tiles"><?php foreach(dt_products() as $i=>$p) echo dt_card($p,$i); ?></div></div></section>
<section class="wrap sec"><h2>Como funciona a entrega em <?php echo esc_html($h); ?></h2><?php echo dt_steps_html(); ?>
  <p class="center">A equipe entrega, monta, orienta o uso e volta no horário combinado para desmontar e retirar. Para a montagem dar certo, informe no orçamento o tipo de local, o acesso e a tomada mais próxima.</p></section>
<section class="band"><div class="wrap sec"><h2>O que os clientes dizem</h2>
  <p class="center">Avaliações reais deixadas no Perfil da Empresa da <?php echo esc_html(dt('brand')); ?> no Google.</p>
  <?php echo dt_reviews_html(4); ?></div></section>
<section class="wrap sec narrow"><h2>Bairros vizinhos que também atendemos</h2>
  <ul class="hoods left"><?php foreach($d['near'] as $n) echo '<li><a href="'.esc_url(dt_hood_url($n)).'">'.esc_html($n).'</a></li>'; ?></ul>
  <p>Veja também a página <a class="link-i" href="<?php echo esc_url(home_url('/onde-atendemos/')); ?>">onde atendemos na <?php echo esc_html($z); ?></a> ou conheça os <a class="link-i" href="<?php echo esc_url(home_url('/servicos/')); ?>">brinquedos disponíveis para aluguel</a>.</p></section>
<section class="band"><div class="wrap sec"><h2>Perguntas frequentes sobre aluguel em <?php echo esc_html($h); ?></h2><?php echo dt_faq_html(array_merge([$d['q']],[
  ['Vocês entregam em '.$h.'?','Sim. A equipe faz a entrega, a montagem e a retirada em '.$h.', no horário combinado. Informe o endereço no WhatsApp para confirmarmos a data.'],
  ['Como peço o orçamento?','Chame no WhatsApp com a data, o endereço, o espaço disponível e o brinquedo que você quer. Respondemos com o orçamento e confirmamos a reserva.'],
  ['Preciso de tomada no local?','A maioria dos infláveis usa um soprador elétrico, então é preciso uma tomada por perto. Confirmamos isso no orçamento.'],
  ['Qual é o horário de atendimento?','Atendemos todos os dias, das 9h às 22h.'],
])); ?></div></section>
<section class="wrap sec"><div class="cta"><h2>Festa em <?php echo esc_html($h); ?>? Vamos encontrar a melhor opção.</h2><?php echo dt_cta_btn('Pedir orçamento no WhatsApp',$msg); ?></div></section>
