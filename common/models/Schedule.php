<?php
namespace common\models;

/**
 * Schedule model
 *
 * @property integer $id
 * @property string $day_1_start
 * @property string $day_1_end
 * @property string $day_2_start
 * @property string $day_2_end
 * @property string $day_3_start
 * @property string $day_3_end
 * @property string $day_4_start
 * @property string $day_4_end
 * @property string $day_5_start
 * @property string $day_5_end
 */
class Schedule extends AR
{
    public static $times;

    public static function tableName()
    {
        return '{{%schedule}}';
    }

    public function rules()
    {
        return [
            [['day_1_start', 'day_1_end',
              'day_2_start', 'day_2_end',
              'day_3_start', 'day_3_end',
              'day_4_start', 'day_4_end',
              'day_5_start', 'day_5_end',
            ], 'required', 'message' => 'Field is required'],
        ];
    }

    public static function getTimes() {
        if (!self::$times) {
            $array = [];
            for ($i = 0; $i <= 23; $i++) {
                $val = date('H:i', strtotime('00:00 +' . $i . ' hours'));
                $array[$val] = $val;
            }
            self::$times = $array;
        }

        return self::$times;
    }
}
