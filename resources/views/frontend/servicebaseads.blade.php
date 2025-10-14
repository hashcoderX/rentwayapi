<x-advertizerpagelayout>
    <style>
        .image-upload-input {
            display: block;
        }

        .image-upload-btn {
            background-color: #F2AF1E;
            color: white;
            padding: 10px 20px;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            font-size: 16px;
        }

        .image-upload-btn:hover {
            background-color: #F2AF1E;
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
    <div id="loaderc" style="display:none; position:fixed; top:0; left:0; width:100%; height:100%; background:white; z-index:9999; text-align:center; padding-top:200px;">
        <img src="{{ asset('frontend/assets/images/loader.png') }}" alt="Loading..." style="width: 80px; height: 80px;">
        <p>Submitting your Ad, please wait...</p>
    </div>
    <section class="faq-page-search section-space">
        <div class="container">
            <ul class="team-details__link list-unstyled">
                <li class="team-details__link__item wow fadeInUp animated" data-wow-duration="1500ms" data-wow-delay="300ms" style="visibility: visible; animation-duration: 1500ms; animation-delay: 300ms; animation-name: fadeInUp;">
                    <div class="team-details__link__item__inner">
                        <div class="team-details__link__icon">
                            <i class="icon-paper-plane"></i>
                        </div>
                        <a href="/myads" class="team-details__link__dec">My Ads</a>
                    </div>
                </li>
                <li class="team-details__link__item wow fadeInUp animated" data-wow-duration="1500ms" data-wow-delay="300ms" style="visibility: visible; animation-duration: 1500ms; animation-delay: 300ms; animation-name: fadeInUp;">
                    <div class="team-details__link__item__inner">
                        <div class="team-details__link__icon">
                            <i class="icon-paper-plane"></i>
                        </div>
                        <a href="/allads" class="team-details__link__dec">All Ads</a>
                    </div>
                </li>
            </ul>
            <div class="faq-page-search__inner">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="faq-page-search__top">
                            <div class="sec-title text-center">
                                <h3 class="sec-title__title bw-split-in-left">Fill in the <br> Details</h3><!-- /.sec-title__title -->
                            </div><!-- /.sec-title -->
                            <div class="login-page__login-box" style="background-image: url(frontend/assets/images/shapes/contact-shape-1-1.png);">
                                <div class="login-page__content">
                                    @if ($errors->any())
                                    <div class="alert alert-danger mb-3">
                                        <ul class="mb-0">
                                            @foreach ($errors->all() as $error)
                                            <li>{{ $error }}</li>
                                            @endforeach
                                        </ul>
                                    </div>
                                    @endif
                                    <form class="contact-form-validated form-one"
                                        action="/postserviceadvertisment"
                                        method="POST"
                                        enctype="multipart/form-data">
                                        @csrf

                                        <div class="login-page__group">

                                            <div class="login-page__input-box">
                                                <label for="name">Title</label>
                                                <input type="text" id="name" name="name" placeholder="Keep it short">
                                            </div>

                                            <div class="login-page__input-box">
                                                <div class="row">
                                                    <div class="col">
                                                        <label for="province">Province</label>
                                                        <select name="province" id="province" class="form-control">
                                                            <option value="">Select Province</option>
                                                            @foreach ($provinces as $province)
                                                            <option value="{{ $province->id }}">{{ $province->name_en }}</option>
                                                            @endforeach
                                                        </select>
                                                    </div>

                                                    <div class="col">
                                                        <label for="district">District</label>
                                                        <select name="district" id="district" class="form-control">
                                                            <option>Select District</option>
                                                        </select>
                                                    </div>

                                                    <div class="col">
                                                        <label for="city">City</label>
                                                        <select name="city" id="city" class="form-control">
                                                            <option>Select City</option>
                                                        </select>
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="login-page__input-box">
                                                <label for="name">Service Type</label>
                                                <select name="servicetype" id="servicetype" class="form-control">
                                                    <option value="Ambulance Service">Ambulance Service</option>
                                                    <option value="Breakdown Service">Breakdown Service</option>
                                                    <option value="Staff Transport">Staff Transport Service</option>
                                                    <option value="School Transport">School Transport Service</option>
                                                </select>
                                            </div>

                                            <div class="login-page__input-box">
                                                <label for="description">Description 0/5000</label>
                                                <textarea class="mb-2" name="description" id="description" cols="30" rows="10"
                                                    style="background-color: white;border-radius: 10px;"></textarea>
                                            </div>

                                            <div class="login-page__input-box">
                                                <label for="name">Price (Rs) </label>
                                                <input type="number" id="price" name="price" placeholder="Pick a good price" class="form-control">
                                            </div>

                                            <div class="login-page__input-box">
                                                <label for="name">Contact Numbers</label>
                                                <input type="text" id="mobilenumber" name="mobilenumber" placeholder="0713370393/0702932000">
                                            </div>

                                            <div class="form-one__control form-one__control--full">
                                                <label for="description" class="mt-1">You can upload multiple images using this file chooser</label>
                                                <input type="file" name="images[]" class="image-upload-input" accept="image/*" multiple>
                                                <button type="button" class="image-upload-btn">Choose Images</button>
                                                <span class="selected-files">No files chosen</span>
                                                <div class="image-previews"></div>
                                            </div>

                                            <div class="login-page__input-box__btn">
                                                <button type="submit" class="rentol-btn">Post Ad</button>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    @include('frontend.includes.footer')
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
    <script>
        $(document).ready(function() {
            $('.contact-form-validated').on('submit', function() {
                $('#loaderc').show();
            });
        });
    </script>

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


    <script>
        document.getElementById('province').addEventListener('change', function() {
            let provinceId = this.value;

            fetch(`/get-districts/${provinceId}`)
                .then(response => response.json())
                .then(data => {
                    let districtSelect = document.getElementById('district');
                    districtSelect.innerHTML = `<option value="">Select District</option>`;

                    data.forEach(d => {
                        districtSelect.innerHTML += `<option value="${d.id}">${d.name_en}</option>`;
                    });

                    // Clear city dropdown
                    document.getElementById('city').innerHTML = `<option value="">Select City</option>`;
                });
        });

        document.getElementById('district').addEventListener('change', function() {
            let districtId = this.value;

            fetch(`/get-cities/${districtId}`)
                .then(response => response.json())
                .then(data => {
                    let citySelect = document.getElementById('city');
                    citySelect.innerHTML = `<option value="">Select City</option>`;

                    data.forEach(c => {
                        citySelect.innerHTML += `<option value="${c.id}">${c.name_en}</option>`;
                    });
                });
        });
    </script>


</x-advertizerpagelayout>