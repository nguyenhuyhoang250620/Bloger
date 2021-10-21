@extends('layouts.app')
@section('content')
<div class="container mt-2">
    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left mb-2">
                <h2>Thêm Blog</h2>
            </div>
            <div class="pull-right">
                <a class="btn btn-primary" href="{{ route('searched.index') }}"> Quay lại</a>
            </div>
        </div>
    </div>
    @if (session('status'))
        <div class="alert alert-success mb-1 mt-1">
            {{ session('status') }}
        </div>
    @endif
    <form action="{{ route('searched.store') }}" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="row">
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>Tên Blog:</strong>
                    <input type="text" name="name" class="form-control" placeholder="VD:CTy.techgardent">
                    @error('name')
                        <div class="alert alert-danger mt-1 mb-1">{{ $message }}</div>
                    @enderror
                </div>
            </div>
            <button type="submit" class="btn btn-primary ml-3">Thêm vào</button>
        </div>
    </form>

@endsection
    