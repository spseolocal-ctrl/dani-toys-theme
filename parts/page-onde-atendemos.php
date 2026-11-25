<section class="page-head"><div class="wrap"><h1>Onde atendemos na <?php echo esc_html(dt('region')); ?></h1><p class="lead">Entrega, montagem e retirada de brinquedos para festas em toda a <?php echo esc_html(dt('region')); ?> de São Paulo.</p></div><div class="cloud" aria-hidden="true"></div></section>
<section class="wrap sec narrow"><h2>Bairros atendidos</h2>
  <ul class="hoods left"><?php echo dt_hoods_li(); ?></ul>
  <p>Estamos na Avenida João Paulo I, na <?php echo esc_html(dt('region')); ?>, e atendemos os bairros acima e as regiões vizinhas. A disponibilidade depende da data e do endereço, então informe o seu no WhatsApp e confirmamos na hora.</p>
  <h2>Como funciona a entrega</h2>
  <p>Combinamos com você o dia e o horário da entrega antes da festa. A equipe chega com o brinquedo, monta no local indicado, confere tudo e orienta o uso. Depois da festa, voltamos no horário combinado para desmontar e retirar.</p>
  <p>Para a montagem dar certo, avise no orçamento se o local é casa, apartamento, salão ou condomínio, se há escada ou elevador no caminho, e se existe uma tomada próxima. Uma foto do espaço no WhatsApp ajuda muito.</p>
  <h2>Festas em condomínios, escolas e salões</h2>
  <p>Atendemos festas em casas, salões de festa, áreas de lazer de condomínio, escolas e espaços de eventos. Em condomínios, vale conferir com a administração o horário permitido para entrada e montagem.</p>
  <h2>Casa, apartamento ou salão: o que muda</h2>
  <p><b>Casa com quintal:</b> o espaço costuma comportar infláveis maiores, como tobogãs e castelos. Confirme o piso e a tomada. <b>Apartamento ou condomínio:</b> piscina de bolinhas, mesas de jogos e infláveis menores funcionam bem em salões e áreas de lazer; confira com a administração o horário de entrada. <b>Salão de festas:</b> pergunte ao espaço as medidas e se há restrição de equipamentos.</p>
  <h2>Antes da data da festa</h2>
  <ul class="checks"><li>Defina o bairro e o tipo de local.</li><li>Meça o espaço onde o brinquedo ficará.</li><li>Confirme a tomada próxima e o acesso para a equipe.</li><li>Fale com a gente com antecedência para garantir a data.</li></ul>
  <h2>Brinquedos disponíveis na região</h2>
  <ul class="checks"><?php foreach(dt_products() as $p) echo '<li><a href="'.esc_url(dt_url($p)).'">'.esc_html($p['menu']).'</a></li>'; ?></ul>
  <?php echo dt_cta_btn('Confirmar meu bairro no WhatsApp','Olá! Moro no bairro ____ . Vocês atendem?'); ?></section>
<section class="band"><div class="wrap sec"><h2>Perguntas frequentes</h2><?php echo dt_faq_html([
  ['Atendem fora da Zona Norte?','O nosso foco é a Zona Norte. Para outras regiões de São Paulo, chame no WhatsApp com o endereço e verificamos a disponibilidade.'],
  ['Meu bairro não está na lista. Vocês atendem?','A lista mostra os bairros mais atendidos. Informe o seu endereço no WhatsApp e confirmamos se a entrega é possível.'],
  ['Preciso estar no local na entrega?','É importante que alguém responsável receba a equipe e indique onde o brinquedo deve ser montado.'],
  ['Qual é o horário de atendimento?','Atendemos todos os dias, das 9h às 22h.'],
]); ?></div></section>
