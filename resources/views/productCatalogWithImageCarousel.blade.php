@extends("app")

@section("title", "productPageWithImageCarousel")

@section("content")

    <div class="h-screen bg-amber-500">

        <div class="grid grid-cols-4 gap-4">
            @foreach($carouselsData as $carousel)
                <div class="card" style="width: {{ $carousel['width'] }}px; margin: 10px;">

                    <div id="{{ $carousel['id'] }}" class="carousel slide" data-ride="carousel"
                         style="width: 100%; max-width: {{ $carousel['width'] }}px; height: {{ $carousel['height'] }}px;">
                        <div class="carousel-inner">
                            <!-- Images will be dynamically added here -->
                        </div>
                        <a class="carousel-control-prev" href="#{{ $carousel['id'] }}" role="button" data-slide="prev">
                            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                            <span class="sr-only">Previous</span>
                        </a>
                        <a class="carousel-control-next" href="#{{ $carousel['id'] }}" role="button" data-slide="next">
                            <span class="carousel-control-next-icon" aria-hidden="true"></span>
                            <span class="sr-only">Next</span>
                        </a>
                    </div>

                    <div class="card-body">
                        <h5 class="card-title" style="font-weight: bold;">{{ $carousel['title'] }}</h5>
                        <p class="card-text">{{ $carousel['cardText'] }}</p>
                        <a href="#" class="btn btn-primary" style="margin-top: 5px">{{ $carousel['buttonText'] }}</a>
                    </div>
                </div>

                <script>
                    // The function that replaces the HTML above with images of your own choosing
                    function initCarousel(containerId, images, width, height) {
                        var carouselContainer = document.getElementById(containerId);
                        var carouselInner = carouselContainer.querySelector('.carousel-inner');

                        // Custom height and width
                        carouselContainer.style.width = '100%';
                        carouselContainer.style.maxWidth = width + 'px';
                        carouselContainer.style.height = height + 'px';

                        // Iterate through the images array and create carousel items
                        images.forEach(function (image, index) {
                            var item = document.createElement('div');
                            item.className = 'carousel-item' + (index === 0 ? ' active' : '');

                            // Setting the img src and alt to your custom img src and alt
                            var img = document.createElement('img');
                            img.src = image.src;
                            img.alt = image.alt;

                            // Set max-width to 90% to ensure the image fits within the container
                            img.style.maxWidth = '90%';

                            // Adding mx-auto to center the image
                            img.className = 'd-block mx-auto';

                            item.appendChild(img);
                            carouselInner.appendChild(item);
                        });
                    }

                    // Adding the pictures to the carousel
                    var {{ $carousel['id'] }}_images = {!! json_encode($carousel['images']) !!};

                    // initCarousel creates the carousel's
                    initCarousel('{{ $carousel['id'] }}', {{ $carousel['id'] }}_images, {{ $carousel['width'] }}, {{ $carousel['height'] }});
                </script>
            @endforeach
        </div>


        <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js"
        integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN"
        crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js"
        integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl"
        crossorigin="anonymous"></script>

    </div>
    <!-- Displays pagination links -->
    {{ $products->links() }}

@endsection
