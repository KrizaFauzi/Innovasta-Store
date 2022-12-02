<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF8">
    <title>Image Test</title>
    <!-- Bootstrap -->
    <link rel="stylesheet" href="{{ asset('assets/css/bootstrap.min.css') }}">
    
    <style>
        * {
            box-sizing: border-box;
        }

        img {
            max-width: 100%;
            vertical-align: top;
        }

        .gallery {
            display: flex;
            margin: 10px auto;
            max-width: 600px;
            position: relative;
            padding-top: 66.6666666667%;
        }

        @media screen and (min-width: 600px) {
            .gallery {
                padding-top: 400px;
            }
        }

        .gallery__img {
            position: absolute;
            top: 0;
            left: 0;
            opacity: 0;
            transition: opacity 0.3s ease-in-out;
        }

        .gallery__thumb {
            padding-top: 6px;
            margin: 6px;
            display: block;
        }

        .gallery__selector {
            position: absolute;
            opacity: 0;
            visibility: hidden;
        }

        .gallery__selector:checked+.gallery__img {
            opacity: 1;
        }

        .gallery__selector:checked~.gallery__thumb>img {
            box-shadow: 0 0 0 3px #0be2f6;
        }

    </style>

    <script src="https://unpkg.com/js-image-zoom@0.7.0/js-image-zoom.js" type="application/javascript"></script>
</head>

<body>
    <div id="img-container" style="width: 400px">
        <img style="max-width: 400px;" src="{{ asset('uploads/products/16679617181.jpg') }}" />
    </div>

    <section class="gallery">
        <div class="gallery__item" id="img-container">
            <input type="radio" id="img-1" checked name="gallery" class="gallery__selector" />
            <img class="gallery__img" src="https://picsum.photos/id/1015/600/400.jpg" alt="" />
            <label for="img-1" class="gallery__thumb"><img src="https://picsum.photos/id/1015/150/100.jpg"
                    alt="" /></label>
        </div>
        <div class="gallery__item">
            <input type="radio" id="img-2" name="gallery" class="gallery__selector" />
            <img class="gallery__img" src="https://picsum.photos/id/1039/600/400.jpg" alt="" />
            <label for="img-2" class="gallery__thumb"><img src="https://picsum.photos/id/1039/150/100.jpg"
                    alt="" /></label>
        </div>
        <div class="gallery__item">
            <input type="radio" id="img-3" name="gallery" class="gallery__selector" />
            <img class="gallery__img" src="https://picsum.photos/id/1057/600/400.jpg" alt="" />
            <label for="img-3" class="gallery__thumb"><img src="https://picsum.photos/id/1057/150/100.jpg"
                    alt="" /></label>
        </div>
        <div class="gallery__item">
            <input type="radio" id="img-4" name="gallery" class="gallery__selector" />
            <img class="gallery__img" src="https://picsum.photos/id/106/600/400.jpg" alt="" />
            <label for="img-4" class="gallery__thumb"><img src="https://picsum.photos/id/106/150/100.jpg"
                    alt="" /></label>
        </div>
    </section>

    <script>
        /* product left start */
        if ($(".product-left").length) {
            var productSlider = new Swiper('.product-slider', {
                spaceBetween: 0,
                centeredSlides: false,
                loop: true,
                direction: 'horizontal',
                loopedSlides: 5,
                navigation: {
                    nextEl: ".swiper-button-next",
                    prevEl: ".swiper-button-prev",
                },
                resizeObserver: true,
            });
            var productThumbs = new Swiper('.product-thumbs', {
                spaceBetween: 0,
                centeredSlides: true,
                loop: true,
                slideToClickedSlide: true,
                direction: 'horizontal',
                slidesPerView: 5,
                loopedSlides: 5,
            });
            productSlider.controller.control = productThumbs;
            productThumbs.controller.control = productSlider;




        }
        /*  product left end */

    </script>
    <script>
        var options1 = {
            width: 400,
            zoomWidth: 500,
            offset: {
                vertical: 0,
                horizontal: 10
            }
        };

        // If the width and height of the image are not known or to adjust the image to the container of it
        var options2 = {
            fillContainer: true,
            offset: {
                vertical: 0,
                horizontal: 10
            }
        };

        new ImageZoom(document.getElementById("img-container"), options2);

    </script>

    <script src="{{ asset('assets/js/bootstrap.bundle.min.js') }}"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/ekko-lightbox/5.3.0/ekko-lightbox.js"></script>
    <script src="https://cdnjs.cloudflare.com//libs/popper.js/1.14.7/umd/popper.min.js"></script>

</body>

</html>
