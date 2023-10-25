<div class="register-box p-4">
    <div class="card card-outline card-primary">
        <div class="card-header text-center">
            <h3>Login</h3>
        </div>
        <div class="card-body">
            <div class="callout callout-info">
                <p>Belum mendaftar? Daftar <a href="/">disini</a></p>
            </div>

            @error('email')
                <div class="alert alert-warning alert-dismissible">
                    <strong>{{ $message }}</strong>
                </div>
            @enderror

            @error('password')
                <div class="alert alert-warning alert-dismissible">
                    <strong>{{ $message }}</strong>
                </div>
            @enderror

            <form method="POST" action="{{ route('login') }}">
                @csrf
                <x-forms.input-email label="Username" placeholder="Tulis username kamu disini" />
                <x-forms.input-password label="Password" placeholder="Tulis password kamu disini" />
                <x-forms.input-submit :isDisabled="false" text="Login" />
            </form>
        </div>
    </div>
</div>

