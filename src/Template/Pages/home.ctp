<?php
/**
 * CakePHP(tm) : Rapid Development Framework (https://cakephp.org)
 * Copyright (c) Cake Software Foundation, Inc. (https://cakefoundation.org)
 *
 * Licensed under The MIT License
 * For full copyright and license information, please see the LICENSE.txt
 * Redistributions of files must retain the above copyright notice.
 *
 * @copyright     Copyright (c) Cake Software Foundation, Inc. (https://cakefoundation.org)
 * @link          https://cakephp.org CakePHP(tm) Project
 * @since         0.10.0
 * @license       https://opensource.org/licenses/mit-license.php MIT License
 */

use Cake\Cache\Cache;
use Cake\Core\Configure;
use Cake\Core\Plugin;
use Cake\Datasource\ConnectionManager;
use Cake\Error\Debugger;
use Cake\Network\Exception\NotFoundException;

$this->layout = false;

if (!Configure::read('debug')) :
    throw new NotFoundException(
        'Please replace src/Template/Pages/home.ctp with your own version or re-enable debug mode.'
    );
endif;

$cakeDescription = 'CakePHP: the rapid development PHP framework';
?>
<!DOCTYPE html>
<html>
<head>
    <?= $this->Html->charset() ?>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>
        <?= $cakeDescription ?>
    </title>

    <?= $this->Html->meta('icon') ?>
    <!--    < ?= $this->Html->css('base.css') ?>-->
    <!--    < ?= $this->Html->css('cake.css') ?>-->
    <!--    < ?= $this->Html->css('home.css') ?>-->
    <?= $this->Html->css('bootstrap.css') ?>
    <?= $this->Html->css('customised.css') ?>
    <link href="https://fonts.googleapis.com/css?family=Raleway:500i|Roboto:300,400,700|Roboto+Mono" rel="stylesheet">
</head>
<body class="home container">

<header class="row">
    <div class="header- text-center">
        <h1>Hello, Michael</h1>
    </div>
</header>

<hr class="white">

<div class="row">
    <h2>Weather</h2>
</div>

<div class="row">
    <h2>News</h2>
</div>

<div class="row">
    <h2>Date & Time</h2>
</div>

<div class="row">
    <h2>Social Media</h2>
</div>

<div class="row">
    <h2>Memes</h2>
</div>

<div class="row">
    <h2>Cryptocurrencies</h2>
</div>

</body>
</html>
