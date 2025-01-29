<?php

namespace App\Http\Controllers;

use App\Models\room;
use App\Models\booking;
use Illuminate\Http\Request;
use App\Http\Controllers\RoomController;

class HomeController extends Controller
{
    public function add_booking(Request $request, $id) {

        $request->validate( [
            'startDate' => 'required|date',
            'endDate' => 'date|after:startDate',
        ], [
            'startDate.required' => 'Tanggal mulai harus diisi.',
            'startDate.date' => 'Tanggal mulai harus berupa tanggal yang valid.',
            'endDate.date' => 'Tanggal akhir harus berupa tanggal yang valid.',
            'endDate.after' => 'Tanggal akhir harus setelah tanggal mulai',
        ]);

        $data = new booking;
        $data -> room_id = $id;
        $data -> nama = $request->nama;
        $data -> email = $request->email;
        $data -> telpon = $request->telpon;

        $startDate = $request->startDate;
        $endDate = $request->endDate;
        $isBooked = booking::where('room_id', $id)->where('start_date', '<=', $endDate)->where('end_date','>=',$startDate)->exists();
        if($isBooked)
        {
            return redirect()->back()->with('message', 'Kamar sudah dibooking pada tanggal tersebut');
        }else{
            $data -> start_date = $request->startDate;
            $data -> end_date = $request->endDate;
            $data->save();
            return redirect()->back()->with('message', 'Kamar berhasil dipesan');
        }
    }
}
