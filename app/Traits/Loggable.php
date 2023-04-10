<?php

namespace App\Traits;

use App\Models\Log;

trait Loggable
{
    public function log(string $action, int $loggableID, $data, $model, $noAuth= false): void
    {
        Log::create([
            'user_id' => $noAuth ? 0 : auth()->id(),
            'action' => $action,
            "data" => json_encode($data),
            'loggable_id' => $loggableID,
            "loggable_type" => $model,
        ]);
    }

    public function updateLog($model, $modelName): void
    {
        $change = $model->getDirty();
        $data = [];

        foreach ($change as $key => $value)
        {
            $data[$key]['old'] = $model->getOriginal($key);
            $data[$key]['new'] = $value;
        }

        if (isset($data['updated_at']))
        {
            $data['updated_at']['old'] = $data['updated_at']['old']->toDateTimeString();
        }

        $this->log("update", $model->id, $data, $modelName);
    }

}
