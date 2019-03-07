<?php
namespace backend\controllers;

use common\models\Course;
use common\models\Schedule;
use Yii;
use yii\web\Controller;
use yii\filters\AccessControl;
use yii\web\NotFoundHttpException;

/**
 * Course controller
 */
class CourseController extends Controller
{
    public static $model = 'common\models\Course';

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
     * Displays courses list.
     *
     * @return string
     */
    public function actionIndex()
    {
        return $this->render('index');
    }

    /**
     * Creates new course.
     *
     * @return string
     */
    public function actionCreate()
    {
        $modelName = self::$model;
        $model = new $modelName;
        $schedule = new Schedule;

        if (Yii::$app->request->isPost) {
            $post = Yii::$app->request->post();

            if ($model->load($post) && $schedule->load($post)) {
                if ($model->validate() && $schedule->validate()) {
                    $schedule->save(false);

                    $model->schedule_id = $schedule->id;
                    $model->save(false);
                    return $this->redirect(['index']);
                }
            }
        } else {
            $model->populateRelation('schedule', new Schedule);
        }

        return $this->render('create', compact('model'));
    }

    /**
     * Updates course.
     *
     * @return string
     */
    public function actionUpdate($id)
    {
        $modelName = self::$model;
        $model = Course::find()->where(['id' => $id])->with('schedule')->one();

        if (!$model) {
            throw new NotFoundHttpException("The course was not found.");
        }

        if (Yii::$app->request->isPost) {
            $post = Yii::$app->request->post();

            if ($model->load($post) && $model->schedule->load($post)) {
                if ($model->validate() && $model->schedule->validate()) {
                    $model->schedule->save(false);
                    $model->save(false);

                    return $this->redirect(['index']);
                }
            }
        }

        return $this->render('update', compact('model'));
    }

    // Saving process
    private function _save($model, $schedule = false) {
        if (Yii::$app->request->isPost) {
            $post = Yii::$app->request->post();

            if ($model->load($post) && $schedule->load($post)) {
                if ($model->validate() && $schedule->validate()) {
                    $schedule->save(false);

                    $model->schedule_id = $schedule->id;
                    $model->save(false);
                    return $this->redirect(['index']);
                }
            }
        } else {
            $model->populateRelation('schedule', new Schedule);
        }
    }

    /**
     * Deletes course.
     *
     * @return string
     */
    public function actionDelete($id)
    {
        $modelName = self::$model;
        $model = $modelName::findOne($id);

        if (!$model) {
            throw new NotFoundHttpException("The course was not found.");
        }

        $model->delete();

        return $this->render('index', compact('model'));
    }
}
