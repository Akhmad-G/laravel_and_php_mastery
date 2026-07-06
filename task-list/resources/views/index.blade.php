@extends('layouts.app')

@section('title', 'The list of tasks')



{{--@isset($name)--}}
{{--    <div>The name is: {{$name}}</div>--}}
{{--@endisset--}}


{{--<div>--}}
{{--    @if(count($tasks))--}}
{{--        <div>There are tasks!</div>--}}
{{--    @else--}}
{{--        <div>There are no tasks!</div>--}}
{{--    @endif--}}
{{--</div>--}}


{{--<div>--}}
{{--    @foreach($tasks as $task)--}}
{{--        <p>{{ $task -> title }}</p>--}}
{{--    @endforeach--}}
{{--</div>--}}


@section('content')
    @forelse($tasks as $task)
        <div>
            <a href="{{ route('tasks.show', ['id' => $task -> id ]) }}">{{ $task -> title }}</a>
        </div>
    @empty
        <p>No tasks</p>
    @endforelse
@endsection
