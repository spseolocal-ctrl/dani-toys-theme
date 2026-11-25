<?php
if(!defined('ABSPATH'))exit;
/* EDITE AQUI os dados do negócio. Troca em um lugar só, vale para o site inteiro. */
$GLOBALS['dt_cfg']=[
  'brand'        => 'Dani Toys',
  'region'       => 'Zona Norte',
  'whatsapp'     => '5511927399859',      // DDI+DDD+número, só dígitos
  'whatsapp_fmt' => '(11) 92739-9859',
  'email'        => 'contato@danitoys.com.br', // TROCAR se for outro
  'street'       => 'Avenida João Paulo I, 1554',
  'cep'          => '02842-280',
  'city'         => 'São Paulo',
  'uf'           => 'SP',
  'hours_text'   => 'Atendimento todos os dias, das 9h às 22h',
  'open'         => '09:00',
  'close'        => '22:00',
  'ga_id'        => '',                   // opcional: ID do Google Analytics (G-XXXX)
  'gbp_url'      => '',                   // opcional: link do Perfil da Empresa no Google
  'instagram'    => '',                   // opcional
];
function dt($k){return $GLOBALS['dt_cfg'][$k]??'';}
function dt_wa_ready(){return dt('whatsapp')!=='5511900000000';}
function dt_wa($msg){return 'https://wa.me/'.dt('whatsapp').'?text='.rawurlencode($msg);}
