<?php
if(!defined('ABSPATH'))exit;
require_once get_template_directory().'/inc/config.php';
require_once get_template_directory().'/inc/data.php';
require_once get_template_directory().'/inc/extra.php';
require_once get_template_directory().'/inc/bairros.php';

define('DT_V','1.0.0');

add_action('after_setup_theme',function(){
  add_theme_support('title-tag');
  add_theme_support('post-thumbnails');
  add_theme_support('html5',['search-form','comment-form','gallery','caption','style','script']);
  add_image_size('dt-card',640,480,true);
});

/* ---------- assets ---------- */
add_action('wp_enqueue_scripts',function(){
  $u=get_template_directory_uri().'/assets/';
  wp_enqueue_style('dt-fonts','https://fonts.googleapis.com/css2?family=Fredoka:wght@500;600;700&family=Nunito:wght@400;600;700;800&display=swap',[],null);
  foreach(['tokens','base','header','site'] as $f) wp_enqueue_style('dt-'.$f,$u.'css/'.$f.'.css',[],filemtime(get_template_directory().'/assets/css/'.$f.'.css'));
  wp_enqueue_script('dt-menu',$u.'js/menu.js',[],filemtime(get_template_directory().'/assets/js/menu.js'),['in_footer'=>true,'strategy'=>'defer']);
  wp_dequeue_style('wp-block-library'); wp_dequeue_style('global-styles'); wp_dequeue_style('classic-theme-styles');
},100);
add_action('init',function(){
  remove_action('wp_head','print_emoji_detection_script',7); remove_action('wp_print_styles','print_emoji_styles');
  remove_action('wp_head','wp_generator'); remove_action('wp_head','wlwmanifest_link'); remove_action('wp_head','rsd_link');
});
add_filter('preconnect_resources',fn($r)=>$r);
add_action('wp_head',function(){
  echo '<link rel="preconnect" href="https://fonts.googleapis.com"><link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>'."\n";
  $b=get_template_directory_uri().'/assets/img/';
  echo '<link rel="icon" href="'.esc_url($b.'favicon-32.png').'" type="image/png" sizes="32x32"><link rel="icon" href="'.esc_url($b.'favicon-192.png').'" type="image/png" sizes="192x192"><link rel="shortcut icon" href="'.esc_url(home_url('/favicon.ico')).'"><link rel="apple-touch-icon" href="'.esc_url($b.'apple-touch-icon.png').'">'."\n";
  echo '<meta name="theme-color" content="#8502b3">'."\n";
},1);

/* ---------- helpers ---------- */
function dt_products(){return $GLOBALS['dt_products'];}
function dt_hoods(){return $GLOBALS['dt_hoods'];}
function dt_slug($p){return 'aluguel-'.$p['slug'].'-zona-norte';}
function dt_url($p){return home_url('/'.dt_slug($p).'/');}
function dt_product_by_slug($slug){foreach(dt_products() as $p) if(dt_slug($p)===$slug) return $p; return null;}
function dt_img($id=null){return get_template_directory_uri().'/assets/img/'.$id;}

