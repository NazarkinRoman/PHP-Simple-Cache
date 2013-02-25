# Installing Memcached Server and access it with PHP
Thinking of implementing caching for your php application , Just in 6 simple (copy and paste) steps you can install and access Memcached Server.

1. **Install libevent ,libmemcached and libmemcached devel (dependency)**  

	```console
	yum install libevent
	yum install libmemcached libmemcached-devel
	```

2. **Install Memcached Server**

	```console
	yum install memcached
	```

3. **Start Memcached server**

	```console
	memcached -d -m 512 -l 127.0.0.1 -p 11211 -u nobody
	```
(d = daemon, m = memory, u = user, l = IP to listen to, p = port)

4. **Check your memcached server is running successfully**

	```console
	ps -eaf | grep memcached
	```

4. **Connect Memcached server via telnet**

	```console
	telnet 127.0.0.1 11211
	stats
	quit
	```

5. **Install PHP client to access Memcached Server**

	```console
	pecl install memcache
	```

6. **Restart your apache server**

	```console
	service httpd restart
	```

# Usage
Downlaod `cache.class.php` and include it to your project  
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

## Parameters
* cache_on - Enable/disable caching
* lifetime - The lifetime of the cache
* c_type - Cache type (`memcache` or `file`)
* patch - Path of cache directory (if memcached and/or memcache not available)


## Features
* If memcached and/or memcache is not available(error when connecting or something else), script change cache mode to 'filecache'. This provides stable cache system.
* Script using buffering output(ob_start(), ob_get_contents(), etc...).
* Some parameters only work if they are assigned before function check().
* Clear current or some cache by function clear().

## Contributing

Anyone and everyone is welcome to
[contribute](/blob/master/CONTRIBUTING.md).
