@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Quyền truy cập') }}</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif
                    {{ __('Nhập mã để vào') }}
                    <form action="{{route('dadu')}}" method="get">
                        <input type="number" name="tuoi" required>
                        <input type="submit" value="Tạo TV" >
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
