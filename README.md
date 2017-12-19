Tumb Generator
============================

This package was made for me, but if you find this useful, you can use it.
It helping me to generate thumbs (img preview) from jpg

NOTE: Why i call it's Tumb? Just becase i want. My code - my names.

INSTALLATION
------------

### Install via Composer

Add this in composer.json

~~~
"swods/tumbgenerator": "*"
~~~

HOW TO USE
------------

`img_path` - Path to origin file. Required!  
`tumb_dir` - Dir with path where preview will located, don't use slash at the end! Default is `tumb`  
`tumb_name` - Name of the preview file, don't forget extension! Default is `tumb.jpg`  
`tumb_width` - Set width size of preview, default is `150`  


```php
return Tumb::generate([
	'img_path' => 'img.jpeg',
	// 'tumb_dir' => 'tumb',
	// 'tumb_name' => sprintf('%s.jpg', time()),
	// 'tumb_width' => 50,
]);
```

