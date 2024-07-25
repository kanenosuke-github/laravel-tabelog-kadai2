@extends('layouts.app')

@section('content')
    <div class="container mx-auto px-4">
        <div class="row justify-content-center">
            <div class="col">
                <h1 class="text-2xl font-bold mb-4">カテゴリー一覧</h1>
                <a href="{{ route('admin.categories.create') }}" class="btn btn-primary">Create New Category</a>


                <!-- 検索フォームの追加 -->
                <form action="{{ route('admin.categories.index') }}" method="GET" class="mt-4 mb-4">
                <input type="text" name="search" placeholder="Search Categories" class="form-control d-inline-block w-auto mr-2">
                <button type="submit" class="btn btn-primary">Search</button>


                </form>

                <table class="w-full mt-4 border-collapse">
                    <thead>
                        <tr>
                            <th class="border-b py-2">Name</th>
                            <th class="border-b py-2">Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($categories as $category)
                        <tr>
                            <td class="border-b py-2">{{ $category->name }}</td>
                            <td class="border-b py-2">
                                <form action="{{ route('admin.categories.destroy', $category->id) }}" method="POST" class="inline-block">
                                    <a href="{{ route('admin.categories.edit', $category->id) }}" class="text-blue-500">Edit</a>
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="text-red-500 ml-2">DELETE</button>
                                </form>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>

                <!-- ページネーションリンクをここに追加 -->
                <div class="mt-4 pagination-custom">
                    {{ $categories->links() }}
                </div>
               
            </div>
        </div>
    </div>
@endsection
