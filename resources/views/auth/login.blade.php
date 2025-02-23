{{-- <x-layouts.app>
    <div class="container d-flex justify-content-center align-items-center" style="min-height: 100vh;">
        <div class="card shadow-lg p-4" style="width: 400px;">
            <h3 class="text-center mb-4">Login</h3>
            <form action="{{route('login.submit')}}" method="POST">
             @csrf
                <div class="mb-3">
                    <label class="form-label">Email</label>
                    <input type="email" name="email" class="form-control" placeholder="example@gmail.com" required>
                </div>

                <div class="mb-3">
                    <label class="form-label">Password</label>
                    <input type="password" name="password" class="form-control" placeholder="••••••••" required>
                </div>

                <button type="submit" class="btn btn-success w-100">Login</button>
            </form>

            <p class="text-center mt-3">
                you don't have an account <a href="{{route('register')}}">Create a new account</a>
            </p>
        </div>
    </div>
</x-layouts.app> --}}


<x-layouts.app title="login">
   <x-form
       action="{{ route('login.submit') }}"
       method="POST"
       :fields="[
        ['name' => 'email', 'label' => 'Email', 'type' => 'email'],
        ['name' => 'password', 'label' => 'Password', 'type' => 'password'],
    ]"
        submitButtonName="Login"
        redirectLinkMessage="Don't have an account?"
        gotToLoginOrRegisterLink="{{ route('register') }}"
        linkName="Register"
    />
</x-layouts.app> 
