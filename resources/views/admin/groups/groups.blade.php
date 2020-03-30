@extends('admin.template')
@section('content')
    <h1 align="center">Группы</h1>
    <div class="row align-items-center ">
        <div class="container">
            <div class="row">
                <div class="col-8">
                    <table class="table table-striped">
                        <thead>
                            <tr>
                                <th scope="col">id</th>
                                <th scope="col">Имя группы</th>
                                <th scope="col">Курс</th>
                                <th scope="col">Изменить</th>
                                <th scope="col">Удалить</th>
                            </tr>
                        </thead>
                        @foreach($groups as $group)
                        <tbody>
                        <tr>
                            <th scope="row">{{$group->id}}</th>
                            <td>{{$group->name}}</td>
                            <td>{{$group->courses->name}}</td>
                            <td><a class="btn btn-primary" href="{{ route('admin.groups.edit', $group->id) }}" role="button">Edit</a></td>
                            <td><form action="{{ route('admin.groups.destroy', $group->id) }}" method="POST">
                                    @method('DELETE')
                                    @csrf
                                    <button class="btn btn-primary" type="submit">Delete</button>
                                </form></td>
                        </tr>
                        </tbody>
                        @endforeach
                    </table>
                    @if($groups->total() > $groups->count())
                    <nav aria-label="Page navigation example">
                        <ul class="pagination">

                            {{$groups->links()}}

                        </ul>
                    </nav>
                     @endif
                </div>
                <div class="col-4">
                    <div class="card">

                        <nav class="nav nav-pills nav-justified">
                            <a class="nav-item nav-link active" href="{{route('admin.groups.create')}} ">Дбавить группу</a>
                        </nav>
                </div>
            </div>
        </div>
    </div>
    </div>
@endsection
