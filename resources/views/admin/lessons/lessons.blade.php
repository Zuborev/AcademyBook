@extends('admin.template')
@section('content')
    <h1 align="center">Расписание</h1>
    <div class="row align-items-center ">
        <div class="container">
            <div class="row">
                <div class="col-10">
{{--                    @if($errors->any())--}}
{{--                        <div class="row justify-content-center">--}}
{{--                            <div class="col-md-8">--}}
{{--                                <div class="alert alert-danger" role="alert">--}}
{{--                                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">--}}
{{--                                        <span aria-hidden="true">x</span>--}}
{{--                                    </button>--}}
{{--                                    {!! $errors->first() !!}--}}
{{--                                </div>--}}
{{--                            </div>--}}
{{--                        </div>--}}
{{--                    @endif--}}
{{--                    @if(session('success'))--}}
{{--                        <div class="row justify-content-center">--}}
{{--                            <div class="col-md-8">--}}
{{--                                <div class="alert alert-success" role="alert">--}}
{{--                                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">--}}
{{--                                        <span aria-hidden="true">x</span>--}}
{{--                                    </button>--}}
{{--                                    {{ session()->get('success') }}--}}
{{--                                </div>--}}
{{--                            </div>--}}
{{--                        </div>--}}
{{--                    @endif--}}
                    <table class="table table-striped">
                        <thead>
                        <tr>
                            <th scope="col">id</th>
                            <th scope="col">Группы</th>
                            <th scope="col">Предмет</th>
                            <th scope="col">Учитель</th>
                            <th scope="col">Аудетория</th>
                            <th scope="col">Дата</th>
                            <th scope="col">Изменить</th>
                            <th scope="col">Удалить</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($lessons as $lesson )
                            <tr>
                                <th scope="row">{{$lesson->id}}</th>
                                <td><a href="{{route('admin.showTimetable',['name'=>'group_id','id'=>$lesson->group_id])}}">{{$lesson->Groups->name}}</a></td>
                                <td>{{$lesson->Subject->name}}</td>
                                <td><a href="{{route('admin.showTimetable',['name'=>'user_id','id'=>$lesson->user_id])}}">{{$lesson->Users->surname}}</a></td>
                                <td><a href="{{route('admin.showTimetable',['name'=>'class_room_id','id'=>$lesson->class_room_id])}}">{{$lesson->ClassRooms->name}}</a></td>
                                <td>{{date( "d-m-Y H:m" , $lesson->date_event)}}</td>
                                <td><a class="btn btn-primary" href="{{ route('admin.lessons.edit', $lesson->id) }}" role="button">Edit</a></td>
                                <td><form action="{{ route('admin.lessons.destroy', $lesson->id) }}" method="POST">
                                        @method('DELETE')
                                        @csrf
                                        <button class="btn btn-primary" type="submit">Delete</button>
                                    </form></td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                    @if($lessons->total() > $lessons->count())
                        <nav aria-label="Page navigation example">
                            <ul class="pagination">

                                {{$lessons->links()}}

                            </ul>
                        </nav>
                    @endif
                </div>
                <div class="col-2">
                    <div class="card">

                        <nav class="nav nav-pills nav-justified">
                            <a class="nav-item nav-link active" href="{{route('admin.lessons.create')}} ">Дбавить урок</a>
                        </nav>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
