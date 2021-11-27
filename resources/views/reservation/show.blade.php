@extends('layouts.app-master')

@section('content')
    <div class="bg-light p-4 rounded">
        <h2>Show Reservation</h2>
        <div class="lead">
            
        </div>
        
        <div class="container mt-4">
            <div>
                Title: {{ $reservation->title }}
            </div>
            <div>
                Description: {{ $reservation->description }}
            </div>
            <div>
                Body: {{ $reservation->body }}
            </div>
        </div>

    </div>
    <div class="mt-4">
        <a href="{{ route('reservation.edit', $reservation->id) }}" class="btn btn-info">Edit</a>
        <a href="{{ route('reservation.index') }}" class="btn btn-default">Back</a>
    </div>
@endsection