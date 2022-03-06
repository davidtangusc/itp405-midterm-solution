@extends('layouts.main')

@section('title', 'Home')

@section('content')
    <form class="pb-3 border-bottom mb-3" action="{{ route('question.store') }}" method="POST">
        @csrf

        <div class="form-group mb-3">
            <textarea
                name="question"
                class="form-control"
                placeholder="What is your favorite movie?">{{ old('question') }}</textarea>

            @error('question')
                <small class="text-danger">
                    {{ $message }}
                </small>
            @enderror
        </div>
        <button class="btn btn-primary" type="submit">
            Ask away
        </button>
    </form>

    <h2 class="mb-3 p-3 bg-primary text-white">Questions</h2>

    @forelse ($questions as $question)
        <div class="d-flex justify-content-between align-items-center">
            <h3 class="m-0">
                <a href="{{ route('question.show', $question->id) }}" class="text-dark">
                    {{ $question->body }}
                </a>
            </h3>
            <div class="ml-3">
                <span class="badge bg-primary">
                    {{ count($question->answers) }} answers
                </span>
            </div>
        </div>
        <div class="mt-3 pb-3 mb-3">
            <em>
                Posted on {{ date_format($question->created_at, 'n/j/Y') }} at
                {{ date_format($question->created_at, 'g:i A') }}
            </em>
        </div>
    @empty
        <p class="font-weight-bold">
            No questions yet :(
        </p>
    @endforelse
@endsection
