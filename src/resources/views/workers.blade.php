<!DOCTYPE html>
<html lang="ja">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Workers Management</title>
</head>

<body class="flex flex-col min-h-[100vh]">
    <header class="bg-slate-800">
        <div class="max-w-7xl mx-auto px-4 sm:px-6">
            <div class="py-6">
                <p class="text-white text-xl">Workers 管理システム</p>
            </div>
        </div>
    </header>

    <main class="grow">
        <div class="max-w-7xl mx-auto px-4 sm:px-6">
            <div class="py-8">
                <p class="text-2xl font-bold text-center">Workers 登録フォーム</p>

                <!-- 登録フォーム -->
                <form action="{{ route('workers.store') }}" method="POST" class="mt-10">
                    @csrf

                    <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                        <input type="text" name="name" placeholder="名前" class="p-4 border border-gray-300" required>
                        <input type="email" name="email" placeholder="メールアドレス" class="p-4 border border-gray-300" required>
                        <input type="text" name="phone" placeholder="電話番号" class="p-4 border border-gray-300" required>
                        <input type="text" name="address" placeholder="住所" class="p-4 border border-gray-300" required>
                        <input type="text" name="gender" placeholder="性別" class="p-4 border border-gray-300" required>
                        <input type="text" name="disability" placeholder="障害情報" class="p-4 border border-gray-300" required>
                        <input type="text" name="level" placeholder="レベル" class="p-4 border border-gray-300" required>
                    </div>

                    <button type="submit"
                        class="mt-8 p-4 bg-blue-600 text-white hover:bg-blue-700 transition-colors">登録する</button>
                </form>

                <!-- 登録済みデータ一覧 -->
                <div class="mt-10">
                    <h2 class="text-2xl font-bold text-center">登録済み Workers</h2>
                    <table class="w-full border-collapse border border-gray-300 mt-6">
                        <thead class="bg-gray-200">
                            <tr>
                                <th class="border border-gray-300 p-2">名前</th>
                                <th class="border border-gray-300 p-2">メール</th>
                                <th class="border border-gray-300 p-2">電話</th>
                                <th class="border border-gray-300 p-2">住所</th>
                                <th class="border border-gray-300 p-2">性別</th>
                                <th class="border border-gray-300 p-2">障害情報</th>
                                <th class="border border-gray-300 p-2">レベル</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($workers as $worker)
                                <tr>
                                    <td class="border border-gray-300 p-2">{{ $worker->name }}</td>
                                    <td class="border border-gray-300 p-2">{{ $worker->email }}</td>
                                    <td class="border border-gray-300 p-2">{{ $worker->phone }}</td>
                                    <td class="border border-gray-300 p-2">{{ $worker->address }}</td>
                                    <td class="border border-gray-300 p-2">{{ $worker->gender }}</td>
                                    <td class="border border-gray-300 p-2">{{ $worker->disability }}</td>
                                    <td class="border border-gray-300 p-2">{{ $worker->level }}</td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </main>

    <footer class="bg-slate-800">
        <div class="max-w-7xl mx-auto px-4 sm:px-6">
            <div class="py-4 text-center">
                <p class="text-white text-sm">Workers 管理システム</p>
            </div>
        </div>
    </footer>
</body>

</html>
