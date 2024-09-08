{{--<style>--}}
{{--    .job-listing-area {--}}
{{--        padding: 30px 140px;--}}
{{--    }--}}

{{--    .single-job-card {--}}
{{--        border: 1px solid #e2e2e2;--}}
{{--        border-radius: 8px;--}}
{{--        padding: 15px;--}}
{{--        margin-bottom: 20px;--}}
{{--        position: relative;--}}
{{--        background-color: #fff;--}}
{{--        box-shadow: 0 3px 6px rgba(0, 0, 0, 0.1);--}}
{{--        min-width: 300px; /* Kart genişliği küçültüldü */--}}
{{--        width: 100%;--}}
{{--        height: auto; /* Yükseklik otomatik */--}}
{{--    }--}}

{{--    .job-image img {--}}
{{--        width: 100%;--}}
{{--        height: auto;--}}
{{--        border-radius: 6px;--}}
{{--    }--}}

{{--    .job-card-header {--}}
{{--        position: absolute;--}}
{{--        top: 10px;--}}
{{--        right: 10px;--}}
{{--    }--}}

{{--    .save-job-icon img {--}}
{{--        width: 20px;--}}
{{--        height: 20px;--}}
{{--    }--}}

{{--    .job-card-content {--}}
{{--        text-align: left;--}}
{{--        margin-top: 15px;--}}
{{--    }--}}

{{--    .job-card-content h3 {--}}
{{--        font-size: 1.2rem; /* Font boyutu küçültüldü */--}}
{{--        color: #333;--}}
{{--        margin-bottom: 8px;--}}
{{--    }--}}

{{--    .job-card-content .job-description {--}}
{{--        color: #777;--}}
{{--        font-size: 0.9rem; /* Font boyutu küçültüldü */--}}
{{--        margin-bottom: 10px;--}}
{{--    }--}}

{{--    .job-card-content .salary {--}}
{{--        font-weight: bold;--}}
{{--        color: #333;--}}
{{--        font-size: 0.9rem; /* Font boyutu küçültüldü */--}}
{{--        margin-bottom: 8px;--}}
{{--    }--}}

{{--    .job-card-content .job-type {--}}
{{--        color: #007bff;--}}
{{--        font-weight: bold;--}}
{{--        font-size: 0.7rem;--}}
{{--        margin-bottom: 8px;--}}
{{--        background-color: rgba(173, 216, 230, 0.3);--}}
{{--        border-radius: 20px;--}}
{{--        padding: 5px 10px;--}}
{{--        display: inline-block;--}}
{{--    }--}}

{{--    .job-card-content .apply-deadline {--}}
{{--        color: #ff6f61;--}}
{{--        font-weight: bold;--}}
{{--        font-size: 0.9rem; /* Font boyutu küçültüldü */--}}
{{--        margin-bottom: 15px;--}}
{{--    }--}}

{{--    .job-card-footer {--}}
{{--        display: flex;--}}
{{--        justify-content: space-between;--}}
{{--        align-items: center;--}}
{{--        padding-top: 15px;--}}
{{--        border-top: 1px solid #e2e2e2;--}}
{{--        margin-top: 15px;--}}
{{--    }--}}

{{--    .company-info {--}}
{{--        display: flex;--}}
{{--        align-items: center;--}}
{{--    }--}}

{{--    .company-logo {--}}
{{--        width: 30px;--}}
{{--        height: 30px;--}}
{{--        border-radius: 5px;--}}
{{--        margin-right: 8px;--}}
{{--    }--}}

{{--    .company-name {--}}
{{--        color: #333;--}}
{{--        font-size: 12px; /* Font boyutu küçültüldü */--}}
{{--        font-weight: bold;--}}
{{--        text-decoration: none;--}}
{{--        max-width: 120px; /* Şirket adının genişliği küçültüldü */--}}
{{--    }--}}

{{--    .apply-job-btn {--}}
{{--        background-color: transparent;--}}
{{--        color: #007bff;--}}
{{--        border: 1px solid #007bff;--}}
{{--        padding: 5px 10px; /* Buton boyutu küçültüldü */--}}
{{--        border-radius: 5px;--}}
{{--        font-size: 10px; /* Font boyutu küçültüldü */--}}
{{--        text-decoration: none;--}}
{{--        transition: background-color 0.3s ease, color 0.3s ease;--}}
{{--    }--}}

{{--    .apply-job-btn:hover {--}}
{{--        background-color: #007bff;--}}
{{--        color: white;--}}
{{--        text-decoration: none;--}}
{{--    }--}}

{{--    .single-job-card:hover {--}}
{{--        border-color: #007bff;--}}
{{--    }--}}

{{--    .single-job-card.selected {--}}
{{--        border-color: #007bff;--}}
{{--    }--}}
{{--</style>--}}
<section class="job-listing-area bg-light mt-5" id="jobs">
    <div class="container">
        <div class="row d-flex justify-content-center">
            <div class="menu-content col-lg-12">
                <div class="title text-center">
                    <h1 class="mb-10">Available Job Listings</h1>
                    <p>Explore the latest job openings in various industries.</p>
                </div>
            </div>
        </div>
        <div class="row">
            <!-- İş Kartları -->
            <!-- 1. İş Kartı -->
            <div class="col-lg-4 col-md-6 col-sm-12 d-flex justify-content-center">
                <div class="single-job-card">
                    <div class="job-card-header">
                        <a href="#" class="save-job-icon">
                            <i class="fa-regular fa-bookmark"></i>
                        </a>
                    </div>
                    <div class="job-card-content">
                        <h3>Creative Art Designer</h3>
                        <p class="job-description">We are looking for a skilled art designer with experience in digital media.</p>
                        <div class="job-info d-flex justify-content-between">
                            <span class="salary"><i class="fa-solid fa-dollar-sign salary-icon"></i> 15k - 25k</span>
                            <span class="job-type">Full Time</span>
                        </div>
                        <p class="apply-deadline"><i class="fa-solid fa-clock deadline-icon"></i> 30th September 2024</p>
                    </div>
                    <div class="job-card-footer">
                        <div class="company-info">
                            <img src="img/company-logo1.png" alt="Company Logo" class="company-logo">
                            <a href="#" class="company-name">Premium Labels Limited</a>
                        </div>
                        <a href="#" class="apply-job-btn">Apply Now</a>
                    </div>
                </div>
            </div>

            <!-- 2. İş Kartı -->
            <div class="col-lg-4 col-md-6 col-sm-12 d-flex justify-content-center">
                <div class="single-job-card">
                    <div class="job-card-header">
                        <a href="#" class="save-job-icon">
                            <i class="fa-regular fa-bookmark"></i>
                        </a>
                    </div>
                    <div class="job-card-content">
                        <h3>Web Developer</h3>
                        <p class="job-description">Looking for an experienced full-stack developer to join our team.</p>
                        <div class="job-info d-flex justify-content-between">
                            <span class="salary"><i class="fa-solid fa-dollar-sign salary-icon"></i> 20k - 30k</span>
                            <span class="job-type">Part Time</span>
                        </div>
                        <p class="apply-deadline"><i class="fa-solid fa-clock deadline-icon"></i> 25th September 2024</p>
                    </div>
                    <div class="job-card-footer">
                        <div class="company-info">
                            <img src="img/company-logo2.png" alt="Company Logo" class="company-logo">
                            <a href="#" class="company-name">Tech Innovations</a>
                        </div>
                        <a href="#" class="apply-job-btn">Apply Now</a>
                    </div>
                </div>
            </div>

            <!-- 3. İş Kartı -->
            <div class="col-lg-4 col-md-6 col-sm-12 d-flex justify-content-center">
                <div class="single-job-card">
                    <div class="job-card-header">
                        <a href="#" class="save-job-icon">
                            <i class="fa-regular fa-bookmark"></i>
                        </a>
                    </div>
                    <div class="job-card-content">
                        <h3>Marketing Manager</h3>
                        <p class="job-description">Seeking a talented individual to lead our marketing team.</p>
                        <div class="job-info d-flex justify-content-between">
                            <span class="salary"><i class="fa-solid fa-dollar-sign salary-icon"></i> 25k - 35k</span>
                            <span class="job-type">Full Time</span>
                        </div>
                        <p class="apply-deadline"><i class="fa-solid fa-clock deadline-icon"></i> 10th October 2024</p>
                    </div>
                    <div class="job-card-footer">
                        <div class="company-info">
                            <img src="img/company-logo3.png" alt="Company Logo" class="company-logo">
                            <a href="#" class="company-name">ABC Marketing Solutions</a>
                        </div>
                        <a href="#" class="apply-job-btn">Apply Now</a>
                    </div>
                </div>
            </div>

            <!-- 4. İş Kartı -->
            <div class="col-lg-4 col-md-6 col-sm-12 d-flex justify-content-center">
                <div class="single-job-card">
                    <div class="job-card-header">
                        <a href="#" class="save-job-icon">
                            <i class="fa-regular fa-bookmark"></i>
                        </a>
                    </div>
                    <div class="job-card-content">
                        <h3>Graphic Designer</h3>
                        <p class="job-description">Creative graphic designer needed for various design projects.</p>
                        <div class="job-info d-flex justify-content-between">
                            <span class="salary"><i class="fa-solid fa-dollar-sign salary-icon"></i> 18k - 28k</span>
                            <span class="job-type">Freelance</span>
                        </div>
                        <p class="apply-deadline"><i class="fa-solid fa-clock deadline-icon"></i> 5th October 2024</p>
                    </div>
                    <div class="job-card-footer">
                        <div class="company-info">
                            <img src="img/company-logo4.png" alt="Company Logo" class="company-logo">
                            <a href="#" class="company-name">Design Studio</a>
                        </div>
                        <a href="#" class="apply-job-btn">Apply Now</a>
                    </div>
                </div>
            </div>

            <!-- 5. İş Kartı -->
            <div class="col-lg-4 col-md-6 col-sm-12 d-flex justify-content-center">
                <div class="single-job-card">
                    <div class="job-card-header">
                        <a href="#" class="save-job-icon">
                            <i class="fa-regular fa-bookmark"></i>
                        </a>
                    </div>
                    <div class="job-card-content">
                        <h3>Product Manager</h3>
                        <p class="job-description">Experienced product manager to oversee product development.</p>
                        <div class="job-info d-flex justify-content-between">
                            <span class="salary"><i class="fa-solid fa-dollar-sign salary-icon"></i> 22k - 32k</span>
                            <span class="job-type">Full Time</span>
                        </div>
                        <p class="apply-deadline"><i class="fa-solid fa-clock deadline-icon"></i> 15th October 2024</p>
                    </div>
                    <div class="job-card-footer">
                        <div class="company-info">
                            <img src="img/company-logo5.png" alt="Company Logo" class="company-logo">
                            <a href="#" class="company-name">Innovative Products Inc.</a>
                        </div>
                        <a href="#" class="apply-job-btn">Apply Now</a>
                    </div>
                </div>
            </div>

            <!-- 6. İş Kartı -->
            <div class="col-lg-4 col-md-6 col-sm-12 d-flex justify-content-center">
                <div class="single-job-card">
                    <div class="job-card-header">
                        <a href="#" class="save-job-icon">
                            <i class="fa-regular fa-bookmark"></i>
                        </a>
                    </div>
                    <div class="job-card-content">
                        <h3>Content Writer</h3>
                        <p class="job-description">Looking for a skilled writer for content creation and marketing.</p>
                        <div class="job-info d-flex justify-content-between">
                            <span class="salary"><i class="fa-solid fa-dollar-sign salary-icon"></i> 14k - 24k</span>
                            <span class="job-type">Part Time</span>
                        </div>
                        <p class="apply-deadline"><i class="fa-solid fa-clock deadline-icon"></i> 20th September 2024</p>
                    </div>
                    <div class="job-card-footer">
                        <div class="company-info">
                            <img src="img/company-logo6.png" alt="Company Logo" class="company-logo">
                            <a href="#" class="company-name">Content Creators Hub</a>
                        </div>
                        <a href="#" class="apply-job-btn">Apply Now</a>
                    </div>
                </div>
            </div>

            <!-- 7. İş Kartı -->
            <div class="col-lg-4 col-md-6 col-sm-12 d-flex justify-content-center">
                <div class="single-job-card">
                    <div class="job-card-header">
                        <a href="#" class="save-job-icon">
                            <i class="fa-regular fa-bookmark"></i>
                        </a>
                    </div>
                    <div class="job-card-content">
                        <h3>Sales Executive</h3>
                        <p class="job-description">Sales executive needed for business development and client relations.</p>
                        <div class="job-info d-flex justify-content-between">
                            <span class="salary"><i class="fa-solid fa-dollar-sign salary-icon"></i> 12k - 22k</span>
                            <span class="job-type">Full Time</span>
                        </div>
                        <p class="apply-deadline"><i class="fa-solid fa-clock deadline-icon"></i> 28th September 2024</p>
                    </div>
                    <div class="job-card-footer">
                        <div class="company-info">
                            <img src="img/company-logo7.png" alt="Company Logo" class="company-logo">
                            <a href="#" class="company-name">Sales Pro Ltd.</a>
                        </div>
                        <a href="#" class="apply-job-btn">Apply Now</a>
                    </div>
                </div>
            </div>

            <!-- 8. İş Kartı -->
            <div class="col-lg-4 col-md-6 col-sm-12 d-flex justify-content-center">
                <div class="single-job-card">
                    <div class="job-card-header">
                        <a href="#" class="save-job-icon">
                            <i class="fa-regular fa-bookmark"></i>
                        </a>
                    </div>
                    <div class="job-card-content">
                        <h3>HR Manager</h3>
                        <p class="job-description">HR manager required to handle recruitment and employee relations.</p>
                        <div class="job-info d-flex justify-content-between">
                            <span class="salary"><i class="fa-solid fa-dollar-sign salary-icon"></i> 26k - 36k</span>
                            <span class="job-type">Full Time</span>
                        </div>
                        <p class="apply-deadline"><i class="fa-solid fa-clock deadline-icon"></i> 18th October 2024</p>
                    </div>
                    <div class="job-card-footer">
                        <div class="company-info">
                            <img src="img/company-logo8.png" alt="Company Logo" class="company-logo">
                            <a href="#" class="company-name">Human Resources Experts</a>
                        </div>
                        <a href="#" class="apply-job-btn">Apply Now</a>
                    </div>
                </div>
            </div>

            <!-- 9. İş Kartı -->
            <div class="col-lg-4 col-md-6 col-sm-12 d-flex justify-content-center">
                <div class="single-job-card">
                    <div class="job-card-header">
                        <a href="#" class="save-job-icon">
                            <i class="fa-regular fa-bookmark"></i>
                        </a>
                    </div>
                    <div class="job-card-content">
                        <h3>Customer Support Specialist</h3>
                        <p class="job-description">Customer support specialist needed for handling customer inquiries and issues.</p>
                        <div class="job-info">
                            <span class="salary"><i class="fa-solid fa-dollar-sign salary-icon"></i> 16k - 26k</span>
                            <span class="job-type">Part Time</span>
                        </div>
                        <p class="apply-deadline"><i class="fa-solid fa-clock deadline-icon"></i> 2nd October 2024</p>
                    </div>
                    <div class="job-card-footer">
                        <div class="company-info">
                            <img src="img/company-logo9.png" alt="Company Logo" class="company-logo">
                            <a href="#" class="company-name">Customer Care Solutions</a>
                        </div>
                        <a href="#" class="apply-job-btn">Apply Now</a>
                    </div>
                </div>
            </div>
        </div>
        <div class="row d-flex justify-content-center mt-5">
            <a href="{{ route('categories.index') }}" class="btn btn-primary">View all >></a>
        </div>
    </div>
    <script>
        document.querySelectorAll('.save-job-icon').forEach(function(bookmarkIcon) {
            bookmarkIcon.addEventListener('click', function(event) {
                event.preventDefault();
                let icon = this.querySelector('i');

                if (icon.classList.contains('fa-regular')) {
                    icon.classList.remove('fa-regular');
                    icon.classList.add('fa-solid');
                } else {
                    icon.classList.remove('fa-solid');
                    icon.classList.add('fa-regular');
                }
            });
        });
        document.querySelectorAll('.single-job-card').forEach(function(card) {
            card.addEventListener('click', function() {
                document.querySelectorAll('.single-job-card').forEach(function(otherCard) {
                    otherCard.classList.remove('selected');
                });

                this.classList.add('selected');
            });
        });
    </script>
</section>
