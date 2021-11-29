@extends('layouts.app-master')

@section('content')
<div class="bg-light p-4 rounded">


    <div class="container mt-4">

        <div class="card">
            <div class="card-header">
                Show Reservation
            </div>
            <div class="card-body">
                <div class="row">
                    <center>
                        <div class="col-md-6">
                            <table class="table table-hover">
                                <tr>
                                    <td>First Name</td>
                                    <td>{{ $reservation->f_name }}</td>
                                </tr>
                                <tr>
                                    <td>Last Name</td>
                                    <td>{{ $reservation->l_name }}</td>
                                </tr>
                                <tr>
                                    <td>Address</td>
                                    <td>{{ $reservation->address }}</td>
                                </tr>
                                <tr>
                                    <td>ZipCode</td>
                                    <td>{{ $reservation->zipcode }}</td>
                                </tr>
                                <tr>
                                    <td>Email</td>
                                    <td>{{ $reservation->email }}</td>
                                </tr>
                                <tr>
                                    <td>Phone</td>
                                    <td>{{ $reservation->phone }}</td>
                                </tr>
                                <tr>
                                    <td>City</td>
                                    <td>{{ $reservation->city }}</td>
                                </tr>
                                <tr>
                                    <td>State</td>
                                    <td>{{ $reservation->state }}</td>
                                </tr>
                                <tr>
                                    <td>Check In Date</td>
                                    <td>{{ $reservation->checkInDate }}</td>
                                </tr>
                                <tr>
                                    <td>Check Out Date</td>
                                    <td>{{ $reservation->checkOutDate }}</td>
                                </tr>
                                <tr>
                                    <td>Check In Time</td>
                                    @if(isset($reservation->checkInTime))
                                    <td>{{ $reservation->checkInTime}}</td>
                                    @else
                                    <td>-</td>
                                    @endif

                                </tr>
                                <tr>
                                    <td>Check Out Time</td>
                                   
                                    @if(isset($reservation->checkOutTime))
                                    <td>{{ $reservation->checkOutTime}}</td>
                                    @else
                                    <td>-</td>
                                    @endif
                                </tr>
                                <tr>
                                    <td>Number of Adults</td>
                                    @if(isset($reservation->forAdults))
                                    <td>{{ $reservation->forAdults}}</td>
                                    @else
                                    <td>-</td>
                                    @endif
                                </tr>
                                <tr>
                                    <td>Number of Children</td>
                                   
                                    @if(isset($reservation->forChildren))
                                    <td>{{ $reservation->forChildren}}</td>
                                    @else
                                    <td>-</td>
                                    @endif
                                </tr>
                                <tr>
                                    <td>Number of rooms</td>
                                    @if(isset($reservation->numOfRooms))
                                    <td>{{ $reservation->numOfRooms}}</td>
                                    @else
                                    <td>-</td>
                                    @endif
                                </tr>
                                <tr>
                                    <td>Room One Type</td>
                                    @if(isset($reservation->roomTypeOne))
                                    <td>{{ $reservation->roomTypeOne}}</td>
                                    @else
                                    <td>-</td>
                                    @endif
                                </tr>
                                <tr>
                                    <td>Room Two Type</td>
                                    @if(isset($reservation->roomTypeTow))
                                    <td>{{ $reservation->roomTypeTow}}</td>
                                    @else
                                    <td>-</td>
                                    @endif
                                </tr>
                                <tr>
                                    <td>Special Instructions</td>
                                    @if(isset($reservation->specialInstructions))
                                    <td>{{ $reservation->specialInstructions}}</td>
                                    @else
                                    <td>-</td>
                                    @endif
                                </tr>
                            </table>
                        </div>
                    </center>
                </div>
            </div>
            <div class="card-footer text-muted">
                <a href="{{ route('reservation.edit', $reservation->id) }}" class="btn btn-info">Edit</a>
                <a href="{{ route('reservation.index') }}" class="btn btn-default">Back</a>
            </div>
        </div>

    </div>

</div>

@endsection