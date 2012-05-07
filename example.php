<?php

/* ===================================
 * Author: Nazarkin Roman
 * -----------------------------------
 * Contacts:
 * email - roman@nazarkin.su
 * icq - 642971062
 * skype - roman444ik
 * -----------------------------------
 * GitHub:
 * https://github.com/NazarkinRoman
 * ===================================
*/

require_once(ROOT_DIR.'/system/classes/cache.class.php');

$cache = new MicroCache($_SERVER["REQUEST_URI"]);

if(@$_GET['act'] == 'page_without_caching')
  $cache->cache_on = false; // disable cache

else if(@$_GET['act'] == 'page_with_1minute_cache')
  $cache->lifetime = 60; // set the cache lifetime to 60 seconds

if($cache->check()) die($cache->out());
else $cache->start();

// your code here

$cache->end();
?>