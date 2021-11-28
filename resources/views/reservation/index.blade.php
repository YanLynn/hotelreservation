@extends('layouts.app-master')

@section('content')
    

    <div class="bg-light p-4 rounded">
        <h2>Reservation</h2>
        <div class="lead">
        @auth
        @hasanyrole('Manager|Admin')
        <a href="{{ route('reservation.exportCSV') }}" class="btn btn-primary btn-sm float-left">Export CSV</a>
        <a href="{{ route('reservation.create') }}" class="btn btn-primary btn-sm float-right">Add reservation</a>
        @else
        <a href="{{ route('reservation.create') }}" class="btn btn-primary btn-sm float-left">Add reservation</a>
        @endhasanyrole
        @endauth
        </div>
        <div class="mt-2">
            @include('layouts.partials.messages')
        </div>
        <div class="table-responsive">

        
        <table class="table table-bordered">
          <tr>
             <th width="1%">No</th>
             <th>First_Name</th>
             <th>Last_Name</th>
             <th>Address</th>
             <th>Zip_Code</th>
             <th>Email_Address</th>
             <th>Phone</th>
             <th>City</th>
             <th>State</th>
             <th>Check-in_Date</th>
             <th>Check-out_Date</th>
             <th>Check-in_Time</th>
             <th>Check-out_Time</th>
             <th>Adults_are_coming</th>
             <th>Children_are_coming</th>
             <th>Numbers of Room</th>
             <th>Room_1_type</th>
             <th>Room_2_type</th>
             <th>Special_Instructions</th>
             
             <th width="3%" colspan="3">Action</th>
          </tr>
         
            @foreach ($reservation as $key => $reservation)
            <tr>
                <td>{{ $reservation->id }}</td>
                <td>{{ $reservation->f_name }}</td>
                <td>{{ $reservation->l_name }}</td>
                <td>{{ $reservation->address }}</td>
                <td>{{ $reservation->zipcode }}</td>
                <td>{{ $reservation->email }}</td>
                <td>{{ $reservation->phone }}</td>
                <td>{{ $reservation->city }}</td>
                <td>{{ $reservation->state }}</td>
                <td>{{ $reservation->checkInDate }}</td>
                <td>{{ $reservation->checkOutDate }}</td>
                <td>{{ $reservation->checkInTime }}</td>
                <td>{{ $reservation->checkOutTime }}</td>
                <td>{{ $reservation->forAdults }}</td>
                <td>{{ $reservation->forChildren }}</td>
                <td>{{ $reservation->numOfRooms }}</td>
                <td>{{ $reservation->roomTypeOne }}</td>
                <td>{{ $reservation->roomTypeTow }}</td>
                <td>{{ $reservation->specialInstructions }}</td>
               

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
      

    </div>
@endsection