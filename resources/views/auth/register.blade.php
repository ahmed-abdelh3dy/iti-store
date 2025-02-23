{{-- <x-layouts.app title="register">
    <div class="container d-flex justify-content-center align-items-center" style="min-height: 100vh;">
        <div class="card shadow-lg p-4" style="width: 400px;">
            <h3 class="text-center mb-4">Register</h3>
            <form action="{{route('registerr')}}" method="POST">
                @csrf
                <div class="mb-3">
                    <label class="form-label">Name</label>
                    <input type="text" name="name" class="form-control" placeholder="Enter your name" value="{{old('name')}}" >
                    @error('name')
                    <div class="text-danger">{{ $message }}</div>
                    @enderror
                </div>

                <div class="mb-3">
                    <label class="form-label">Email</label>
                    <input type="email" name="email" class="form-control" placeholder="example@gmail.com" value="{{old('email')}}">
                    @error('email')
    <div class="text-danger">{{ $message }}</div>
@enderror

                </div>

                <div class="mb-3">
                    <label class="form-label">Password</label>
                    <input type="password" name="password" class="form-control" placeholder="••••••••" >
                    @error('password')
                    <div class="text-danger">{{ $message }}</div>
                @enderror
                </div>

                <div class="mb-3">
                    <label class="form-label">Confirm Password</label>
                    <input type="password" name="password_confirmation" class="form-control" >
                    @error('password_confirmation')
                    <div class="text-danger">{{ $message }}</div>
                @enderror
                </div>

                <button type="submit" class="btn btn-primary w-100">Create Account</button>
            </form>

            <p class="text-center mt-3">
                already have an account? <a href="{{route('login')}}">Login</a>
            </p>
        </div>
    </div>
</x-layouts.app> --}}



<x-layouts.app title="register">
   <x-form
       action="{{ route('registerr') }}"
       method="POST"
       :fields="[
 ['name' => 'name', 'label' => 'Name', 'type' => 'text'],
  ['name' => 'email', 'label' => 'Email', 'type' => 'email'],
  ['name' => 'password', 'label' => 'Password', 'type' => 'password'],
 ['name' => 'password_confirmation', 'label' => 'Confirm Password', 'type' => 'password']
    ]"
        submitButtonName="ٌRegister"
    />
</x-layouts.app> 
