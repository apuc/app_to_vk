<div class="header-menu">
    <div class="ava-name">
        <div class="ava-name-img">
            <img src="<?= $user->photo ?>" alt="">
        </div>
        <a href="/vk2/profile/my"><?= $user->name ?></a>

    </div>
    <nav class="main-menu">
        <ul>
            <?php if($user->status == 3): ?>
            <li><a href="/vk2/admin/index">Админпанель</a></li>
            <?php endif; ?>
            <li><a href="/vk2/office/my">Кабинет</a></li>
            <li><a href="#">Записи</a></li>
            <li><a href="#">Настройки </a></li>
            <?php if($user->status != 2): ?>
            <li><a href="#">Поиск</a></li>
            <?php endif; ?>
        </ul>
    </nav>
</div>