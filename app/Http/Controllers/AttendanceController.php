<?php

namespace App\Http\Controllers;

use App\Models\Attendance;
use Illuminate\Http\Request;

class AttendanceController extends Controller
{
    // Menampilkan semua data absensi
    public function index()
    {
        $attendances = Attendance::all();
        return response()->json($attendances);
    }

    // Menampilkan absensi berdasarkan ID
    public function show($id)
    {
        $attendance = Attendance::find($id);
        if ($attendance) {
            return response()->json($attendance);
        } else {
            return response()->json(['message' => 'Attendance not found'], 404);
        }
    }

    // Menambahkan absensi baru
    public function store(Request $request)
    {
        $request->validate([
            'user_id' => 'required|integer',
            'status' => 'required|string',
            'date' => 'required|date',
            'time_in' => 'nullable',
            'time_out' => 'nullable',
        ]);

        $attendance = Attendance::create([
            'user_id' => $request->user_id,
            'status' => $request->status,
            'date' => $request->date,
            'time_in' => $request->time_in,
            'time_out' => $request->time_out,
        ]);

        return response()->json($attendance, 201);
    }

    // Memperbarui absensi berdasarkan ID
    public function update(Request $request, $id)
    {
        $attendance = Attendance::find($id);

        if ($attendance) {
            $attendance->update($request->all());
            return response()->json($attendance);
        } else {
            return response()->json(['message' => 'Attendance not found'], 404);
        }
    }

    // Menghapus absensi berdasarkan ID
    public function destroy($id)
    {
        $attendance = Attendance::find($id);

        if ($attendance) {
            $attendance->delete();
            return response()->json(['message' => 'Attendance deleted successfully']);
        } else {
            return response()->json(['message' => 'Attendance not found'], 404);
        }
    }
}

