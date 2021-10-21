@extends('layouts.app')
@section('content')
    <div class="container mt-2">
        <div class="row">
            <div class="col-lg-12 margin-tb">
                <div class="pull-left">
                    <h2>Tạo một trang web công ty nhanh</h2>
                </div>
                <div class="pull-right mb-2">
                    <a class="btn btn-success" href="{{ route('companies.create') }}"> Tạo doanh nghiệp</a>
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
                <th>Tên công ty</th>
                <th>Email-Công ty</th>
                <th>Địa chỉ công ty</th>
                <th width="280px">Hoạt động</th>
            </tr>
            @foreach ($companies as $company)
                <tr>
                    <td>{{ $company->id }}</td>
                    <td>{{ $company->name }}</td>
                    <td>{{ $company->email }}</td>
                    <td>{{ $company->address }}</td>
                    <td>
                        <form action="{{ route('companies.destroy', $company->id) }}" method="Post">
                            <a class="btn btn-primary" href="{{ route('companies.edit', $company->id) }}">Sửa</a>
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger">Xóa</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </table>
        {!! $companies->links() !!}
    @endsection
