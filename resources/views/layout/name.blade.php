@auth
    Halo, {{ Auth::user()->name }}
@endauth

@guest
    Halo, Guest
@endguest