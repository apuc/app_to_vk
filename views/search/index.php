<?php
use lib\helpers\ArrayHelper;
use lib\helpers\Forms;
use widgets\MainMenu;

echo MainMenu::run();
?>
<div class="search">
    <div class="filter">
        <?= Forms::dropDownList('region',0, ArrayHelper::map($region, 'id', 'name'), [
            'class' => 'regionSearch form-control',
            'prompt' => 'Регион'
        ])?>
        <span class="search-city"></span>
        <span class="search-service"></span>
    </div>
</div>