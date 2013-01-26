<?php

// Register mogreet in the IoC container
IoC::singleton('mogreet', function()
{
	require_once Bundle::path('mogreet').'src'.DS.'Mercury.class.php';
	require_once Bundle::path('mogreet').'src'.DS.'Response.class.php';

	$config = Config::get('mogreet::mogreet', array());

	$mogreet = new \Mogreet\Mercury($config['client_id'], $config['token']);

	return $mogreet;
});
