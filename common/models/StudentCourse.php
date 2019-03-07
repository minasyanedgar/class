<?php
namespace common\models;

/**
 * StudentCourse model
 *
 * @property integer $id
 * @property string $first_name
 * @property string $last_name
 */
class StudentCourse extends AR
{
    public static function tableName()
    {
        return '{{%student_course}}';
    }

    public function rules()
    {
        return [
            [['student_id', 'course_id'], 'required']
        ];
    }
}
