<x-frontend-app-layout>
    <div class="page-header-one">
        <div class="page-header-one__bg" style="background-image: url(/frontend/assets/images/backgrounds/slider-1-1.jpg);"></div>
    </div><!-- /.page-header-one -->

    <section class="contact-one section-space">
        <div class="container">
            <div class="row gutter-y-30">
                <div class="col-xl-4 col-lg-6">
                    <div class="contact-one__list">
                        <div class="contact-one__item wow fadeInLeft" data-wow-duration="1500ms">
                            <div class="contact-one__item__icon">
                                <i class="icon-pin"></i>
                            </div>
                            <div class="contact-one__item__content">
                                <h5 class="contact-one__item__title">Mailing Address</h5>
                                <p class="contact-one__item__text">Rentway(Pvt)Ltd, 4th Floor,JJC,Rajagiriya,SriLanka.</p>
                            </div>
                        </div>
                        <div class="contact-one__item wow fadeInLeft" data-wow-duration="1700ms">
                            <div class="contact-one__item__icon">
                                <i class="icon-telephone"></i>
                            </div>
                            <div class="contact-one__item__content">
                                <h5 class="contact-one__item__title">Quick Contact</h5>
                                <a href="tel:94713370393" class="contact-one__item__call">+94 71 33 70 393</a>
                                <a href="tel:94702932000" class="contact-one__item__call">+94 70 29 32 000</a>
                            </div>
                        </div>
                        <div class="contact-one__item wow fadeInLeft" data-wow-duration="1900ms">
                            <div class="contact-one__item__icon">
                                <i class="icon-email-1"></i>
                            </div>
                            <div class="contact-one__item__content">
                                <h5 class="contact-one__item__title">support email</h5>
                                <a href="mailto:contact@rentway.lk" class="contact-one__item__call">contact@rentway.lk</a>
                                <a href="mailto:info@rentway.lk" class="contact-one__item__call">info@rentway.lk</a>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-xl-8">
                    <div class="contact-one__inner">
                        <div class="contact-one__bg" style="background-image: url(frontend/assets/images/shapes/contact-shape-1-1.png);"></div>
                        <div class="row">
                            <div class="col-lg-6">
                                <div class="contact-one__form__thumb real-image">
                                    <img src="frontend/assets/images/resources/contact-1-1.jpg" alt="rentol image">
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <form class="contact-one__form contact-form-validated form-one wow fadeInUp" data-wow-duration="1500ms" action="inc/sendemail.php">
                                    <div class="form-one__group">
                                        <div class="form-one__control form-one__control--full">
                                            <input type="text" name="name" placeholder="name">
                                        </div>
                                        <div class="form-one__control form-one__control--full">
                                            <input type="email" name="email" placeholder="Email address">
                                        </div>
                                        <div class="form-one__control form-one__control--full">
                                            <input type="text" name="subject" placeholder="select subject">
                                        </div>
                                        <div class="form-one__control form-one__control--full">
                                            <textarea name="message" placeholder="Write  a message"></textarea>
                                        </div>
                                        <div class="form-one__control form-one__control--full">
                                            <button type="submit" class="rentol-btn rentol-btn--submite">get in touch <i class="icon-right-arrow"></i></button>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </section>

    <div class="contact-map">
        <div class="google-map google-map__contact">
            <iframe title="template google map" src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d4562.753041141002!2d-118.80123790098536!3d34.152323469614075!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x80e82469c2162619%3A0xba03efb7998eef6d!2sCostco+Wholesale!5e0!3m2!1sbn!2sbd!4v1562518641290!5m2!1sbn!2sbd" class="map__contact" allowfullscreen></iframe>
        </div>
        <!-- /.google-map -->
    </div>

    @include('frontend.includes.footer')
</x-frontend-app-layout>