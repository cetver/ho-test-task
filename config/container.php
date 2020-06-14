<?php

use app\controllers\ItemsController;
use app\models\SearchItem;
use yii\db\pgsql\ColumnSchema;
use yii\di\Container;
use yii\web\Request;

return [
    'definitions' => [
        ColumnSchema::class => [
            // использовал устаревшие свойство чтобы показать работу \app\behaviors\JsonBehavior::decodeAttribute
            // иначе он его сам конвертирует
            // https://github.com/yiisoft/yii2/blob/2.0.35/framework/db/pgsql/ColumnSchema.php#L136
            'disableJsonSupport' => true
        ]
    ],
    'singletons' => [
        ItemsController::class => function (Container $container, $params, $config) {
            /** @var Request $request */
            $request = $container->get(Request::class);
            /** @var SearchItem $searchItem */
            $searchItem = $container->get(SearchItem::class);

            return new ItemsController($params[0], $params[1], $request, $searchItem, $config);
        },
    ],
];