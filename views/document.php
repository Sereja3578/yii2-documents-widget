<?php
use porcelanosa\magnificPopup\MagnificPopup;

/* @var string $title */
/* @var string $imageContainer */
?>

<?php MagnificPopup::widget(
    [
        'target' => $imageContainer,
        'options' => [
            'delegate'=> 'a',
        ]
    ]); ?>

<h3><?= $title; ?></h3>
<div class="document">
    <div class="<?= str_replace(['.', '#'], '', $imageContainer) ?>"></div>
</div>