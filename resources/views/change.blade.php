@extends('layouts.app')
@section('content')

<table class="table table-bordered">
    <tr>
        <th>Stt</th>
        <th>Title</th>
        <th>Ngày tạo</th>
        <th width="280px">Hành động</th>
    </tr>
    @foreach ($posts as $post)
        <tr>
            <td>{{ $post->id }}</td>
            <td>{{ $post->title }}</td>
            <td>{{ $post->created_at }}</td>
            <td>
                <form action="#" method="POST">

                    <a class="btn btn-info" href="{{ route('searched.show', $post->id) }}">Show</a>

                    <a class="btn btn-primary" href="{{ route('searched.edit', $post->id) }}">Edit</a>

                    @csrf
                    <a class="btn btn-danger" href="{{ route('delete_item', $post->id) }}">Xóa</a>
                </form>
            </td>
        </tr>
    @endforeach
</table>
@endsection