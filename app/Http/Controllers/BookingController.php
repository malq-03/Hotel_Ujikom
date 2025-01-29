<?php

namespace App\Http\Controllers;

use App\Models\booking;
use Illuminate\Http\Request;

class BookingController extends Controller
{
    public function add_booking(Request $request, $id) {
        $data = new booking;
        $data -> room_id = $id;
        $data -> nama = $request->nama;
        $data -> email = $request->email;
        $data -> telpon = $request->telpon;
        $data -> start_date = $request->startDate;
        $data -> end_date = $request->endDate;
        $data->save();

        return redirect()->back();
    }
}
