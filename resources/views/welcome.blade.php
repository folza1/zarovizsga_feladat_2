<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Laravel</title>

    <!-- Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet"
          integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <script src="https://cdn.tailwindcss.com"></script>
    <script src="https://cdn.jsdelivr.net/npm/axios/dist/axios.min.js"></script>
</head>
<body class="antialiased">
<form class="w-1/3 mx-auto mt-10 border rounded p-3">
    <div class="mb-3 flex">
        <div class="w-1/2 mx-3">
            <label for="name" class="form-label text-lg">Név</label>
            <input type="text" class="form-control" id="name" placeholder="Hogy hívnak?">
        </div>
        <div class="w-1/2 mx-3">
            <label for="email" class="form-label text-lg">E-mail</label>
            <input type="email" class="form-control" id="email" placeholder="Email címed">
        </div>
    </div>

    <div class="mb-3 flex">
        <div class="w-1/2 mx-3">
            <label for="country" class="form-label text-lg">Lakhely</label>
            <select class="form-select" id="country" name="country">
                <option value="" disabled selected>Válassz országot</option>
                @foreach($countries as $country)
                    <option value="{{ $country->id }}">{{ $country->name }}</option>
                @endforeach
            </select>
        </div>
        <div class="w-1/2 mx-3">
            <label for="city" class="form-label text-lg">Város</label>
            <select class="form-select" id="city" name="city">
                <option value="" disabled selected>Válassz várost</option>
            </select>
        </div>
    </div>

    <div class="mb-3 flex">
        <div class="w-1/2 mx-3">
            <label for="telefonszam" class="form-label text-lg">Telefonszám</label>
            <input type="tel" class="form-control" id="telefonszam" placeholder="Csak számokat adj meg!">
        </div>
        <div class="w-1/2 mx-3">
            <label for="born" class="form-label text-lg">Születési dátum</label>
            <input type="date" class="form-control" id="born">
        </div>
    </div>

    <div class="mb-3 flex">
        <div class="w-1/2 mx-3">
            <label for="password" class="form-label text-lg">Jelszó</label>
            <input type="password" class="form-control" id="password" placeholder="Jelszavad">
        </div>
        <div class="w-1/2 mx-3">
            <label for="password-confirmation" class="form-label text-lg">Jelszó ismét</label>
            <input type="password" class="form-control" id="password-confirmation" placeholder="Jelszavad ismét">
        </div>
    </div>


    <div class="mx-3">
        <p class="text-lg">Nemed:</p>
        <div class="form-check">
            <input class="form-check-input" type="radio" name="flexRadioDefault" id="radio1">
            <label class="form-check-label" for="radio1">
                Férfi
            </label>
        </div>
        <div class="form-check">
            <input class="form-check-input" type="radio" name="flexRadioDefault" id="radio2">
            <label class="form-check-label" for="radio2">
                Nő
            </label>
        </div>
        <div class="form-check">
            <input class="form-check-input" type="radio" name="flexRadioDefault" id="radio3">
            <label class="form-check-label" for="radio3">
                Egyéb
            </label>
        </div>
    </div>

    <div class="form-check mx-3 mt-6">
        <input class="form-check-input" type="checkbox" value="" id="felhasznalasi">
        <label class="form-check-label" for="felhasznalasi">
            A felhasználási feltételeket elfogadom
        </label>
    </div>

    <button type="submit" class="btn btn-primary text-black bg-blue-300 w-full mt-4">Regisztráció</button>

    <div class="mt-3">
        <button type="button" class="btn btn-link d-block mx-auto">Elfelejtetted a jelszavad?</button>
        <button type="button" class="btn btn-link d-block mx-auto">Már regisztráltál?</button>
    </div>
</form>
<script>
    document.getElementById('country').addEventListener('change', function() {
        var countryId = this.value;

        // AJAX kérés küldése a városok lekéréséhez
        axios.get('/get-cities/' + countryId)
            .then(function(response) {
                var citiesSelect = document.getElementById('city');
                citiesSelect.innerHTML = '<option value="" disabled selected>Válassz várost</option>';

                // Városok hozzáadása a select elemhez
                response.data.forEach(function(city) {
                    var option = document.createElement('option');
                    option.value = city.id;
                    option.text = city.name;
                    citiesSelect.add(option);
                });
            })
            .catch(function(error) {
                console.error('Hiba történt:', error);
            });
    });
</script>



<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL"
        crossorigin="anonymous"></script>
</body>
</html>
