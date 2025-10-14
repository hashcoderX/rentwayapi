<x-advertizerpagelayout>

    <style>
        .image-upload-input {
            display: block;
        }

        .image-upload-btn {
            background-color: #4CAF50;
            color: white;
            padding: 10px 20px;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            font-size: 16px;
        }

        .image-upload-btn:hover {
            background-color: #45a049;
        }

        .selected-files {
            display: block;
            margin-top: 10px;
            font-size: 14px;
            color: #555;
        }

        .image-previews {
            display: flex;
            flex-wrap: wrap;
            gap: 10px;
            margin-top: 10px;
        }

        .image-preview {
            width: 100px;
            height: 100px;
            object-fit: cover;
            border-radius: 5px;
            border: 1px solid #ddd;
        }
    </style>

    <!-- Checkout Start -->
    <section class="checkout-page section-space">
        <div class="container">

            <div class="checkout-page__your-order">
                <h2 class="checkout-page__your-order__title">Welcome {{ Auth::user()->name }}! Let's post an ad</h2>
                <p>Choose any option below</p>
                <div class="row">
                    <div class="col-xl-6 col-lg-6 p-3">
                        <div class="checkout-page__payment" style="background-image: url(frontend/assets/images/shapes/contact-shape-1-1.png);">
                            <div class="checkout-page__payment__item checkout-page__payment__item--active">
                                <h3 class="checkout-page__payment__title">Vehicle Ads</h3>
                                <div class="checkout-page__payment__content" style="display: none;">Reach more customers by showcasing your vehicles on our platform. Whether you're an individual owner or a rental company, RentWay gives you the tools to list and promote your cars effortlessly. Make your vehicles visible to thousands of potential renters looking for reliable transport every day.</div><!-- /.checkout__payment__content -->
                            </div>

                            <a href="/rentvehicleads" class="rentol-btn rentol-btn--base">Post Ad</a>
                        </div>
                    </div>
                    <div class="col-lg-6 col-lg-6 p-3">
                        <div class="checkout-page__payment"  style="background-image: url(frontend/assets/images/shapes/contact-shape-1-1.png);">
                            <div class="checkout-page__payment__item checkout-page__payment__item--active">
                                <h3 class="checkout-page__payment__title">Service Base ad Posting</h3>
                                <div class="checkout-page__payment__content" style="display: none;">Promote your transport services easily on RentWay. Whether you offer ambulance transport, courier delivery, school transport, or staff shuttle services, this platform helps you reach potential customers faster. Showcase your services, build trust, and grow your business with a reliable and user-friendly system.
                                </div><!-- /.checkout__payment__content -->
                            </div>

                            <a href="/servicebaseads" class="rentol-btn rentol-btn--base">Post Ad</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Checkout End -->

    @include('frontend.includes.footer')
</x-advertizerpagelayout>


<script>
    const imageInput = document.querySelector('.image-upload-input');
    const uploadBtn = document.querySelector('.image-upload-btn');
    const selectedFilesText = document.querySelector('.selected-files');
    const imagePreviewContainer = document.querySelector('.image-previews');

    let totalImages = 0;

    uploadBtn.addEventListener('click', () => {
        imageInput.click();
    });

    imageInput.addEventListener('change', (event) => {
        const selectedFiles = event.target.files;

        if (selectedFiles.length > 0) {
            selectedFilesText.style.display = 'none'; // Hide "No files chosen"
        }

        Array.from(selectedFiles).forEach(file => {
            const reader = new FileReader();

            reader.onload = (e) => {
                const img = document.createElement('img');
                img.src = e.target.result;
                img.classList.add('image-preview');
                imagePreviewContainer.appendChild(img);
            };

            reader.readAsDataURL(file);
        });

        totalImages += selectedFiles.length;
        uploadBtn.textContent = `Add More Images (${totalImages})`;
    });
</script>