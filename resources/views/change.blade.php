@extends('layouts.app')
@section('content')
@foreach ($posts as $post)
<tr>
    <td>{{ $post->title }}</td>
    <td>{{ $post->description }}</td>
    <td>
        <a class="btn btn-info" href="{{ route('searched.show', $post->id) }}">Show</a>
        <a class="btn btn-primary" href="{{ route('searched.edit', $post->id) }}">Edit</a>
        <form action="{{ route('searched.destroy', $post->id) }}" method="POST">

            @csrf
            @method('DELETE')
            <button type="submit" class="btn btn-danger">Delete</button>
        </form>
    </td>
</tr>
@endforeach 
@endsection