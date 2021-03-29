<?php

require __DIR__ . '/vendor/autoload.php';
require_once __DIR__ . '/database.php';

class Content {
    public static function getOldContent() {
        $query = Database::getInstance()->query('SELECT text from contents ORDER BY id DESC LIMIT 1');
        $oldContentData = $query->fetch();
        return self::getStripped($oldContentData ? $oldContentData['text'] : '');
    }

    public static function getNewContent() {
        $html = file_get_contents('https://www.tehnomanija.rs/it-shop/konzole/ps5-sony-825-gb.html');
        $crawler = new \Symfony\Component\DomCrawler\Crawler($html);
        return self::getStripped($crawler->filter('.product-details')->text());
    }

    public static function getStripped($content)
    {
        $dom = new DOMDocument();
        $dom->preserveWhiteSpace = false;
        $dom->loadHTML($content,LIBXML_HTML_NOIMPLIED);
        $dom->formatOutput = true;

        return $dom->documentElement->textContent;
    }
}