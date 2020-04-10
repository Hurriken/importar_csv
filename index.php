<?php

use League\Csv\Reader;
use League\Csv\Statement;
use Source\Models\NicePincisco;

require __DIR__ . "/vendor/autoload.php";


$nicepincisco = new NicePincisco();

$stream = fopen(__DIR__."/storage/consolidado.csv", "r");
$csv = Reader::createFromStream($stream);

$csv->setDelimiter(",");
$csv->setHeaderOffset(0);

$stmt = (new Statement());

$nicepincisco = $stmt->process($csv);

foreach ($nicepincisco as $nice){
    var_dump($nice);
}
