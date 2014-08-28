<?php
$phar = new Phar('album.phar');
$phar->startBuffering();

$phar->setStub("<? php Phar::mapphar();
		 include 'phar://album.phar/Module.php';
		 __HALT_COMPILER(); ?>");

$phar->buildFromDirectory('./module/Album');

$phar->stopBuffering();

echo "completed";