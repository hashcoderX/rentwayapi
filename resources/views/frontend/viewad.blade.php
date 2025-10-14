<x-frontend-app-layout>


    <section class="fleet-details-car-details section-space-top">
        <div class="container">
            <div class="row">
                <!-- Image Thumbnails -->
                <div class="col-lg-6">
                    <div class="fleet-details-car-details__inner">
                        @php
                        $images = json_decode($add->images, true);
                        @endphp

                        @if($images && count($images) > 0)
                        <div id="adImageCarousel" class="carousel slide" data-bs-ride="carousel">
                            <div class="carousel-inner">
                                @foreach($images as $index => $image)
                                <div class="carousel-item {{ $index === 0 ? 'active' : '' }}">
                                    <img src="{{ asset($image) }}" class="d-block w-100 rounded shadow-sm" alt="Ad Image" class="img-fluid rounded shadow-sm cursor-pointer" 
                                        data-bs-toggle="modal" 
                                        data-bs-target="#imageModal" 
                                        data-bs-slide-to="{{ $index }}" 
                                        onclick="showCarouselAt({{ $index }})"
                                        alt="Ad Image">
                                </div>
                                @endforeach
                            </div>

                            @if(count($images) > 1)
                            <!-- Controls -->
                            <button class="carousel-control-prev" type="button" data-bs-target="#adImageCarousel" data-bs-slide="prev">
                                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                                <span class="visually-hidden">Previous</span>
                            </button>
                            <button class="carousel-control-next" type="button" data-bs-target="#adImageCarousel" data-bs-slide="next">
                                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                                <span class="visually-hidden">Next</span>
                            </button>
                            @endif
                        </div>
                        @endif
                    </div>
                </div>

                <!-- Ad Info -->
                <div class="col-lg-6">
                    <div class="fleet-details-car-details__content">
                        <div class="fleet-details-car-details__top mb-3">
                            <h3 class="fleet-details-car-details__title mb-2">{{ $add->title }}</h3>
                            <div class="fleet-details-car-details__price text-success fw-bold fs-4">
                                Rs. {{ number_format($add->price) }}
                            </div>
                        </div>
                        <p class="fleet-details-car-details__text text-muted">
                            {{ $add->description }}
                        </p>

                        <div><b>{{ $add->mobile_number  }}</b></div>
                        <div>Contact Person Name - {{ $add->mobile_number  }}</div>
                    </div>
                </div>
            </div>

            <div class="fleet-details-car-details__line mt-4 border-top"></div>
        </div>
    </section>

    <!-- Modal with Carousel -->
    <div class="modal fade" id="imageModal" tabindex="-1" aria-labelledby="imageModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-xl modal-dialog-centered">
            <div class="modal-content bg-dark">
                <div class="modal-header border-0">
                    <button type="button" class="btn-close btn-close-white ms-auto" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body p-0">
                    <div id="carouselModalInner" class="carousel slide" data-bs-ride="carousel">
                        <div class="carousel-inner">
                            @foreach($images as $index => $image)
                            <div class="carousel-item {{ $index === 0 ? 'active' : '' }}">
                                <img src="{{ asset($image) }}" class="d-block w-100 rounded" alt="Large Image">
                            </div>
                            @endforeach
                        </div>

                        <!-- Controls -->
                        @if(count($images) > 1)
                        <button class="carousel-control-prev" type="button" data-bs-target="#carouselModalInner" data-bs-slide="prev">
                            <span class="carousel-control-prev-icon"></span>
                        </button>
                        <button class="carousel-control-next" type="button" data-bs-target="#carouselModalInner" data-bs-slide="next">
                            <span class="carousel-control-next-icon"></span>
                        </button>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>



    @include('frontend.includes.footer')


</x-frontend-app-layout>


<!-- Script to go to clicked image in modal -->
<script>
    function showCarouselAt(index) {
        const carousel = document.getElementById('carouselModalInner');
        const bsCarousel = bootstrap.Carousel.getInstance(carousel) || new bootstrap.Carousel(carousel);
        bsCarousel.to(index);
    }
</script>