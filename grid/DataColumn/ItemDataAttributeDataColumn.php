<?php declare(strict_types=1);

namespace app\grid\DataColumn;

use yii\grid\DataColumn;

/**
 * The "ItemDataAttributeDataColumn" class
 */
class ItemDataAttributeDataColumn extends DataColumn
{
    protected function renderDataCellContent($model, $key, $index)
    {
        /** @var \app\models\SearchItem $model */
        $data = $model->data;
        ksort($data);
        $formatter = $this->grid->formatter;

        return $this->grid->view->render(
            '@app/grid/DataColumn/views/itemDataAttribute',
            compact('data', 'formatter', 'key', 'index')
        );
    }
}