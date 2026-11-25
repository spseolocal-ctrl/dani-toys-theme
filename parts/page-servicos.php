<section class="page-head"><div class="wrap"><h1>Aluguel de brinquedos na <?php echo esc_html(dt('region')); ?></h1><p class="lead">Escolha a atração ideal para a sua festa, do pula-pula ao touro mecânico.</p></div><div class="cloud" aria-hidden="true"></div></section>
<section class="wrap sec"><div class="tiles"><?php foreach(dt_products() as $i=>$p) echo dt_card($p,$i); ?></div></section>
<section class="band"><div class="wrap sec"><h2>Como escolher o brinquedo certo</h2><div class="cols3">
  <div><h3>Pense na idade</h3><p>Pula-pulas, piscinas de bolinhas e castelos agradam as crianças menores. Tobogãs, touro mecânico e jogos funcionam melhor para as maiores, adolescentes e adultos.</p></div>
  <div><h3>Meça o espaço</h3><p>Infláveis grandes pedem área livre e tomada por perto. Mesas de jogos e piscinas de bolinhas cabem em lugares menores, como salões e apartamentos.</p></div>
  <div><h3>Combine atrações</h3><p>Uma atração para os pequenos e outra para os maiores deixa a festa equilibrada. Montamos a combinação com você no orçamento.</p></div>
</div></div></section>
<section class="wrap sec"><h2>Para cada tipo de evento</h2><div class="cols3">
  <div><h3>Festa infantil</h3><p>Castelos, piscina de bolinhas e tobogãs para o aniversário em casa, no salão ou no condomínio.</p></div>
  <div><h3>Escolas e igrejas</h3><p>Atrações para dias de festa, kermesses e eventos com muitas crianças ao mesmo tempo.</p></div>
  <div><h3>Empresas e confraternizações</h3><p>Futebol de sabão, mesas de jogos, tombo legal e touro mecânico para animar equipes e famílias.</p></div>
</div></section>
<section class="wrap sec"><h2>Como funciona o aluguel</h2><?php echo dt_steps_html(); ?><p class="center"><?php echo dt_cta_btn('Pedir orçamento no WhatsApp','Olá! Quero um orçamento de brinquedos na Zona Norte.'); ?></p></section>
<section class="band"><div class="wrap sec"><h2>Perguntas frequentes</h2><?php echo dt_faq_html(dt_faq_list()); ?></div></section>
