<img src="assets/img/illustration/Departing-bro.svg" alt="">
<h4 class="t-bold c-white"><?= $settings->dayTime() ?></h4>
<h2 class="t-bold c-white">Hesabınıza giriş yapınız<span class="c-red">.</span></h2>
<small>Welcome, sky enthusiasts!<br>Turkish Airlines and AI, rising together to the heavens.</small>
<a href="#" id="get-started" onclick="getStarted()">BAŞLAYALIM</a>
<form id="frm">
    <div class="form-group">
        <input type="text" placeholder="E-posta" name="mail" required>
    </div>
    <div class="form-group pwd">
        <a href="auth/forgot-password">Şifrenizi mi unuttunuz<span class="c-red">?</span></a>
        <input type="password" placeholder="Şifre" name="password" required>
    </div>
    <div class="form-group">
        <button type="button" id="btn" onclick="send('btn', 'frm', 'signin')">Giriş Yap</button>
    </div>
    <p>Hesabınız yok mu? <a href="<?= $settings::$base . "auth/signup" ?>">Kayıt Ol</a></p>
</form>