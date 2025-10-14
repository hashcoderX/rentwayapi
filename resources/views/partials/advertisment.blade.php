<div class="row">
    <div class="col-md-12 grid-margin stretch-card">

        <div class="card">
            <div class="card-body">
                <!-- <h4 class="card-title"></h4> -->
                <div class="media">
                    <i class="mdi mdi-flag-variant icon-md text-info d-flex align-self-center mr-3"></i>
                    <div class="media-body">
                        <p class="card-text" id="bookingidc" style="display: none;">{{ $advertisment->id }}</p>

                        
                    </div>
                </div>

                <div class="media mt-2">
                    <div class="media-body">

                        <h1 class="mt-1 mb-1">{{ $advertisment->title }}</h1>

                        @php
                        $images = json_decode($advertisment->images);
                        @endphp

                        @if ($images)
                        <div class="d-flex flex-wrap" style="gap: 10px;">
                            @foreach ($images as $image)
                            <img src="{{ asset($image) }}" alt="Ad Image" style="width: 100px; height: 100px; object-fit: cover; border-radius: 8px;">
                            @endforeach
                        </div>
                        @endif
                        <p>{{ $advertisment->description  }}</p>
                        <p>{{ $advertisment->mobile_number  }}</p>
                        <p>{{ $advertisment->city  }} -> {{ $advertisment->district  }} -> {{ $advertisment->province  }}</p>
                        <button class="btn btn-success" onclick="confirmad('{{ $advertisment->id }}')">Confirm Ad</button>

                    </div>


                </div>

            </div>
        </div>
    </div>
</div>