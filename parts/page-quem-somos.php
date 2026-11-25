<section class="page-head"><div class="wrap"><h1>Quem somos</h1><p class="lead">Brinquedos para festas na <?php echo esc_html(dt('region')); ?> de São Paulo.</p></div><div class="cloud" aria-hidden="true"></div></section>
<section class="wrap sec narrow"><h2><?php echo esc_html(dt('brand')); ?>: aluguel de brinquedos para festas</h2>
  <p>A <?php echo esc_html(dt('brand')); ?> aluga brinquedos para festas infantis, escolas, condomínios e eventos na <?php echo esc_html(dt('region')); ?> de São Paulo. Cuidamos da entrega, da montagem e da retirada, para que você aproveite a festa sem se preocupar.</p>
  <?php if(trim(get_the_content())) echo '<div class="content">'.apply_filters('the_content',get_the_content()).'</div>'; ?>
  <div class="team-photo wide"><?php echo dt_team_img('',home_url('/contato/')); ?></div>
  <h2>Nossa equipe</h2>
  <p>Por trás de cada festa há três frentes de trabalho: quem responde o seu contato, quem organiza a entrega e quem responde pela empresa.</p>
  <?php echo dt_team_html(); ?>
  <h2>O que oferecemos</h2>
  <p>Trabalhamos com castelos pula-pula, tobogãs, infláveis multiatividades, futebol de sabão, mesas de jogos, touro mecânico, piscina de bolinhas, cama elástica e tombo legal. Você escolhe uma atração ou monta uma combinação para o tamanho da sua festa.</p>
  <h2>Como trabalhamos</h2>
  <ul class="checks"><li>Atendimento direto pelo WhatsApp, todos os dias, das 9h às 22h.</li><li>Orçamento de acordo com a data, o endereço e o espaço disponível.</li><li>Brinquedos higienizados e conferidos antes de cada locação.</li><li>Entrega, montagem, orientação de uso e retirada pela nossa equipe.</li></ul>
  <h2>Nossos compromissos</h2>
  <p>Combinar o horário e cumprir. Explicar com clareza o que está incluso no orçamento. Entregar brinquedos limpos e conferidos. Orientar o uso na montagem, para que as crianças brinquem com segurança e os adultos fiquem tranquilos.</p>
  <h2>Para quem alugamos</h2>
  <p>Famílias que fazem o aniversário em casa, em salão ou no condomínio; escolas e igrejas que organizam festas e eventos; e empresas que querem animar uma confraternização. Cada público pede uma combinação diferente de atrações, e ajudamos a montar a sua.</p>
  <h2>Onde estamos</h2>
  <p>Ficamos na Avenida João Paulo I, na <?php echo esc_html(dt('region')); ?> de São Paulo, e atendemos bairros como <?php echo esc_html(implode(', ',array_slice(dt_hoods(),0,6))); ?> e região. <a class="link-i" href="<?php echo esc_url(home_url('/onde-atendemos/')); ?>">Veja todos os bairros atendidos</a>.</p>
  <?php echo dt_cta_btn('Falar no WhatsApp','Olá! Gostaria de um orçamento.'); ?></section>
<section class="wrap sec"><h2>O que os clientes dizem</h2><p class="center">Avaliações reais do Perfil da Empresa no Google.</p><?php echo dt_reviews_html(6); ?></section>
<section class="band"><div class="wrap sec"><h2>Perguntas frequentes</h2><?php echo dt_faq_html(dt_faq_list()); ?></div></section>
<section class="wrap sec"><h2>Conheça os brinquedos</h2><div class="tiles"><?php foreach(array_slice(dt_products(),0,3) as $i=>$p) echo dt_card($p,$i); ?></div><p class="center"><a class="link" href="<?php echo esc_url(home_url('/servicos/')); ?>">Ver todos os brinquedos</a></p></section>
