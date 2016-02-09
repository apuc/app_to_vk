<?php if(empty($result)):?>
    <h2>Поиск не дал результатов.</h2>
<?php else: ?>
    <?php foreach($result as $res): ?>
        <div class="result-item">
            <div class="result-item-photo"><a href="/vk2/profile/view_master/?id=<?= $res['id'] ?>"><img src="<?=$res['photo']?>" alt="<?=$res['name']?>"></a></div>
            <div class="result-item-name"><?=$res['name'] . " " . $res['last_name']?></div>
        </div>
    <?php endforeach; ?>
<?php endif; ?>