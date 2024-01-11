<x-layout>
    @if(session()->has('success'))
        <div class="alert alert-success text-center" role="alert" id="success-message">
            <p>{{ session('success') }}</p>
        </div>

        <script>
            // Automatikus üzenet eltűnés 5 másodperc után
            $(document).ready(function () {
                setTimeout(function () {
                    $('#success-message').fadeOut('slow');
                }, 5000); // 5000 miliszekundum = 5 másodperc
            });
        </script>
    @endif
    <p class="text-2xl font-bold text-center my-5">Jelszó változtatás</p>
    <form action="/login" method="POST" class="w-1/3 mx-auto mt-10 border rounded p-3">
        @csrf
        <div class="mb-3">
            <div class="mx-3">
                <label for="email" class="form-label text-lg">E-mail</label>
                <input type="email" class="form-control" name="email" id="email" placeholder="Email címed"
                       value="{{ old('email') }}" required>
                @error('email')
                <p class="text-red-500 text-xs mt-1">{{$message}}</p>
                @enderror
            </div>
        </div>

        <div class="mb-3">
            <div class="mx-3">
                <label for="password" class="form-label text-lg">Jelszó</label>
                <input type="password" class="form-control" name="password" id="password" placeholder="Jelszavad"
                       required>
                @error('password')
                <p class="text-red-500 text-xs mt-1">{{$message}}</p>
                @enderror
            </div>
        </div>

        <div class="mb-3">
            <div class="mx-3">
                <label for="password-confirmation" class="form-label text-lg">Jelszó ismét</label>
                <input type="password" class="form-control" name="password_confirmation" id="password-confirmation"
                       placeholder="Jelszavad ismét" required>
                @error('password_confirmation')
                <p class="text-red-500 text-xs mt-1">{{$message}}</p>
                @enderror
            </div>
        </div>

        <div class="mx-3">
            <button type="submit" class="btn btn-primary text-black bg-blue-300 w-full mt-4">Jelszó megváltoztatása
            </button>
        </div>
    </form>
</x-layout>
