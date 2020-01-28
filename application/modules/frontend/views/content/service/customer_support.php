<style media="screen">
  .maps{
    margin-top: 30px;
  }

  .contact {
    margin: 20px auto;
    text-align: center;
    width: 80%;
  }

  .contact a{
    display: block;
  }

</style>
<div class="content-wrapper">
  <h6 class="p-2 mt-3 text-center">Layanan kami buka pada saat jam kerja (senin-jumat mulai pukul 10.00 wita s/d 18.00 wita)</h6>
  <div class="contact">
    <a href="https://wa.me/<?=setting_system("NOWA")?>" target="_blank" class="btn btn-success btn-block">Whatsapp</a>
    <a href="tel:<?=setting_system("NOHP")?>" target="_blank" class="btn btn-primary btn-block">Telepon</a>
    <a href="mailto:<?=setting_system("CS")?>" class="btn btn-danger btn-block"><?=setting_system("CS")?></a>
  </div>

  <p class="text-center p-2"><?=setting_system("alamat")?></p>


  <div class="maps">
    <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3973.593929380395!2d119.46119481730805!3d-5.168833600413243!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2dbee3c29dfb83dd%3A0x5d4a490d6e5a1aa4!2sKoperasi%20Simpan%20Pinjam%20Lentera%20Digital%20Indonesia!5e0!3m2!1sen!2sid!4v1580197674475!5m2!1sen!2sid" width="100%" height="250" frameborder="0" style="border:0;" allowfullscreen=""></iframe>
  </div>
</div>
