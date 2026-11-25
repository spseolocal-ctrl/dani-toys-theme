<?php
if(!defined('ABSPATH'))exit;
/* Textos complementares por brinquedo. Sem números inventados: capacidades e medidas são confirmadas no orçamento. */
$GLOBALS['dt_extra']=[
 'castelo-pula-pula'=>['para'=>'Aniversários infantis, festas de condomínio, eventos escolares e encontros de família.','espaco'=>'Precisa de um piso plano e de uma tomada próxima para o soprador. Informe o tamanho do espaço que confirmamos qual modelo cabe.','dica'=>'Para grupos de idades muito diferentes, combine o castelo com uma atração para os maiores, como uma mesa de jogos, para ninguém ficar de fora.'],
 'toboga-inflavel'=>['para'=>'Festas com mais crianças, eventos de escola, condomínios e confraternizações com área externa.','espaco'=>'Os tobogãs são maiores e pedem altura livre e espaço ao redor. Mande uma foto do local no WhatsApp e avaliamos a montagem.','dica'=>'É uma atração que costuma ter fila. Para festas grandes, vale pensar em uma segunda opção de brinquedo para dividir o grupo.'],
 'inflavel-multiatividades'=>['para'=>'Festas em que as crianças gostam de variar: escorregar, escalar e pular no mesmo lugar.','espaco'=>'Ocupa uma área maior do que um pula-pula simples. Confirmamos o modelo conforme a metragem do seu quintal, salão ou área de lazer.','dica'=>'Como reúne várias atividades em uma só atração, é uma boa escolha quando o espaço só comporta um brinquedo grande.'],
 'futebol-de-sabao'=>['para'=>'Confraternizações, festas de adolescentes e adultos, eventos de empresa e dias de calor.','espaco'=>'Precisa de uma área externa, com ponto de água e escoamento. Combine conosco o local antes da data.','dica'=>'Peça aos convidados para levarem roupa e toalha extras. A brincadeira molha todo mundo, e essa é a graça.'],
 'mesa-de-jogos'=>['para'=>'Festas de adolescentes, confraternizações, eventos de empresa e festas em que adultos e crianças ficam juntos.','espaco'=>'Ocupa pouco espaço em relação aos infláveis e funciona em salões, garagens e áreas cobertas. Informe o ambiente para escolhermos os jogos.','dica'=>'Mesas de jogos combinam com infláveis: enquanto os pequenos pulam, os maiores têm uma opção para competir.'],
 'touro-mecanico'=>['para'=>'Festas de adolescentes e adultos, eventos de empresa, festas juninas e confraternizações.','espaco'=>'Pede área ampla com colchão de proteção ao redor. A equipe orienta a montagem e o uso com segurança.','dica'=>'Por ser uma atração que atrai a plateia, posicione perto de onde os convidados circulam. Combine conosco a melhor posição.'],
 'piscina-de-bolinhas'=>['para'=>'Crianças pequenas, festas de bebês, aniversários de até alguns anos e espaços internos.','espaco'=>'Cabe bem em salões, apartamentos e áreas cobertas. Confirmamos o tamanho conforme o espaço que você tem.','dica'=>'Para as crianças menores, a presença de um adulto por perto deixa a brincadeira mais tranquila para todos.'],
 'cama-elastica'=>['para'=>'Aniversários, festas de condomínio, escolas e eventos em quintais e áreas de lazer.','espaco'=>'Pede piso firme e nivelado e área livre ao redor. Informe o espaço e a faixa de idade das crianças para indicarmos o tamanho certo.','dica'=>'Respeite a capacidade indicada do modelo e organize a vez dos pulos. Isso deixa a brincadeira mais segura e organizada.'],
 'tombo-legal'=>['para'=>'Festas de crianças maiores, adolescentes e adultos, eventos de empresa e confraternizações.','espaco'=>'Pede área plana e ampla, com tomada próxima para o funcionamento. Confirmamos o espaço necessário no orçamento.','dica'=>'A brincadeira rende torcida, então vale posicionar em local com bom espaço para a plateia.'],
];
function dt_extra($slug){return $GLOBALS['dt_extra'][$slug]??null;}
/* Passos do aluguel, usados em várias páginas */
function dt_steps_html(){
  return '<ol class="steps"><li><b>Escolha</b>Veja os brinquedos e chame no WhatsApp.</li><li><b>Orçamento</b>Informe data, endereço, espaço e número de convidados.</li><li><b>Reserva</b>Confirmamos a data, o horário e os detalhes da montagem.</li><li><b>Festa</b>Entregamos, montamos, orientamos o uso e retiramos depois.</li></ol>';
}
function dt_faq_html($list){
  $o='<div class="faq">'; foreach($list as $f) $o.='<details><summary>'.esc_html($f[0]).'</summary><p>'.esc_html($f[1]).'</p></details>'; return $o.'</div>';
}

$GLOBALS['dt_team']=[
 ['Gabriel Almeida','Responsável pela Dani Toys'],
 ['Patricia Ribeiro','Responsável pelo atendimento'],
 ['Elefas Alves','Responsável pela logística'],
];
function dt_team_html(){
  $o='<ul class="team">'; foreach($GLOBALS['dt_team'] as $t) $o.='<li><b>'.esc_html($t[0]).'</b><span>'.esc_html($t[1]).'</span></li>'; return $o.'</ul>';
}
function dt_team_img($cls='',$href=null){
  $img='<img'.($cls?' class="'.esc_attr($cls).'"':'').' src="'.esc_url(dt_img('equipe-dani-toys-zona-norte.webp')).'" width="1000" height="1000" alt="'.esc_attr('Gabriel Almeida, Patricia Ribeiro e Elefas Alves, equipe da Dani Toys - '.dt('brand').', aluguel de brinquedos na '.dt('region')).'">';
  if($href===null) $href=home_url('/quem-somos/');
  return '<a class="img-link" href="'.esc_url($href).'" title="'.esc_attr(dt('brand').' - Conheça a nossa equipe').'">'.$img.'</a>';
}
/* Torna clicável toda imagem de conteúdo que ainda não está dentro de um link */
function dt_link_images($html,$href=null,$title='',$blank=false){
  if($href===null) $href=home_url('/servicos/');
  if($title==='') $title=dt('brand').' - Veja os brinquedos para alugar';
  $parts=preg_split('#(<a\b[^>]*>.*?</a>)#is',$html,-1,PREG_SPLIT_DELIM_CAPTURE);
  foreach($parts as $k=>$seg){
    if(stripos($seg,'<a')===0) continue;
    $parts[$k]=preg_replace('#<img\b[^>]*>#i','<a class="img-link" href="'.esc_url($href).'" title="'.esc_attr($title).'"'.($blank?' target="_blank" rel="noopener"':'').'>$0</a>',$seg);
  }
  return implode('',$parts);
}
