@extends('admin.template')
@section('content')
        <br>
        <div class="container">
            @if($errors->any())
                <div class="row justify-content-center">
                    <div class="col-md-8">
                        <div class="alert alert-danger" role="alert">
                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                <span aria-hidden="true">x</span>
                            </button>
                            {!! $errors->first() !!}
                        </div>
                    </div>
                </div>
            @endif
            @if(session('success'))
                <div class="row justify-content-center">
                    <div class="col-md-8">
                        <div class="alert alert-success" role="alert">
                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                <span aria-hidden="true">x</span>
                            </button>
                            {{ session()->get('success') }}
                        </div>
                    </div>
                </div>
            @endif
            <div class="row justify-content-center">
                <div class="col-md-8">
                    <div class="card">
                        <div class="card-body">
                            <div class="card-title">
                                <ul class="nav nav-tabs" role="tablist">
                                    <li class="nav-item">
                                        <a class="nav-link active" data-toggle="tab" href="#maindata" role="tab">Основные данные</a>
                                    </li>
                                </ul>
                                <br>
                                <div class="float-right">ID: {{ $user->id }}</div>
                                    <table class="table table-bordered table-hover">
                                        <tbody>
                                            <tr>
                                                <th>Name</th>
                                                <td>{{  $user->name }}</td>
                                            </tr>
                                            <tr>
                                                <th>Surname</th>
                                                <td>{{  $user->surname }}</td>
                                            </tr>
                                            <tr>
                                                <th>Phone</th>
                                                <td>{{ $user->phone }}</td>
                                            </tr>
                                            <tr>
                                                <th>Email</th>
                                                <td>{{  $user->email }}</td>
                                            </tr>
                                            <tr>
                                                <th>Type</th>
                                                <td>{{$user->type->name}}</td>
                                            </tr>
                                            <tr>
                                                <th>Subject</th>
                                                <td>
                                                    @foreach ($user->subjects as $subject)
                                                            <div>{{$subject->name}}</div>
                                                        @endforeach
                                                </td>
                                            </tr>
                                            <tr>
                                            <th>Group</th>
                                            <td>{{$user->group->name}}</td>
                                            </tr>
                                        </tbody>
                                    </table>
                                    <div class="float-right">
                                        <a class="btn btn-outline-info btn-sm" href="{{ route('admin.users.index') }}" >Back</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
@endsection
