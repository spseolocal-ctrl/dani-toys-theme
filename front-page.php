<?php get_header(); $hoods=dt_hoods(); ?>
<section class="hero"><div class="wrap hero-in">
  <div class="hero-txt"><span class="eyebrow">Locação de brinquedos • <?php echo esc_html(dt('region')); ?> de São Paulo</span>
    <h1>Aluguel de brinquedos para festas na <em><?php echo esc_html(dt('region')); ?></em></h1>
    <p class="lead">Castelos pula-pula, tobogãs, piscinas de bolinhas, touro mecânico e muito mais, com entrega, montagem e retirada pela nossa equipe.</p>
    <div class="btns"><a class="btn btn-yellow" href="<?php echo esc_url(home_url('/servicos/')); ?>">Ver brinquedos</a><?php echo dt_cta_btn('Falar no WhatsApp','Olá! Quero um orçamento de aluguel de brinquedos na Zona Norte.','btn btn-ghost'); ?></div>
    <ul class="pills"><li>Orçamento rápido</li><li>Entrega e montagem</li><li>Todos os dias, 9h às 22h</li></ul></div>
  <div class="hero-art"><div class="arch"><?php echo dt_team_img(); ?></div>
    <i class="dot d1"></i><i class="dot d2"></i><i class="dot d3"></i></div>
</div><div class="cloud" aria-hidden="true"></div></section>
<section class="wrap"><ul class="chips">
  <li class="c-blue"><b>Entrega</b><span>montagem e retirada</span></li><li class="c-red"><b>Equipe própria</b><span>atendimento e montagem</span></li>
  <li class="c-yellow"><b>Higienização</b><span>a cada locação</span></li><li class="c-green"><b><?php echo esc_html(dt('region')); ?></b><span>e toda São Paulo</span></li></ul></section>
<section class="wrap sec"><span class="eyebrow c">Destaques para sua festa</span><h2>Escolha o brinquedo. A diversão começa aqui.</h2>
  <div class="tiles"><?php foreach(dt_products() as $i=>$p) echo dt_card($p,$i); ?></div></section>
<section class="band"><div class="wrap sec"><h2>Aluguel de brinquedos para festa infantil na <?php echo esc_html(dt('region')); ?></h2>
  <div class="cols3">
    <div><h3>Brinquedos para diferentes festas</h3><p>Infláveis, jogos e atrações para aniversários, escolas, condomínios e eventos de empresa.</p></div>
    <div><h3>Higienização, inspeção e montagem</h3><p>Cada brinquedo é higienizado e conferido antes da entrega, e montado por equipe treinada no local da festa.</p></div>
    <div><h3>Aniversários, escolas e eventos</h3><p>Montamos a combinação de atrações para o tamanho do espaço e a quantidade de convidados.</p></div>
  </div></div></section>
<section class="wrap sec"><h2>Como funciona</h2>
  <ol class="steps"><li><b>Escolha</b>Veja os brinquedos e chame no WhatsApp.</li><li><b>Orçamento</b>Informe data, endereço e espaço disponível.</li><li><b>Reserva</b>Confirmamos a data e combinamos os detalhes.</li><li><b>Festa</b>Entregamos, montamos e retiramos depois.</li></ol></section>
<section class="band"><div class="wrap sec"><h2>Atendemos sua região?</h2>
  <p class="center">Atendemos a <?php echo esc_html(dt('region')); ?> de São Paulo, incluindo:</p>
  <ul class="hoods"><?php echo dt_hoods_li(); ?></ul>
  <p class="center"><a class="link" href="<?php echo esc_url(home_url('/onde-atendemos/')); ?>">Ver todos os bairros atendidos</a> · Não achou o seu? Chame no WhatsApp e confirmamos.</p></div></section>
<section class="band"><div class="wrap sec"><h2>O que os clientes dizem</h2><p class="center">Avaliações reais do Perfil da Empresa no Google (nota 4,4 com 7 avaliações).</p><?php echo dt_reviews_html(3); ?></div></section>
<section class="wrap sec team-sec"><div class="team-in"><div class="team-photo"><?php echo dt_team_img(); ?></div><div><span class="eyebrow c">Nossa equipe</span><h2>Quem cuida da sua festa</h2><p>Atendimento, logística e montagem trabalham juntos para que o brinquedo chegue no horário combinado e funcione bem do começo ao fim da festa.</p><?php echo dt_team_html(); ?><p><a class="link" href="<?php echo esc_url(home_url('/quem-somos/')); ?>">Conheça a Dani Toys</a></p></div></div></section>
<section class="wrap sec"><h2>Brinquedos para cada tipo de festa</h2><div class="cols3">
  <div><h3>Aniversário infantil</h3><p>Castelo pula-pula, piscina de bolinhas e tobogã para a festa em casa, no salão ou no condomínio.</p></div>
  <div><h3>Escolas e eventos</h3><p>Infláveis multiatividades, cama elástica e mesas de jogos para muitas crianças ao mesmo tempo.</p></div>
  <div><h3>Confraternizações</h3><p>Futebol de sabão, tombo legal e touro mecânico para animar equipes, amigos e famílias.</p></div></div></section>
<section class="band"><div class="wrap sec"><h2>Perguntas frequentes</h2><?php echo dt_faq_html(dt_faq_list()); ?></div></section>
<section class="wrap sec"><div class="cta"><h2>Sua festa já tem data? Vamos encontrar a melhor opção.</h2><?php echo dt_cta_btn(); ?></div></section>
<?php get_footer();
