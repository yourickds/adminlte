<?php

namespace yourickds\adminlte\controllers;

use Yii;
use yii\filters\AccessControl;
use yourickds\adminlte\models\Page;
use yii\data\ActiveDataProvider;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yourickds\adminlte\models\PageParams;
use yourickds\adminlte\models\PageValues;

/**
 * PageController implements the CRUD actions for Page model.
 */
class PageController extends Controller
{
    /**
     * {@inheritdoc}
     */
    public function behaviors()
    {
        return [
            'access' => [
                'class' => AccessControl::className(),
                'rules' => [
                    [
                        'allow' => false,
                        'actions' => ['delete', 'create'],
                        'roles' => ['admin']
                    ],
                    [
                        'allow' => true,
                        'roles' => ['root', 'admin'],
                    ]
                ],
            ],
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    'delete' => ['POST'],
                ],
            ],
        ];
    }

    /**
     * Lists all Page models.
     * @return mixed
     */
    public function actionIndex()
    {
        $dataProvider = new ActiveDataProvider([
            'query' => Page::find(),
        ]);

        return $this->render('index', [
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single Page model.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionView($id)
    {
        $params = PageParams::find()->where(['page_params.page_id' => $id])->indexBy('description')
            ->joinWith('pageValues', false)->select(['page_values.value', 'page_params.description'])
            ->asArray()->column();

        return $this->render('view', [
            'model' => $this->findModel($id),
            'params' => $params
        ]);
    }

    /**
     * Creates a new Page model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new Page();

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->id]);
        }

        return $this->render('create', [
            'model' => $model,
        ]);
    }

    /**
     * Updates an existing Page model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);

        // Получаем значения параметров
        $modelPageValues = PageParams::find()
            ->select(['page_params.id', 'page_params.name', 'page_params.description', 'page_values.value'])
            ->where(['page_params.page_id' => $id])->joinWith('pageValues', false)
            ->orderBy('page_params.id')->asArray()->all();

        if ($model->load(Yii::$app->request->post()) && $model->validate()) {
            $pageParams = Yii::$app->request->post('PageParams');
            if ($pageParams) {
                foreach ($modelPageValues as $param) {
                    if (isset($pageParams[$param['name']])) {
                        $modelValue = PageValues::find()->where(['page_id' => $id])
                            ->andWhere(['param_id' => $param['id']])->one();
                        if (!$modelValue) {
                            $modelValue = new PageValues();
                            $modelValue->page_id = $id;
                            $modelValue->param_id = $param['id'];
                        }
                        if (empty($pageParams[$param['name']]))
                            $modelValue->delete();
                        else {
                            $modelValue->value = $pageParams[$param['name']];
                            $modelValue->save();
                        }
                    }
                }
            }
            $model->save();
            return $this->redirect(['view', 'id' => $model->id]);
        }

        return $this->render('update', [
            'model' => $model,
            'params' => $modelPageValues
        ]);
    }

    /**
     * Deletes an existing Page model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionDelete($id)
    {
        $this->findModel($id)->delete();

        return $this->redirect(['index']);
    }

    /**
     * Finds the Page model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return Page the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Page::findOne($id)) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }
}
