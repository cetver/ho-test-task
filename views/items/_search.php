<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\SearchItem */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="item-search">
    <?php
    $form = ActiveForm::begin(
        [
            'action'  => ['items/index'],
            'method'  => 'get',
            'options' => [
                'data-pjax' => 1,
            ],
        ]
    );
    echo $form->field($model, 'name');
    echo $form->field($model, 'color');
    ?>

    <div class="form-group">
        <?php
        echo Html::submitButton(Yii::t('app', 'Search'), ['class' => 'btn btn-primary']);
        echo Html::resetButton(Yii::t('app', 'Reset'), ['class' => 'btn btn-outline-secondary'])
        ?>
    </div>

    <?php ActiveForm::end(); ?>
</div>
