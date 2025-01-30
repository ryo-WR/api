<!DOCTYPE html>
<html lang="ja">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Workers Management</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>

<body class="flex flex-col min-h-screen bg-gray-100">
    <header class="bg-slate-800">
        <div class="max-w-7xl mx-auto px-4 sm:px-6">
            <div class="py-6">
                <p class="text-white text-xl">Workers 管理システム</p>
            </div>
        </div>
    </header>

    <main>
      <div class="show-title">
        <h1 class="show-title__text">社員詳細情報</h1>
      </div>
      <div class="show-content">
        <table class="show-table">
          <tr class="show-tr">
            <th class="show-th">名前</th>
            <td class="show-td">{{ $worker->name }}</td>
          </tr>
          <tr class="show-tr">
            <th class="show-th">メールアドレス</th>
            <td class="show-td">{{ $worker->email }}</td>
          </tr>
          <tr class="show-tr">
            <th class="show-th">電話番号</th>
            <td class="show-td">{{ $worker->phone }}</td>
          </tr>
          <tr class="show-tr">
            <th class="show-th">住所</th>
            <td class="show-td">{{ $worker->address }}</td>
          </tr>
          <tr class="show-tr">
            <th class="show-th">性別</th>
            <td class="show-td">{{ worker->gender }}</td>
          </tr>
          <tr class="show-tr">
            <th class="show-th">障害情報</th>
            <td class="show-td">{{ worker->disability }}</td>
          </tr>
          <tr class="show-tr">
            <th class="show-th">レベル</th>
            <td class="show-td">{{ worker->level }}</td>
          </tr>          
        </table>
      </div>

      <div class="show-buttons">
        <div class="show-back__button">
          <a href="{{ route('web.workers.index') }}" class="show-back__link">一覧に戻る</a>
        </div>
        <div class="show-delete__button">
          <form action="{{ route('web.workers.destroy', $worker['id']) }}" method="POST">
            @csrf
            @method('DELETE')
            <button type="submit" class="show-delete__button--btn">削除する</button>
        </div>
      </div>
    </main>
</body>