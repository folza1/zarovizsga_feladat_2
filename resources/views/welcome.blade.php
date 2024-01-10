<x-layout>
    <form action="{{ route('register') }}" method="POST" class="w-1/3 mx-auto mt-10 border rounded p-3">
        @csrf
        <div class="mb-3 flex">
            <div class="w-1/2 mx-3">
                <label for="name" class="form-label text-lg">Név</label>
                <input type="text" class="form-control" name="name" id="name" placeholder="Hogy hívnak?"
                       value="{{ old('name') }}" required>
                @error('name')
                <p class="text-red-500 text-xs mt-1">{{$message}}</p>
                @enderror
            </div>
            <div class="w-1/2 mx-3">
                <label for="email" class="form-label text-lg">E-mail</label>
                <input type="email" class="form-control" name="email" id="email" placeholder="Email címed"
                       value="{{ old('email') }}" required>
                @error('email')
                <p class="text-red-500 text-xs mt-1">{{$message}}</p>
                @enderror
            </div>
        </div>

        <div class="mb-3 flex">
            <div class="w-1/2 mx-3">
                <label for="country" class="form-label text-lg">Lakhely</label>
                <select class="form-select" name="country" id="country" name="country" required>
                    <option value="" disabled selected>Válassz országot</option>
                    @foreach($countries as $country)
                        <option
                            value="{{ $country->id }}" {{ old('country') == $country->id ? 'selected' : '' }}>{{ $country->name }}</option>
                    @endforeach
                </select>
                @error('country')
                <p class="text-red-500 text-xs mt-1">{{$message}}</p>
                @enderror
            </div>
            <div class="w-1/2 mx-3">
                <label for="city" class="form-label text-lg">Város</label>
                <input list="cities" class="form-control" id="city" name="city" placeholder="Kezdj el írni!"
                       value="{{ old('city') }}" required>
                <datalist id="cities">
                    <!-- Városokat itt fogjuk dinamikusan frissíteni -->
                </datalist>
                @error('city')
                <p class="text-red-500 text-xs mt-1">{{$message}}</p>
                @enderror
            </div>
        </div>

        <div class="mb-3 flex">
            <div class="w-1/2 mx-3">
                <label for="telefonszam" class="form-label text-lg">Telefonszám</label>
                <input type="tel" class="form-control" name="telefonszam" id="telefonszam"
                       placeholder="Csak számokat adj meg!" pattern="\d+" value="{{ old('telefonszam') }}" required>
                @error('telefonszam')
                <p class="text-red-500 text-xs mt-1">{{$message}}</p>
                @enderror
            </div>
            <div class="w-1/2 mx-3">
                <label for="born" class="form-label text-lg">Születési dátum</label>
                <input type="date" class="form-control" name="born" id="born" value="{{ old('born') }}" required>
                @error('born')
                <p class="text-red-500 text-xs mt-1">{{$message}}</p>
                @enderror
            </div>
        </div>

        <div class="mb-3 flex">
            <div class="w-1/2 mx-3">
                <label for="password" class="form-label text-lg">Jelszó</label>
                <input type="password" class="form-control" name="password" id="password" placeholder="Jelszavad"
                       required>
                @error('password')
                <p class="text-red-500 text-xs mt-1">{{$message}}</p>
                @enderror
            </div>
            <div class="w-1/2 mx-3">
                <label for="password-confirmation" class="form-label text-lg">Jelszó ismét</label>
                <input type="password" class="form-control" name="password_confirmation" id="password-confirmation"
                       placeholder="Jelszavad ismét" required>
                @error('password_confirmation')
                <p class="text-red-500 text-xs mt-1">{{$message}}</p>
                @enderror
            </div>
        </div>

        <div class="mx-3">
            <p class="text-lg">Nemed:</p>
            <div class="form-check">
                <input class="form-check-input" type="radio" name="gender" id="radio1" value="male"
                       {{ old('gender') == 'male' ? 'checked' : '' }} required>
                <label class="form-check-label" for="radio1">
                    Férfi
                </label>
            </div>
            <div class="form-check">
                <input class="form-check-input" type="radio" name="gender" id="radio2" value="female"
                       {{ old('gender') == 'female' ? 'checked' : '' }} required>
                <label class="form-check-label" for="radio2">
                    Nő
                </label>
            </div>
            <div class="form-check">
                <input class="form-check-input" type="radio" name="gender" id="radio3" value="other"
                       {{ old('gender') == 'other' ? 'checked' : '' }} required>
                <label class="form-check-label" for="radio3">
                    Egyéb
                </label>
            </div>
        </div>


        <div class="form-check mx-3 mt-6">
            <input class="form-check-input" type="checkbox" name="felhasznalasi" id="felhasznalasi" value="1"
                   {{ old('felhasznalasi') == '1' ? 'checked' : '' }} required>
            <label class="form-check-label" for="felhasznalasi">
                A felhasználási feltételeket elfogadom
            </label>
            @error('felhasznalasi')
            <p class="text-red-500 text-xs mt-1">{{$message}}</p>
            @enderror
        </div>

        <div class="mx-3">
            <button type="submit" class="btn btn-primary text-black bg-blue-300 w-full mt-4">Regisztráció</button>
        </div>

        <div class="mt-3">
            <a href="{{ route('password_request') }}" class="btn btn-link d-block mx-auto">Elfelejtetted a
                jelszavad?</a>
            <a href="{{ route('login') }}" class="btn btn-link d-block mx-auto">Már regisztráltál?</a>
        </div>
    </form>


    <script>
        document.getElementById('country').addEventListener('change', function () {
            var countryId = this.value;

            // AJAX kérés küldése a városok lekéréséhez
            axios.get('/get-cities/' + countryId)
                .then(function (response) {
                    var citiesDatalist = document.getElementById('cities');
                    citiesDatalist.innerHTML = '';

                    // Városok hozzáadása a datalist elemhez
                    response.data.forEach(function (city) {
                        var option = document.createElement('option');
                        option.value = city.name;  // A város nevét használjuk
                        option.dataset.cityId = city.id;  // Az id-t adat attribútumként eltároljuk
                        citiesDatalist.appendChild(option);
                    });
                })
                .catch(function (error) {
                    console.error('Hiba történt:', error);
                });
        });

        // Eseményfigyelő a város input mezőhöz
        document.getElementById('city').addEventListener('input', function () {
            var inputCity = this.value;
            var citiesDatalist = document.getElementById('cities');

            // Megkeressük a városok között azon várost, amelynek a neve egyezik az input értékével
            var matchingOption = Array.from(citiesDatalist.options).find(function (option) {
                return option.value === inputCity;
            });

            if (matchingOption) {
                // Ha találunk egyezést, beállítjuk az input értékét az option értékére (a város nevére)
                this.value = matchingOption.value;
            }
        });

    </script>
</x-layout>
