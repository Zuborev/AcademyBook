<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use PhpParser\Node\Stmt\Foreach_;
use App\Repositories\SubjectRepository;
use App\Repositories\GroupsRepository;
use App\Repositories\usersRepository;
use App\Repositories\LessonsRepository;
use App\Repositories\TimeLessonsRepository;

class JournalController extends Controller
{
    private $subjectRepository;
    private $groupsRepository;
    private $usersRepository;
    private $TimeLessonsRepository;

    public function __construct()
    {
        $this->subjectRepository = app(subjectRepository::class);
        $this->groupsRepository = app(GroupsRepository::class);
        $this->usersRepository = app(usersRepository::class);
        $this->LessonsRepository = app(LessonsRepository::class);
        $this->TimeLessonsRepository = app(TimeLessonsRepository::class);
    }

    public function index(Request $request)
    {
        $groups = $this->groupsRepository->getForComboBox();
        $subjects = $this->subjectRepository->getForComboBox();

//            $foo = $request->get("delta");

            $group_id = $request->get('group_id');
            $subject_id = $request->get('subject_id');
            $periodBegin = $request->get('periodBegin');
            $periodEnd = $request->get('periodEnd');
//        if ($foo) {
//            $periodBegin = $periodBegin - strtotime("- $foo day");
//            $periodEnd = $periodEnd  - strtotime("- $foo day");
//
//        }
        if (($group_id)&&($subject_id)) {

            $students = $this->usersRepository->getStudents($group_id);
            $dates = $this->LessonsRepository->getPeriod($group_id, $subject_id, $periodBegin, $periodEnd);
            $marks = $this->LessonsRepository->getStudentsDateMarks($group_id, $subject_id, $periodBegin, $periodEnd);
            $lessons = $this->TimeLessonsRepository->getAll();

            foreach ($marks as $mark) {
                $schedule[$mark->user][$mark->date][$mark->lesson] = $mark->mark;
            }

            foreach ($lessons as $lesson) {
                $period[] = $lesson->number;
            }
//            dd($dates);
//            dd($day);
//            if (empty($day)) {
//                return back()
//                    ->withErrors(['msg' => "The subject was not found in the journal for this group"]);
//            }
            $days = count($dates);
//            dd($dates);

            $periods = count($period);
            foreach ($students as $student) {
                $users[$student->login] = $student->surname . ' ' . $student->name;
            }
//            dd($days);
            return view('front.journals.index', compact('groups', 'periods','period','periodBegin', 'periodEnd', 'subjects','group_id', 'subject_id', 'users', 'schedule', 'dates', 'days'));

        } else {
            return view('front.journals.index', compact('groups', 'subjects'));
        }
    }

    public function post(Request $request) {
        $foo = $request->get("delta");
        dd($foo);

    }
}
