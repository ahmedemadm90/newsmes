<!DOCTYPE html>
<html lang="ar" dir="rtl">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="format-detection" content="telephone=no">
    <title>@yield('title')</title>
    <link rel="icon" type="image/png" href="/images/favicon.png">
    <!-- fonts -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Roboto:400,400i,500,500i,700,700i">
    <!-- css -->
    <link rel="stylesheet" href="{{ asset('public/vendor/bootstrap/css/bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ asset('public/vendor/owl-carousel/assets/owl.carousel.min.css') }}">
    <link rel="stylesheet" href="{{ asset('public/vendor/photoswipe/photoswipe.css') }}">
    <link rel="stylesheet" href="{{ asset('public/vendor/photoswipe/default-skin/default-skin.css') }}">
    <link rel="stylesheet" href="{{ asset('public/vendor/select2/css/select2.min.css') }}">
    <link rel="stylesheet" href="{{ asset('public/css/style.rtl.css') }}">
    <!-- font - fontawesome -->
    <link rel="stylesheet" href="{{ asset('public/vendor/fontawesome/css/all.min.css') }}">
    <!-- font - stroyka -->
    <link rel="stylesheet" href="{{asset('public/fonts/stroyka/stroyka.css')}}">
</head>

<body>
<style>
        * {
            box-sizing: border-box
        }

        /* Slideshow container */
        .slideshow-container {
            max-width: 1000px;
            position: relative;
            margin: auto;
        }

        /* Hide the images by default */
        .mySlides {
            display: none;
        }

        /* Next & previous buttons */
        .prev,
        .next {
            cursor: pointer;
            position: absolute;
            top: 50%;
            width: auto;
            margin-top: -22px;
            padding: 16px;
            color: white;
            font-weight: bold;
            font-size: 18px;
            transition: 0.6s ease;
            border-radius: 0 3px 3px 0;
            user-select: none;
        }

        /* Position the "next button" to the right */
        .next {
            right: 0;
            border-radius: 3px 0 0 3px;
        }

        /* On hover, add a black background color with a little bit see-through */
        .prev:hover,
        .next:hover {
            background-color: rgba(0, 0, 0, 0.8);
        }

        /* Caption text */
        .text {
            color: #f2f2f2;
            font-size: 15px;
            padding: 8px 12px;
            position: absolute;
            bottom: 8px;
            width: 100%;
            text-align: center;
        }

        /* Number text (1/3 etc) */
        .numbertext {
            color: #f2f2f2;
            font-size: 12px;
            padding: 8px 12px;
            position: absolute;
            top: 0;
        }

        /* The dots/bullets/indicators */
        .dot {
            cursor: pointer;
            height: 15px;
            width: 15px;
            margin: 0 2px;
            background-color: #bbb;
            border-radius: 50%;
            display: inline-block;
            transition: background-color 0.6s ease;
        }

        .active,
        .dot:hover {
            background-color: #717171;
        }

        /* Fading animation */
        .fade {
            -webkit-animation-name: fade;
            -webkit-animation-duration: 1.5s;
            animation-name: fade;
            animation-duration: 1.5s;
        }

        @-webkit-keyframes fade {
            from {
                opacity: .4
            }

            to {
                opacity: 1
            }
        }

        @keyframes fade {
            from {
                opacity: .4
            }

            to {
                opacity: 1
            }
        }

    </style>
    <!-- site -->
    <div class="site">



    @include('front.includes.header')



    @yield('content')



    @include('front.includes.footer')


    </div>
    <!-- site / end -->
    <!-- quickview-modal -->
    <div id="quickview-modal" class="modal fade" tabindex="-1" role="dialog" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered modal-xl">
            <div class="modal-content"></div>
        </div>
    </div>
    <!-- quickview-modal / end -->
    <!-- mobilemenu -->
    <div class="mobilemenu">
        <div class="mobilemenu__backdrop"></div>
        <div class="mobilemenu__body">
            <div class="mobilemenu__header">
                <div class="mobilemenu__title">Menu</div>
                <button type="button" class="mobilemenu__close">
                    <svg width="20px" height="20px">
                        <use xlink:href="images/sprite.svg#cross-20"></use>
                    </svg>
                </button>
            </div>
            <div class="mobilemenu__content">
                <ul class="mobile-links mobile-links--level--0" data-collapse
                    data-collapse-opened-class="mobile-links__item--open">
                    <li class="mobile-links__item" data-collapse-item>
                        <div class="mobile-links__item-title">
                            <a href="index.html" class="mobile-links__item-link">Home</a>
                            <button class="mobile-links__item-toggle" type="button" data-collapse-trigger>
                                <svg class="mobile-links__item-arrow" width="12px" height="7px">
                                    <use xlink:href="images/sprite.svg#arrow-rounded-down-12x7"></use>
                                </svg>
                            </button>
                        </div>
                        <div class="mobile-links__item-sub-links" data-collapse-content>
                            <ul class="mobile-links mobile-links--level--1">
                                <li class="mobile-links__item" data-collapse-item>
                                    <div class="mobile-links__item-title">
                                        <a href="index.html" class="mobile-links__item-link">Home 1</a>
                                    </div>
                                </li>
                                <li class="mobile-links__item" data-collapse-item>
                                    <div class="mobile-links__item-title">
                                        <a href="index-2.html" class="mobile-links__item-link">Home 2</a>
                                    </div>
                                </li>
                                <li class="mobile-links__item" data-collapse-item>
                                    <div class="mobile-links__item-title">
                                        <a href="index-3.html" class="mobile-links__item-link">Home 1 Finder</a>
                                    </div>
                                </li>
                                <li class="mobile-links__item" data-collapse-item>
                                    <div class="mobile-links__item-title">
                                        <a href="index-4.html" class="mobile-links__item-link">Home 2 Finder</a>
                                    </div>
                                </li>
                                <li class="mobile-links__item" data-collapse-item>
                                    <div class="mobile-links__item-title">
                                        <a href="offcanvas-cart.html" class="mobile-links__item-link">Offcanvas
                                            Cart</a>
                                    </div>
                                </li>
                            </ul>
                        </div>
                    </li>
                    <li class="mobile-links__item" data-collapse-item>
                        <div class="mobile-links__item-title">
                            <a href="" class="mobile-links__item-link">Categories</a>
                            <button class="mobile-links__item-toggle" type="button" data-collapse-trigger>
                                <svg class="mobile-links__item-arrow" width="12px" height="7px">
                                    <use xlink:href="images/sprite.svg#arrow-rounded-down-12x7"></use>
                                </svg>
                            </button>
                        </div>
                        <div class="mobile-links__item-sub-links" data-collapse-content>
                            <ul class="mobile-links mobile-links--level--1">
                                <li class="mobile-links__item" data-collapse-item>
                                    <div class="mobile-links__item-title">
                                        <a href="" class="mobile-links__item-link">Power Tools</a>
                                        <button class="mobile-links__item-toggle" type="button" data-collapse-trigger>
                                            <svg class="mobile-links__item-arrow" width="12px" height="7px">
                                                <use xlink:href="images/sprite.svg#arrow-rounded-down-12x7"></use>
                                            </svg>
                                        </button>
                                    </div>
                                    <div class="mobile-links__item-sub-links" data-collapse-content>
                                        <ul class="mobile-links mobile-links--level--2">
                                            <li class="mobile-links__item" data-collapse-item>
                                                <div class="mobile-links__item-title">
                                                    <a href="" class="mobile-links__item-link">Engravers</a>
                                                </div>
                                            </li>
                                            <li class="mobile-links__item" data-collapse-item>
                                                <div class="mobile-links__item-title">
                                                    <a href="" class="mobile-links__item-link">Wrenches</a>
                                                </div>
                                            </li>
                                            <li class="mobile-links__item" data-collapse-item>
                                                <div class="mobile-links__item-title">
                                                    <a href="" class="mobile-links__item-link">Wall Chaser</a>
                                                </div>
                                            </li>
                                            <li class="mobile-links__item" data-collapse-item>
                                                <div class="mobile-links__item-title">
                                                    <a href="" class="mobile-links__item-link">Pneumatic Tools</a>
                                                </div>
                                            </li>
                                        </ul>
                                    </div>
                                </li>
                                <li class="mobile-links__item" data-collapse-item>
                                    <div class="mobile-links__item-title">
                                        <a href="" class="mobile-links__item-link">Machine Tools</a>
                                        <button class="mobile-links__item-toggle" type="button" data-collapse-trigger>
                                            <svg class="mobile-links__item-arrow" width="12px" height="7px">
                                                <use xlink:href="images/sprite.svg#arrow-rounded-down-12x7"></use>
                                            </svg>
                                        </button>
                                    </div>
                                    <div class="mobile-links__item-sub-links" data-collapse-content>
                                        <ul class="mobile-links mobile-links--level--2">
                                            <li class="mobile-links__item" data-collapse-item>
                                                <div class="mobile-links__item-title">
                                                    <a href="" class="mobile-links__item-link">Thread Cutting</a>
                                                </div>
                                            </li>
                                            <li class="mobile-links__item" data-collapse-item>
                                                <div class="mobile-links__item-title">
                                                    <a href="" class="mobile-links__item-link">Chip Blowers</a>
                                                </div>
                                            </li>
                                            <li class="mobile-links__item" data-collapse-item>
                                                <div class="mobile-links__item-title">
                                                    <a href="" class="mobile-links__item-link">Sharpening Machines</a>
                                                </div>
                                            </li>
                                            <li class="mobile-links__item" data-collapse-item>
                                                <div class="mobile-links__item-title">
                                                    <a href="" class="mobile-links__item-link">Pipe Cutters</a>
                                                </div>
                                            </li>
                                            <li class="mobile-links__item" data-collapse-item>
                                                <div class="mobile-links__item-title">
                                                    <a href="" class="mobile-links__item-link">Slotting machines</a>
                                                </div>
                                            </li>
                                            <li class="mobile-links__item" data-collapse-item>
                                                <div class="mobile-links__item-title">
                                                    <a href="" class="mobile-links__item-link">Lathes</a>
                                                </div>
                                            </li>
                                        </ul>
                                    </div>
                                </li>
                            </ul>
                        </div>
                    </li>
                    <li class="mobile-links__item" data-collapse-item>
                        <div class="mobile-links__item-title">
                            <a href="shop-grid-3-columns-sidebar.html" class="mobile-links__item-link">Shop</a>
                            <button class="mobile-links__item-toggle" type="button" data-collapse-trigger>
                                <svg class="mobile-links__item-arrow" width="12px" height="7px">
                                    <use xlink:href="images/sprite.svg#arrow-rounded-down-12x7"></use>
                                </svg>
                            </button>
                        </div>
                        <div class="mobile-links__item-sub-links" data-collapse-content>
                            <ul class="mobile-links mobile-links--level--1">
                                <li class="mobile-links__item" data-collapse-item>
                                    <div class="mobile-links__item-title">
                                        <a href="shop-grid-3-columns-sidebar.html" class="mobile-links__item-link">Shop
                                            Grid</a>
                                        <button class="mobile-links__item-toggle" type="button" data-collapse-trigger>
                                            <svg class="mobile-links__item-arrow" width="12px" height="7px">
                                                <use xlink:href="images/sprite.svg#arrow-rounded-down-12x7"></use>
                                            </svg>
                                        </button>
                                    </div>
                                    <div class="mobile-links__item-sub-links" data-collapse-content>
                                        <ul class="mobile-links mobile-links--level--2">
                                            <li class="mobile-links__item" data-collapse-item>
                                                <div class="mobile-links__item-title">
                                                    <a href="shop-grid-3-columns-sidebar.html"
                                                        class="mobile-links__item-link">3 Columns Sidebar</a>
                                                </div>
                                            </li>
                                            <li class="mobile-links__item" data-collapse-item>
                                                <div class="mobile-links__item-title">
                                                    <a href="shop-grid-4-columns-full.html"
                                                        class="mobile-links__item-link">4 Columns Full</a>
                                                </div>
                                            </li>
                                            <li class="mobile-links__item" data-collapse-item>
                                                <div class="mobile-links__item-title">
                                                    <a href="shop-grid-5-columns-full.html"
                                                        class="mobile-links__item-link">5 Columns Full</a>
                                                </div>
                                            </li>
                                        </ul>
                                    </div>
                                </li>
                                <li class="mobile-links__item" data-collapse-item>
                                    <div class="mobile-links__item-title">
                                        <a href="shop-list.html" class="mobile-links__item-link">Shop List</a>
                                    </div>
                                </li>
                                <li class="mobile-links__item" data-collapse-item>
                                    <div class="mobile-links__item-title">
                                        <a href="shop-right-sidebar.html" class="mobile-links__item-link">Shop Right
                                            Sidebar</a>
                                    </div>
                                </li>
                                <li class="mobile-links__item" data-collapse-item>
                                    <div class="mobile-links__item-title">
                                        <a href="product.html" class="mobile-links__item-link">Product</a>
                                        <button class="mobile-links__item-toggle" type="button" data-collapse-trigger>
                                            <svg class="mobile-links__item-arrow" width="12px" height="7px">
                                                <use xlink:href="images/sprite.svg#arrow-rounded-down-12x7"></use>
                                            </svg>
                                        </button>
                                    </div>
                                    <div class="mobile-links__item-sub-links" data-collapse-content>
                                        <ul class="mobile-links mobile-links--level--2">
                                            <li class="mobile-links__item" data-collapse-item>
                                                <div class="mobile-links__item-title">
                                                    <a href="product.html" class="mobile-links__item-link">Product</a>
                                                </div>
                                            </li>
                                            <li class="mobile-links__item" data-collapse-item>
                                                <div class="mobile-links__item-title">
                                                    <a href="product-alt.html" class="mobile-links__item-link">Product
                                                        Alt</a>
                                                </div>
                                            </li>
                                            <li class="mobile-links__item" data-collapse-item>
                                                <div class="mobile-links__item-title">
                                                    <a href="product-sidebar.html"
                                                        class="mobile-links__item-link">Product Sidebar</a>
                                                </div>
                                            </li>
                                        </ul>
                                    </div>
                                </li>
                                <li class="mobile-links__item" data-collapse-item>
                                    <div class="mobile-links__item-title">
                                        <a href="cart.html" class="mobile-links__item-link">Cart</a>
                                    </div>
                                </li>
                                <li class="mobile-links__item" data-collapse-item>
                                    <div class="mobile-links__item-title">
                                        <a href="cart-empty.html" class="mobile-links__item-link">Cart Empty</a>
                                    </div>
                                </li>
                                <li class="mobile-links__item" data-collapse-item>
                                    <div class="mobile-links__item-title">
                                        <a href="checkout.html" class="mobile-links__item-link">Checkout</a>
                                    </div>
                                </li>
                                <li class="mobile-links__item" data-collapse-item>
                                    <div class="mobile-links__item-title">
                                        <a href="order-success.html" class="mobile-links__item-link">Order Success</a>
                                    </div>
                                </li>
                                <li class="mobile-links__item" data-collapse-item>
                                    <div class="mobile-links__item-title">
                                        <a href="wishlist.html" class="mobile-links__item-link">Wishlist</a>
                                    </div>
                                </li>
                                <li class="mobile-links__item" data-collapse-item>
                                    <div class="mobile-links__item-title">
                                        <a href="compare.html" class="mobile-links__item-link">Compare</a>
                                    </div>
                                </li>
                                <li class="mobile-links__item" data-collapse-item>
                                    <div class="mobile-links__item-title">
                                        <a href="track-order.html" class="mobile-links__item-link">Track Order</a>
                                    </div>
                                </li>
                            </ul>
                        </div>
                    </li>
                    <li class="mobile-links__item" data-collapse-item>
                        <div class="mobile-links__item-title">
                            <a href="account-login.html" class="mobile-links__item-link">Account</a>
                            <button class="mobile-links__item-toggle" type="button" data-collapse-trigger>
                                <svg class="mobile-links__item-arrow" width="12px" height="7px">
                                    <use xlink:href="images/sprite.svg#arrow-rounded-down-12x7"></use>
                                </svg>
                            </button>
                        </div>
                        <div class="mobile-links__item-sub-links" data-collapse-content>
                            <ul class="mobile-links mobile-links--level--1">
                                <li class="mobile-links__item" data-collapse-item>
                                    <div class="mobile-links__item-title">
                                        <a href="account-login.html" class="mobile-links__item-link">Login</a>
                                    </div>
                                </li>
                                <li class="mobile-links__item" data-collapse-item>
                                    <div class="mobile-links__item-title">
                                        <a href="account-dashboard.html" class="mobile-links__item-link">Dashboard</a>
                                    </div>
                                </li>
                                <li class="mobile-links__item" data-collapse-item>
                                    <div class="mobile-links__item-title">
                                        <a href="account-profile.html" class="mobile-links__item-link">Edit
                                            Profile</a>
                                    </div>
                                </li>
                                <li class="mobile-links__item" data-collapse-item>
                                    <div class="mobile-links__item-title">
                                        <a href="account-orders.html" class="mobile-links__item-link">Order
                                            History</a>
                                    </div>
                                </li>
                                <li class="mobile-links__item" data-collapse-item>
                                    <div class="mobile-links__item-title">
                                        <a href="account-order-details.html" class="mobile-links__item-link">Order
                                            Details</a>
                                    </div>
                                </li>
                                <li class="mobile-links__item" data-collapse-item>
                                    <div class="mobile-links__item-title">
                                        <a href="account-addresses.html" class="mobile-links__item-link">Address
                                            Book</a>
                                    </div>
                                </li>
                                <li class="mobile-links__item" data-collapse-item>
                                    <div class="mobile-links__item-title">
                                        <a href="account-edit-address.html" class="mobile-links__item-link">Edit
                                            Address</a>
                                    </div>
                                </li>
                                <li class="mobile-links__item" data-collapse-item>
                                    <div class="mobile-links__item-title">
                                        <a href="account-password.html" class="mobile-links__item-link">Change
                                            Password</a>
                                    </div>
                                </li>
                            </ul>
                        </div>
                    </li>
                    <li class="mobile-links__item" data-collapse-item>
                        <div class="mobile-links__item-title">
                            <a href="blog-classic.html" class="mobile-links__item-link">Blog</a>
                            <button class="mobile-links__item-toggle" type="button" data-collapse-trigger>
                                <svg class="mobile-links__item-arrow" width="12px" height="7px">
                                    <use xlink:href="images/sprite.svg#arrow-rounded-down-12x7"></use>
                                </svg>
                            </button>
                        </div>
                        <div class="mobile-links__item-sub-links" data-collapse-content>
                            <ul class="mobile-links mobile-links--level--1">
                                <li class="mobile-links__item" data-collapse-item>
                                    <div class="mobile-links__item-title">
                                        <a href="blog-classic.html" class="mobile-links__item-link">Blog Classic</a>
                                    </div>
                                </li>
                                <li class="mobile-links__item" data-collapse-item>
                                    <div class="mobile-links__item-title">
                                        <a href="blog-grid.html" class="mobile-links__item-link">Blog Grid</a>
                                    </div>
                                </li>
                                <li class="mobile-links__item" data-collapse-item>
                                    <div class="mobile-links__item-title">
                                        <a href="blog-list.html" class="mobile-links__item-link">Blog List</a>
                                    </div>
                                </li>
                                <li class="mobile-links__item" data-collapse-item>
                                    <div class="mobile-links__item-title">
                                        <a href="blog-left-sidebar.html" class="mobile-links__item-link">Blog Left
                                            Sidebar</a>
                                    </div>
                                </li>
                                <li class="mobile-links__item" data-collapse-item>
                                    <div class="mobile-links__item-title">
                                        <a href="post.html" class="mobile-links__item-link">Post Page</a>
                                    </div>
                                </li>
                                <li class="mobile-links__item" data-collapse-item>
                                    <div class="mobile-links__item-title">
                                        <a href="post-without-sidebar.html" class="mobile-links__item-link">Post
                                            Without Sidebar</a>
                                    </div>
                                </li>
                            </ul>
                        </div>
                    </li>
                    <li class="mobile-links__item" data-collapse-item>
                        <div class="mobile-links__item-title">
                            <a href="" class="mobile-links__item-link">Pages</a>
                            <button class="mobile-links__item-toggle" type="button" data-collapse-trigger>
                                <svg class="mobile-links__item-arrow" width="12px" height="7px">
                                    <use xlink:href="images/sprite.svg#arrow-rounded-down-12x7"></use>
                                </svg>
                            </button>
                        </div>
                        <div class="mobile-links__item-sub-links" data-collapse-content>
                            <ul class="mobile-links mobile-links--level--1">
                                <li class="mobile-links__item" data-collapse-item>
                                    <div class="mobile-links__item-title">
                                        <a href="about-us.html" class="mobile-links__item-link">About Us</a>
                                    </div>
                                </li>
                                <li class="mobile-links__item" data-collapse-item>
                                    <div class="mobile-links__item-title">
                                        <a href="contact-us.html" class="mobile-links__item-link">Contact Us</a>
                                    </div>
                                </li>
                                <li class="mobile-links__item" data-collapse-item>
                                    <div class="mobile-links__item-title">
                                        <a href="contact-us-alt.html" class="mobile-links__item-link">Contact Us
                                            Alt</a>
                                    </div>
                                </li>
                                <li class="mobile-links__item" data-collapse-item>
                                    <div class="mobile-links__item-title">
                                        <a href="404.html" class="mobile-links__item-link">404</a>
                                    </div>
                                </li>
                                <li class="mobile-links__item" data-collapse-item>
                                    <div class="mobile-links__item-title">
                                        <a href="terms-and-conditions.html" class="mobile-links__item-link">Terms And
                                            Conditions</a>
                                    </div>
                                </li>
                                <li class="mobile-links__item" data-collapse-item>
                                    <div class="mobile-links__item-title">
                                        <a href="faq.html" class="mobile-links__item-link">FAQ</a>
                                    </div>
                                </li>
                                <li class="mobile-links__item" data-collapse-item>
                                    <div class="mobile-links__item-title">
                                        <a href="components.html" class="mobile-links__item-link">Components</a>
                                    </div>
                                </li>
                                <li class="mobile-links__item" data-collapse-item>
                                    <div class="mobile-links__item-title">
                                        <a href="typography.html" class="mobile-links__item-link">Typography</a>
                                    </div>
                                </li>
                            </ul>
                        </div>
                    </li>
                    <li class="mobile-links__item" data-collapse-item>
                        <div class="mobile-links__item-title">
                            <a data-collapse-trigger class="mobile-links__item-link">Currency</a>
                            <button class="mobile-links__item-toggle" type="button" data-collapse-trigger>
                                <svg class="mobile-links__item-arrow" width="12px" height="7px">
                                    <use xlink:href="images/sprite.svg#arrow-rounded-down-12x7"></use>
                                </svg>
                            </button>
                        </div>
                        <div class="mobile-links__item-sub-links" data-collapse-content>
                            <ul class="mobile-links mobile-links--level--1">
                                <li class="mobile-links__item" data-collapse-item>
                                    <div class="mobile-links__item-title">
                                        <a href="" class="mobile-links__item-link">€ Euro</a>
                                    </div>
                                </li>
                                <li class="mobile-links__item" data-collapse-item>
                                    <div class="mobile-links__item-title">
                                        <a href="" class="mobile-links__item-link">£ Pound Sterling</a>
                                    </div>
                                </li>
                                <li class="mobile-links__item" data-collapse-item>
                                    <div class="mobile-links__item-title">
                                        <a href="" class="mobile-links__item-link">$ US Dollar</a>
                                    </div>
                                </li>
                                <li class="mobile-links__item" data-collapse-item>
                                    <div class="mobile-links__item-title">
                                        <a href="" class="mobile-links__item-link">₽ Russian Ruble</a>
                                    </div>
                                </li>
                            </ul>
                        </div>
                    </li>
                    <li class="mobile-links__item" data-collapse-item>
                        <div class="mobile-links__item-title">
                            <a data-collapse-trigger class="mobile-links__item-link">Language</a>
                            <button class="mobile-links__item-toggle" type="button" data-collapse-trigger>
                                <svg class="mobile-links__item-arrow" width="12px" height="7px">
                                    <use xlink:href="images/sprite.svg#arrow-rounded-down-12x7"></use>
                                </svg>
                            </button>
                        </div>
                        <div class="mobile-links__item-sub-links" data-collapse-content>
                            <ul class="mobile-links mobile-links--level--1">
                                <li class="mobile-links__item" data-collapse-item>
                                    <div class="mobile-links__item-title">
                                        <a href="" class="mobile-links__item-link">English</a>
                                    </div>
                                </li>
                                <li class="mobile-links__item" data-collapse-item>
                                    <div class="mobile-links__item-title">
                                        <a href="" class="mobile-links__item-link">French</a>
                                    </div>
                                </li>
                                <li class="mobile-links__item" data-collapse-item>
                                    <div class="mobile-links__item-title">
                                        <a href="" class="mobile-links__item-link">German</a>
                                    </div>
                                </li>
                                <li class="mobile-links__item" data-collapse-item>
                                    <div class="mobile-links__item-title">
                                        <a href="" class="mobile-links__item-link">Russian</a>
                                    </div>
                                </li>
                                <li class="mobile-links__item" data-collapse-item>
                                    <div class="mobile-links__item-title">
                                        <a href="" class="mobile-links__item-link">Italian</a>
                                    </div>
                                </li>
                            </ul>
                        </div>
                    </li>
                </ul>
            </div>
        </div>
    </div>
    <!-- mobilemenu / end -->
    <!-- photoswipe -->
    <div class="pswp" tabindex="-1" role="dialog" aria-hidden="true">
        <div class="pswp__bg"></div>
        <div class="pswp__scroll-wrap">
            <div class="pswp__container">
                <div class="pswp__item"></div>
                <div class="pswp__item"></div>
                <div class="pswp__item"></div>
            </div>
            <div class="pswp__ui pswp__ui--hidden">
                <div class="pswp__top-bar">
                    <div class="pswp__counter"></div>
                    <button class="pswp__button pswp__button--close" title="Close (Esc)"></button>
                    <!--<button class="pswp__button pswp__button&#45;&#45;share" title="Share"></button>-->
                    <button class="pswp__button pswp__button--fs" title="Toggle fullscreen"></button>
                    <button class="pswp__button pswp__button--zoom" title="Zoom in/out"></button>
                    <div class="pswp__preloader">
                        <div class="pswp__preloader__icn">
                            <div class="pswp__preloader__cut">
                                <div class="pswp__preloader__donut"></div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="pswp__share-modal pswp__share-modal--hidden pswp__single-tap">
                    <div class="pswp__share-tooltip"></div>
                </div>
                <button class="pswp__button pswp__button--arrow--left" title="Previous (arrow left)"></button>
                <button class="pswp__button pswp__button--arrow--right" title="Next (arrow right)"></button>
                <div class="pswp__caption">
                    <div class="pswp__caption__center"></div>
                </div>
            </div>
        </div>
    </div>
    <!-- photoswipe / end -->
    <!-- js -->
    <script src="{{ asset('public/vendor/jquery/jquery.min.js') }}"></script>
    <script src="{{ asset('public/vendor/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
    <script src="{{ asset('public/vendor/owl-carousel/owl.carousel.min.js') }}"></script>
    <script src="{{ asset('public/vendor/nouislider/nouislider.min.js') }}"></script>
    <script src="{{ asset('public/vendor/photoswipe/photoswipe.min.js') }}"></script>
    <script src="{{ asset('public/vendor/photoswipe/photoswipe-ui-default.min.js') }}"></script>
    <script src="{{ asset('public/vendor/select2/js/select2.min.js') }}"></script>
    <script src="{{ asset('public/js/number.js') }}"></script>
    <script src="{{ asset('public/js/main.js') }}"></script>
    <script src="{{ asset('public/js/header.js') }}"></script>
    <script src="{{ asset('public/vendor/svg4everybody/svg4everybody.min.js') }}"></script>
    <script>
        svg4everybody();
    </script>
    <script>
        var slideIndex = 1;
        showSlides(slideIndex);

        // Next/previous controls
        function plusSlides(n) {
            showSlides(slideIndex += n);
        }

        // Thumbnail image controls
        function currentSlide(n) {
            showSlides(slideIndex = n);
        }

        function showSlides(n) {
            var i;
            var slides = document.getElementsByClassName("mySlides");
            var dots = document.getElementsByClassName("dot");
            if (n > slides.length) {
                slideIndex = 1
            }
            if (n < 1) {
                slideIndex = slides.length
            }
            for (i = 0; i < slides.length; i++) {
                slides[i].style.display = "none";
            }
            for (i = 0; i < dots.length; i++) {
                dots[i].className = dots[i].className.replace(" active", "");
            }
            slides[slideIndex - 1].style.display = "block";
            dots[slideIndex - 1].className += " active";
        }
    </script>
</body>

</html>
