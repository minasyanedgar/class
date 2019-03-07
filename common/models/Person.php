<?php
namespace common\models;
use yii\helpers\ArrayHelper;
use yii\helpers\VarDumper;

/**
 * Person model
 *
 * @property integer $id
 * @property string $first_name
 * @property string $last_name
 */
class Person extends AR
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['first_name', 'last_name'], 'required'],
        ];
    }

    public function getFullName() {
        return $this->first_name . ' ' . $this->last_name;
    }

    public static function getAll() {
        $data = self::find()->all();

        $array = [];
        foreach ($data as $one) {
            $array[$one->id] = $one->getFullName();
        }

        return $array;
    }
}
