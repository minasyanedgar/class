<?php
namespace backend\controllers;

use Yii;
use yii\web\Controller;
use yii\filters\AccessControl;
use yii\web\NotFoundHttpException;

/**
 * Student controller
 */
class StudentController extends Controller
{
    public static $model = 'common\models\Student';

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
                        'actions' => ['index', 'create', 'update', 'delete'],
                        'allow' => true,
                    ],
                ],
            ],
        ];
    }

    /**
     * Displays students list.
     *
     * @return string
     */
    public function actionIndex()
    {
        return $this->render('index');
    }

    /**
     * Creates new student.
     *
     * @return string
     */
    public function actionCreate()
    {
        $modelName = self::$model;
        $model = new $modelName;

        $this->_save($model);

        return $this->render('create', compact('model'));
    }

    /**
     * Updates student.
     *
     * @return string
     */
    public function actionUpdate($id)
    {
        $modelName = self::$model;
        $model = $modelName::findOne($id);

        if (!$model) {
            throw new NotFoundHttpException("The student was not found.");
        }

        $this->_save($model);

        return $this->render('update', compact('model'));
    }

    // Saving process
    private function _save($model) {
        if (Yii::$app->request->isPost) {
            if ($model->load(Yii::$app->request->post())) {
                if ($model->validate()) {
                    $model->save(false);
                    return $this->redirect(['index']);
                }
            }
        }
    }

    /**
     * Deletes student.
     *
     * @return string
     */
    public function actionDelete($id)
    {
        $modelName = self::$model;
        $model = $modelName::findOne($id);

        if (!$model) {
            throw new NotFoundHttpException("The student was not found.");
        }

        $model->delete();

        return $this->render('index', compact('model'));
    }
}