/* Texto alternativo padrão das imagens: "<assunto> - Dani Toys, aluguel de brinquedos na Zona Norte" */
function dt_alt($what=''){ return trim(($what?$what.' - ':'').dt('brand').', aluguel de brinquedos na '.dt('region')); }
add_filter('wp_get_attachment_image_attributes',function($a,$att){ if(empty($a['alt'])) $a['alt']=dt_alt(get_the_title($att->ID)); return $a; },10,2);
add_action('add_attachment',function($id){ if(!get_post_meta($id,'_wp_attachment_image_alt',true)) update_post_meta($id,'_wp_attachment_image_alt',dt_alt(get_the_title($id))); });
function dt_thumb($p,$class=''){
  $pg=get_page_by_path(dt_slug($p));
  if($pg && has_post_thumbnail($pg)) return get_the_post_thumbnail($pg,'dt-card',['class'=>$class,'alt'=>dt_alt($p['menu']),'title'=>dt_alt($p['menu']),'loading'=>'lazy','decoding'=>'async']);
  return '<div class="ph '.esc_attr($class).'" role="img" aria-label="Foto: '.esc_attr(dt_alt($p['menu'])).'"><span>Foto do brinquedo</span></div>';
}
function dt_card($p,$i=0){
  $c=['blue','red','yellow','green','violet'][$i%5];
  ob_start(); ?>
<article class="tile tile-<?php echo $c; ?>">
  <a class="tile-img" href="<?php echo esc_url(dt_url($p)); ?>"><?php echo dt_thumb($p); ?></a>
  <div class="tile-b"><small><?php echo esc_html($p['type']); ?></small>
    <h3><a href="<?php echo esc_url(dt_url($p)); ?>"><?php echo esc_html($p['title']); ?></a></h3>
    <p><?php echo esc_html($p['short']); ?></p>
    <a class="btn btn-white" href="<?php echo esc_url(dt_wa('Olá! Quero orçamento do brinquedo: '.$p['title'].' na Zona Norte.')); ?>" target="_blank" rel="noopener">Quero esse brinquedo</a>
    <a class="link" href="<?php echo esc_url(dt_url($p)); ?>">Conhecer <?php echo esc_html($p['menu']); ?> →</a>
  </div>
</article><?php return ob_get_clean();
}
function dt_cta_btn($label='Pedir orçamento no WhatsApp',$msg='Olá! Quero um orçamento de aluguel de brinquedos na Zona Norte.',$cls='btn btn-green'){
  return '<a class="'.esc_attr($cls).'" href="'.esc_url(dt_wa($msg)).'" target="_blank" rel="noopener">'.esc_html($label).'</a>';
}

/* ---------- SEO por página (title/description) ---------- */
/* Limites: title até 60 caracteres (alvo ~50), description até 155 (alvo ~150) */
function dt_fit($s,$max){
  $s=trim(preg_replace('/\s+/',' ',wp_strip_all_tags($s)));
  if(mb_strlen($s)<=$max) return $s;
  $c=mb_substr($s,0,$max-1); $sp=mb_strrpos($c,' '); if($sp!==false && $sp>$max*0.6) $c=mb_substr($c,0,$sp);
  return rtrim($c," ,;:-–").'…';
}
function dt_meta(){
  $b=dt('brand'); $z=dt('region'); $m=null;
  if(is_front_page()) $m=["Aluguel de Brinquedos na $z SP | $b","Aluguel de brinquedos para festas na $z de SP: pula-pula, tobogã, piscina de bolinhas e mais. Entrega e montagem. Peça orçamento."];
  elseif(is_home()) $m=["Blog: Dicas de Festa Infantil | $b","Dicas, ideias e guias para escolher brinquedos e organizar a festa infantil na $z de São Paulo. Leia no blog da $b."];
  elseif(is_singular('post')){
    $ex=get_the_excerpt(); $m=[get_the_title(),$ex]; $m[0]=dt_fit(get_the_title(),60);
    return [$m[0],dt_fit($ex,155)];
  }
  elseif(is_page()){
    $s=get_post_field('post_name',get_queried_object_id());
    if($p=dt_product_by_slug($s)) $m=[(mb_strlen("Aluguel de {$p['menu']} na $z | $b")>60?"Aluguel de {$p['menu']} | $b":"Aluguel de {$p['menu']} na $z | $b"),"Aluguel de ".mb_strtolower($p['menu'])." na $z de SP. Entrega, montagem e retirada pela nossa equipe. Peça seu orçamento no WhatsApp."];
    elseif($h=dt_hood_by_page_slug($s)) $m=["Aluguel de Brinquedos em $h | $b","Aluguel de brinquedos em $h, $z de SP: pula-pula, tobogã, cama elástica e mais. Entrega, montagem e retirada. Peça orçamento."];
    else {
      $t=[
        'servicos'=>["Brinquedos para Festa na $z | $b","Veja os brinquedos para alugar na $z: pula-pula, tobogã, futebol de sabão, touro mecânico e mais. Peça orçamento no WhatsApp."],
        'onde-atendemos'=>["Onde Atendemos na $z de SP | $b","Atendemos Santana, Tucuruvi, Casa Verde, Freguesia do Ó e outros bairros da $z de SP. Veja os bairros e peça orçamento."],
        'quem-somos'=>["Quem Somos | $b, $z de SP","Conheça a $b, empresa de aluguel de brinquedos para festas na $z de São Paulo, e a equipe que cuida da sua festa."],
        'contato'=>["Contato e Orçamento | $b $z","Fale com a $b pelo WhatsApp e peça orçamento de aluguel de brinquedos para festas na $z de São Paulo. Atendemos das 9h às 22h."],
      ];
      $m=$t[$s]??null;
    }
  }
  if(!$m) return null;
  return [dt_fit($m[0],60),dt_fit($m[1],155)];
}
add_filter('pre_get_document_title',function($t){$m=dt_meta(); return $m?$m[0]:$t;});
add_action('wp_head',function(){
  $m=dt_meta(); $title=$m?$m[0]:wp_get_document_title();
  if($m) echo '<meta name="description" content="'.esc_attr($m[1]).'">'."\n";
  echo '<meta property="og:title" content="'.esc_attr($title).'"><meta property="og:type" content="website"><meta property="og:locale" content="pt_BR"><meta property="og:site_name" content="'.esc_attr(dt('brand')).'">'."\n";
  if($m) echo '<meta property="og:description" content="'.esc_attr($m[1]).'">'."\n";
  echo '<meta property="og:image" content="'.esc_url(dt_img('og-image.jpg')).'">'."\n";
  if(is_singular()) echo '<meta property="og:url" content="'.esc_url(get_permalink()).'">'."\n";
  if(dt('ga_id')) echo '<script async src="https://www.googletagmanager.com/gtag/js?id='.esc_attr(dt('ga_id')).'"></script><script>window.dataLayer=window.dataLayer||[];function gtag(){dataLayer.push(arguments)}gtag("js",new Date());gtag("config","'.esc_js(dt('ga_id')).'");</script>'."\n";
  dt_schema();
},5);

