<?php
namespace common\models;

/**
 * Course model
 *
 * @property integer $id
 * @property string $first_name
 * @property string $last_name
 */
class Course extends AR
{
    public static function tableName()
    {
        return '{{%course}}';
    }

    public function rules()
    {
        return [
            ['name', 'required', 'message' => 'Please choose course name'],
            [['teacher_id'], 'required', 'message' => 'Please select teacher']
        ];
    }

    public function getSchedule()
    {
        return $this->hasOne(Schedule::className(), ['id' => 'schedule_id']);
    }

    public function getTeacher()
    {
        return $this->hasOne(Teacher::className(), ['id' => 'teacher_id']);
    }

    public function getStudents() {
        return $this->hasMany(Student::className(), ['id' => 'student_id'])
            ->viaTable('student_course', ['course_id' => 'id']);
    }

    public function getFullName() {
        return $this->name;
    }
}
