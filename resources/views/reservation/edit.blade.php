@extends('layouts.app-master')

@section('content')
    <div class="bg-light p-4 rounded">
        <h2>Update Reservation</h2>
        <div class="lead">
            Edit Reservation.
        </div>

        <div class="container mt-4">

            <form method="POST" action="{{ route('reservation.update', $reservation->id) }}">
                @method('patch')
                @csrf
                <div class="mb-3">
                    <label for="title" class="form-label">Title</label>
                    <input value="{{ $reservation->title }}" 
                        type="text" 
                        class="form-control" 
                        name="title" 
                        placeholder="Title" required>

                    @if ($errors->has('title'))
                        <span class="text-danger text-left">{{ $errors->first('title') }}</span>
                    @endif
                </div>

                <div class="mb-3">
                    <label for="description" class="form-label">Description</label>
                    <input value="{{ $reservation->description }}" 
                        type="text" 
                        class="form-control" 
                        name="description" 
                        placeholder="Description" required>

                    @if ($errors->has('description'))
                        <span class="text-danger text-left">{{ $errors->first('description') }}</span>
                    @endif
                </div>

                <div class="mb-3">
                    <label for="body" class="form-label">Body</label>
                    <textarea
                        type="text" 
                        class="form-control" 
                        name="body" 
                        placeholder="Body" required>{{ $reservation->body }}</textarea>

                    @if ($errors->has('body'))
                        <span class="text-danger text-left">{{ $errors->first('body') }}</span>
                    @endif
                </div>
                

                <button type="submit" class="btn btn-primary">Save changes</button>
                <a href="{{ route('reservation.index') }}" class="btn btn-default">Back</a>
            </form>
        </div>

    </div>
@endsection