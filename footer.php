</main>
<footer class="footer"><div class="wrap foot-grid">
  <div><a class="img-link" href="<?php echo esc_url(home_url('/')); ?>" title="<?php echo esc_attr(dt('brand').' - Início'); ?>"><img class="foot-logo" src="<?php echo esc_url(dt_img('logo-h-sm.webp')); ?>" width="420" height="125" loading="lazy" alt="<?php echo esc_attr(dt_alt()); ?>"></a>
    <p>Aluguel de brinquedos para festas infantis e eventos na <?php echo esc_html(dt('region')); ?> de São Paulo.</p></div>
  <div><p class="fh">Brinquedos</p><?php foreach(dt_products() as $p): ?><a href="<?php echo esc_url(dt_url($p)); ?>"><?php echo esc_html($p['menu']); ?></a><?php endforeach; ?></div>
  <div><p class="fh">Onde atendemos</p><?php foreach(dt_hoods() as $h): ?><a href="<?php echo esc_url(dt_hood_url($h)); ?>"><?php echo esc_html($h); ?></a><?php endforeach; ?>
    <a class="more" href="<?php echo esc_url(home_url('/onde-atendemos/')); ?>">Ver todos os bairros →</a></div>
  <div><p class="fh">Contato</p>
    <a href="<?php echo esc_url(dt_wa('Olá! Gostaria de um orçamento.')); ?>" target="_blank" rel="noopener">WhatsApp <?php echo esc_html(dt('whatsapp_fmt')); ?></a>
    <a href="mailto:<?php echo esc_attr(dt('email')); ?>"><?php echo esc_html(dt('email')); ?></a>
    <p><?php echo esc_html(dt('street').', '.dt('cep').', '.dt('city').' - '.dt('uf')); ?></p>
    <p><?php echo esc_html(dt('hours_text')); ?></p></div>
</div><div class="wrap copy">&copy; <?php echo esc_html(date('Y').' '.dt('brand')); ?>. Todos os direitos reservados.</div></footer>
<a class="wa-float" href="<?php echo esc_url(dt_wa('Olá! Quero um orçamento de aluguel de brinquedos na Zona Norte.')); ?>" target="_blank" rel="noopener" aria-label="Chamar no WhatsApp" style="line-height:1.2;text-align:center"><b>Chamar no WhatsApp</b><small style="display:block;font-size:11px;font-weight:600">Respondemos em até 8 horas.</small></a>
<?php wp_footer(); ?>
</body>
</html>
