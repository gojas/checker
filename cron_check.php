<?php

require __DIR__ . '/vendor/autoload.php';
require_once __DIR__ . '/database.php';
require_once __DIR__ . '/mailer.php';
require_once __DIR__ . '/content.php';

Mailer::send('', true);