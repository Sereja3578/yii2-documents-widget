# yii2-documents-widget

Для установки добавить в composer.json 

"sereja3578/yii2-documents-widget": "dev-master"

Для базового использования нужно добавить в view

	<?= DocumentWidget::widget([
            'documentGridId' => '#document-grid-container',
            'urlForAjax' => Url::toRoute('/user/user-document/get-document-url'),
            'title' => Yii::t('documents', 'Скан документа'),
            'options' => [
                'imageContainer' => '.document-image-div',
                'documentImage' => [
                    'class' => 'magnific-image'
                ]
            ]
        ]); ?>

Метод для получения пути к файлу может выглядеть например так:

    /**
     * Метод для ajax запроса в виджете
     *
     * @param $id
     * @throws NotFoundHttpException
     * @return string
     */
    public function actionGetDocumentUrl(int $id) : string
    {
        $model = $this->findModel($id);
        $file = $model->getFile()->one();

        Yii::$app->response->format = Response::FORMAT_JSON;

        return $file ? ['url' => $file->getUrl()] : ['error' => Yii::t('user', 'Нет файла')];
    }

То есть у user, есть связанная с ним таблица файлов, откуда можно получить url для файла.
