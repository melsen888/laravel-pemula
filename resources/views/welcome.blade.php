<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Laravel To-Do List</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-100 flex items-center justify-center min-h-screen">

    <div class="bg-white p-6 rounded-lg shadow-md w-full max-w-md">
        <h1 class="text-2xl font-bold text-gray-800 mb-4 text-center">To-Do List</h1>

        <form action="{{ route('task.store') }}" method="POST" class="flex gap-2 mb-6">
            @csrf
            <input type="text" name="title" placeholder="Tambah tugas baru..." required
                class="flex-1 px-3 py-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500">
            <button type="submit" class="bg-blue-500 text-white px-4 py-2 rounded-lg hover:bg-blue-600">
                Tambah
            </button>
        </form>

        <ul class="space-y-3">
            @forelse($tasks as $task)
                <li class="flex items-center justify-between p-3 bg-gray-50 rounded-lg border">
                    <span class="text-gray-700">{{ $task->title }}</span>
                    
                    <form action="{{ route('task.destroy', $task->id) }}" method="POST">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="text-red-500 hover:text-red-700 text-sm">
                            Hapus
                        </button>
                    </form>
                </li>
            @empty
                <p class="text-center text-gray-500 text-sm">Belum ada tugas hari ini.</p>
            @endforelse
        </ul>
    </div>

</body>
</html>