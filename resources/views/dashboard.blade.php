<form action="{{ route('logout') }}" method="POST">
    @csrf
    <button type="submit">Kijelentkezés</button>
</form>
