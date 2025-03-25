<?php include 'layout/header.php';
require_once '../admin/class/Slider.php';
require_once '../admin/class/Service.php';
require_once '../admin/class/Project.php';
require_once '../admin/class/Blog.php';
$slider = new Slider;
$service = new Service;
$project = new Project;
$blog = new Blog;
?>

<main>


    <section class="slider">
        <div class="swiper swiper-header swiper-initialized swiper-horizontal swiper-backface-hidden">
            <div class="swiper-wrapper" id="swiper-wrapper-3d9bb39935fd2082" aria-live="off" style="transition-duration: 0ms; transform: translate3d(-1840px, 0px, 0px); transition-delay: 0ms;">
                <?php
                $result = $slider->list();
                if ($result->num_rows > 0) {
                    // output data of each row
                    while ($row = $result->fetch_assoc()) {
                        echo " <div class='swiper-slide swiper-slide-next' style='background: url(../admin/uploads/$row[image]) center center / cover no-repeat; width: 368px;' >
                    <div class='container'>
                        <div class='swiper-slide__inner'>
                            <h2>$row[title]</h2>
                        </div>
                        <div class='overlay'></div>
                    </div>
                </div>";
                    }
                } else {
                    echo "0 results";
                }
                ?>
            </div>
            <div class="swiper-button-prev" tabindex="0" role="button" aria-label="Previous slide" aria-controls="swiper-wrapper-c351c4fc8132f910b"></div>
            <div class="swiper-button-next" tabindex="0" role="button" aria-label="Next slide" aria-controls="swiper-wrapper-c351c4fc8132f910b"></div>
            <span class="swiper-notification" aria-live="assertive" aria-atomic="true"></span>
        </div>
    </section>

    <section class="services">
        <div class="container">
            <div class="section-title">
                <h2>Xidmətlər</h2>
                <a href="/xidmetler/" class="section_link">bütün xidmətlər <i class="fas fa-arrow-right" aria-hidden="true"></i></a>
            </div>
            <div class="services-inner">

                <?php
                $result = $service->list();
                if ($result->num_rows > 0) {
                    // output data of each row
                    while ($row = $result->fetch_assoc()) {
                        echo " <div class='service-item'>
                    <a href='https://nareks.com/xidmetler/35-sat-sonras-xidmt.html'>
                        <div class='service-item__top'>
                            <div class='service-btn'>+1 il servis</div>
                            <div class='service-icons'>
                                <img src='/img/sun.png' alt=''>
                            </div>
                        </div>
                        <div class='img' style='background: url(../admin/uploads/$row[image]) center/cover'></div>
                        <h4>$row[title]</h4>
                        <button class='service-btn-more'>Ətraflı</button>
                    </a>
                </div>
";
                    }
                } else {
                    echo "0 results";
                }
                ?>







            </div>
        </div>
    </section>


    <section class="services">
        <div class="container">
            <div class="section-title">
                <h2>Xidmətlər</h2>
                <a href="/xidmetler/" class="section_link">bütün xidmətlər <i class="fas fa-arrow-right" aria-hidden="true"></i></a>
            </div>
            <div class="services-inner">

                <?php
                $result = $project->list();
                if ($result->num_rows > 0) {
                    // output data of each row
                    while ($row = $result->fetch_assoc()) {
                        echo " <div class='service-item'>
                    <a href='https://nareks.com/xidmetler/35-sat-sonras-xidmt.html'>
                        <div class='service-item__top'>
                            <div class='service-btn'>+1 il servis</div>
                            <div class='service-icons'>
                                <img src='/img/sun.png' alt=''>
                            </div>
                        </div>
                        <div class='img' style='background: url(../admin/uploads/$row[image]) center/cover'></div>
                        <h4>$row[title]</h4>
                        <button class='service-btn-more'>Ətraflı</button>
                    </a>
                </div>
";
                    }
                } else {
                    echo "0 results";
                }
                ?>







            </div>
        </div>
    </section>


    <section class="informations">
        <div class="container">
            <div class="section-title">
                <h2>Bloqlar</h2>
                <a href="/bloqlar/" class="section_link">bütün bloqlar <i class="fas fa-arrow-right" aria-hidden="true"></i></a>
            </div>
            <div class="informations-inner">











                <article>
                    <a href="https://nareks.com/bloqlar/54-nzart-xidmtinin-ustunluklri.html">
                        <img src="/uploads/posts/2024-02/1706794730_s3.webp" alt="">
                        <p>Nəzarət xidmətinin üstünlükləri</p>
                        <span>
                            <i class="fa-solid fa-eye" aria-hidden="true"></i>
                            249 / 1-02-2024, 16:38
                        </span>
                    </a>
                </article>




















                <article>
                    <a href="https://nareks.com/bloqlar/53-sistem-dizayn-ndir.html">
                        <img src="/uploads/posts/2024-02/1706963530_sistem.jpeg" alt="">
                        <p>Sistem dizaynı nədir?</p>
                        <span>
                            <i class="fa-solid fa-eye" aria-hidden="true"></i>
                            208 / 1-02-2024, 16:11
                        </span>
                    </a>
                </article>




















                <article>
                    <a href="https://nareks.com/bloqlar/43-sat-sonras-xidmt-n-ucun-vacibdir.html">
                        <img src="/uploads/posts/2024-02/1706793509_s2.jpeg" alt="">
                        <p>Satış sonrası xidmət nə üçün vacibdir?</p>
                        <span>
                            <i class="fa-solid fa-eye" aria-hidden="true"></i>
                            223 / 30-01-2024, 15:03
                        </span>
                    </a>
                </article>










            </div>
        </div>
    </section>
    <section class="references">
        <div class="container">
            <div class="section-title">
                <h2>Referanslar</h2>
                <a href="/referanslar/" class="section_link">bütün referanslar<i class="fas fa-arrow-right" aria-hidden="true"></i></a>
            </div>
            <div class="swiper swiper-references swiper-initialized swiper-horizontal">
                <div class="swiper-wrapper" id="swiper-wrapper-c351c4fc8132f910b" aria-live="off" style="transition-duration: 0ms; transform: translate3d(-3276px, 0px, 0px); transition-delay: 0ms;">




























































































































































































































































































































                    <div class="swiper-slide" role="group" aria-label="1 / 15" style="width: 344px; margin-right: 20px;" data-swiper-slide-index="0">
                        <div class="partbox" style="animation-delay: 0.5s">
                            <img src="/uploads/posts/2024-08/1722603744_logo2.png">
                        </div>
                    </div>
                    <div class="swiper-slide" role="group" aria-label="2 / 15" data-swiper-slide-index="1" style="width: 344px; margin-right: 20px;">
                        <div class="partbox" style="animation-delay: 0.5s">
                            <img src="/uploads/posts/2024-08/1722604009_301562411_498041442323732_2172898816933563599_n.png">
                        </div>
                    </div>
                    <div class="swiper-slide" role="group" aria-label="3 / 15" data-swiper-slide-index="2" style="width: 344px; margin-right: 20px;">
                        <div class="partbox" style="animation-delay: 0.5s">
                            <img src="/uploads/posts/2024-02/thumbs/1706779869_socar.png">
                        </div>
                    </div>
                    <div class="swiper-slide" role="group" aria-label="4 / 15" data-swiper-slide-index="3" style="width: 344px; margin-right: 20px;">
                        <div class="partbox" style="animation-delay: 0.5s">
                            <img src="/uploads/posts/2024-02/thumbs/1706779891_resant.png">
                        </div>
                    </div>
                    <div class="swiper-slide" role="group" aria-label="5 / 15" data-swiper-slide-index="4" style="width: 344px; margin-right: 20px;">
                        <div class="partbox" style="animation-delay: 0.5s">
                            <img src="/uploads/posts/2024-02/thumbs/1706779794_pasa.png">
                        </div>
                    </div>
                    <div class="swiper-slide" role="group" aria-label="6 / 15" data-swiper-slide-index="5" style="width: 344px; margin-right: 20px;">
                        <div class="partbox" style="animation-delay: 0.5s">
                            <img src="/uploads/posts/2024-02/thumbs/1706779707_gazelli.png">
                        </div>
                    </div>
                    <div class="swiper-slide" role="group" aria-label="7 / 15" data-swiper-slide-index="6" style="width: 344px; margin-right: 20px;">
                        <div class="partbox" style="animation-delay: 0.5s">
                            <img src="/uploads/posts/2024-02/thumbs/1706777619_excelsior.png">
                        </div>
                    </div>
                    <div class="swiper-slide" role="group" aria-label="8 / 15" data-swiper-slide-index="7" style="width: 344px; margin-right: 20px;">
                        <div class="partbox" style="animation-delay: 0.5s">
                            <img src="/uploads/posts/2024-02/thumbs/1706777563_aquatic.png">
                        </div>
                    </div>
                    <div class="swiper-slide swiper-slide-prev" role="group" aria-label="9 / 15" data-swiper-slide-index="8" style="width: 344px; margin-right: 20px;">
                        <div class="partbox" style="animation-delay: 0.5s">
                            <img src="/uploads/posts/2024-02/thumbs/1706777599_abb.png">
                        </div>
                    </div>
                    <div class="swiper-slide swiper-slide-active" role="group" aria-label="10 / 15" data-swiper-slide-index="9" style="width: 344px; margin-right: 20px;">
                        <div class="partbox" style="animation-delay: 0.5s">
                            <img src="/uploads/posts/2024-02/thumbs/1706777474_amburan.png">
                        </div>
                    </div>
                    <div class="swiper-slide swiper-slide-next" role="group" aria-label="11 / 15" data-swiper-slide-index="10" style="width: 344px; margin-right: 20px;">
                        <div class="partbox" style="animation-delay: 0.5s">
                            <img src="/uploads/posts/2024-01/medium/1706611457_ik2hlb87ekz4578vrz5y10frzmy0qw32-svg-1.png">
                        </div>
                    </div>
                    <div class="swiper-slide" role="group" aria-label="12 / 15" data-swiper-slide-index="11" style="width: 344px; margin-right: 20px;">
                        <div class="partbox" style="animation-delay: 0.5s">
                            <img src="/uploads/posts/2024-02/thumbs/1706777376_holidayinn.png">
                        </div>
                    </div>
                    <div class="swiper-slide" role="group" aria-label="13 / 15" data-swiper-slide-index="12" style="width: 344px; margin-right: 20px;">
                        <div class="partbox" style="animation-delay: 0.5s">
                            <img src="/uploads/posts/2024-01/1706611830_kb-logo.png">
                        </div>
                    </div>
                    <div class="swiper-slide" role="group" aria-label="14 / 15" data-swiper-slide-index="13" style="width: 344px; margin-right: 20px;">
                        <div class="partbox" style="animation-delay: 0.5s">
                            <img src="/uploads/posts/2024-01/medium/1706610809_shahdaglogo-1.jpg">
                        </div>
                    </div>
                    <div class="swiper-slide" role="group" aria-label="15 / 15" data-swiper-slide-index="14" style="width: 344px; margin-right: 20px;">
                        <div class="partbox" style="animation-delay: 0.5s">
                            <img src="/uploads/posts/2024-01/1706609982_delta-logo.png">
                        </div>
                    </div>
                </div>
                <span class="swiper-notification" aria-live="assertive" aria-atomic="true"></span>
            </div>
        </div>
    </section>
</main>
<?php include 'layout/footer.php'; ?>