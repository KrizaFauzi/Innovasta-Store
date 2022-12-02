<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>About Us</title>

    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/css/all.min.css" rel="stylesheet">

    <!-- Fonts -->
    <link href='https://fonts.googleapis.com/css?family=Signika' rel='stylesheet'>
    <link href="https://fonts.cdnfonts.com/css/bukhari-script" rel="stylesheet">

    <!-- Bootstrap -->
    <link rel="stylesheet" href="{{ asset('assets/css/bootstrap.min.css') }}">

    <style>
        [tooltip] {
            position: relative;
            /* opinion 1 */
        }

        /* Applies to all tooltips */
        [tooltip]::before,
        [tooltip]::after {
            text-transform: none;
            /* opinion 2 */
            font-size: .9em;
            /* opinion 3 */
            line-height: 1;
            user-select: none;
            pointer-events: none;
            position: absolute;
            display: none;
            opacity: 0;
        }

        [tooltip]::before {
            content: '';
            border: 5px solid transparent;
            /* opinion 4 */
            z-index: 1001;
            /* absurdity 1 */
        }

        [tooltip]::after {
            content: attr(tooltip);
            /* magic! */

            /* most of the rest of this is opinion */
            font-family: Helvetica, sans-serif;
            text-align: center;

            /* 
            Let the content set the size of the tooltips 
            but this will also keep them from being obnoxious
            */
            min-width: 3em;
            max-width: 21em;
            white-space: nowrap;
            overflow: hidden;
            text-overflow: ellipsis;
            padding: 1ch 1.5ch;
            border-radius: .3ch;
            box-shadow: 0 1em 2em -.5em rgba(0, 0, 0, 0.35);
            background: black;
            color: #fff;
            z-index: 1000;
            /* absurdity 2 */
        }

        /* Make the tooltips respond to hover */
        [tooltip]:hover::before,
        [tooltip]:hover::after {
            display: block;
        }

        /* don't show empty tooltips */
        [tooltip='']::before,
        [tooltip='']::after {
            display: none !important;
        }

        /* FLOW: UP */
        [tooltip]:not([flow])::before,
        [tooltip][flow^="up"]::before {
            bottom: 100%;
            border-bottom-width: 0;
            border-top-color: #333;
        }

        [tooltip]:not([flow])::after,
        [tooltip][flow^="up"]::after {
            bottom: calc(100% + 5px);
        }

        [tooltip]:not([flow])::before,
        [tooltip]:not([flow])::after,
        [tooltip][flow^="up"]::before,
        [tooltip][flow^="up"]::after {
            left: 50%;
            transform: translate(-50%, -.5em);
        }

        /* FLOW: DOWN */
        /*[tooltip][flow^="down"]::before {
        top: 100%;
        border-top-width: 0;
        border-bottom-color: black;
        }*/

        [tooltip][flow^="down"]::after {
            top: calc(100% + 15px);
        }

        [tooltip][flow^="down"]::before,
        [tooltip][flow^="down"]::after {
            left: 50%;
            transform: translate(-50%, .5em);
        }

        /* FLOW: LEFT */
        [tooltip][flow^="left"]::before {
            top: 50%;
            border-right-width: 0;
            border-left-color: #333;
            left: calc(0em - 5px);
            transform: translate(-.5em, -50%);
        }

        [tooltip][flow^="left"]::after {
            top: 50%;
            right: calc(100% + 5px);
            transform: translate(-.5em, -50%);
        }

        /* FLOW: RIGHT */
        [tooltip][flow^="right"]::before {
            top: 50%;
            border-left-width: 0;
            border-right-color: #333;
            right: calc(0em - 5px);
            transform: translate(.5em, -50%);
        }

        [tooltip][flow^="right"]::after {
            top: 50%;
            left: calc(100% + 5px);
            transform: translate(.5em, -50%);
        }

        /* KEYFRAMES */
        @keyframes tooltips-vert {
            to {
                opacity: .9;
                transform: translate(-50%, 0);
            }
        }

        @keyframes tooltips-horz {
            to {
                opacity: .9;
                transform: translate(0, -50%);
            }
        }

        /* FX All The Things */
        [tooltip]:not([flow]):hover::before,
        [tooltip]:not([flow]):hover::after,
        [tooltip][flow^="up"]:hover::before,
        [tooltip][flow^="up"]:hover::after,
        [tooltip][flow^="down"]:hover::before,
        [tooltip][flow^="down"]:hover::after {
            animation: tooltips-vert 300ms ease-out forwards;
        }

        [tooltip][flow^="left"]:hover::before,
        [tooltip][flow^="left"]:hover::after,
        [tooltip][flow^="right"]:hover::before,
        [tooltip][flow^="right"]:hover::after {
            animation: tooltips-horz 300ms ease-out forwards;
        }

    </style>
</head>

<body style="background-color: #c2cad0; font-family: 'Signika';">
    <!-- As a link -->
    <nav class="navbar bg-white" style="padding-top: 10px; padding-bottom: 10px;">
        <div class="container m-auto">
            <span class="m-auto" tooltip="About Us" flow="down">
                <a class="navbar-brand"
                    style="color: #a87a64; font-size: 23px; font-family: 'Bukhari Script', sans-serif;"
                    href="{{ url('/about-us') }}">
                    Good Fance <span style="color: black;">Bag</span> <span class="ms-0 ps-0"
                        style="color: black; font-size: 25px; font-family: 'Signika';">About Us</span>
                </a>
            </span>
        </div>
    </nav>

    <div class="py-3">
        <div class="container">
            <div class="row row-cols-1 row-cols-lg-2">
                <div class="col">
                    <div class="bg-white border text-center py-2 px-3 rounded-3 shadow-sm">
                        <h4>Tentang Kami</h4>
                        <p>
                            Kami menjual berbagai macam tas, warna dan model yang berkualis dan nyaman di pakai dan juga
                            trending
                        </p>
                    </div>
                </div>
                <div class="col">
                    <div class="bg-white border text-center py-2 px-3 rounded-3 shadow-sm">
                        <h4>Tujuan Kami</h4>
                        <p>
                            Memudahkan masyarakat mencari tas untuk kebutuhan sandang di lingkungan sekolah,
                            kerja maupun kuliah
                        </p>
                    </div>
                </div>
            </div>
            <div class="d-flex justify-content-center mt-3">
                <a class="btn btn-info border m-auto" href="{{ url('/') }}" style="box-shadow: rgba(60, 64, 67, 0.3) 0px 1px 2px 0px, rgba(60, 64, 67, 0.15) 0px 2px 6px 2px;">
                    Kembali ke Halaman GoodFance Bag
                </a>
            </div>
        </div>
    </div>

    <!-- Scripts Bootstrap -->
    <script src="{{ asset('assets/js/jquery-3.6.1.min.js') }}"></script>
    <script src="{{ asset('assets/js/bootstrap.bundle.min.js') }}"></script>
</body>

</html>
