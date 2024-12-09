<?php

namespace App\Http\Controllers\api;

use Illuminate\Http\Request;
use App\Models\Layanan;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;


class LayananController extends Controller
{
    /**
     * Mendapatkan data layanan berdasarkan tipe.
     *
     * @param string $type
     * @return \Illuminate\Http\JsonResponse
     */
    public function getSection($type)
    {
        // Ambil data layanan berdasarkan tipe
        $layanan = Layanan::where('type', $type)->first();

        if (!$layanan) {
            return response()->json([
                'error' => 'Data not found.',
            ], 404);
        }

        return response()->json([
            'type' => $type,
            'data' => $layanan->data,
        ], 200);
    }

    
    public function updateSection(Request $request, $type)
{
    // Validasi data input
    $validator = Validator::make($request->all(), [
        'index' => 'required|array', // Pastikan index adalah array
        'index.*' => 'integer',      // Setiap item dalam index harus integer
        'value' => 'required|array', // Pastikan value adalah array
        'value.*' => 'string',       // Setiap item dalam value harus string
        'deletedIndices' => 'nullable|array', // Indeks untuk data yang akan dihapus
        'deletedIndices.*' => 'integer',
        'newItems' => 'nullable|array', // Data baru yang akan ditambahkan
        'newItems.*' => 'string',
    ]);
    

    // Menangani kesalahan validasi
    if ($validator->fails()) {
        return response()->json([
            'errors' => $validator->errors(),
        ], 422);
    }

    // Mendapatkan data layanan berdasarkan type
    $layanan = Layanan::where('type', $type)->first();

    if (!$layanan) {
        return response()->json([
            'message' => 'Data not found.',
        ], 404);
    }

    // Mengambil data yang ada
    $data = $layanan->data;

    // Periksa dan hapus data berdasarkan deletedIndices
    if ($request->has('deletedIndices')) {
        foreach ($request->input('deletedIndices') as $deleteIndex) {
            if (isset($data[$deleteIndex])) {
                unset($data[$deleteIndex]);
            }
        }

        // Reset array keys agar konsisten
        $data = array_values($data);
    }

   // Hanya tambahkan data baru jika benar-benar ada newItems
if ($request->has('newItems')) {
    foreach ($request->input('newItems') as $newItem) {
        if (!in_array($newItem, $data)) {
            $data[] = $newItem;
        }
    }
}

// Hanya update data yang sudah ada
if ($request->has('index') && $request->has('value')) {
    foreach ($request->input('index') as $key => $i) {
        if (isset($data[$i])) {
            $data[$i] = $request->input('value')[$key];
        }
    }
}



foreach ($request->input('index') as $key => $i) {
    if (!array_key_exists($i, $data)) {
        return response()->json([
            'message' => 'Invalid index for update.',
        ], 422);
    }
    $data[$i] = $request->input('value')[$key];
}




    // Simpan data yang telah diperbarui
    $layanan->data = $data;
    $layanan->save();

    return response()->json([
        'message' => 'Data updated successfully.',
        'updatedData' => $layanan->data,
    ], 200);
}


    
}