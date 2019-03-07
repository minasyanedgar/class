<?php
namespace common\models;

/**
 * Teacher model
 *
 * @property integer $id
 * @property string $first_name
 * @property string $last_name
 */
class Teacher extends Person
{
    public static function tableName()
    {
        return '{{%teacher}}';
    }
}
