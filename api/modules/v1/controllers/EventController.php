<?php
/**
 * Created by PhpStorm.
 * User: KRONOS
 * Date: 3/31/2017
 * Time: 13:19
 */

namespace app\api\modules\v1\controllers;

use yii\rest\ActiveController;

class EventController extends EVENTMODEL
{
    public $modelClass = 'app\api\modules\v1\models\EVENTMODEL';
}