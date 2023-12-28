<?php

namespace App\Http\Controllers;
use App\Models\Product;
class CarouselController extends Controller
{
    public function showCarousels()
    {
        // Fetch products from the database with pagination
        // You can adjust the number of items per page
        $products = Product::paginate(3);


        // Transforms the fetched data into the right format for the view
        $carouselsData = $products->map(function ($product) {
            return [
                'id' => 'customCarousel' . $product->id,
                'width' => 300,
                'height' => 250,
                'images' => [
                    // I've added two placeholders, because I'm using Postgres, so rewriting the database
                    // to contain three image URL's, wasn't something I wanted to do
                    [
                        'src' => $product->image,
                        'alt' => $product->name,
                    ],
                    [
                        'src' => 'https://www.elgiganten.dk/image/dv_web_D180001002599931/254420/macbook-air-13-m18256-2020-space-grey--pdp_zoom-3000--pdp_main-960.jpg',
                        'alt' => 'Second slide',
                    ],
                    [
                        'src' => 'https://www.elgiganten.dk/image/dv_web_D180001002599894/254420/macbook-air-13-m18256-2020-space-grey--pdp_zoom-3000--pdp_main-960.jpg',
                        'alt' => 'Third slide',
                    ],
                ],
                // Fetches the corresponding information from the database
                // substr for showing the first 50 characters
                'title' => $product->name,
                'cardText' => substr($product->description, 0, 50),
                'buttonText' => 'Click for More',
            ];
        });

        return view('productCatalogWithImageCarousel', compact('carouselsData', 'products'));
    }
}
