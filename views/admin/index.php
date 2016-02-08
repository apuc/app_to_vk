<?php
use widgets\MainAdminMenu;
use widgets\MainMenu;

echo MainMenu::run(['user' => $user]);

echo MainAdminMenu::run();


