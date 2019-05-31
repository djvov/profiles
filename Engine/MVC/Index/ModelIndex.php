<?php

use djvov\Config;
use djvov\Core\Model;
use djvov\Core\Profiles;
use djvov\Core\Singleton;

class ModelIndex extends Model
{
    use Singleton;

    public static function actionIndex()
    {
        $Profiles = Profiles::getInstance();
        $saved = $Profiles::saveProfile();
        $profiles = $Profiles::getProfiles();
        return [
            'profiles' => $profiles,
            'saved' => $saved,
        ];
    }
}
