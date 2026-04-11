<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;
use Illuminate\Database\QueryException;

class ProductController extends Controller
{
    public function index()
    {
        $products = Product::all();

        return view('product.index', compact('products'));
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'quantity' => 'required|integer',
            'price' => 'required|numeric',
        ], [
            'name.required' => 'Nama produk wajib diisi.',
            'name.max' => 'Nama produk tidak boleh lebih dari 255 karakter.',

            'quantity.required' => 'Jumlah (kuantitas) produk wajib diisi.',
            'quantity.integer' => 'Jumlah produk harus berupa angka bulat (tidak boleh desimal).',

            'price.required' => 'Harga produk wajib diisi.',
            'price.numeric' => 'Harga produk harus berupa angka yang valid.',
        ]);

        $validated['user_id'] = Auth::id();

        try {
            Product::create($validated);

            return redirect()
                ->route('product.index')
                ->with('success', 'Produk berhasil dibuat.');

        } catch (QueryException $e) {
            Log::error('Product store database error', [
                'message' => $e->getMessage(),
            ]);

            return redirect()
                ->back()
                ->withInput()
                ->with('error', 'Terjadi kesalahan database saat membuat produk.');

        } catch (\Throwable $e) {
            Log::error('Product store unexpected error', [
                'message' => $e->getMessage(),
            ]);

            return redirect()
                ->back()
                ->withInput()
                ->with('error', 'Terjadi kesalahan yang tidak terduga.');
        }
    }

    public function create()
    {
        return view('product.create');
    }

    public function show($id)
    {
        $product = Product::findOrFail($id);

        return view('product.view', compact('product'));
    }

    public function update(Request $request, $id)
    {
        $product = Product::findOrFail($id);

        $this->authorize('update', $product);

        $validated = $request->validate([
            'name' => 'sometimes|string|max:255',
            'quantity' => 'sometimes|integer',
            'price' => 'sometimes|numeric',
        ], [
            'name.required' => 'Nama produk wajib diisi.',
            'name.max' => 'Nama produk tidak boleh lebih dari 255 karakter.',

            'quantity.required' => 'Jumlah (kuantitas) produk wajib diisi.',
            'quantity.integer' => 'Jumlah produk harus berupa angka bulat (tidak boleh desimal).',

            'price.required' => 'Harga produk wajib diisi.',
            'price.numeric' => 'Harga produk harus berupa angka yang valid.',
        ]);

        try {
            $product->update($validated);

            return redirect()
                ->route('product.index')
                ->with('success', 'Produk berhasil diperbarui.');

        } catch (QueryException $e) {
            Log::error('Product update database error', [
                'message' => $e->getMessage(),
            ]);

            return redirect()
                ->back()
                ->withInput()
                ->with('error', 'Terjadi kesalahan database saat memperbarui produk.');

        } catch (\Throwable $e) {
            Log::error('Product update unexpected error', [
                'message' => $e->getMessage(),
            ]);

            return redirect()
                ->back()
                ->withInput()
                ->with('error', 'Terjadi kesalahan yang tidak terduga.');
        }
    }

    public function edit(Product $product)
    {
        return view('product.edit', compact('product'));
    }

    public function delete($id)
    {
        $product = Product::findOrFail($id);

        $this->authorize('delete', $product);

        $product->delete();

        return redirect()->route('product.index')->with('success', 'Product berhasil dihapus');
    }
}