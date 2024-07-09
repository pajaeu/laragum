<div class="footer">
    <div class="footer__inner">
        @if (request()->routeIs('profile') or request()->routeIs('products.show'))
            <div class="footer__back">
                Powered by <a href="{{ route('home') }}" class="back__link">
                    <img src="{{ asset('logo.png') }}" class="back__logo" alt="Logo">
                </a>
            </div>
        @else
            <div class="footer__text">With Laragum, anyone can earn their first dollar online.</div>
        @endif
    </div>
</div>