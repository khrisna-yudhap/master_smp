<style>
    .lightbox-gallery {
        background-image: linear-gradient(#4A148C, #E53935);
        background-repeat: no-repeat;
        color: #000;
        overflow-x: hidden
    }

    .lightbox-gallery p {
        color: #fff
    }

    .lightbox-gallery h2 {
        font-weight: bold;
        margin-bottom: 40px;
        padding-top: 40px;
        color: #fff
    }

    @media (max-width:767px) {
        .lightbox-gallery h2 {
            margin-bottom: 25px;
            padding-top: 25px;
            font-size: 24px
        }
    }

    .lightbox-gallery .intro {
        font-size: 16px;
        max-width: 500px;
        margin: 0 auto 40px;
    }

    .lightbox-gallery .intro p {
        margin-bottom: 0;

    }

    .lightbox-gallery .photos {
        padding-bottom: 20px
    }

    .lightbox-gallery .item {
        padding-bottom: 30px
    }
</style>
<div class="recent_event_area" style="padding-top: 4rem;">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-lg-8 col-md-10">
                <div class="section_title text-center mb-70">
                    <h3 class="mb-45">GALERI KEGIATAN SEKOLAH</h3>

                </div>
            </div>
        </div>
        <div class="row justify-content-center">
            <div class="col-lg-10">
                <div class="section-top-border">
                    <div class="row gallery-item">
                        <?php foreach ($all_galeri->result() as $row) : ?>
                            <div class="container col-md-4">
                                <div class="image">
                                    <a href="<?php echo base_url() . 'assets/images/' . $row->galeri_gambar; ?>" class="img-pop-up">
                                        <div class="single-gallery-image" style="background: url(<?php echo base_url() . 'assets/images/' . $row->galeri_gambar; ?>);"></div>
                                    </a>
                                    <div class="intro" align="center">
                                        <div class="text">
                                            <p><?php echo $row->galeri_judul; ?></p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        <?php endforeach; ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>