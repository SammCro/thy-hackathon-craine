<div class="upload-photo">
    <form id="frm" enctype="multipart/form-data">
        <label for="uploadImg">
            <img src="assets/img/illustration/photo.png" alt="">
            <div>
                <strong>Görseli seçin veya sürükleyin</strong><br>
                <small>Fotoğrafınızda referans objesini kullanmanızı rica ediyoruz</small>
            </div>
        </label>
        <input type="file" id="uploadImg" name="image" accept="image/*">
    </form>
    <div class="photo-area">
        <ul>
            <li><img src="assets/img/deneme2.jpg" alt=""></li>
            <li><img src="assets/img/IMG-0278.jpg" alt=""></li>
        </ul>
    </div>
    <div class="main-btn">
        <button id="btn" type="button" onclick="send('btn','frm','upload')">Gönder</button>
    </div>
</div>