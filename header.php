<!doctype html>
<html <?php language_attributes(); ?>>
<head>
<meta charset="<?php bloginfo('charset'); ?>">
<meta name="viewport" content="width=device-width, initial-scale=1">
<?php wp_head(); ?>
</head>
<body <?php body_class(); ?>>
<?php wp_body_open(); ?>
<div class="topbar">Aluguel de brinquedos para festas na <?php echo esc_html(dt('region')); ?> de São Paulo</div>
<header class="header"><div class="wrap header-in">
  <a class="logo" href="<?php echo esc_url(home_url('/')); ?>" aria-label="<?php echo esc_attr(dt('brand')); ?> - início">
    <img src="<?php echo esc_url(dt_img('logo-h-sm.webp')); ?>" width="420" height="125" alt="<?php echo esc_attr(dt_alt()); ?>"></a>
  <button class="menu-btn" type="button" aria-expanded="false" aria-controls="nav">Menu</button>
  <nav class="nav" id="nav" aria-label="Principal">
    <?php foreach(dt_nav() as $n): if(!empty($n[2])): ?>
    <div class="has-sub"><a href="<?php echo esc_url($n[1]); ?>"><?php echo esc_html($n[0]); ?></a><button class="sub-btn" type="button" aria-expanded="false" aria-label="Abrir submenu de <?php echo esc_attr($n[0]); ?>">▾</button>
      <div class="sub"><?php foreach($n[2] as $s): ?><a href="<?php echo esc_url($s[1]); ?>"><?php echo esc_html($s[0]); ?></a><?php endforeach; ?></div></div>
    <?php else: ?><a href="<?php echo esc_url($n[1]); ?>"><?php echo esc_html($n[0]); ?></a><?php endif; endforeach; ?>
    <a class="btn btn-green btn-sm" href="<?php echo esc_url(dt_wa('Olá! Quero um orçamento de aluguel de brinquedos na Zona Norte.')); ?>" target="_blank" rel="noopener" style="text-align:center;line-height:1.2"><b>Pedir orçamento</b><small style="display:block;font-weight:700"><?php echo esc_html(dt('whatsapp_fmt')); ?></small></a>
  </nav>
</div></header>
<main id="conteudo">
