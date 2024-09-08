<style>
    .testimonial-area {
        padding: 40px 0;
    }

    .testimonial-wrapper {
        margin-left: 80px;
        display: flex;
        justify-content: center; /* Kartları yatayda merkezde hizala */
        gap: 30px; /* Kartlar arasındaki boşluk */
        flex-wrap: wrap; /* Kartların sarmasını sağlar */
    }

    .single-testimonial {
        background-color: #fff; /* Card arka plan rengi */
        padding: 20px;
        border-radius: 10px; /* Köşeleri yuvarlat */
        box-shadow: 0 0 10px rgba(0, 0, 0, 0.1); /* Hafif gölge */
        max-width: 300px; /* Maksimum genişlik */
        text-align: left; /* İçeriği sola hizala */
        display: flex;
        flex-direction: column;
        align-items: flex-start; /* İçeriği sola hizala */
    }

    .stars {
        margin-bottom: 15px;
        display: flex;
        justify-content: flex-start; /* Yıldızları sola hizala */
    }

    .stars .fa-star {
        color: #FFD700; /* Yıldız rengi */
        margin: 0 2px;
    }

    .stars .fa-star:not(.checked) {
        color: #e0e0e0; /* Boş yıldız rengi */
    }

    .testimonial-text {
        margin-bottom: 20px;
        font-size: 14px;
        color: #666;
        line-height: 1.6;
    }

    .user-info {
        display: flex;
        align-items: center;
        width: 100%;
    }

    .user-img {
        width: 50px;
        height: 50px;
        border-radius: 50%;
        overflow: hidden;
    }

    .user-img img {
        width: 100%;
        height: 100%;
        object-fit: cover;
    }

    .user-details {
        margin-left: 15px;
    }

    .user-details h4 {
        margin: 0;
        font-size: 16px;
        color: #333;
    }

    .user-details .bio {
        margin-top: 5px;
        font-size: 12px;
        color: #666;
        font-weight: bold; /* Bold biosu */
    }

    /* Responsive Styling */
    @media (max-width: 768px) {
        .testimonial-wrapper {
            flex-direction: column; /* Kartları dikeyde yerleştir */
            align-items: center; /* Kartları merkezde hizala */
        }
    }
</style>
<section class="testimonial-area section-gap bg-light" id="review">
    <div class="container">
        <div class="row d-flex justify-content-center">
            <div class="menu-content pb-60 col-lg-8">
                <div class="title text-center">
                    <h1 class="mb-10">What do they say about us?</h1>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="testimonial-wrapper">
                <div class="single-testimonial">
                    <div class="stars">
                        <span class="fa fa-star checked"></span>
                        <span class="fa fa-star checked"></span>
                        <span class="fa fa-star checked"></span>
                        <span class="fa fa-star"></span>
                        <span class="fa fa-star"></span>
                    </div>
                    <p class="testimonial-text">
                        Accessories Here you can find the best computer accessory for your laptop, monitor, printer, scanner, speaker.
                    </p>
                    <div class="user-info d-flex align-items-center">
                        <div class="user-img">
                            <img src="img/r1.png" alt="User Image">
                        </div>
                        <div class="user-details ml-3">
                            <h4>John Doe</h4>
                            <p class="bio">
                                Great products and service!
                            </p>
                        </div>
                    </div>
                </div>
                <div class="single-testimonial">
                    <div class="stars">
                        <span class="fa fa-star checked"></span>
                        <span class="fa fa-star checked"></span>
                        <span class="fa fa-star"></span>
                        <span class="fa fa-star"></span>
                        <span class="fa fa-star"></span>
                    </div>
                    <p class="testimonial-text">
                        Accessories Here you can find the best computer accessory for your laptop, monitor, printer, scanner, speaker.
                    </p>
                    <div class="user-info d-flex align-items-center">
                        <div class="user-img">
                            <img src="img/r2.png" alt="User Image">
                        </div>
                        <div class="user-details ml-3">
                            <h4>Jane Smith</h4>
                            <p class="bio">
                                Excellent customer support!
                            </p>
                        </div>
                    </div>
                </div>
                <div class="single-testimonial">
                    <div class="stars">
                        <span class="fa fa-star checked"></span>
                        <span class="fa fa-star checked"></span>
                        <span class="fa fa-star checked"></span>
                        <span class="fa fa-star"></span>
                        <span class="fa fa-star"></span>
                    </div>
                    <p class="testimonial-text">
                        Accessories Here you can find the best computer accessory for your laptop, monitor, printer, scanner, speaker.
                    </p>
                    <div class="user-info d-flex align-items-center">
                        <div class="user-img">
                            <img src="img/r1.png" alt="User Image">
                        </div>
                        <div class="user-details ml-3">
                            <h4>Emily Johnson</h4>
                            <p class="bio">
                                Very satisfied with my purchase!
                            </p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
