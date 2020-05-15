<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Hasil;

class TranslateController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
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
        $hasil = new Hasil;

        if ($request->hasFile('file')) {
            // Mengambil file yang diupload
            $uploaded_upload = $request->file('file');
            // Mengambil extension file
            $extension = $uploaded_upload->getClientOriginalExtension();
            // Membuat nama file random berikut extension
            $filename = md5(time()) . "." . $extension;
            // Menyimpan log ke folder public/log
            $destinationPath = public_path() . DIRECTORY_SEPARATOR . 'hasil';
            $uploaded_upload->move($destinationPath, $filename);
            // Mengisi field upload di tabel log dengan filename yang baru dibuat
            $hasil->file = $filename;
            try{
                $hasil->save();
            }catch(\Exception $e){
                return response()->json(['error' => true, 'message' => $e->getMessage()]);
            }
            return response()->json(['error' => false, 'message' => 'berhasil dikirim']);
        }
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
