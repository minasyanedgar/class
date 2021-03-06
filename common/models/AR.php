<?php
namespace common\models;

use Yii;
use yii\db\ActiveRecord;
use yii\web\IdentityInterface;

/**
 * User model
 *
 * @property integer $id
 * @property string $username
 * @property string $password_hash
 * @property string $password_reset_token
 * @property string $email
 * @property string $auth_key
 * @property integer $status
 * @property integer $created_at
 * @property integer $updated_at
 * @property string $password write-only password
 */
class AR extends ActiveRecord
{
    public function __construct(array $config = [])
    {
        parent::__construct($config);
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