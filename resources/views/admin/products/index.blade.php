<x-admin-layout.app title="products">
    <div class="container mt-4">
        <h2>📂 products Management</h2>
        <a href="{{route('admin.products.create')}}" class="btn btn-primary mb-3">➕ Add New product</a>

        <div class="card shadow">
            <div class="card-body">
                <table class="table table-striped">
                    <thead>
                    <tr>
                        <th>#</th>
                        <th>Name</th>
                        <th>Price</th>
                        <th>description</th>
                        <th>Stock</th>
                        <th>Slug</th>
                        <th>image</th>
                        <th>categories</th>
                        <th>Actions</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach ($products as $product)
                        
                    
                    
                    <tr>
                        <td>{{$loop->iteration}}</td>
                        <td>{{$product->name}}</td>
                        <td>{{$product->price}}</td>
                        <td>{{$product->description}}</td>
                        <td>{{$product->stock}}</td>
                        <td>{{$product->slug}}</td>
                        <td>
                            @foreach ($product->categories as $category)
                                    <span class="badge bg-secondary">{{ $category->name }}</span>
                                @endforeach
                        </td>
                        <td>
                            @if ($product->image)
                                
                            
                            <img src="{{ asset($product->image)}}" alt="{{$product->name}}"
                            style="height: 50px;">
                            @endif
                            
                      
                        </td>
                        <td>
                            <a href="{{route('admin.products.edit' , $product->id)}}" class="btn btn-sm btn-warning">✏
                                Edit</a>
                            <form action="{{route('admin.products.destroy', $product->id)}}" method="POST"
                                  class="d-inline delete-form">
                                @csrf
                                @method('DELETE')                             
                                <button type="submit" class="btn btn-sm btn-danger">🗑 Delete</button>
                            </form>
                        </td>
                    </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>
            <div class="mx-2"></div>
        </div>
    </div>
</x-admin-layout.app>
