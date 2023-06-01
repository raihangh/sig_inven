<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Barangs;
use App\Models\KodeBarang;

class BarangController extends Controller
{
    private $barang;

    public function __construct()
    {
        $this->barang = new Barangs();
    }

    public function getAllBarang()
    {
        $data = $this->barang->all();
        return view('barang.index', ['data' => $data]);
    }

    public function postKodeBarang(Request $request)
    {
        // Validate the request data
        $validatedData = $request->validate([
            'kode_barang' => 'required|unique:kode_barangs',
            'kategori' => 'required'
        ]);

        // Insert the product code into the database
        try {
            $product = new KodeBarang();
            $product->kode_barang = $validatedData['kode_barang'];
            $product->kategori = $validatedData['kategori'];
            $product->save();
            // Set success message
            $message = 'Product code inserted successfully';
        } catch (\Exception $e) {
            // Set error message
            $message = 'Error inserting product code: ' . $e->getMessage();
        }
        // Flash the message to the session
        return back()->with('pesanKodeBarang', $message);
    }

    public function postBarang(Request $request)
    {
        // Validate the request data
        $validatedData = $request->validate([
            'nama_barang' => 'required',
            'kode_barang' => 'required',
            'harga' => 'required|numeric',
            'quantity' => 'required|numeric',
            'quantity_pack' => 'required|numeric',
            'status' => 'required|numeric',
        ]);
        try {
            // Create a new instance of the model
            $model = new Barangs();
            // Assign values from the validated request data to the model's properties
            $model->nama_barang = $validatedData['nama_barang'];
            $model->kode_barang = $validatedData['kode_barang'];
            $model->harga = $validatedData['harga'];
            $model->quantity = $validatedData['quantity'];
            $model->quantity_pack = $validatedData['quantity_pack'];
            $model->status = $validatedData['status'];
            $model->save();
            // Set success message
            $message = 'Product code inserted successfully';
        } catch (\Exception $e) {
            // Set error message
            $message = 'Error inserting product code: ' . $e->getMessage();
        }
        // Save the model to insert the data
        return back()->with('pesanBarang', $message);
    }

    public function editBarang(Request $request, string $id)
    {
        $barang = Barangs::find($id);
        if (!$barang) {
            // Handle the case where the barang is not found
            // You can return an error message or redirect as needed
            abort(404, 'Barang not found');
        }

        return view('pages/dashboard_barang_edit', ['title' => "edit barang", 'barang' => $barang]);
    }

    public function aksiEditBarang(Request $request, $id)
    {
        // Retrieve the barang by its ID
        $barang = Barangs::find($id);

        if (!$barang) {
            // Handle the case where the barang is not found
            // You can return an error message or redirect as needed
            abort(404, 'Barang not found');
        }

        // Validate the request data
        $validatedData = $request->validate([
            'nama_barang' => 'required',
            'kode_barang' => 'required',
            'harga' => 'required',
            'quantity' => 'required',
            'quantity_pack' => 'required',
            'status' => 'required',
        ]);

        try {
            // Update the barang data using the validated request data
            $barang->update($validatedData);

            // Set success message
            $message = 'Barang updated successfully';
        } catch (\Exception $e) {
            // Set error message
            $message = 'Error updating barang: ' . $e->getMessage();
        }

        // Redirect back with success message
        return redirect()->back()->with('pesanBarang', $message);
    }

    public function deleteBarang($id)
    {
        // Retrieve the barang by its ID
        $barang = Barangs::find($id);

        if (!$barang) {
            // Handle the case where the barang is not found
            // You can return an error message or redirect as needed
            abort(404, 'Barang not found');
        }

        // Delete the barang
        $barang->delete();

        // Set success message
        $message = 'Barang deleted successfully';

        // Redirect back with success message
        return redirect()->back()->with('pesanBarang', $message);
    }
    
    public function barang_keluar(Request $request, $id)
    {
        $request->validate([
            'barang_keluar' => 'required|numeric',
        ]);
        $barang = Barangs::find($id);

        $barang->quantity =  $barang->quantity - $request->input('quantity');
        $barang->save();
        return response()->json(['message' => 'Quantity updated successfully'], 200);
    }
}
