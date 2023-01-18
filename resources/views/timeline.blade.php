@extends('layouts.app')

@section('content')
    <div class="container mt-3">
        {!! Form::open(['route' => 'timeline', 'method' => 'POST']) !!}
            {{ csrf_field() }}
            <div class="row mb-4">
                @guest
                    <div class="mx-auto">
                        <a class="btn btn-primary" href="{{ route('login') }}">
                            ログインして登録する
                        </a>
                        <a class="btn btn-primary" href="{{ route('register') }}">
                            新規登録して登録する
                        </a>
                    </div>
                @else
                    {{ Form::text('word', null, ['class' => 'form-control col-9 mr-auto']) }}
                    {{ Form::text('meaning', null, ['class' => 'form-control col-9 mr-auto']) }}
                    {{ Form::submit('register', ['class' => 'btn btn-primary col-2']) }}
                @endguest
            </div>
            @if ($errors->has('word'))
                <p class="alert alert-danger">{{ $errors->first('word') }}</p>
            @elseif ($errors->has('meaning'))
                <p class="alert alert-danger">{{ $errors->first('meaning') }}</p>
            @endif
        {!! Form::close() !!}

        @foreach ($words as $word)
            <div class="mb-1">
                <strong>{{ $word->name }}</strong> {{ $word->created_at }}
            </div>
            <div class="pl-3">
                {{ $word->word }}
            </div>
            <div class="pl-3">
                {{ $word->meaning }}
            </div>
            <hr>
        @endforeach
    </div>
@endsection