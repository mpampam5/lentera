<div class="content-wrapper" style="margin-bottom:55px;">
  <div class="mt-3 support">
    <h5 class="mt-5 text-center">Support</h5>

    <div class="p-3">
      <p>Percakapan lansung melalui TIM kami melalui chat Whatsapp.</p>
      <ul>
        <li><i class="ti-check"></i> Riwayat percakapan tersimpan</li>
        <li><i class="ti-check"></i> Menunggu antrian untuk di layani TIM</li>
        <li><i class="ti-check"></i> 5 hari kerja. Di saat jam kerja</li>
      </ul>

      <div class="text-center">
        <a href="https://wa.me/62<?=setting_system("telepon")?>" target="_blank" class="btn btn-md btn-block btn-success"><i class="ti-comments"></i> Chat Whatsapp</a>
      </div>

      <div class="text-center mt-4">
        <a href="mailto:<?=setting_system("email")?>" class="btn btn-md btn-block btn-danger"><i class="ti-email"></i> <?=setting_system("email")?></a>
      </div>

      <div class="text-center mt-4">
        <a href="tel:<?=setting_system("telepon_kantor")?>" class="btn btn-md btn-block btn-secondary text-white"><i class="ti-mobile"></i> Telepon Kantor : <?=setting_system("telepon_kantor")?></a>
      </div>

      <hr>
      Temukan Kami Di :
      <?php if (setting_system("link_website")!=""): ?>
      <div class="text-center mt-4">
        <a href="https://<?=setting_system("link_website")?>" target="_blank" class="btn btn-md btn-block btn-dark"><i class="ti-world text-white"></i> <?=setting_system("link_website")?></a>
      </div>
      <?php endif; ?>

      <?php if (setting_system("facebook")!=""): ?>
      <div class="text-center mt-4">
        <a href="<?=setting_system("facebook")?>" target="_blank" class="btn btn-md btn-block btn-primary"><i class="ti-facebook text-white"></i> Group Facebook</a>
      </div>
      <?php endif; ?>

      <?php if (setting_system("instagram")!=""): ?>
      <div class="text-center mt-4">
        <a href="<?=setting_system("instagram")?>" target="_blank" class="btn btn-md btn-block btn-instagram text-white"><i class="ti-instagram text-white"></i> Instagram</a>
      </div>
      <?php endif; ?>


      <?php if (setting_system("twitter")!=""): ?>
      <div class="text-center mt-4">
        <a href="<?=setting_system("twitter")?>" target="_blank" class="btn btn-md btn-block btn-info text-white"><i class="ti-twitter text-white"></i> Twitter</a>
      </div>
      <?php endif; ?>







    </div>
  </div>
</div>
