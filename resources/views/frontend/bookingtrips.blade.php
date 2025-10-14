<x-fndashboard-layout>
    <section class="cart-page section-space">
        <div class="container">
            <div class="table-responsive">
                <table class="table cart-page__table">
                    <thead>
                        <tr>
                            <th>Product</th>
                            <th>price</th>
                            <th>Quantity</th>
                            <th>Sub total</th>
                            <th>remove</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td>
                                <div class="cart-page__table__meta">
                                    <div class="cart-page__table__meta-img">
                                        <img src="assets/images/products/cart-1-1.png" alt="rentol">
                                    </div>
                                    <h3 class="cart-page__table__meta-title"><a href="product-details.html">hi-speed sticker</a>
                                    </h3>
                                </div>
                            </td>
                            <td>$15.00</td>
                            <td>
                                <div class="product-details__quantity">
                                    <div class="quantity-box">
                                        <button type="button" class="sub"><i class="fa fa-minus"></i></button>
                                        <input type="text" value="1">
                                        <button type="button" class="add"><i class="fa fa-plus"></i></button>
                                    </div>
                                </div>
                            </td>
                            <td>$30.00</td>
                            <td>
                                <a href="cart.html" class="table cart-page__table__remove"><i class="fas fa-times"></i></a>
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <div class="cart-page__table__meta">
                                    <div class="cart-page__table__meta-img">
                                        <img src="assets/images/products/cart-1-2.png" alt="rentol">
                                    </div>
                                    <h3 class="cart-page__table__meta-title"><a href="product-details.html">digital wall art</a>
                                    </h3>
                                </div>
                            </td>
                            <td>$15.00</td>
                            <td>
                                <div class="product-details__quantity">
                                    <div class="quantity-box">
                                        <button type="button" class="sub"><i class="fa fa-minus"></i></button>
                                        <input type="text" value="1">
                                        <button type="button" class="add"><i class="fa fa-plus"></i></button>
                                    </div>
                                </div>
                            </td>
                            <td>$30.00</td>
                            <td>
                                <a href="cart.html" class="table cart-page__table__remove"><i class="fas fa-times"></i></a>
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <div class="cart-page__table__meta">
                                    <div class="cart-page__table__meta-img">
                                        <img src="assets/images/products/cart-1-3.png" alt="rentol">
                                    </div>
                                    <h3 class="cart-page__table__meta-title"><a href="product-details.html">room wallpapers</a>
                                    </h3>
                                </div>
                            </td>
                            <td>$15.00</td>
                            <td>
                                <div class="product-details__quantity">
                                    <div class="quantity-box">
                                        <button type="button" class="sub"><i class="fa fa-minus"></i></button>
                                        <input type="text" value="1">
                                        <button type="button" class="add"><i class="fa fa-plus"></i></button>
                                    </div>
                                </div>
                            </td>
                            <td>$30.00</td>
                            <td>
                                <a href="cart.html" class="table cart-page__table__remove"><i class="fas fa-times"></i></a>
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <div class="cart-page__table__meta">
                                    <div class="cart-page__table__meta-img">
                                        <img src="assets/images/products/cart-1-4.png" alt="rentol">
                                    </div>
                                    <h3 class="cart-page__table__meta-title"><a href="product-details.html">Water proof sticker</a>
                                    </h3>
                                </div>
                            </td>
                            <td>$15.00</td>
                            <td>
                                <div class="product-details__quantity">
                                    <div class="quantity-box">
                                        <button type="button" class="sub"><i class="fa fa-minus"></i></button>
                                        <input type="text" value="1">
                                        <button type="button" class="add"><i class="fa fa-plus"></i></button>
                                    </div>
                                </div>
                            </td>
                            <td>$30.00</td>
                            <td>
                                <a href="cart.html" class="table cart-page__table__remove"><i class="fas fa-times"></i></a>
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>
            <div class="row">
                <div class="col-xl-12">
                    <form action="#" class="cart-page__coupone-form">
                        <label for="coupon">Coupon:</label>
                        <div class="cart-page__coupone-form__inner">
                            <input id="coupon" type="text" placeholder="Enter coupon code" class="cart-cupon__input">
                            <button type="submit" class="rentol-btn"><span>Apply Code</span></button>
                            <button type="submit" class="rentol-btn update"><span>Update Cart</span></button>
                        </div>
                    </form>
                </div>
                <div class="col-xl-8 col-lg-7"></div>
                <div class="col-xl-4 col-lg-5">
                    <div class="cart-page__cart-total">
                        <h3 class="cart-page__cart-total__title">Subtotal</h3>
                        <ul class="cart-page__cart-total__list list-unstyled">
                            <li><span>Subtotal</span>$999.00</li>
                            <li class="shipping">
                                Shipping Address
                                <p class="cart-page__cart-total__list__text">
                                    2801 Lafayette Blvd, Norfolk, Vermont<br> 23509, united state
                                </p>
                            </li>
                            <li><span>Total</span>$999.00</li>
                        </ul>
                        <div class="cart-page__buttons">
                            <a href="checkout.html" class="rentol-btn rentol-btn--base"><span>checkout</span></a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    @include('frontend.includes.footer')
</x-fndashboard-layout>