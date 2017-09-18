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
    <?= $this->Html->script('http://code.jquery.com/jquery.min.js'); ?>

    <link href="https://fonts.googleapis.com/css?family=Raleway:500i|Roboto:300,400,700|Roboto+Mono" rel="stylesheet">
    <script src="webroot/js/jquery.simpleWeather.js" rel="script"></script>
</head>
<body class="home container">

<header class="row ">
    <div class="header- text-center">
        <h6><a href="http://www.mewc.info">Welcome to mirrorplus</a></h6>
    </div>
</header>

<div class="col-md-6 col-xs-12">
<!--https://time.is/widgets/East_Malvern-->
    <a href="https://time.is/Melbourne" id="time_is_link" rel="nofollow" style="font-size:36px"></a>
    <a href="https://time.is/Glen_iris" id="time_is_link" rel="nofollow" style="font-size:36px"></a>
        <h1><span id="Melbourne_z609" ></span></h1>
</div>
<hr class="white">
    <div class="col-md-12 col-xs-12 text-center">
        <h2><span id="Glen_iris_z609"></span></h2>
            <br/>
    </div>
<hr class="white">


<div class="row">

    <div class="col-md-6 col-xs-12">
        <div id="weather"></div>
        <script>
            $(document).ready(function() {
                $.simpleWeather({
                    location: 'Melbourne, Australia',
                    woeid: '',
                    unit: 'c',
                    success: function(weather) {
                        html = '<h1><i class="icon-'+weather.code+'"></i> '+weather.temp+'&deg;'+weather.units.temp+'</h1>';
                        html += '<h3>Max:'+weather.high+' Min: '+weather.low+'</h3>';
                        html += '<h4 class="currently">'+weather.currently+', Humidity: ' +weather.humidity+'%</h4>';

                        $("#weather").html(html);
                    },
                    error: function(error) {
                        $("#weather").html('<p>'+error+'</p>');
                    }
                });
            });
        </script>
    </div>

    <div class="col-md-6 col-xs-12">
        <?php
        $rss = new DOMDocument();
        $rss->load('http://www.abc.net.au/news/feed/45910/rss.xml');
        $feed = array();
        foreach ($rss->getElementsByTagName('item') as $node) {
            $item = array (
                'title' => $node->getElementsByTagName('title')->item(0)->nodeValue,
                'desc' => $node->getElementsByTagName('description')->item(0)->nodeValue,
                'link' => $node->getElementsByTagName('link')->item(0)->nodeValue,
                'date' => $node->getElementsByTagName('pubDate')->item(0)->nodeValue,
            );
            array_push($feed, $item);
        }
        $limit = 7;
        for($x=0;$x<$limit;$x++) {
            $title = str_replace(' & ', ' &amp; ', $feed[$x]['title']);
            $link = $feed[$x]['link'];
            $description = $feed[$x]['desc'];
            $date = date('l F d, Y', strtotime($feed[$x]['date']));
            echo '<h4><strong><a href="'.$link.'" title="'.$title.'">'.$title.'</a></strong></h4><br/>';
            '<p>'.$description. ':-' . $date . '</p>';
        }

        ?>
    </div>
    <div class="col-md-6 col-xs-12">
        <h2>Memes</h2>
    </div>
    <div class="col-md-6 col-xs-12">
        <h2>Cryptocurrencies</h2>
    </div>

</div>

<script src="//widget.time.is/en.js"></script>
<script>
    time_is_widget.init({
        Melbourne_z609:{},
        Glen_iris_z609 : {
            template: "DATE",
            sun_format: "srhour:srminute",
            date_format:"dayname, monthname dnum, year",
            coords: "40.71427,-74.00597"
        }

    });
    var feed = "https://www.reddit.com/r/funny/.rss";
    JSON.parse(feed);
</script>

</body>
</html>
