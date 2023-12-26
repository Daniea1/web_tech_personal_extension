@extends("app")

@section("title", "ImageCarouselTest")

@section("content")

    <div class="card" style="width: 20rem; margin: 10px;">

        <div id="customCarousel" class="carousel slide" data-ride="carousel" style="width: 600px; height: 400px;">
            <div class="carousel-inner">
                <!-- Images will be dynamically added here -->
            </div>
            <a class="carousel-control-prev" href="#customCarousel" role="button" data-slide="prev">
                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                <span class="sr-only">Previous</span>
            </a>
            <a class="carousel-control-next" href="#customCarousel" role="button" data-slide="next">
                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                <span class="sr-only">Next</span>
            </a>
        </div>

        <div class="card-body">
            <h5 id="card-title" class="card-title" style="font-weight: bold;"></h5>
            <p id="card-text" class="card-text"></p>
            <a id="button-text" href="#" class="btn btn-primary" style="margin-top: 5px"></a>
        </div>
    </div>

    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js"
            integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN"
            crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js"
            integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q"
            crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js"
            integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl"
            crossorigin="anonymous"></script>

    <script>
        //The function that replace the html above with images of your own choosing
        function initCarousel(containerId, images, width, height, title, cardText, buttonText) {
            var carouselContainer = document.getElementById(containerId);
            var carouselInner = carouselContainer.querySelector('.carousel-inner');

            //Custom height and width
            carouselContainer.style.width = width + 'px';
            carouselContainer.style.height = height + 'px';

            // Iterate through the images array and create carousel items
            images.forEach(function (image, index) {
                var item = document.createElement('div');
                item.className = 'carousel-item' + (index === 0 ? ' active' : '');

                //Setting the img src and alt to your custom img src and alt
                var img = document.createElement('img');
                img.src = image.src;
                img.alt = image.alt;

                // Adding mx-auto class to center the image horizontally
                img.className = 'd-block mx-auto';

                item.appendChild(img);
                carouselInner.appendChild(item);

                document.getElementById("card-title").innerHTML = title;
                document.getElementById("card-text").innerHTML = cardText;
                document.getElementById("button-text").innerHTML = buttonText;
            });
        }

        // Adding the pictures for the carousel
        var images = [
            {
                src: 'https://www.elgiganten.dk/image/dv_web_D180001002599667/254420/macbook-air-13-m18256-2020-space-grey--pdp_zoom-3000--pdp_main-960.jpg',
                alt: 'First slide'
            },
            {
                src: 'https://www.elgiganten.dk/image/dv_web_D180001002599931/254420/macbook-air-13-m18256-2020-space-grey--pdp_zoom-3000--pdp_main-960.jpg',
                alt: 'Second slide'
            },
            {
                src: 'https://www.elgiganten.dk/image/dv_web_D180001002599894/254420/macbook-air-13-m18256-2020-space-grey--pdp_zoom-3000--pdp_main-960.jpg',
                alt: 'Third slide'
            }
        ];

        //Creating a carousel using carousel
        initCarousel('customCarousel', images, 300, 300, "Macbook Pro 2023 M1",
        "Some quick example text to fill out the card description and make up the bulk of the card's content",
            "Click for More"
        );
    </script>

@endsection

