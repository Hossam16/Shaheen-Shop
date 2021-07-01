<style>
    .h2brand{
        text-align:center;
        padding: 20px;
        color: #e81f25;
    }
    /* Slider */

    .slick-slide {
        margin: 0px 20px;
    }

    .slick-slide img {
        width: 100%;
    }

    .slick-slider
    {
        position: relative;
        display: block;
        box-sizing: border-box;
        -webkit-user-select: none;
        -moz-user-select: none;
        -ms-user-select: none;
        user-select: none;
        -webkit-touch-callout: none;
        -khtml-user-select: none;
        -ms-touch-action: pan-y;
        touch-action: pan-y;
        -webkit-tap-highlight-color: transparent;
    }

    .slick-list
    {
        position: relative;
        display: block;
        overflow: hidden;
        margin: 0;
        padding: 0;
    }
    .slick-list:focus
    {
        outline: none;
    }
    .slick-list.dragging
    {
        cursor: pointer;
        cursor: hand;
    }

    .slick-slider .slick-track,
    .slick-slider .slick-list
    {
        -webkit-transform: translate3d(0, 0, 0);
        -moz-transform: translate3d(0, 0, 0);
        -ms-transform: translate3d(0, 0, 0);
        -o-transform: translate3d(0, 0, 0);
        transform: translate3d(0, 0, 0);
    }

    .slick-track
    {
        position: relative;
        top: 0;
        left: 0;
        display: block;
    }
    .slick-track:before,
    .slick-track:after
    {
        display: table;
        content: '';
    }
    .slick-track:after
    {
        clear: both;
    }
    .slick-loading .slick-track
    {
        visibility: hidden;
    }

    .slick-slide
    {
        display: none;
        float: left;
        height: 100%;
        min-height: 1px;
    }
    [dir='rtl'] .slick-slide
    {
        float: right;
    }
    .slick-slide img
    {
        display: block;
    }
    .slick-slide.slick-loading img
    {
        display: none;
    }
    .slick-slide.dragging img
    {
        pointer-events: none;
    }
    .slick-initialized .slick-slide
    {
        display: block;
    }
    .slick-loading .slick-slide
    {
        visibility: hidden;
    }
    .slick-vertical .slick-slide
    {
        display: block;
        height: auto;
        border: 1px solid transparent;
    }
    .slick-arrow.slick-hidden {
        display: none;
    }
</style>
<script>
    $(document).ready(function(){
        $('.customer-logos').slick({
            slidesToShow: 6,
            slidesToScroll: 6,
            autoplay: true,
            autoplaySpeed: 1500,
            arrows: false,
            dots: false,
            pauseOnHover: false,
            responsive: [{
                breakpoint: 768,
                settings: {
                    slidesToShow: 4,
                    slidesToScroll: 4
                }
            }, {
                breakpoint: 520,
                settings: {
                    slidesToShow: 3,
                    slidesToScroll: 3
                }
            }]
        });
    });
</script>

<div class="container">
    <h2 class="h2brand">شركاء النجاح</h2>
    <section class="customer-logos slider">
        <div class="slide"><img src="images/home/brand2.jpg"></div>
        <div class="slide"><img src="images/home/brand4.jpg"></div>
        <div class="slide"><img src="images/home/brand5.jpg"></div>
        <div class="slide"><img src="images/home/brand6.jpg"></div>
        <div class="slide"><img src="images/home/brand8.jpg"></div>
        <div class="slide"><img src="images/home/brand10.jpg"></div>
        <div class="slide"><img src="images/home/brand11.jpg"></div>
        <div class="slide"><img src="images/home/brand12.jpg"></div>
        <div class="slide"><img src="images/home/brand14.jpg"></div>
        <div class="slide"><img src="images/home/brand15.jpg"></div>
        <div class="slide"><img src="images/home/brand20.jpg"></div>
        <div class="slide"><img src="images/home/brand22.jpg"></div>
        <div class="slide"><img src="images/home/brand23.jpg"></div>
        <div class="slide"><img src="images/home/brand24.jpg"></div>
        <div class="slide"><img src="images/home/brand25.jpg"></div>
        <div class="slide"><img src="images/home/brand26.jpg"></div>
        <div class="slide"><img src="images/home/brand27.jpg"></div>
        <div class="slide"><img src="images/home/brand28.jpg"></div>
        <div class="slide"><img src="images/home/brand29.jpg"></div>
        <div class="slide"><img src="images/home/brand30.jpg"></div>
        <div class="slide"><img src="images/home/brand31.jpg"></div>
        <div class="slide"><img src="images/home/brand32.jpg"></div>
        <div class="slide"><img src="images/home/brand33.jpg"></div>
    </section>
</div>