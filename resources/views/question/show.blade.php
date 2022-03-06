@extends('layouts.main')

@section('title')
    {{ $question->body }}
@endsection

@section('content')
    <h2 class="bg-primary text-white p-3 mb-3">{{ $question->body }}</h2>

    @forelse ($answers as $answer)
        <h4>{{ $answer->body }}</h4>
        <div class="border-bottom mt-3 pb-3 mb-3">
            <em>
                Posted on {{ date_format($answer->created_at, 'n/j/Y') }} at
                {{ date_format($answer->created_at, 'g:i A') }}
            </em>
        </div>
    @empty
        <p class="border-bottom pb-3 font-weight-bold">
            No answers yet! Be the first to answer by using the form below.
        </p>
    @endforelse

    <form class="mt-3" action="{{ route('answer.store', $question->id) }}" method="POST">
        @csrf

        <div class="form-group mb-3">
            <textarea
                name="answer"
                class="form-control">{{ old('answer') }}</textarea>

            @error('answer')
                <small class="text-danger">
                    {{ $message }}
                </small>
            @enderror
        </div>

        <button class="btn btn-primary" type="submit">
            Answer question
        </button>
    </form>
@endsection
