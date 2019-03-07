<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%student_course}}`.
 * Has foreign keys to the tables:
 *
 * - `{{%student}}`
 * - `{{%course}}`
 */
class m190307_082353_create_junction_table_for_student_and_course_tables extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%student_course}}', [
            'student_id' => $this->integer(),
            'course_id' => $this->integer(),
            'PRIMARY KEY(student_id, course_id)',
        ]);

        // creates index for column `student_id`
        $this->createIndex(
            '{{%idx-student_course-student_id}}',
            '{{%student_course}}',
            'student_id'
        );

        // add foreign key for table `{{%student}}`
        $this->addForeignKey(
            '{{%fk-student_course-student_id}}',
            '{{%student_course}}',
            'student_id',
            '{{%student}}',
            'id',
            'CASCADE'
        );

        // creates index for column `course_id`
        $this->createIndex(
            '{{%idx-student_course-course_id}}',
            '{{%student_course}}',
            'course_id'
        );

        // add foreign key for table `{{%course}}`
        $this->addForeignKey(
            '{{%fk-student_course-course_id}}',
            '{{%student_course}}',
            'course_id',
            '{{%course}}',
            'id',
            'CASCADE'
        );
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        // drops foreign key for table `{{%student}}`
        $this->dropForeignKey(
            '{{%fk-student_course-student_id}}',
            '{{%student_course}}'
        );

        // drops index for column `student_id`
        $this->dropIndex(
            '{{%idx-student_course-student_id}}',
            '{{%student_course}}'
        );

        // drops foreign key for table `{{%course}}`
        $this->dropForeignKey(
            '{{%fk-student_course-course_id}}',
            '{{%student_course}}'
        );

        // drops index for column `course_id`
        $this->dropIndex(
            '{{%idx-student_course-course_id}}',
            '{{%student_course}}'
        );

        $this->dropTable('{{%student_course}}');
    }
}
