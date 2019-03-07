<?php
namespace common\models;

/**
 * Student model
 *
 * @property integer $id
 * @property string $first_name
 * @property string $last_name
 */
class Student extends Person
{
    public static function tableName()
    {
        return '{{%student}}';
    }
}
