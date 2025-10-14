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

    <section class="team-details">
        <div class="container">

            @foreach ($myads as $add)

            <div class="team-details__inner mt-2">
                <div class="team-details__inner__bg" style="background-image: url(frontend/assets/images/shapes/contact-shape-1-1.png);"></div><!-- /.team-details__inner__bg -->
                <div class="row gutter-y-30 align-items-center">
                    <div class="col-lg-2">
                        <div class="team-details__thumb wow fadeInUp animated" data-wow-duration="1500ms" data-wow-delay="300ms" style="visibility: visible; animation-duration: 1500ms; animation-delay: 300ms; animation-name: fadeInUp;">
                            <div class="team-details__thumb__image">
                                @php
                                $images = json_decode($add->images);
                                @endphp

                                @if ($images && count($images) > 0)
                                <img src="{{ asset($images[0]) }}" alt="Ad Image" style="width: 100%; border-radius: 10px;">
                                @endif

                                <div class="team-details__thumb__social">
                                    <a href="https://facebook.com">
                                        <i class="fab fa-facebook-f" aria-hidden="true"></i>
                                        <span class="sr-only">Facebook</span>
                                    </a>
                                    <a href="https://twitter.com">
                                        <i class="fab fa-twitter" aria-hidden="true"></i>
                                        <span class="sr-only">Twitter</span>
                                    </a>
                                    <a href="https://instagram.com">
                                        <i class="fab fa-instagram" aria-hidden="true"></i>
                                        <span class="sr-only">Instagram</span>
                                    </a>
                                    <a href="https://www.youtube.com/">
                                        <i class="fab fa-youtube" aria-hidden="true"></i>
                                        <span class="sr-only">Youtube</span>
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-10">
                        <div class="team-details__content">
                            <div class="team-details__content__about wow fadeInUp animated" data-wow-duration="1500ms" data-wow-delay="300ms" style="visibility: visible; animation-duration: 1500ms; animation-delay: 300ms; animation-name: fadeInUp;">
                                <h3 class="team-details__content__title">{{ $add->title  }}</h3>
                                <p class="team-details__content__text">{{ $add->description  }}</p>

                            </div>
                            <ul class="team-details__link list-unstyled">
                                <li class="team-details__link__item wow fadeInUp animated" data-wow-duration="1500ms" data-wow-delay="300ms" style="visibility: visible; animation-duration: 1500ms; animation-delay: 300ms; animation-name: fadeInUp;">
                                    <div class="team-details__link__item__inner">
                                        <div class="team-details__link__icon">
                                            <i class="icon-telephone"></i>
                                        </div>
                                        <a href="tel:{{ $add->mobile_number  }}" class="team-details__link__dec">{{ $add->mobile_number  }}</a>
                                    </div>
                                </li>

                                <li class="team-details__link__item wow fadeInUp animated" data-wow-duration="1500ms" data-wow-delay="300ms" style="visibility: visible; animation-duration: 1500ms; animation-delay: 300ms; animation-name: fadeInUp;">
                                    <div class="team-details__link__item__inner">
                                        <div class="team-details__link__icon">
                                            <i class="icon-pin"></i>
                                        </div>
                                        <p class="team-details__link__dec">{{ $add->city  }}</p>
                                    </div>
                                </li>
                            </ul>
                            <ul class="list-unstyled">
                                <li><strong>Views:</strong> {{ $add->views }}</li>
                                <li><strong>Status:</strong> {{ $add->status }}</li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
            @endforeach
        </div>
    </section>

    @include('frontend.includes.footer')



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

</x-advertizerpagelayout>