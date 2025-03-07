<div id="carouselExampleIndicators" class="carousel slide" data-bs-ride="carousel" style="height: 30vw;">
    <ol class="carousel-indicators">
        <li data-bs-target="#carouselExampleIndicators" data-bs-slide-to="0" class="active"></li>
        <li data-bs-target="#carouselExampleIndicators" data-bs-slide-to="1"></li>
        <li data-bs-target="#carouselExampleIndicators" data-bs-slide-to="2"></li>
    </ol>
    <div class="carousel-inner">
        <div class="carousel-item active">
            <img src="{{asset('carrousel/carrousel1.jpg')}}" class="d-block w-100" alt="..." style="height: 30vw;object-fit: cover;">
        </div>
        <div class="carousel-item">
            <img src="{{asset('carrousel/carrousel2.jpg')}}" class="d-block w-100" alt="..." style="height: 30vw;object-fit: cover;">
        </div>
        <div class="carousel-item">
            <img src="{{asset('carrousel/carrousel3.jpg')}}" class="d-block w-100" alt="..." style="height: 30vw;object-fit: cover;">
        </div>
    </div>
    <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-bs-slide="prev">
        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
        <span class="visually-hidden">Previous</span>
    </a>
    <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-bs-slide="next">
        <span class="carousel-control-next-icon" aria-hidden="true"></span>
        <span class="visually-hidden">Next</span>
    </a>
</div>
