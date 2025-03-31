@extends('layouts.app')

@section('title', 'hello')

@section('content')
<div class="container text-center">
    @if (filled($name))
        <h1 class="display-4 fw-bold text-primary">Hello {{ $name }} ({{ $nickname }})!!</h1>
    @else
        <h1 class="display-4 fw-bold text-primary">Send Name.</h1>
    @endif

    <form class="mt-4 row g-3 justify-content-center" id="nameForm">
        <div class="col-auto">
            <input type="text" name="name" value="{{ $name }}" class="form-control" placeholder="Name">
        </div>
        <div class="col-auto">
            <input type="text" name="nickname" class="form-control" placeholder="Nickname">
        </div>
        <div class="col-auto">
            <button type="submit" class="btn btn-primary">送信</button>
        </div>
    </form>

    <div class="mt-4">
        <canvas id="myChart" width="400" height="400"></canvas>
    </div>

    <div>
        <h2 class="mt-4">Users</h2>
        <table class="table table-striped">
            <thead>
                <tr>
                    <th scope="col">ID</th>
                    <th scope="col">Name</th>
                    <th scope="col">Nickname</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($users as $user)
                    <tr>
                        <td>{{ $user->id }}</td>
                        <td>{{ $user->name }}</td>
                        <td>{{ $user->email }}</td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>
@endsection

@section('scripts')
    @vite(['resources/ts/pages/hello.ts'])
@endsection
