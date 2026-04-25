<x-app-layout>
    <div class="py-12">
        <div class="max-w-2xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">

                    <div class="flex items-center justify-between mb-6">
                        <div class="flex items-center gap-3">
                            <a href="{{ route('product.index') }}"
                               class="p-1.5 rounded-md text-gray-600 dark:text-gray-400 hover:text-gray-800 dark:hover:text-white hover:bg-gray-100 dark:hover:bg-gray-700 transition">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24"
                                     stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                          d="M15 19l-7-7 7-7" />
                                </svg>
                            </a>
                            <div>
                                <h2 class="text-2xl font-bold text-gray-900 dark:text-white tracking-tight">Product Detail</h2>
                                <p class="text-sm text-gray-600 dark:text-gray-300 mt-0.5">Viewing product
                                    #{{ $product->id }}</p>
                            </div>
                        </div>

                        <div class="flex items-center gap-2">
                            @can('update', $product)
                                <x-edit-button :url="route('product.edit', $product)" />
                            @endcan

                            @can('delete', $product)
                                <x-delete-button :url="route('product.delete', $product->id)" />
                            @endcan
                        </div>
                    </div>

                    <div class="rounded-lg border border-gray-300 dark:border-gray-600 overflow-hidden">
                        <table class="w-full text-sm">
                            <tbody class="divide-y divide-gray-200 dark:divide-gray-600">
                                <tr class="bg-gray-50 dark:bg-gray-700/50">
                                    <td class="px-5 py-3 w-36 font-medium text-gray-700 dark:text-gray-300">Product Name</td>
                                    <td class="px-5 py-3 font-semibold text-gray-900 dark:text-white">{{ $product->name }}</td>
                                </tr>
                                <tr class="bg-white dark:bg-gray-800">
                                    <td class="px-5 py-3 font-medium text-gray-700 dark:text-gray-300">Quantity</td>
                                    <td class="px-5 py-3">
                                        <span class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium {{ $product->quantity > 10 ? 'bg-green-100 text-green-800 dark:bg-green-900/50 dark:text-green-200' : 'bg-red-100 text-red-800 dark:bg-red-900/50 dark:text-red-200' }}">
                                            {{ $product->quantity }} {{ $product->quantity > 10 ? '(In Stock)' : '(Low Stock)' }}
                                        </span>
                                    </td>
                                </tr>
                                <tr class="bg-gray-50 dark:bg-gray-700/50">
                                    <td class="px-5 py-3 font-medium text-gray-700 dark:text-gray-300">Price</td>
                                    <td class="px-5 py-3 font-mono font-semibold text-gray-900 dark:text-white">
                                        Rp {{ number_format($product->price, 0, ',', '.') }}
                                    </td>
                                </tr>
                                <tr class="bg-white dark:bg-gray-800">
                                    <td class="px-5 py-3 font-medium text-gray-700 dark:text-gray-300">Owner</td>
                                    <td class="px-5 py-3">
                                        <div class="flex items-center gap-2">
                                            <div class="h-8 w-8 rounded-full bg-indigo-500 dark:bg-indigo-600 flex items-center justify-center text-white text-xs font-bold uppercase">
                                                {{ substr($product->user->name ?? '?', 0, 1) }}
                                            </div>
                                            <span class="text-gray-900 dark:text-white font-medium">{{ $product->user->name ?? '-' }}</span>
                                        </div>
                                    </td>
                                </tr>
                                <tr class="bg-gray-50 dark:bg-gray-700/50">
                                    <td class="px-5 py-3 font-medium text-gray-700 dark:text-gray-300">Created At</td>
                                    <td class="px-5 py-3 text-gray-900 dark:text-white">
                                        {{ $product->created_at->format('d M Y, H:i') }}
                                    </td>
                                </tr>
                                <tr class="bg-white dark:bg-gray-800">
                                    <td class="px-5 py-3 font-medium text-gray-700 dark:text-gray-300">Updated At</td>
                                    <td class="px-5 py-3 text-gray-900 dark:text-white">
                                        {{ $product->updated_at->format('d M Y, H:i') }}
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </div>

                </div>
            </div>
        </div>
    </div>
</x-app-layout>