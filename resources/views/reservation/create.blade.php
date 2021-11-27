@extends('layouts.app-master')

@section('content')
<div class="bg-light p-4 rounded">

    <div class="container mt-4">

        <form method="POST" action="{{ route('reservation.store') }}">
            @csrf
            <fieldset class="border p-2">
                <legend class="float-none w-auto p-2">Reservation Details</legend>

                <div class="row">
                    <div class="col-md-1"></div>
                    <div class="col-md-5 mb-2">
                        <label for="f_name" class="form-label">First Name</label>
                        <input value="{{ old('f_name') }}" type="text" class="form-control" name="f_name"
                            placeholder="First Name" required>

                        @if ($errors->has('f_name'))
                        <span class="text-danger text-left">{{ $errors->first('f_name') }}</span>
                        @endif
                    </div>
                    <div class="col-md-5 mb-2">
                        <label for="l_name" class="form-label">Last Name</label>
                        <input value="{{ old('l_name') }}" type="text" class="form-control" name="l_name"
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
                        <label for="address" class="form-label">Address</label>
                        <input value="{{ old('address') }}" type="text" class="form-control" name="address"
                            placeholder="Address" required>

                        @if ($errors->has('address'))
                        <span class="text-danger text-left">{{ $errors->first('address') }}</span>
                        @endif
                    </div>
                    <div class="col-md-5 mb-2">
                        <label for="zipcode" class="form-label">ZipCode</label>
                        <input value="{{ old('zipcode') }}" type="text" class="form-control" name="zipcode"
                            placeholder="zipcode" required>

                        @if ($errors->has('zipcode'))
                        <span class="text-danger text-left">{{ $errors->first('zipcode') }}</span>
                        @endif
                    </div>
                    <div class="col-md-1"></div>
                </div>
            </fieldset>

            <div class="mb-3">
                <label for="body" class="form-label">Body</label>
                <textarea class="form-control" name="body" placeholder="Body" required>{{ old('body') }}</textarea>

                @if ($errors->has('body'))
                <span class="text-danger text-left">{{ $errors->first('body') }}</span>
                @endif
            </div>


            <button type="submit" class="btn btn-primary">Save role</button>
            <a href="{{ route('reservation.index') }}" class="btn btn-default">Back</a>
        </form>
    </div>

</div>
@endsection