<x-admin-layout.app>
    <div class="container mt-4">
        <h2 class="mb-4">✏ Edit product</h2>

        <div class="card shadow">
            <div class="card-body">
                <form action="{{route('admin.products.update' , $product->id)}}" method="POST" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')

                    <!-- product Name -->
                    <div class="mb-3">
                        <label for="name" class="form-label">product Name</label>
                        <input type="text"
                               name="name"
                               id="name"
                               value="{{ old('name', $product->name) }}"
                               class="form-control @error('name') is-invalid @enderror"
                        >
                        @error('name')
                        <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                         <!-- product Name -->
                         <div class="mb-3">
                            <label for="name" class="form-label">product Description</label>
                            <input type="text"
                                   name="description"
                                   id="name"
                                   value="{{ old('description', $product->description) }}"
                                   class="form-control @error('description') is-invalid @enderror"
                            >
                            @error('description')
                            <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>


                             <!-- product price -->
                    <div class="mb-3">
                        <label for="name" class="form-label">product price</label>
                        <input type="text"
                               name="price"
                               id="name"
                               value="{{ old('price', $product->price) }}"
                               class="form-control @error('price') is-invalid @enderror"
                        >
                        @error('price')
                        <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>


                         <!-- product Name -->
                         <div class="mb-3">
                            <label for="name" class="form-label">product slug</label>
                            <input type="text"
                                   name="slug"
                                   id="name"
                                   value="{{ old('slug', $product->slug) }}"
                                   class="form-control @error('slug') is-invalid @enderror"
                            >
                            @error('slug')
                            <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                            <!-- product stock -->
                            <div class="mb-3">
                                <label for="name" class="form-label">product stock</label>
                                <input type="text"
                                       name="stock"
                                       id="name"
                                       value="{{ old('stock', $product->stock) }}"
                                       class="form-control @error('stock') is-invalid @enderror"
                                >
                                @error('stock')
                                <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>

                    <!-- product Image -->
                    <div class="mb-3">
                        <label for="image" class="form-label">product Image</label>
                        <input type="file"
                               name="image"
                               id="image"
                               class="form-control @error('image') is-invalid @enderror">
                        @error('image')
                        <div class="invalid-feedback">{{ $message }}</div>
                        @enderror

                        @if($product->image)
                            <div class="mt-2">
                                <img src="{{asset($product->image)}}" alt="{{$product->name}}"
                                     style="max-height: 150px;">
                            </div>
                        @endif
                    </div>


                    <div class="mb-3">
                        <label for="categories" class="form-label">Category</label>
                        <select name="categories[]" id="categories" class="form-control" multiple>
                            @foreach ($categories as $category)
                                <option value="{{ $category->id }}" 
                                    {{ $product->categories->contains($category->id)}}>
                                    {{ $category->name }}
                                </option>
                            @endforeach
                        </select>
                        @error('categories')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                    

                    <button type="submit" class="btn btn-success">Update</button>
                    <a href="" class="btn btn-secondary">Cancel</a>
                </form>
            </div>
        </div>
    </div>
</x-admin-layout.app>