function dt_ld($a){echo '<script type="application/ld+json">'.wp_json_encode($a,JSON_UNESCAPED_UNICODE|JSON_UNESCAPED_SLASHES).'</script>'."\n";}
function dt_faq_list($p=null){
  return [
    ['Vocês entregam e montam?','Sim. Nossa equipe faz a entrega, a montagem e a retirada no horário combinado, e orienta o uso do brinquedo.'],
    ['Atendem toda a Zona Norte?','Atendemos a Zona Norte de São Paulo. Informe seu bairro no WhatsApp para confirmar a entrega.'],
    ['Como faço a reserva?','Chame no WhatsApp com a data, o endereço e o espaço disponível. Enviamos o orçamento e confirmamos a reserva.'],
    ['Preciso de tomada no local?','A maioria dos infláveis usa um soprador elétrico, então é preciso uma tomada por perto. Confirmamos isso no orçamento, de acordo com o brinquedo escolhido.'],
    ['Posso alugar mais de um brinquedo na mesma festa?','Pode. Montamos a combinação de atrações de acordo com o espaço, a idade das crianças e o número de convidados.'],
    ['Os brinquedos são higienizados?','Sim. Os brinquedos são higienizados e conferidos antes de cada locação.'],
    ['E se chover no dia da festa?','Fale com a gente o quanto antes. Alguns brinquedos não devem ser usados na chuva, e combinamos a melhor solução para a sua data.'],
  ];
}
function dt_schema(){
  if(is_singular('post')){
    $img=has_post_thumbnail()?get_the_post_thumbnail_url(null,'large'):dt_img('logo.png');
    dt_ld(['@context'=>'https://schema.org','@type'=>'Article','headline'=>get_the_title(),'datePublished'=>get_the_date('c'),'dateModified'=>get_the_modified_date('c'),'image'=>$img,'mainEntityOfPage'=>get_permalink(),'author'=>['@type'=>'Organization','name'=>dt('brand')],'publisher'=>['@type'=>'Organization','name'=>dt('brand'),'logo'=>['@type'=>'ImageObject','url'=>dt_img('logo.png')]]]);
    dt_ld(['@context'=>'https://schema.org','@type'=>'BreadcrumbList','itemListElement'=>[['@type'=>'ListItem','position'=>1,'name'=>'Início','item'=>home_url('/')],['@type'=>'ListItem','position'=>2,'name'=>'Blog','item'=>home_url('/blog/')],['@type'=>'ListItem','position'=>3,'name'=>get_the_title(),'item'=>get_permalink()]]]);
    return;
  }
  if(!(is_front_page()||is_page())) return;
  $s=is_page()?get_post_field('post_name',get_queried_object_id()):'';
  $prod=dt_product_by_slug($s); $hood=dt_hood_by_page_slug($s);
  $biz=['@context'=>'https://schema.org','@type'=>'LocalBusiness','@id'=>home_url('/#negocio'),'name'=>dt('brand'),'url'=>home_url('/'),
    'image'=>dt_img('logo.png'),'email'=>dt('email'),
    'address'=>['@type'=>'PostalAddress','streetAddress'=>dt('street'),'postalCode'=>dt('cep'),'addressLocality'=>dt('city'),'addressRegion'=>dt('uf'),'addressCountry'=>'BR'],
    'areaServed'=>['@type'=>'AdministrativeArea','name'=>dt('region').', São Paulo'],
    'openingHoursSpecification'=>[['@type'=>'OpeningHoursSpecification','dayOfWeek'=>['Monday','Tuesday','Wednesday','Thursday','Friday','Saturday','Sunday'],'opens'=>dt('open'),'closes'=>dt('close')]],
  ];
  if(dt_wa_ready()) $biz['telephone']='+'.dt('whatsapp');
  $same=array_values(array_filter([dt('gbp_url'),dt('instagram')])); if($same) $biz['sameAs']=$same;
  if($hood){ $biz['areaServed']=['@type'=>'Place','name'=>$hood.', São Paulo, '.dt('region')]; }
  if(is_front_page()||$s==='contato'||$prod||$hood) dt_ld($biz);
  if(is_front_page()) dt_ld(['@context'=>'https://schema.org','@type'=>'WebSite','name'=>dt('brand'),'url'=>home_url('/'),'inLanguage'=>'pt-BR']);
  if($hood){
    $d=$GLOBALS['dt_hood_data'][$hood]; $faq=[]; foreach(array_merge([$d['q']],array_slice(dt_faq_list(),0,2)) as $f) $faq[]=['@type'=>'Question','name'=>$f[0],'acceptedAnswer'=>['@type'=>'Answer','text'=>$f[1]]];
    dt_ld(['@context'=>'https://schema.org','@type'=>'FAQPage','mainEntity'=>$faq]);
    dt_ld(['@context'=>'https://schema.org','@type'=>'BreadcrumbList','itemListElement'=>[
      ['@type'=>'ListItem','position'=>1,'name'=>'Início','item'=>home_url('/')],
      ['@type'=>'ListItem','position'=>2,'name'=>'Onde atendemos','item'=>home_url('/onde-atendemos/')],
      ['@type'=>'ListItem','position'=>3,'name'=>$hood,'item'=>dt_hood_url($hood)]]]);
  }
  if($prod){
    $faq=[]; foreach(dt_faq_list() as $f) $faq[]=['@type'=>'Question','name'=>$f[0],'acceptedAnswer'=>['@type'=>'Answer','text'=>$f[1]]];
    dt_ld(['@context'=>'https://schema.org','@type'=>'FAQPage','mainEntity'=>$faq]);
    dt_ld(['@context'=>'https://schema.org','@type'=>'BreadcrumbList','itemListElement'=>[
      ['@type'=>'ListItem','position'=>1,'name'=>'Início','item'=>home_url('/')],
      ['@type'=>'ListItem','position'=>2,'name'=>'Serviços','item'=>home_url('/servicos/')],
      ['@type'=>'ListItem','position'=>3,'name'=>$prod['menu'],'item'=>dt_url($prod)]]]);
  }
}

