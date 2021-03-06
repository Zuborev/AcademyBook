<?php

namespace App\Repositories;
use App\Models\Journal as Model;

class journalsRepository extends CoreRepository
{

    protected function getModelClass()
    {
        return Model::class;
    }

    public function getExist($array)
    {
        $result = $this->startConditions()
            ->select('id')
            ->where('lessons_id', $array['lessons_id'])
            ->where('student_id', $array['student_id'])
            ->pluck('id')
            ->first();
        return $result;
    }

    public function getEdit($lesson_id)
    {
        $result = $this->startConditions()
            ->select()
            ->where('lessons_id', $lesson_id)
            ->with('users')
            ->get();
        return $result;
    }


}
