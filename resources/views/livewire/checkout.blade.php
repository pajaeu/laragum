<div>
    @if(Cart::count() > 0)
        <form wire:submit.prevent="process">
            <div class="checkout">
                <div class="checkout__left">
                    <div class="checkout__content">
                        @foreach($content as $item)
                            <div class="item">
                                <div class="item__image">
                                    <x-front.product-image :product="$item->getProduct()" field="thumbnail" />
                                </div>
                                <div class="item__info">
                                    <div class="info__top">
                                        <div class="item__name">
                                            <div class="item-name__name">
                                                <a href="{{ route('products.show', ['user' => $item->getProduct()->user, 'product' => $item->getProduct(), 'slug' => $item->getProduct()->slug]) }}">{{ $item->getName() }}</a>
                                            </div>
                                            <small class="item-name__user">
                                                <a href="{{ route('profile', ['user' => $item->getProduct()->user]) }}">{{ $item->getProduct()->user->name }}</a>
                                            </small>
                                        </div>
                                        <div class="item__price">{{ $item->getTotal() }} €</div>
                                    </div>
                                    <div class="info__bottom">
                                        <div class="item__qty">Qty: {{ $item->getQuantity() }}</div>
                                        <a class="item__remove" wire:click.prevent="removeItem('{{ $item->getProduct()->id }}')">Remove</a>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>
                    <div class="checkout__total">
                        <span>Total</span>
                        <span class="total">{{ $total }} €</span>
                    </div>
                </div>
                <div class="checkout__right">
                    <div class="checkout__form form">
                        <div class="form__group">
                            <label for="customer_email">E-mail address</label>
                            <input type="email" class="form__input" placeholder="Your e-mail address" wire:model="email">
                            @error('email')
                                <div class="form__error">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="form__group">
                            <label for="customer_country">Country</label>
                            <select class="form__input" wire:model="country">
                                <option value="" selected disabled>Select country</option>
                                @foreach($countries as $code => $label)
                                    <option value="{{ $code }}" @selected(old('customer_country') === $code)>{{ $label }}</option>
                                @endforeach
                            </select>
                            @error('country')
                                <div class="form__error">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="form__group">
                            <button type="submit" class="form__submit">Place order</button>
                            @error ('checkout')
                                <div class="form__error form__error--big">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>
                </div>
            </div>
        </form>
    @else
        <div class="checkout__empty">
            <p>You haven't added anything...yet!</p>
            <a href="{{ route('home') }}" class="checkout__link">Go back shopping</a>
        </div>
    @endif
</div>