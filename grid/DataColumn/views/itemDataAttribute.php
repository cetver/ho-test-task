<?php

/**
 * @var $this \yii\web\View
 * @var array $data
 * @var \yii\i18n\Formatter $formatter
 * @var string $key
 * @var int $index
 */


?>

<dl class="dl-horizontal">
    <?php foreach ($data as $key => $value): ?>
        <dt><?= $formatter->format($key, 'text') ?></dt>
        <dd><?= $formatter->format($value, 'text') ?></dd>
    <?php endforeach; ?>
</dl>
