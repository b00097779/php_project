<?php

require_once __DIR__ . '/../vendor/autoload.php';

use Itb\ShopRepository;

$shopRepository = new ShopRepository();

$shopRepository->dropTable();
$shopRepository->createTable();

$shopRepository->insert('item1', 3.99);
$shopRepository->insert('item2', 3.1);
$shopRepository->insert('item3', 2.99);
$shopRepository->insert('item4', 5.55);
$shopRepository->insert('item5', 5.55);
$shopRepository->insert('item6', 3.55);

use Itb\UsersRepository;

$usersRepository = new UsersRepository();

$usersRepository->dropTable();
$usersRepository->createTable();

$usersRepository->insert('admin', 'admin', 'admin@admin.ie');
$usersRepository->insert('staff', 'staff', 'staff@staff.ie');