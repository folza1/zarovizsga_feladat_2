<x-layout>
    <div class="border bg-blue-300">
        <h1 class="my-5 text-2xl text-center font-bold">Elfelejtett jelszó visszaállítás</h1>
        <h3 class="my-4 text-xl text-center font-bold">Az alábbi linkre kattintva új jelszót adhat meg!</h3>
        <a href="http://localhost:8000/jelszo/reset/{{$details['token']}}"
           style="display: block; text-align: center; margin-left: auto; margin-right: auto;"
        class="my-4"
        > Jelszóvisszaállítás link!!!</a>
    </div>
</x-layout>
