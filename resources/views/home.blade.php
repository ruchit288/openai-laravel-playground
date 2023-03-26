@extends('app')

@section('content')
    <div class="container p-5">
        <img src="{{asset('image/openai.png')}}" class="m-5 p-5" id="img" alt="OpenAi Image">
        <div class=" col-6 mx-auto ">
            <a href="{{route('openai-demo')}}" class="btn btn-secondary mt-3 border-3 border-dark" id="button" type="button">Click Here To See Demo</a>
        </div>
    </div>
@endsection
