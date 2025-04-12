{{-- filepath: /home/isamuyonekawa/docker-projects/laravel-docker/resources/views/member.blade.php --}}
@extends('layouts.app')

@section('title', '会員情報')

@section('content')
<div class="container">
    <h1 class="my-4">会員情報</h1>
    
    <div class="card">
        <div class="card-header">
            会員詳細
        </div>
        <div class="card-body">
            <p><strong>名前:</strong> {{ $user->name }}</p>
            <p><strong>メールアドレス:</strong> {{ $user->email }}</p>
            <p><strong>登録日:</strong> {{ $user->created_at->format('Y年m月d日') }}</p>
        </div>
        <div class="card-footer">
            <form action="{{ route('logout') }}" method="POST">
                @csrf
                <button type="submit" class="btn btn-danger">ログアウト</button>
            </form>
        </div>
    </div>
</div>
@endsection