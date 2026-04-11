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
            ->with('success', 'Product created successfully.');

    } catch (QueryException $e) {
        Log::error('Product store database error', [
            'message' => $e->getMessage(),
        ]);

        return redirect()
            ->back()
            ->withInput()
            ->with('error', 'Database error while creating product.');

    } catch (\Throwable $e) {
        Log::error('Product store unexpected error', [
            'message' => $e->getMessage(),
        ]);

        return redirect()
            ->back()
            ->withInput()
            ->with('error', 'Unexpected error occurred.');
    }
}