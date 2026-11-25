<section class="page-head"><div class="wrap"><h1>Contato</h1><p class="lead">Peça seu orçamento de aluguel de brinquedos na <?php echo esc_html(dt('region')); ?>.</p></div><div class="cloud" aria-hidden="true"></div></section>
<section class="wrap sec narrow"><div class="contact-card"><h2>Fale com a gente</h2>
  <p><b>WhatsApp:</b> <a href="<?php echo esc_url(dt_wa('Olá! Gostaria de um orçamento.')); ?>" target="_blank" rel="noopener"><?php echo esc_html(dt('whatsapp_fmt')); ?></a></p>
  <p><b>E-mail:</b> <a href="mailto:<?php echo esc_attr(dt('email')); ?>"><?php echo esc_html(dt('email')); ?></a></p>
  <p><b>Endereço:</b> <?php echo esc_html(dt('street').', Casa - CEP '.dt('cep').', '.dt('city').' - '.dt('uf')); ?></p>
  <p><b>Horário:</b> <?php echo esc_html(dt('hours_text')); ?></p>
  <?php echo dt_cta_btn(); ?></div>
  <h2>Para agilizar o seu orçamento</h2>
  <p>Mande no WhatsApp as informações abaixo e respondemos com valores e disponibilidade:</p>
  <ul class="checks"><li>Data e horário da festa</li><li>Endereço ou bairro do local</li><li>Tipo de local: casa, apartamento, salão, condomínio ou escola</li><li>Espaço disponível e se há tomada por perto</li><li>Idade das crianças e número aproximado de convidados</li><li>Brinquedos que você já tem em mente</li></ul></section>
<section class="wrap sec narrow"><h2>Como é o atendimento</h2>
  <p>O primeiro contato é feito pelo WhatsApp, com a nossa área de atendimento, todos os dias, das 9h às 22h. Você conta a data, o local e o tipo de festa, e nós indicamos os brinquedos que fazem sentido para o seu caso e enviamos o orçamento.</p>
  <p>Depois que você escolhe, confirmamos a reserva e combinamos o horário da entrega com a equipe de logística. Na data, a equipe monta tudo, explica o uso e volta no horário combinado para retirar.</p>
  <h2>Atendemos em toda a <?php echo esc_html(dt('region')); ?></h2>
  <p>Veja a lista de bairros em <a class="link-i" href="<?php echo esc_url(home_url('/onde-atendemos/')); ?>">Onde atendemos</a> e conheça os <a class="link-i" href="<?php echo esc_url(home_url('/servicos/')); ?>">brinquedos disponíveis</a>.</p></section>
<section class="band"><div class="wrap sec"><h2>Perguntas frequentes</h2><?php echo dt_faq_html(dt_faq_list()); ?></div></section>
