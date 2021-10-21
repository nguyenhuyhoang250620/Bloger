@extends('layouts.app')
@section('content')
    <div class="container mt-2">
        <div class="row">
            <div class="col-lg-12 margin-tb">
                <div class="pull-left">
                    <h2>Tạo một trang web công ty nhanh</h2>
                </div>
                <div class="pull-right mb-2">
                    <a class="btn btn-success" href="{{ route('searched.create') }}"> Tạo blog</a>
                </div>
            </div>
        </div>
        @if ($message = Session::get('success'))
            <div class="alert alert-success">
                <p>{{ $message }}</p>
            </div>
        @endif
        <table class="table table-bordered">
            <tr>
                <th>Stt</th>
                <th>Ten blog</th>
                <th width="280px">Hoạt động</th>
            </tr>
            @foreach ($search as $sea)
                <tr>
                    <td>{{ $sea->id }}</td>
                    <td>{{ $sea->title }}</td>
            
                    <td>
                        <form action="{{ route('searched.destroy', $search->id) }}" method="Post">
                            <a class="btn btn-primary" href="{{ route('searched.edit', $search->id) }}">Sửa</a>
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger">Xóa</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </table>
        {!! $search->links() !!}
    @endsection
