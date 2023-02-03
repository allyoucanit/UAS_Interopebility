<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Apotek;
use Illuminate\Support\Facades\Auth;

class ApotekController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    public function create(Request $request)
    {
        $create = new Apotek();
        $create->kode_obat = $request->kode_obat;
        $create->nama_obat = $request->nama_obat;
        $create->harga_beli = $request->harga_beli;
        $create->harga_jual = $request->harga_jual;
        $create->stock = $request->stock;
        $create->satuan = $request->satuan;
        $result = $create->save();

        if($result){
        $response = [
            'status' => 'successful',
            'message' => 'Berhasil Tambah Data'
        ];
    }else{
        $response = [
            'status' => 'unsuccessful',
            'message' => 'Gagal Tambah Data'
        ];
    }

    return response($response);
}

public function index(Request $request) 
    {
        $data = Restaurant::Where(['id' => Auth::user()->id])->OrderBy("id", "DESC")->paginate(2)->toArray();
        $response = [
            "total_count" => $data["total"],
            "limit" => $data["per_page"],
            "pagination" => [
                "next_page" => $data["next_page_url"],
                "current_page" => $data["current_page"]
            ],
            "data" => $data["data"],
        ];
        return response()->json($response, 200);
    }
    
public function show()
{
    $data = Apotek::all();
    $response = [
        'data' => $data
    ];

    return response($response);
}

public function showDetail($id)
{
    $data = Apotek::where('id', $id)->first();
    if($data){
        $response = [
            'status' => 'successful',
            'message' => 'Data Obat ditemukan',
            'data' => $data
        ];
    }else{
        $response = [
            'status' => 'unsuccessful',
            'message' => 'Data Obat tidak ditemukan',
            'data' => $data
        ];
    }

    return response($response);
}

public function update(Request $request, $id)
{
    $data = Apotek::find($id);
    $update = $data->update([
        'kode_obat' => $request->kode_obat,
        'nama_obat' => $request->nama_obat,
        'harga_beli' => $request->harga_beli,
        'harga_jual' => $request->harga_jual,
        'stock' => $request->stock,
        'satuan' => $request->satuan
    ]);

    if($update){
        $response = [
            'status' => 'successful',
            'message' => 'Berhasil Update Data'
        ];
    }else{
        $response = [
            'status' => 'unsuccessful',
            'message' => 'Gagal Update Data'
        ];
    }

    return response($response);
}

public function delete($id)
{
    $data = Apotek::find($id);
    $data->delete();
    return response()->json([
        'messages' => 'data deleted'
    ]);
}

}
