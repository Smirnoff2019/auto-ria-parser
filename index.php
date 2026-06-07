<?php

require __DIR__ . '/vendor/autoload.php';

use App\{
    AutoRiaClient,
    FilterEngine,
    Exporter,
    Parser,
    Storage,
    Logger
};

$config = require __DIR__ . '/config/app.php';
$brands = require __DIR__ . '/brands_with_id.php';

$logger = new Logger();
$storage = new Storage();
$client = new AutoRiaClient($config);
$filter = new FilterEngine($brands);

$parser = new Parser($client, $filter, $storage, $logger, $brands);

$tz = new DateTimeZone('Europe/Kiev');
$from = new DateTime('-1 day', $tz);
$to   = new DateTime('now', $tz);

$logger->info("Parser started", [
    'from' => $from->format('Y-m-d H:i:s'),//H:i:s
    'to'   => $to->format('Y-m-d H:i:s')//H:i:s
]);

$data = $parser->run($from, $to);

$filename = 'storage/exports/Оголошення '
    . $from->format('Y-m-d')
    . ' - '
    . $to->format('Y-m-d')
    . '.xlsx';

(new Exporter($logger))->export($data, $filename);

$logger->info("Parser finished", ['count'=>count($data)]);
