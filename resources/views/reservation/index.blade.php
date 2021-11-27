@extends('layouts.app-master')

@section('content')
    

    <div class="bg-light p-4 rounded">
        <h2>Reservation</h2>
        <div class="lead">
            Manage your Reservation here.
            <a href="{{ route('reservation.create') }}" class="btn btn-primary btn-sm float-right">Add reservation</a>
        </div>
        
        <div class="mt-2">
            @include('layouts.partials.messages')
        </div>

        <table class="table table-bordered">
          <tr>
             <th width="1%">No</th>
             <th>Name</th>
             <th width="3%" colspan="3">Action</th>
          </tr>
            @foreach ($reservation as $key => $reservation)
            <tr>
                <td>{{ $reservation->id }}</td>
                <td>{{ $reservation->title }}</td>
                <td>
                    <a class="btn btn-info btn-sm" href="{{ route('reservation.show', $reservation->id) }}">Show</a>
                </td>
                <td>
                    <a class="btn btn-primary btn-sm" href="{{ route('reservation.edit', $reservation->id) }}">Edit</a>
                </td>
                <td>
                    {!! Form::open(['method' => 'DELETE','route' => ['reservation.destroy', $reservation->id],'style'=>'display:inline']) !!}
                    {!! Form::submit('Delete', ['class' => 'btn btn-danger btn-sm']) !!}
                    {!! Form::close() !!}
                </td>
            </tr>
            @endforeach
        </table>

      

    </div>
@endsection