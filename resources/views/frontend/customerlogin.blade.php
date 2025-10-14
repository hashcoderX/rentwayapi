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
                                <h2 class="login-page__title">Nice to see you again</h2>
                                <div class="contact-form-validated form-one" action="inc/sendemail.php">
                                    <div class="login-page__group">
                                        <div class="login-page__input-box">
                                            <label for="name">Login</label>
                                            <input type="text" id="name" name="name" placeholder="Email or phone number">
                                        </div>
                                        <div class="login-page__input-box">
                                            <label for="password">Password</label>
                                            <input type="password" placeholder="Enter Password" id="password" class="login-page__password" onkeyup="if(event.key === 'Enter'){ signin(); }">
                                            <span class="toggle-password pass-field-icon fa fa-fw fa-eye-slash"></span>
                                        </div>
                                        <div class="login-page__input-box login-page__input-box--bottom">
                                            <div class="login-page__input-box__inner">
                                                <input id="remember-policy" class="login-page__input-box__toggle" type="checkbox">
                                                <label class="remember-policy" for="remember-policy">remember me</label>
                                            </div>
                                            <a href="/forgetcustomerpassword" class="login-page__form__forgot">forgot password?</a>
                                        </div>
                                        <div class="login-page__input-box">
                                            <div class="login-page__input-box__btn">
                                                <button type="submit" onclick="signin()" class="rentol-btn">Sign in</button>
                                            </div>
                                            <div class="login-page__input-box__btn">
                                                <a href="{{ route('google.login') }}"  class="rentol-btn rentol-btn__google"><img src="frontend/assets/images/shapes/google.png" alt> Or sign in with Google</a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
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

    // Show the loader
    document.querySelector('.preloader').style.display = 'block';

    // Disable the Sign In button
    const signInButton = document.querySelector('.rentol-btn');
    signInButton.disabled = true;
    signInButton.innerText = 'Signing in...';

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
                window.location.href = response.redirect;
            } else {
                alert(response.message);
                // Hide loader and re-enable button if login failed
                document.querySelector('.preloader').style.display = 'none';
                signInButton.disabled = false;
                signInButton.innerText = 'Sign in';
            }
        },
        error: function(xhr) {
            alert("An error occurred. Please try again.");
            // Hide loader and re-enable button if server error
            document.querySelector('.preloader').style.display = 'none';
            signInButton.disabled = false;
            signInButton.innerText = 'Sign in';
        }
    });
}

</script>