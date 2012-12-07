# Installing #
For install you must downlaod `cache.class.php` and include it to your project


# Usage #
You can specify a script directly inside the cache configuration.  
  
```php
require_once('cache.class.php');

$cache = new MicroCache('cache key');

if($cache->check())
  die($cache->out());
else
  $cache->start();

// your code here

$cache->end();
```

## Parameters ##
* cache_on - Enable/disable caching
* lifetime - The lifetime of the cache
* c_type - Cache type (`memcache` or `file`)
* patch - Path of cache directory (if memcached and/or memcache not available)

## Features ##
* If memcached and/or memcache is not available(error when connecting or something else), script change cache mode to 'filecache'. This provides stable cache system.
* Script using buffering output(ob_start(), ob_get_contents(), etc...).
* Some parameters only work if they are assigned before function check().