/* ---------- menu fixo (sem configurar nada no painel) ---------- */
function dt_nav(){
  $subs=[['Todos os brinquedos',home_url('/servicos/')]]; foreach(dt_products() as $p) $subs[]=[$p['menu'],dt_url($p)];
  return [['Início',home_url('/')],['Brinquedos',home_url('/servicos/'),$subs],['Onde atendemos',home_url('/onde-atendemos/')],['Blog',home_url('/blog/')],['Quem somos',home_url('/quem-somos/')],['Contato',home_url('/contato/')]];
}


/* ---------- BLOG / ARTIGOS (sem plugins) ---------- */
function dt_post_card(){
  ob_start(); $c=get_the_category(); ?>
<article class="post-card">
  <a class="post-img" href="<?php the_permalink(); ?>"><?php if(has_post_thumbnail()) the_post_thumbnail('dt-card',['loading'=>'lazy','alt'=>dt_alt(get_the_title())]); else echo '<div class="ph"><span>Foto do artigo</span></div>'; ?><time class="post-date" datetime="<?php echo esc_attr(get_the_date('c')); ?>"><?php echo esc_html(date_i18n('j M Y',get_the_time('U'))); ?></time></a>
  <div class="post-b"><?php if($c) echo '<small>'.esc_html($c[0]->name).'</small>'; ?>
    <h3><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h3>
    <p><?php echo esc_html(wp_trim_words(get_the_excerpt(),24,'...')); ?></p>
    <a class="link" href="<?php the_permalink(); ?>">Ler artigo →</a></div>
</article><?php return ob_get_clean();
}
function dt_reading_time(){ $w=str_word_count(wp_strip_all_tags(get_the_content())); return max(1,(int)ceil($w/200)); }
/* sumário automático: dá id aos H2 e monta o índice */
function dt_article_html($html){
  $toc=[]; $html=preg_replace_callback('/<h2([^>]*)>(.*?)<\/h2>/is',function($m) use (&$toc){
    $t=wp_strip_all_tags($m[2]); $id=sanitize_title($t); $toc[]=[$id,$t]; return '<h2'.$m[1].' id="'.esc_attr($id).'">'.$m[2].'</h2>'; },$html);
  $GLOBALS['dt_toc']=$toc; return $html;
}
function dt_toc_html(){
  $t=$GLOBALS['dt_toc']??[]; if(count($t)<3) return '';
  $o='<nav class="toc" aria-label="Neste artigo"><b>Neste artigo</b><ol>'; foreach($t as $i) $o.='<li><a href="#'.esc_attr($i[0]).'">'.esc_html($i[1]).'</a></li>'; return $o.'</ol></nav>';
}
/* atalhos para usar dentro dos artigos, no editor: [dt_cta], [dt_brinquedos] */
add_shortcode('dt_cta',function($a){
  $a=shortcode_atts(['texto'=>'Quer um orçamento para a sua festa na Zona Norte?','botao'=>'Pedir orçamento no WhatsApp'],$a);
  return '<div class="cta-box"><b>'.esc_html($a['texto']).'</b>'.dt_cta_btn($a['botao']).'</div>';
});
add_shortcode('dt_brinquedos',function($a){
  $a=shortcode_atts(['qtd'=>3],$a); $o='<div class="tiles tiles-in">'; foreach(array_slice(dt_products(),0,(int)$a['qtd']) as $i=>$p) $o.=dt_card($p,$i); return $o.'</div>';
});
add_action('pre_get_posts',function($q){ if(!is_admin()&&$q->is_main_query()&&($q->is_home()||$q->is_archive()||$q->is_search())) $q->set('posts_per_page',9); });
