<?php

namespace App\Http\Controllers;

use App\Models\Reservation;
use Illuminate\Http\Request;

class ReservationController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $reservation = Reservation::latest()->paginate(10);

        return view('reservation.index', compact('reservation'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('reservation.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
    
        Reservation::create(array_merge($request->only('f_name', 'l_name', 'address','zipcode','email',
        'city','state',
        'phone','checkInDate','checkOutDate','checkInTime','checkOutTime','forAdults',
        'forChildren','numOfRooms','roomTypeOne','roomTypeTow','specialInstructions'),[
            'user_id' => auth()->id()
        ]));

        return redirect()->route('reservation.index')
            ->withSuccess(__('reservation created successfully.'));
    }

   
    public function show(Reservation $reservation)
    {
        return view('reservation.show', [
            'reservation' => $reservation
        ]);
    }

   
    public function edit(Reservation $reservation)
    {
        return view('reservation.edit', [
            'reservation' => $reservation
        ]);
    }

  
    public function update(Request $request, Reservation $reservation)
    {
        $reservation->update($request->only('f_name', 'l_name', 'address','zipcode','email',
        'city','state',
        'phone','checkInDate','checkOutDate','checkInTime','checkOutTime','forAdults',
        'forChildren','numOfRooms','roomTypeOne','roomTypeTow','specialInstructions'));

        return redirect()->route('reservation.index')
            ->withSuccess(__('reservation updated successfully.'));
    }

    
    public function destroy(Reservation $reservation)
    {
        $reservation->delete();

        return redirect()->route('reservation.index')
            ->withSuccess(__('reservation deleted successfully.'));
    }

    public function exportCSV()
    {
        $fileName = "reservationCSV.csv";
        $reservation = Reservation::all();

        $headers = array(
            "Content-type"        => "text/csv",
            "Content-Disposition" => "attachment; filename=$fileName",
            "Pragma"              => "no-cache",
            "Cache-Control"       => "must-revalidate, post-check=0, pre-check=0",
            "Expires"             => "0"
        );

       

        $columns = array('First Name', 'Last Name', 'Address', 'Zipcode', 'Email','City','State',
                        'Phone','Check in Date','Check out Date','Check in Time','Check out Time','Adults are comming',
                        'Children are comming','Number of rooms','ooms type one','Rooms type tow','Special Instructions');

        $callback = function() use($reservation, $columns) {
            $file = fopen('php://output', 'w');
            fputcsv($file, $columns);

            foreach ($reservation as $reservation) {
                $row['First Name']  = $reservation->f_name;
                $row['Last Name']    = $reservation->l_name;
                $row['Address']    = $reservation->address;
                $row['Zipcode']  = $reservation->zipcode;
                $row['Email']  = $reservation->email;
                $row['City']  = $reservation->city;
                $row['State']  = $reservation->state;
                $row['Phone']  = $reservation->phone;
                $row['Check in Date']  = $reservation->checkInDate;
                $row['Check out Date']  = $reservation->checkOutDate;
                $row['Check in Time']  = $reservation->checkInTime;
                $row['Check out Time']  = $reservation->checkOutTime;
                $row['Adults are comming']  = $reservation->forAdults;
                $row['Children are comming']  = $reservation->forChildren;
                $row['Number of rooms']  = $reservation->numOfRooms;
                $row['Rooms type one']  = $reservation->roomTypeOne;
                $row['Rooms type tow']  = $reservation->roomTypeTow;
                $row['Special Instructions']  = $reservation->specialInstructions;

                fputcsv($file, array(
                    $row['First Name'],
                    $row['Last Name'],
                    $row['Address'],
                    $row['Zipcode'],
                    $row['Email'],
                    $row['City'],
                    $row['State'],
                    $row['Phone'],
                    $row['Check in Date'],
                    $row['Check out Date'], 
                    $row['Check in Time'],
                    $row['Check out Time'],
                    $row['Adults are comming'],
                    $row['Children are comming'], 
                    $row['Number of rooms'],
                    $row['Rooms type one'],
                    $row['Rooms type tow'],
                    $row['Special Instructions'] 
                ));
            }

            fclose($file);
        };
        return response()->stream($callback, 200, $headers);
    }
}