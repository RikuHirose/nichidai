<?php
namespace App\Http\Responses\Api\V1;

class Image extends Response
{
    protected $columns = [
        'id'  => 0,
        'url' => '',

    ];

    /**
     * @param \App\Models\File $model
     *
     * @return static
     */
    public static function updateWithModel($model)
    {
        $response = new static([], 400);
        if (!empty($model)) {
            $modelArray = [
                'id'  => $model->id,
                'url' => $model->url,

            ];
            $response = new static($modelArray, 200);
        }

        return $response;
    }
}
