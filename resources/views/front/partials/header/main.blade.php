<header class="header">
    <div class="header__inner">
        @if (request()->routeIs('profile'))
            <a href="{{ route('profile', ['user' => $user]) }}" class="header__logo header__logo--profile header__logo--has-icon">
                @if ($user->avatar)
                    <img src="{{ asset('storage/' . $user->avatar) }}" class="user-avatar">
                @else
                    <svg width="512" height="512" viewBox="0 0 512 512" style="color:currentColor" xmlns="http://www.w3.org/2000/svg" class="h-full w-full"><rect width="512" height="512" x="0" y="0" rx="30" fill="transparent" stroke="transparent" stroke-width="0" stroke-opacity="100%" paint-order="stroke"></rect><svg width="512px" height="512px" viewBox="0 0 24 24" fill="currentColor" x="0" y="0" role="img" style="display:inline-block;vertical-align:middle" xmlns="http://www.w3.org/2000/svg"><g fill="currentColor"><path d="M12 2C6.579 2 2 6.579 2 12s4.579 10 10 10s10-4.579 10-10S17.421 2 12 2zm0 5c1.727 0 3 1.272 3 3s-1.273 3-3 3c-1.726 0-3-1.272-3-3s1.274-3 3-3zm-5.106 9.772c.897-1.32 2.393-2.2 4.106-2.2h2c1.714 0 3.209.88 4.106 2.2C15.828 18.14 14.015 19 12 19s-3.828-.86-5.106-2.228z" fill="currentColor"/></g></svg></svg>
                @endif
                {{ $user->name }}
            </a>
        @elseif (request()->routeIs('products.show'))
            <a href="{{ route('profile', ['user' => $product->user]) }}" class="header__logo header__logo--profile header__logo--has-icon">
                @if ($product->user->avatar)
                    <img src="{{ asset('storage/' . $product->user->avatar) }}" class="user-avatar">
                @else
                    <svg width="512" height="512" viewBox="0 0 512 512" style="color:currentColor" xmlns="http://www.w3.org/2000/svg" class="h-full w-full"><rect width="512" height="512" x="0" y="0" rx="30" fill="transparent" stroke="transparent" stroke-width="0" stroke-opacity="100%" paint-order="stroke"></rect><svg width="512px" height="512px" viewBox="0 0 24 24" fill="currentColor" x="0" y="0" role="img" style="display:inline-block;vertical-align:middle" xmlns="http://www.w3.org/2000/svg"><g fill="currentColor"><path d="M12 2C6.579 2 2 6.579 2 12s4.579 10 10 10s10-4.579 10-10S17.421 2 12 2zm0 5c1.727 0 3 1.272 3 3s-1.273 3-3 3c-1.726 0-3-1.272-3-3s1.274-3 3-3zm-5.106 9.772c.897-1.32 2.393-2.2 4.106-2.2h2c1.714 0 3.209.88 4.106 2.2C15.828 18.14 14.015 19 12 19s-3.828-.86-5.106-2.228z" fill="currentColor"/></g></svg></svg>
                @endif
                {{ $product->user->name }}
            </a>
        @else
            <a href="{{ route('home') }}" class="header__logo">
                <img src="{{ asset('logo.png') }}" class="logo__img" alt="Logo">
            </a>
        @endif
        <div class="header__search">
            <form action="{{ route('products.search') }}" method="get">
                <div class="search__input">
                    <svg width="512" height="512" viewBox="0 0 512 512" xmlns="http://www.w3.org/2000/svg" class="h-full w-full"><rect width="512" height="512" x="0" y="0" rx="30" fill="transparent" stroke="transparent" stroke-width="0" stroke-opacity="100%" paint-order="stroke"></rect><svg width="512px" height="512px" viewBox="0 0 1024 1024" fill="currentColor" x="0" y="0" role="img" style="display:inline-block;vertical-align:middle" xmlns="http://www.w3.org/2000/svg"><g fill="currentColor"><path fill="currentColor" d="M909.6 854.5L649.9 594.8C690.2 542.7 712 479 712 412c0-80.2-31.3-155.4-87.9-212.1c-56.6-56.7-132-87.9-212.1-87.9s-155.5 31.3-212.1 87.9C143.2 256.5 112 331.8 112 412c0 80.1 31.3 155.5 87.9 212.1C256.5 680.8 331.8 712 412 712c67 0 130.6-21.8 182.7-62l259.7 259.6a8.2 8.2 0 0 0 11.6 0l43.6-43.5a8.2 8.2 0 0 0 0-11.6zM570.4 570.4C528 612.7 471.8 636 412 636s-116-23.3-158.4-65.6C211.3 528 188 471.8 188 412s23.3-116.1 65.6-158.4C296 211.3 352.2 188 412 188s116.1 23.2 158.4 65.6S636 352.2 636 412s-23.3 116.1-65.6 158.4z"/></g></svg></svg>
                    <input type="search" name="q" class="search__input" placeholder="Search products" value="{{ request('q') }}">
                </div>
            </form>
        </div>
        <div class="header__buttons">
            @auth
                <a href="{{ route('admin.dashboard') }}" class="header__button">My profile</a>
            @else
                <a href="{{ route('auth.login') }}" class="header__button">Login</a>
                <a href="{{ route('auth.signup') }}" class="header__button header__button--signup">Start selling</a>
            @endauth
            <a href="{{ route('checkout') }}" class="header__button header__cart">
                <svg width="512" height="512" viewBox="0 0 512 512" style="color:currentColor" xmlns="http://www.w3.org/2000/svg" class="cart__icon"><rect width="512" height="512" x="0" y="0" rx="30" fill="transparent" stroke="transparent" stroke-width="0" stroke-opacity="100%" paint-order="stroke"></rect><svg width="512px" height="512px" viewBox="0 0 24 24" fill="currentColor" x="0" y="0" role="img" style="display:inline-block;vertical-align:middle" xmlns="http://www.w3.org/2000/svg"><g fill="currentColor"><g id="evaShoppingCartOutline0"><g id="evaShoppingCartOutline1"><g id="evaShoppingCartOutline2" fill="currentColor"><path d="M21.08 7a2 2 0 0 0-1.7-1H6.58L6 3.74A1 1 0 0 0 5 3H3a1 1 0 0 0 0 2h1.24L7 15.26A1 1 0 0 0 8 16h9a1 1 0 0 0 .89-.55l3.28-6.56A2 2 0 0 0 21.08 7Zm-4.7 7H8.76L7.13 8h12.25Z"/><circle cx="7.5" cy="19.5" r="1.5"/><circle cx="17.5" cy="19.5" r="1.5"/></g></g></g></g></svg></svg>
                <span>{{ Cart::count() }}</span>
            </a>
        </div>
    </div>
</header>