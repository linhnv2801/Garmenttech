<?php
/**
 * @author Carsten Brandt <mail@cebe.cc>
 */

namespace yiiunit\data\ar;

/**
 * Class Profile
 *
 * @property int $id
 * @property string $description
 *
 */
class Profile extends ActiveRecord
{
    public static function tableName()
    {
        return 'profile';
    }
}
