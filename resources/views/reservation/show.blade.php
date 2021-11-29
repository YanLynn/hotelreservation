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
                                    <td>{{$reservation->checkInTime ?? '-'}}</td>
                                   

                                </tr>
                                <tr>
                                    <td>Check Out Time</td>
                                    <td>{{$reservation->checkOutTime ?? '-'}}</td>
                                    
                                </tr>
                                <tr>
                                    <td>Number of Adults</td>
                                    <td>{{$reservation->forAdults ?? '-'}}</td>
                                   
                                </tr>
                                <tr>
                                    <td>Number of Children</td>
                                    <td>{{$reservation->forChildren ?? '-'}}</td>
                                   
                                </tr>
                                <tr>
                                    <td>Number of rooms</td>
                                    <td>{{$reservation->numOfRooms ?? '-'}}</td>
                                   
                                </tr>
                                <tr>
                                    <td>Room One Type</td>
                                    <td>{{$reservation->roomTypeOne ?? '-'}}</td>
                                    
                                </tr>
                                <tr>
                                    <td>Room Two Type</td>
                                    <td>{{$reservation->roomTypeTow ?? '-'}}</td>
                                   
                                </tr>
                                <tr>
                                    <td>Special Instructions</td>
                                    <td>{{$reservation->specialInstructions ?? '-'}}</td>
                                   
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