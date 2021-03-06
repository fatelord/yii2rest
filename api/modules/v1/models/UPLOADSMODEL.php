<?php
/**
 * Created by PhpStorm.
 * User: KRONOS
 * Date: 3/31/2017
 * Time: 14:30
 */

namespace app\api\modules\v1\models;


use Yii;
use app\api\models\Uploads;
use yii\db\Expression;

class UPLOADSMODEL extends Uploads
{
    public $imageFiles;

    /**
     * Define fields and objects to be returned in the API response
     * @return array
     */
    public function fields()
    {
        return [
            'upload_id',
            'company_id',
            'document_name',
            'document_path',
            'reserved_by' => function ($model) { //return tru if booth is reserved and false if not
                return $model->company;
            },
        ];
    }

    /**
     * Processes the files for uploading
     * @param $company_id
     */
    public function uploadDocument($company_id)
    {
        $uploadsFolder = Yii::$app->params['uploadsFolder'];
        $rel_folder = $uploadsFolder . $company_id . '/';
        $path = Yii::$app->basePath . $rel_folder;
        if (!file_exists($path)) {
            mkdir($path, 0777); //if directory does not exists create it with full permissions
        }


        foreach ($this->imageFiles as $file) {
            $file_base_name = $file->baseName;
            $file_name = uniqid('doc_') . '.' . $file->extension; //lets rename the file to prevent name clashes
            $relative_path = $rel_folder . $file_name;
            $save_path = $path . $file_name;

            $file->saveAs($save_path);

            $this->document_path = $relative_path;
            $this->document_name = $file_base_name;
            $this->company_id = $company_id;
        }
    }
}