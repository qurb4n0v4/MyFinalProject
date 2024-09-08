<style>
    .how-we-work {
        padding: 30px 0;
    }

    .how-we-work h2 {
        font-size: 32px;
        font-weight: bold;
        color: #333;
        margin-bottom: 10px;
    }

    .how-we-work p {
        font-size: 16px;
        color: #666;
    }

    .single-step {
        width: 100%;
        max-width: 300px; /* Sabit genişlik */
        padding: 20px;
        text-align: center; /* Ortaya hizalama */
        margin-bottom: 30px;
        transition: all 0.3s ease;
    }

    .single-step:hover {
        transform: translateY(-10px); /* Hover animasyonu */
    }

    .icon-circle {
        width: 60px; /* Daire boyutunu küçültme */
        height: 60px; /* Daire boyutunu küçültme */
        background-color: rgba(0, 123, 255, 0.1); /* Opak mavi arka plan */
        color: #007bff; /* İkon rengi */
        border-radius: 50%;
        display: flex;
        justify-content: center;
        align-items: center;
        font-size: 24px; /* İkon boyutunu küçültme */
        margin: 0 auto 15px auto; /* Ortaya hizalama ve alt boşluk */
    }

    .single-step h4 {
        font-size: 18px;
        font-weight: bold;
        color: #333;
        margin-bottom: 10px;
    }

    .single-step p {
        font-size: 14px;
        color: #666;
        line-height: 1.6;
    }

    /* Responsive Ayarları */
    @media (max-width: 768px) {
        .single-step {
            max-width: 100%; /* Küçük ekranlar için tam genişlik */
        }
    }
</style>
<section id="about" class="how-we-work pb-0">
    <div class="container">
        <div class="row d-flex justify-content-center">
            <div class="col-lg-12 text-center">
                <h2>How We Work</h2>
                <p>Your journey to success starts here</p>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-4 col-md-6 d-flex justify-content-center">
                <div class="single-step text-center">
                    <div class="icon-circle">
                        <i class="fas fa-user-plus"></i> <!-- Hesap oluşturma ikonu -->
                    </div>
                    <h4>Create an Account</h4>
                    <p>Sign up easily with your email and start your journey with us.</p>
                </div>
            </div>
            <div class="col-lg-4 col-md-6 d-flex justify-content-center">
                <div class="single-step text-center">
                    <div class="icon-circle">
                        <i class="fas fa-upload"></i> <!-- Özgeçmiş yükleme ikonu -->
                    </div>
                    <h4>Upload Resume</h4>
                    <p>Upload your resume to increase your chances of being hired by top companies.</p>
                </div>
            </div>
            <div class="col-lg-4 col-md-6 d-flex justify-content-center">
                <div class="single-step text-center">
                    <div class="icon-circle">
                        <i class="fas fa-briefcase"></i> <!-- İş bulma ikonu -->
                    </div>
                    <h4>Find a Job</h4>
                    <p>Browse through thousands of job listings and find the perfect role for you.</p>
                </div>
            </div>
        </div>
    </div>
</section>
