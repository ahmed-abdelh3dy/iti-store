<x-layouts.app>

    <section>
        <h1 class="text-center">Welcome To My Store</h1>
        <h2 class="text-center">Explore Categories</h2>
        <div class="row">
           @foreach ($categories as $category)
               
     
                <div class="col-md-3 mb-4">
                    <a href="#" class="text-decoration-none">
                        <div class="card shadow-sm border-0">
                            <img src="{{asset($category->image)}}" class="category-img" alt="">
                            <div class="card-body text-center">
                                <h5 class="card-title text-dark">{{$category->name}}</h5>
                            </div>
                        </div>
                    </a>
                </div>
                @endforeach
        </div>
    </section>
</x-layouts.app>