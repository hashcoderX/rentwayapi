<x-frontend-app-layout>
    <!-- Login Start -->
    <section class="login-page">
        <div class="container">
            <div class="row gutter-y-30 align-items-center">
                <div class="col-xl-6 loginimg">
                    <div class="login-page__left wow fadeInLeft" data-wow-duration='1500ms' data-wow-delay='500ms'>
                        <div class="login-page__thumb real-image">
                            <img src="frontend/assets/images/resources/login-1-1.jpg" alt="login image">
                        </div>
                        <div class="login-page__thumb-two">
                            <img src="frontend/assets/images/resources/login-s-1-1.png" alt="rentol image">
                        </div>
                    </div>
                </div>
                <div class="col-xl-6">
                    <div class="login-page__right wow fadeInRight" data-wow-duration='1500ms' data-wow-delay='500ms'>
                        <div class="login-page__login-box">
                            <div class="login-page__content">
                                <div class="login-page__logo">
                                    <a href="/"> <img src="maincompanylogo/logo.png" width="169" height="60" alt="logo"> </a>
                                </div>
                                <h2 class="login-page__title">Reset Your Password</h2>
                                <form class="contact-form-validated form-one" action="{{ route('password.email') }}" method="POST">
                                @csrf
                                    <div class="login-page__group">
                                        <div class="login-page__input-box">
                                            <label for="name">Email</label>
                                            <input type="email" id="email" name="email" placeholder="Email" required autofocus>
                                        </div>
                                        
                                        <div class="login-page__input-box">
                                            <div class="login-page__input-box__btn">
                                                <button type="submit" onclick="signin()" class="rentol-btn">Send Password Reset Link</button>
                                            </div>
                                            
                                        </div>
                                    </div>
                                </form>
                                <p class="login-page__form__text">Dont have an account?<a href="/signupcustomers">Sign up now</a></p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Login End -->
    @include('frontend.includes.footer')
</x-frontend-app-layout>


<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

<script>
    function signin() {
        var email = document.getElementById('name').value;
        var password = document.getElementById('password').value;

        if (email === "" || password === "") {
            alert("Please fill in both email and password.");
            return;
        }

        $.ajax({
            url: "/customerlogin",
            type: "POST",
            data: {
                email: email,
                password: password
            },
            dataType: "json",
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            success: function(response) {
                if (response.success) {
                    window.location.href = response.redirect; // ✅ dynamic redirection
                } else {
                    alert(response.message);
                }
            }
        });
    }
</script>