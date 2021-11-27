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
        Reservation::create(array_merge($request->only('title', 'description', 'body'),[
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
        $reservation->update($request->only('title', 'description', 'body'));

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
        $columns = array('Title', 'Description', 'Body', 'Created_at', 'Updated_at');

        $callback = function() use($reservation, $columns) {
            $file = fopen('php://output', 'w');
            fputcsv($file, $columns);

            foreach ($reservation as $reservation) {
                $row['Title']  = $reservation->title;
                $row['Description']    = $reservation->description;
                $row['Body']    = $reservation->body;
                $row['Created_at']  = $reservation->created_at;
                $row['Updated_at']  = $reservation->updated_at;

                fputcsv($file, array($row['Title'], $row['Description'], $row['Body'], $row['Created_at'], $row['Updated_at']));
            }

            fclose($file);
        };
        return response()->stream($callback, 200, $headers);
    }
}