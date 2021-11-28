@extends('layouts.app-master')

@section('content')
<div class="bg-light p-4 rounded">
    <h2>Update Reservation</h2>
    <div class="lead">
        Edit Reservation.
    </div>

    <div class="container mt-4">

        <form method="POST" action="{{ route('reservation.update', $reservation->id) }}" class="needs-validation"
            novalidate>
            @method('patch')
            @csrf
            <fieldset class="border p-2">
                <legend class="float-none w-auto p-2">Reservation Details</legend>

                <div class="row">
                    <div class="col-md-1"></div>
                    <div class="col-md-5 mb-2">
                        <label for="f_name" class="form-label">First Name<span class="text-danger">*</span></label>
                        <input value="{{ $reservation->f_name }}" type="text" class="form-control" name="f_name"
                            placeholder="First Name" required>

                        @if ($errors->has('f_name'))
                        <span class="text-danger text-left">{{ $errors->first('f_name') }}</span>
                        @endif
                    </div>
                    <div class="col-md-5 mb-2">
                        <label for="l_name" class="form-label">Last Name<span class="text-danger">*</span></label>
                        <input value="{{ $reservation->l_name }}" type="text" class="form-control" name="l_name"
                            placeholder="Last Name" required>

                        @if ($errors->has('l_name'))
                        <span class="text-danger text-left">{{ $errors->first('l_name') }}</span>
                        @endif
                    </div>
                    <div class="col-md-1"></div>
                </div>
                <div class="row">
                    <div class="col-md-1"></div>
                    <div class="col-md-5 mb-2">
                        <label for="address" class="form-label">Address<span class="text-danger">*</span></label>
                        <input value="{{ $reservation->address }}" type="text" class="form-control" name="address"
                            placeholder="Address" required>

                        @if ($errors->has('address'))
                        <span class="text-danger text-left">{{ $errors->first('address') }}</span>
                        @endif
                    </div>
                    <div class="col-md-5 mb-2">
                        <label for="zipcode" class="form-label">ZipCode<span class="text-danger">*</span></label>
                        <input value="{{ $reservation->zipcode }}"
                            oninput="this.value = this.value.replace(/[^0-9.]/g, '').replace(/(\..*?)\..*/g, '$1');"
                            type="text" class="form-control" name="zipcode" placeholder="zipcode" required>

                        @if ($errors->has('zipcode'))
                        <span class="text-danger text-left">{{ $errors->first('zipcode') }}</span>
                        @endif
                    </div>
                    <div class="col-md-1"></div>
                </div>
                <div class="row">
                    <div class="col-md-1"></div>
                    <div class="col-md-5 mb-2">
                        <label for="city" class="form-label">City<span class="text-danger">*</span></label>
                        <input value="{{ $reservation->city }}" type="text" class="form-control" name="city"
                            placeholder="City" required>

                        @if ($errors->has('city'))
                        <span class="text-danger text-left">{{ $errors->first('city') }}</span>
                        @endif
                    </div>
                    <div class="col-md-5 mb-2">
                        <label for="state" class="form-label">State<span class="text-danger">*</span></label>
                        <input value="{{ $reservation->state }}" type="text" class="form-control" name="state"
                            placeholder="State" required>

                        @if ($errors->has('state'))
                        <span class="text-danger text-left">{{ $errors->first('state') }}</span>
                        @endif
                    </div>
                    <div class="col-md-1"></div>
                </div>
                <div class="row">
                    <div class="col-md-1"></div>
                    <div class="col-md-5 mb-2">
                        <label for="email" class="form-label">Email Address<span class="text-danger">*</span></label>
                        <input value="{{ $reservation->email }}" type="email" class="form-control" name="email"
                            placeholder="Email Address" required>

                        @if ($errors->has('email'))
                        <span class="text-danger text-left">{{ $errors->first('email') }}</span>
                        @endif
                    </div>
                    <div class="col-md-5 mb-2">
                        <label for="phone" class="form-label">Phone<span class="text-danger">*</span></label>
                        <input value="{{ $reservation->phone }}" type="text"
                            oninput="this.value = this.value.replace(/[^0-9.]/g, '').replace(/(\..*?)\..*/g, '$1');"
                            class="form-control" name="phone" placeholder="Phone" required>

                        @if ($errors->has('phone'))
                        <span class="text-danger text-left">{{ $errors->first('phone') }}</span>
                        @endif
                    </div>
                    <div class="col-md-1"></div>
                </div>
            </fieldset class="border p-2">

            <fieldset class="border p-2">
                <legend class="float-none w-auto p-2">Dates</legend>
                <div class="row">
                    <div class="col-md-1"></div>
                    <div class="col-md-5 mb-2">
                        <label for="checkInDate" class="form-label">Check-in Date<span class="text-danger">*</span></label>
                        <input value="{{ $reservation->checkInDate }}" type="date" class="form-control"
                            name="checkInDate" placeholder="Check-in Date" required>

                        @if ($errors->has('checkInDate'))
                        <span class="text-danger text-left">{{ $errors->first('checkInDate') }}</span>
                        @endif
                    </div>
                    <div class="col-md-5 mb-2">
                        <label for="checkOutDate" class="form-label">Check-Out Date<span class="text-danger">*</span></label>
                        <input value="{{ $reservation->checkOutDate }}" type="date" class="form-control"
                            name="checkOutDate" placeholder="Check-Out Date" required>

                        @if ($errors->has('checkOutDate'))
                        <span class="text-danger text-left">{{ $errors->first('checkOutDate') }}</span>
                        @endif
                    </div>
                    <div class="col-md-1"></div>
                </div>
                <div class="row">
                    <div class="col-md-1"></div>
                    <div class="col-md-5 mb-2">
                        <label for="checkInTime" class="form-label">Check-in Time</label> <br>
                        <select name="checkInTime" id="">
                            <option value="">Select</option>
                            <option {{ ($reservation->checkInTime) == 'Morning' ? 'selected' : '' }} value="Morning">
                                Morning</option>
                            <option {{ ($reservation->checkInTime) == 'Afternoon' ? 'selected' : '' }}
                                value="Afternoon">Afternoon</option>
                            <option {{ ($reservation->checkInTime) == 'Evening' ? 'selected' : '' }} value="Evening">
                                Evening</option>
                        </select>
                        @if ($errors->has('checkInTime'))
                        <span class="text-danger text-left">{{ $errors->first('checkInTime') }}</span>
                        @endif
                    </div>

                    <div class="col-md-5 mb-2">
                        <label for="checkOutTime" class="form-label">Check-Out Time</label><br>
                        <select name="checkOutTime" id="">
                            <option value="">Select</option>
                            <option {{ ($reservation->checkOutTime) == 'Morning' ? 'selected' : '' }} value="Morning">
                                Morning</option>
                            <option {{ ($reservation->checkOutTime) == 'Afternoon' ? 'selected' : '' }}
                                value="Afternoon">Afternoon</option>
                            <option {{ ($reservation->checkOutTime) == 'Evening' ? 'selected' : '' }} value="Evening">
                                Evening</option>
                        </select>
                        @if ($errors->has('checkOutTime'))
                        <span class="text-danger text-left">{{ $errors->first('checkOutTime') }}</span>
                        @endif
                    </div>
                    <div class="col-md-1"></div>
                </div>
                <div class="row">
                    <div class="col-md-1"></div>
                    <div class="col-md-5 mb-2">
                        <label for="forAdults" class="form-label">How many adults are coming?</label> <br>
                        <select name="forAdults" id="">
                            <option value="">Select</option>
                            <option {{ ($reservation->forAdults) == '1' ? 'selected' : '' }} value="1">1</option>
                            <option {{ ($reservation->forAdults) == '2' ? 'selected' : '' }} value="2">2</option>
                            <option {{ ($reservation->forAdults) == '3' ? 'selected' : '' }} value="3">3</option>
                            <option {{ ($reservation->forAdults) == '4' ? 'selected' : '' }} value="4">4</option>
                            <option {{ ($reservation->forAdults) == '5' ? 'selected' : '' }} value="5">5</option>

                        </select>
                        @if ($errors->has('forAdults'))
                        <span class="text-danger text-left">{{ $errors->first('forAdults') }}</span>
                        @endif
                    </div>

                    <div class="col-md-5 mb-2">
                        <label for="forChildren" class="form-label">How many children are coming?</label><br>
                        <select name="forChildren" id="">
                            <option value="">Select</option>
                            <option {{ ($reservation->forChildren) == '1' ? 'selected' : '' }} value="1">1</option>
                            <option {{ ($reservation->forChildren) == '2' ? 'selected' : '' }} value="2">2</option>
                            <option {{ ($reservation->forChildren) == '3' ? 'selected' : '' }} value="3">3</option>
                            <option {{ ($reservation->forChildren) == '4' ? 'selected' : '' }} value="4">4</option>
                            <option {{ ($reservation->forChildren) == '5' ? 'selected' : '' }} value="5">5</option>

                        </select>
                        @if ($errors->has('forChildren'))
                        <span class="text-danger text-left">{{ $errors->first('forChildren') }}</span>
                        @endif
                    </div>
                    <div class="col-md-1"></div>
                </div>
                <div class="row">
                    <div class="col-1"></div>
                    <div class="col-10">
                        <label for="numOfRooms" class="form-label">Number of rooms</label>
                        <input value="{{ $reservation->numOfRooms }}" type="number" class="form-control"
                            name="numOfRooms" placeholder="Number of rooms">

                        @if ($errors->has('numOfRooms'))
                        <span class="text-danger text-left">{{ $errors->first('numOfRooms') }}</span>
                        @endif
                    </div>
                    <div class="col-1"></div>
                </div>
                <div class="row">
                    <div class="col-md-1"></div>
                    <div class="col-md-5 mb-2">
                        <label for="roomTypeOne" class="form-label">Room 1 type</label> <br>
                        <select name="roomTypeOne" id="">
                            <option value="">Select</option>
                            <option {{ ($reservation->roomTypeOne) == 'Standard' ? 'selected' : '' }} value="Standard">
                                Standard</option>


                            <option {{ ($reservation->roomTypeOne) == 'Deluxe' ? 'selected' : '' }} value="Deluxe">
                                Deluxe</option>
                            <option {{ ($reservation->roomTypeOne) == 'Suite' ? 'selected' : '' }} value="Suite">Suite
                            </option>

                        </select>
                        @if ($errors->has('roomTypeOne'))
                        <span class="text-danger text-left">{{ $errors->first('roomTypeOne') }}</span>
                        @endif
                    </div>

                    <div class="col-md-5 mb-2">
                        <label for="roomTypeTow" class="form-label">Room 2 type</label><br>
                        <select name="roomTypeTow" id="">
                            <option value="">Select</option>
                            <option {{ ($reservation->roomTypeTow) == 'Standard' ? 'selected' : '' }} value="Standard">
                                Standard</option>


                            <option {{ ($reservation->roomTypeTow) == 'Deluxe' ? 'selected' : '' }} value="Deluxe">
                                Deluxe</option>
                            <option {{ ($reservation->roomTypeTow) == 'Suite' ? 'selected' : '' }} value="Suite">Suite
                            </option>
                        </select>
                        @if ($errors->has('roomTypeTow'))
                        <span class="text-danger text-left">{{ $errors->first('roomTypeTow') }}</span>
                        @endif
                    </div>
                    <div class="col-md-1"></div>
                </div>

                <div class="row">
                    <div class="col-1"></div>
                    <div class="col-10">
                        <label for="specialInstructions" class="form-label">Special Instructions</label>
                        <input value="{{ $reservation->specialInstructions }}" type="text" class="form-control"
                            name="specialInstructions" placeholder="Special Instructions">

                        @if ($errors->has('specialInstructions'))
                        <span class="text-danger text-left">{{ $errors->first('specialInstructions') }}</span>
                        @endif
                    </div>
                    <div class="col-1"></div>
                </div>
            </fieldset>


            <button type="submit" class="btn btn-primary">Save changes</button>
            <a href="{{ route('reservation.index') }}" class="btn btn-default">Back</a>
        </form>
    </div>

</div>
@endsection