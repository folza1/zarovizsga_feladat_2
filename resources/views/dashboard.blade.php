<x-layout>
    <h1 class="text-3xl text-center font-bold my-6">Be vagy jelentkezve kedves  {{ Auth::user()->name }}!</h1>
    <form action="{{ route('logout') }}" method="POST" class="flex justify-center">
        @csrf
        <button class="text-3xl text-center font-bold my-6 border bg-red-400
         hover:bg-red-200 p-2" type="submit"
        >Kijelentkezés</button>
    </form>
</x-layout>
