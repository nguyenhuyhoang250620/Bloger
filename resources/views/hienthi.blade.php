@extends('layouts.app')

@section('content')

    <div class="container-fluid">
        <div class="row">
            <div class="col-sm-3">
                <div class="list-group">
                    <a href="#" class="list-group-item list-group-item-success">Danh sách người giàu</a>
                    @foreach ($post as $item)
                        <a href="#" class="list-group-item active">{{ $item->name }}</a>
                        <a href="#" class="list-group-item">Email:{{ $item->email }}</a>
                        <a href="#" class="list-group-item">Địa chỉ:{{ $item->address }}</a>
                    @endforeach
                </div>
            </div>
            <div class="col-sm-6">

            </div>
            <div class="col-sm-3">
                <div class="list-group">
                    <a href="#" class="list-group-item list-group-item-success">Danh sách người dùng</a>
                    @foreach ($user as $us)
                        <a href="#" class="list-group-item active">{{ $us->name }}</a>
                        <a href="#" class="list-group-item">Email:{{ $us->email }}</a>
                        <a href="#" class="list-group-item">sbd:{{ $us->remember_token }}</a>
                    @endforeach
                </div>
            </div>
        </div>
    </div>

@endsection
