<?php

namespace App\Repositories;

use App\Models\Lessons as Model;

/**
 * Class GroupsRepository
 * @package App\Repositories
 */
class LessonsRepository extends CoreRepository
{
    /**
     * @param int $id
     * @return Model
     */
    public function getEdit($id)
    {
        return $this->startConditions()->find($id);
    }

    public function getAllWithPaginate($perPage)
    {
        $columns = ['id', 'date_event', 'group_id', 'subject_id', 'user_id', 'class_room_id'];
        $result = $this
            ->startConditions()
            ->select($columns)
            ->orderBy('id', 'DESC')
            ->with(['Subject:id,name', 'Users:id,surname', 'ClassRooms:id,name', 'Groups:id,name'])
            ->paginate($perPage);


        return $result;
    }

    public function ShowTable($table, $id)
    {

        $columns = ['id', 'date_event', $table];
        $result = $this
            ->startConditions()
            ->select($columns)
            ->where($table, $id)
            //->orderBy('id', 'DESC')
            ->toBase()
            ->get();

        //dd($table, $id, $result);
        return $result;
    }

    /**
     * @return string
     */
    protected function getModelClass()
    {
        return Model::class;
    }

    public function softDelete($id)
    {
        $result = $this->startConditions()
            ->find($id)
            ->Delete();

        return $result;
    }

    public function upDate($ed_lesson, $request)
    {
        $date = $request->all();
        $date['date_event'] = strtotime($request['date_event']);
        $result = $ed_lesson
            ->fill($date)
            ->save();
        return $result;
    }

    public function lessonCreated($request)
    {
        $request['date_event'] = strtotime($request['date_event']);
        $lesson = $request->input();

       // dd($request, $lesson);
        $result = $this->startConditions()
            ->create($lesson);
        return $result;

    }
}

