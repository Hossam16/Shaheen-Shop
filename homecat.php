<style>
    /* 3D Slideshow */
    * {
        margin: 0;
        padding: 0;
    }

    #slideshow {
        margin: 0 auto;
        padding-top: 0px;
        height: 250px;
        width: 100%;
        background-color: #ffffff;
        box-sizing: border-box;
    }

    .slideshow-title {
        font-family: 'Allerta Stencil';
        font-size: 62px;
        color: #fff;
        margin: 0 auto;
        text-align: center;
        margin-top: 25%;
        letter-spacing: 3px;
        font-weight: 300;
    }

    .sub-heading {
        padding-top: 50px;
        font-size: 18px;
    }

    .sub-heading-two {
        font-size: 15px;
    }

    .sub-heading-three {
        font-size: 13px;
    }

    .sub-heading-four {
        font-size: 11px;
    }

    .sub-heading-five {
        font-size: 9px;
    }

    .sub-heading-six {
        font-size: 7px;
    }

    .sub-heading-seven {
        font-size: 5px;
    }

    .sub-heading-eight {
        font-size: 3px;
    }

    .sub-heading-nine {
        font-size: 1px;
    }

    .entire-content {
        margin: auto;
        width: 215px;
        perspective: 100000px;
        position: relative;
        padding-top: 50px;
    }

    .content-carrousel {
        width: 100%;
        position: absolute;
        float: right;
        animation: rotar 30s infinite linear;
        transform-style: preserve-3d;
    }

    .content-carrousel:hover {
        animation-play-state: paused;
        cursor: pointer;
    }

    .content-carrousel figure {
        width: 100%;
        height: 120px;
        border: 1px solid #3b444b;
        overflow: hidden;
        position: absolute;
    }

    @media only screen and (max-width: 700px) {
        .content-carrousel figure {
            width: 70%;
            height: 120px;
            border: 1px solid #3b444b;
            overflow: hidden;
            position: absolute;
        }
    }

    .content-carrousel figure:nth-child(1) {
        transform: rotateY(0deg) translateZ(300px);
    }

    .content-carrousel figure:nth-child(2) {
        transform: rotateY(40deg) translateZ(300px);
    }

    .content-carrousel figure:nth-child(3) {
        transform: rotateY(80deg) translateZ(300px);
    }

    .content-carrousel figure:nth-child(4) {
        transform: rotateY(120deg) translateZ(300px);
    }

    .content-carrousel figure:nth-child(5) {
        transform: rotateY(160deg) translateZ(300px);
    }

    .content-carrousel figure:nth-child(6) {
        transform: rotateY(200deg) translateZ(300px);
    }

    .content-carrousel figure:nth-child(7) {
        transform: rotateY(240deg) translateZ(300px);
    }

    .content-carrousel figure:nth-child(8) {
        transform: rotateY(280deg) translateZ(300px);
    }

    .content-carrousel figure:nth-child(9) {
        transform: rotateY(320deg) translateZ(300px);
    }

    .content-carrousel figure:nth-child(10) {
        transform: rotateY(360deg) translateZ(300px);
    }

    @media only screen and (max-width: 700px) {
        .content-carrousel figure:nth-child(1) {
            transform: rotateY(0deg) translateZ(200px);
        }

        .content-carrousel figure:nth-child(2) {
            transform: rotateY(40deg) translateZ(200px);
        }

        .content-carrousel figure:nth-child(3) {
            transform: rotateY(80deg) translateZ(200px);
        }

        .content-carrousel figure:nth-child(4) {
            transform: rotateY(120deg) translateZ(200px);
        }

        .content-carrousel figure:nth-child(5) {
            transform: rotateY(160deg) translateZ(200px);
        }

        .content-carrousel figure:nth-child(6) {
            transform: rotateY(200deg) translateZ(200px);
        }

        .content-carrousel figure:nth-child(7) {
            transform: rotateY(240deg) translateZ(200px);
        }

        .content-carrousel figure:nth-child(8) {
            transform: rotateY(280deg) translateZ(200px);
        }

        .content-carrousel figure:nth-child(9) {
            transform: rotateY(320deg) translateZ(200px);
        }

        .content-carrousel figure:nth-child(10) {
            transform: rotateY(360deg) translateZ(200px);
        }
    }

    .shadow {
        position: absolute;
        box-shadow: 0px 20px 40px 0px grey;
        border-radius: 10px;
    }

    .content-carrousel img {
        image-rendering: auto;
        transition: all 300ms;
        width: 100%;
        height: 100%;
    }

    .content-carrousel img:hover {
        transform: scale(1.2);
        transition: all 300ms;
    }

    @keyframes rotar {
        from {
            transform: rotateY(0deg);
        }

        to {
            transform: rotateY(360deg);
        }
    }
</style>
<?php
$conn = new config();
$sql = 'SELECT * FROM nheader';
$result = $conn->datacon()->query($sql);
?>

<!-- 3D Slideshow Section -->
<section id="slideshow" style="margin-top: 50px; margin-bottom:50px;">
    <div class="container">
        <a href="https://shaheen.shop/shop.php?Golden"> <img src="https://shaheen.shop/images/shop/hGolden.jpg?21212121-0606-2424 03-06-16" style="width:100%;border-radius: 10px;"></a>
    </div>
</section>