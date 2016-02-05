<div class="reg-photo">
    <div class="reg-photo-box">
        <img src="<?= $post['photo'] ?>" alt="">
    </div>
</div>
<div class="reg-msg">
    Здравствуйте <b><?=$post['name']?></b>, Вы хотите зарегистрироваться как:
</div>
<div class="btn-box">
    <a href="/vk2/auth/reg/?status=0" class="btn btn-success fz-35">Клиент</a>
    <a href="/vk2/auth/reg/?status=1" class="btn btn-success fz-35">Мастер</a>
</div>