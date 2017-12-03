<?php

include('../Tumb.php');

use swods\tumbgenerator\Tumb;

return Tumb::generate([
	'img_path' => 'img.jpeg',
	// 'tumb_dir' => 'tumb',
	// 'tumb_name' => sprintf('%s.jpg', time()),
	// 'tumb_width' => 2000,
]);
