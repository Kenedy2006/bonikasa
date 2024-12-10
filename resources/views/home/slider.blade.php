<style>
    .carousel-item img {
        border-radius: 15px;
        width: 100%;
        height: 650px;
        object-fit: cover;
    }
    @media (max-width: 768px) {
        .carousel-item img {
            height: auto;
        }
    }
    .carousel-control-prev-icon,
    .carousel-control-next-icon {
        display: none;
    }
</style>
<section class="slider_section">
    <div id="promoCarousel" class="carousel slide" data-ride="carousel" data-interval="3000">
        <ol class="carousel-indicators">
            <li data-target="#promoCarousel" data-slide-to="0" class="active"></li>
            <li data-target="#promoCarousel" data-slide-to="1"></li>
            <li data-target="#promoCarousel" data-slide-to="2"></li>
        </ol>
        <div class="carousel-inner">
            <div class="carousel-item active">
                <img class="d-block w-100" src="images/promo1.jpg" alt="Primera promoción">
                <div class="carousel-caption d-none d-md-block">
                    
                </div>
            </div>
            <div class="carousel-item">
                <img class="d-block w-100" src="images/promo2.jpg" alt="Segunda promoción">
                <div class="carousel-caption d-none d-md-block">
                    
                </div>
            </div>
            <div class="carousel-item">
                <img class="d-block w-100" src="images/promo3.jpg" alt="Tercera promoción">
                <div class="carousel-caption d-none d-md-block">
                    
                </div>
            </div>
        </div>
        <a class="carousel-control-prev" href="#promoCarousel" role="button" data-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="sr-only">Anterior</span>
        </a>
        <a class="carousel-control-next" href="#promoCarousel" role="button" data-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="sr-only">Siguiente</span>
        </a>
    </div>
</section>