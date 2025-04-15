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
    <div class="container mt-5">
        <h2>ダウンロード履歴</h2>
        <table class="table table-bordered table-hover align-middle mt-3">
          <thead class="table-light">
            <tr>
              <th>種別</th>
              <th>ステータス</th>
              <th>リクエスト日時</th>
              <th>検索条件</th>
              <th>操作</th>
            </tr>
          </thead>
          <tbody>
            @foreach ($downloadHistories as $history)
            <tr>
                <td>{{ $history->type }}</td>
                <td>
                    @if ($history->status === 'pending')
                        <span class="badge bg-warning text-dark">処理中</span>
                    @elseif ($history->status === 'completed')
                        <span class="badge bg-success">完了</span>
                    @else
                        <span class="badge bg-danger">失敗</span>
                    @endif
                </td>
                <td>{{ $history->created_at->format('Y/m/d H:i') }}</td>
                <td>{{ json_encode($history->search_conditions, JSON_UNESCAPED_UNICODE) }}</td>
                <td>
                    @if ($history->status === 'completed')
                        <a href="{{ $history->s3_file_path }}" class="btn btn-sm btn-primary">ダウンロード</a>
                    @else
                        <button class="btn btn-sm btn-outline-secondary" disabled>再試行</button>
                    @endif
                </td>
            </tr>
            @endforeach
          </tbody>
        </table>
      </div>
      
</div>
@endsection