<img src="assets/img/illustration/Departing-bro.svg" alt="">
<h4 class="t-bold c-white"><?= $settings->dayTime() ?></h4>
<h2 class="t-bold c-white">Kaydol ve hayallerine kanat aç<span class="c-red">!</span></h2>
<small>Welcome, sky enthusiasts!<br>Turkish Airlines and AI, rising together to the heavens.</small>
<a href="#" id="get-started" onclick="getStarted()">BAŞLAYALIM</a>
<form id="frm">
    <div class="form-group">
        <input type="text" placeholder="Ad Soyad" name="name" required>
    </div>
    <div class="form-group">
        <input type="text" placeholder="E-posta" name="mail" required>
    </div>
    <div class="form-group">
        <input type="password" placeholder="Şifre" name="password" required>
    </div>
    <div class="form-group">
        <button type="button" id="btn" onclick="send('btn', 'frm', 'signup')">Kayıt Ol</button>
    </div>
    <p>Hesabınız var mı? <a href="<?= $settings::$base . "auth/signin" ?>">Giriş Yap</a></p>
</form>