<?php
use widgets\MainMenu;
?>
<!--<div class="header-menu">
    <div class="ava-name">
        <div class="ava-name-img">
            <img src="<?/*= $user->photo */?>" alt="">
        </div>
        <a href="#"><?/*= $user->name */?></a>
    </div>
    <nav class="main-menu">
        <ul>
            <li><a href="#">Записи</a></li>
            <li><a href="#">Настройки </a></li>
            <li><a href="#">Поиск</a></li>
        </ul>
    </nav>
</div>-->
<?= MainMenu::run(['user' => $user]) ?>
<div class="content">
    <?php
    if ($user->status == '1'):
        $app->parser->renderCode('client',[],true);
        ?>

        <?php
    else:
        $app->parser->renderCode('client',[],true);
        ?>

        <?php
    endif;
    ?>

</div>