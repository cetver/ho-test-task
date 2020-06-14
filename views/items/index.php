<?php

use app\grid\DataColumn\ItemDataAttributeDataColumn;
use yii\helpers\Html;
use yii\grid\GridView;
use yii\widgets\Pjax;

/* @var $this yii\web\View */
/* @var $searchModel app\models\SearchItem */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = Yii::t('app', 'Items');
?>
<div class="item-index">
    <h1><?= Html::encode($this->title) ?></h1>
    <?php
    Pjax::begin();
    echo $this->render('_search', ['model' => $searchModel]);
    echo GridView::widget(
        [
            'dataProvider' => $dataProvider,
            'columns' => [
                'id',
                [
                    'class' => ItemDataAttributeDataColumn::class,
                    'attribute' => 'data',
                    'label' => $searchModel->getAttributeLabel('data'),
                ],

            ],
        ]
    );
    Pjax::end();
    ?>
</div>
