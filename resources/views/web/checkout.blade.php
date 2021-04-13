<x-web.layout>
    <section class="text-gray-600 body-font overflow-hidden">
        <div class="container px-5 py-24 mx-auto">
            <form action="{{ route('checkout.place.order') }}" method="POST" role="form">
                @csrf
                <div class="md:flex-1 px-4">
                    <article class="cart-body">
                        <header class="cart-title mt-2">Billing Detail</header>
                        <div class="md:fles md:items-center">
                            <div class="md:w-1/3">
                                <label class="block" for="email">Email</label>
                            </div>
                            <div class="md:w-2/3">
                                <input id="email" name="email" value="{{ auth()->user()->email}}" desabled>
                            </div>

                        </div>
                    </article>
                </div>

                <article class="cart-body">
                    <header class="cart-title mt-2">Your Order</header>
                    <dl class="dlist-align-items-start">
                        <dt>Total</dt>
                        <dd>{{\Cart::getSubtotal()}}</dd>
                    </dl>
                    <button type="submit">Place Order</button>
                </article>
            </form>
        </div>
        
    </section>

</x-web.layout>
