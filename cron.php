<?php

require __DIR__ . '/vendor/autoload.php';
require_once __DIR__ . '/database.php';
require_once __DIR__ . '/mailer.php';
require_once __DIR__ . '/content.php';

$dom = new DOMDocument();

$oldContent = Content::getOldContent();
$newContent = Content::getNewContent();

similar_text($oldContent, $newContent, $percent);

$query = Database::getInstance()->prepare('INSERT INTO contents SET text = ?');
$query->execute([$newContent]);

if ($percent < 90) {
    Mailer::send($percent,false);
}