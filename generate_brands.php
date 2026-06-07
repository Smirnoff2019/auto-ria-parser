<?php

require 'vendor/autoload.php';

$config = require __DIR__ . '/config/app.php';
$brands = require __DIR__ . '/config/brands.php';

$apiKey = $config['api_key'];

function api($url)
{
    $json = file_get_contents($url);

    if (!$json) {
        echo "❌ API error: $url\n";
        return [];
    }

    return json_decode($json, true);
}

function findByName(array $items, string $name)
{
    foreach ($items as $item) {
        if (mb_strtolower($item['name']) === mb_strtolower($name)) {
            return $item;
        }
    }
    return null;
}

$result = [];

foreach ($brands as $brandName => $brandData) {

    echo "Processing brand: $brandName\n";

    // 1️⃣ Отримуємо всі марки
    $marks = api("https://developers.ria.com/auto/categories/1/marks?api_key=$apiKey");

    $mark = findByName($marks, $brandName);

    if (!$mark) {
        echo "❌ Brand not found: $brandName\n";
        continue;
    }

    $markId = $mark['value'];

    // 2️⃣ Отримуємо моделі марки
    $models = api("https://developers.ria.com/auto/categories/1/marks/$markId/models?api_key=$apiKey");

    $newModels = [];

    foreach ($brandData['models'] as $modelName => $modelRules) {

        if ($modelName === '*') {
            $newModels['*'] = $modelRules;
            continue;
        }

        $model = findByName($models, $modelName);

        if (!$model) {
            echo "❌ Model not found: $brandName $modelName\n";
            continue;
        }

        $newModels[$modelName] = array_merge(
            ['id' => $model['value']],
            $modelRules
        );
    }

    $result[$brandName] = $brandData;
    $result[$brandName]['id'] = $markId;
    $result[$brandName]['models'] = $newModels;
}

file_put_contents(
    'brands_with_id.php',
    '<?php return ' . var_export($result, true) . ';'
);

echo "✅ Done. File created: brands_with_id.php\n";
