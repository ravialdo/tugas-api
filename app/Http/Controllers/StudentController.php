<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Alert;

use App\Student;

class StudentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
         $data = [
            'students' => Student::paginate(5),
            'total_data' => Student::all()
         ];
        return view('welcome', $data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {     
        $student = Student::create([
            'nis' => $request->nis,
            'student_name' => $request->nama_siswa,
            'class' => $request->kelas,
            'address' => $request->alamat,
            'number_phone' => $request->nomor_hp
         ]);
         
         alert()->success('Data Berhasil di Tambahkan', 'Berhasil!')->persistent('OK');
    
         return redirect()->back();
   }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        Student::find($id)->update([
            'nis' => $request->nis,
            'student_name' => $request->nama_siswa,
            'class' => $request->kelas,
            'address' => $request->alamat,
            'number_phone' => $request->nomor_hp
        ]);
      
         alert()->success('Data Berhasil di Ubah', 'Berhasil!')->persistent('OK');
         
         return redirect()->back();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Student::find($id)->delete();
      
        alert()->success('Data Berhasil di Hapus', 'Berhasil!')->persistent('OK');
    
         return redirect()->back();
   }
}
