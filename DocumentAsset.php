<?php

namespace sereja3578\documents;

use yii\web\View;
use kartik\base\AssetBundle;

class DocumentAsset extends AssetBundle
{
    public $publishOptions = [
        'forceCopy' => false
    ];

    /**
     * @inheritdoc
     */
    public $jsOptions = ['position' => View::POS_END];

    /**
     * @inheritdoc
     */
    public $depends = [
        'yii\web\YiiAsset',
    ];

    /**
     * @inheritdoc
     */
    public function init()
    {
        $this->setSourcePath(__DIR__ . '/assets');
        $this->setupAssets('js', ['js/document']);
        $this->setupAssets('css', ['css/document']);
        parent::init();
    }
}
