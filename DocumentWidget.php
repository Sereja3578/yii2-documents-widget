<?php

namespace sereja3578\documents;

use yii\web\View;
use yii\base\Widget;

/**
 * Class DocumentWidget
 * @package backend\widgets\documents
 */
class DocumentWidget extends Widget
{
    /**
     * @var string
     */
    public $documentGridId;
    /**
     * @var string
     */
    public $urlForAjax;
    /**
     * @var string
     */
    public $title;
    /**
     * @var array
     */
    public $options;

    /**
     * @return string
     */
    public function run()
    {
        parent::run();
        $this->registerAssets();

        return $this->render('views/document.php', [
            'title' => $this->title,
            'imageContainer' => $this->options['imageContainer']
        ]);
    }

    /**
     * @return void
     */
    public function registerAssets()
    {
        $view = $this->getView();

        DocumentAsset::register($view);

        $documentGridId = $this->documentGridId;
        $urlForAjax = $this->urlForAjax;
        $options = \GuzzleHttp\json_encode($this->options);

        $js = <<<JS
                var documentWidget = new DocumentWidget(
                   "$documentGridId",
                   "$urlForAjax",
                   $options,
                );
        
                documentWidget.init();
JS;
        $view->registerJs($js, View::POS_END);
    }
}