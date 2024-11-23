<x-app-layout>
    <div class="grid gap-8 grid-cols-1 md:grid-cols-2 lg:grid-cols-3 xl:grid-cols-4 p-5">
        @foreach($products as $product)
            <!-- Product Item -->
            <div
                x-data="productItem({{ json_encode([
                    'id' => $product->id,
                    'image' => $product->image,
                    'title' => $product->title,
                    'price' => $product->price,
                ]) }})"
                class="border border-1 border-gray-200 rounded-md hover:border-purple-600 transition-colors bg-white"
            >
                <a href="{{ route('product.view', $product) }}" class="aspect-w-3 aspect-h-2 block overflow-hidden">
                    <img
                        src="{{ asset('storage/' . $product->image) }}"
                        alt="{{ $product->title }}"
                        class="object-cover rounded-lg hover:scale-105 hover:rotate-1 transition-transform"
                    />
                </a>
                <div class="p-4">
                    <h3 class="text-lg">
                        <a href="{{ route('product.view', $product) }}">
                            {{ $product->title }}
                        </a>
                    </h3>
                    <h5 class="font-bold">${{ $product->price }}</h5>
                </div>
                <!-- Add any additional product item content here -->
            </div>
            <!--/ Product Item -->
        @endforeach
    </div>
    <!-- Pagination Links -->
    {{ $products->links() }}
</x-app-layout>
