@extends('admin.template')
@section('content')
    <div class="row align-items-center">
        <div class="container">
            <div class="row">
                <div class="col-8">
                    <h1 align="center">Предметы</h1>
                    @include('alert')
                    <table class="table table-striped ">
                        <thead>
                            <tr>
                                <th scope="col">№</th>
                                <th scope="col">Название предмета</th>
                                <th scope="col">Изменить</th>
                                <th scope="col">Удалить</th>
                            </tr>
                        </thead>
                            <tbody>
                            @foreach($subjects as $subject)
                                <tr>
                                    <th scope="row">{{ $subject->id }}</th>
                                    <td>{{ $subject->name }}</td>
                                    <td><a class="btn btn-primary" href="{{ route('admin.subjects.edit', $subject->id) }}">Edit</a></td>
                                    <td><form action="{{ route('admin.subjects.destroy', $subject->id) }}" method="POST">
                                            @method('DELETE')
                                            @csrf
                                            <button class="btn btn-primary" type="submit">Delete</button>
                                        </form></td>
                                </tr>
                            @endforeach
                            </tbody>
                    </table>
                    <div class="float-right"><a class="btn btn-primary" href="{{ route('admin.subjects.create') }}">Add</a></div>
            @if ($subjects->total() > $subjects->count())
                <nav aria-label="Page navigation example">
                    <ul class="pagination">
                        {{$subjects->links()}}
                    </ul>
                </nav>
            @endif
                </div>
            </div>
        </div>
    </div>
@endsection
