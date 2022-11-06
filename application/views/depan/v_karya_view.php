<?php
function limit_words($string, $word_limit)
{
    $words = explode(" ", $string);
    return implode(" ", array_splice($words, 0, $word_limit));
}
?>
<style>
    .like {
        position: absolute;
        width: 50px;
        height: 50px;
        opacity: 0;
    }

    .like:hover {
        cursor: pointer;
    }

    .resp-sharing-button__link,
    .resp-sharing-button__icon {
        display: inline-block
    }

    .resp-sharing-button__link {
        text-decoration: none;
        color: #fff;
        margin: 0.5em
    }

    .resp-sharing-button {
        cursor: pointer;
        border-radius: 5px;
        transition: 25ms ease-out;
        padding: 0.5em 0.75em;
        font-family: Helvetica Neue, Helvetica, Arial, sans-serif
    }

    .resp-sharing-button__icon svg {
        width: 1em;
        height: 1em;
        margin-right: 0.4em;
        vertical-align: top
    }

    .resp-sharing-button--small svg {
        margin: 0;
        vertical-align: middle
    }

    /* Non solid icons get a stroke */
    .resp-sharing-button__icon {
        stroke: #fff;
        fill: none
    }

    /* Solid icons get a fill */
    .resp-sharing-button__icon--solid,
    .resp-sharing-button__icon--solidcircle {
        fill: #fff;
        stroke: none
    }

    .resp-sharing-button--twitter {
        background-color: #55acee !important;
    }

    .resp-sharing-button--twitter:hover {
        background-color: #2795e9 !important;
    }

    .resp-sharing-button--facebook:hover {
        background-color: #2d4373 !important;
    }

    .resp-sharing-button--whatsapp {
        background-color: #25D366 !important;
    }

    .resp-sharing-button--whatsapp:hover {
        background-color: #1da851 !important;
    }


    .resp-sharing-button--facebook {
        background-color: #3b5998 !important;
        border-color: #3b5998 !important;
    }

    .resp-sharing-button--facebook:hover,
    .resp-sharing-button--facebook:active {
        background-color: #2d4373 !important;
        border-color: #2d4373 !important;
    }

    .resp-sharing-button--twitter {
        background-color: #55acee !important;
        border-color: #55acee !important;
    }

    .resp-sharing-button--twitter:hover,
    .resp-sharing-button--twitter:active {
        background-color: #2795e9 !important;
        border-color: #2795e9 !important;
    }
</style>
<section class="blog_area single-post-area mb-5">
    <div class="container">
        <div class="row">
            <div class="col-lg-8 posts-list">
                <div class="single-post">
                    <div class="blog_details">
                        <h1><?= $data['karya_judul']; ?>
                        </h1>
                        <ul class="blog-info-link mt-3 mb-4">
                            <li>
                                <i class="fa fa-user"></i><?= $data['karya_penulis']; ?>
                            </li>
                            <li>
                                <i class="fa fa-bookmark"></i> <?= $data['karya_jenis']; ?>
                            </li>
                            <li><i class="fa fa-clock-o"></i><?= $data['tanggal']; ?></li>
                        </ul>
                        <?= $data['karya_isi']; ?>

                    </div>
                </div>
                <div class="react-section p-3">
                    <div class="row">
                        <div class="col">
                            <h1><input type="checkbox" onclick="myFunction(this)" class="like">
                                <i id="like" class="fa fa-thumbs-up"></i>
                            </h1>
                            <p id="reaction-text">Suka</p>
                        </div>
                        <div class="col-sm-6">
                            <div class="col" align="center">
                                <span>Bagikan :</span>
                                <!-- Sharingbutton Facebook -->
                                <span class="resp-sharing-button__link" id="shareFb" onclick="shareFacebook()" rel="noopener" aria-label="">
                                    <div class="resp-sharing-button resp-sharing-button--facebook resp-sharing-button--small">
                                        <div aria-hidden="true" class="resp-sharing-button__icon resp-sharing-button__icon--solid">
                                            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24">
                                                <path d="M18.77 7.46H14.5v-1.9c0-.9.6-1.1 1-1.1h3V.5h-4.33C10.24.5 9.5 3.44 9.5 5.32v2.15h-3v4h3v12h5v-12h3.85l.42-4z" />
                                            </svg>
                                        </div>
                                    </div>
                                </span>

                                <!-- Sharingbutton Twitter -->
                                <span class="resp-sharing-button__link" id="shareTwt" onclick="shareTwitter()" rel="noopener" aria-label="">
                                    <div class="resp-sharing-button resp-sharing-button--twitter resp-sharing-button--small">
                                        <div aria-hidden="true" class="resp-sharing-button__icon resp-sharing-button__icon--solid">
                                            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24">
                                                <path d="M23.44 4.83c-.8.37-1.5.38-2.22.02.93-.56.98-.96 1.32-2.02-.88.52-1.86.9-2.9 1.1-.82-.88-2-1.43-3.3-1.43-2.5 0-4.55 2.04-4.55 4.54 0 .36.03.7.1 1.04-3.77-.2-7.12-2-9.36-4.75-.4.67-.6 1.45-.6 2.3 0 1.56.8 2.95 2 3.77-.74-.03-1.44-.23-2.05-.57v.06c0 2.2 1.56 4.03 3.64 4.44-.67.2-1.37.2-2.06.08.58 1.8 2.26 3.12 4.25 3.16C5.78 18.1 3.37 18.74 1 18.46c2 1.3 4.4 2.04 6.97 2.04 8.35 0 12.92-6.92 12.92-12.93 0-.2 0-.4-.02-.6.9-.63 1.96-1.22 2.56-2.14z" />
                                            </svg>
                                        </div>
                                    </div>
                                </span>

                                <!-- Sharingbutton WhatsApp -->
                                <span class="resp-sharing-button__link" id="shareWa" onclick="shareWhatsApp()" rel="noopener" aria-label="">
                                    <div class="resp-sharing-button resp-sharing-button--whatsapp resp-sharing-button--small">
                                        <div aria-hidden="true" class="resp-sharing-button__icon resp-sharing-button__icon--solid">
                                            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24">
                                                <path d="M20.1 3.9C17.9 1.7 15 .5 12 .5 5.8.5.7 5.6.7 11.9c0 2 .5 3.9 1.5 5.6L.6 23.4l6-1.6c1.6.9 3.5 1.3 5.4 1.3 6.3 0 11.4-5.1 11.4-11.4-.1-2.8-1.2-5.7-3.3-7.8zM12 21.4c-1.7 0-3.3-.5-4.8-1.3l-.4-.2-3.5 1 1-3.4L4 17c-1-1.5-1.4-3.2-1.4-5.1 0-5.2 4.2-9.4 9.4-9.4 2.5 0 4.9 1 6.7 2.8 1.8 1.8 2.8 4.2 2.8 6.7-.1 5.2-4.3 9.4-9.5 9.4zm5.1-7.1c-.3-.1-1.7-.9-1.9-1-.3-.1-.5-.1-.7.1-.2.3-.8 1-.9 1.1-.2.2-.3.2-.6.1s-1.2-.5-2.3-1.4c-.9-.8-1.4-1.7-1.6-2-.2-.3 0-.5.1-.6s.3-.3.4-.5c.2-.1.3-.3.4-.5.1-.2 0-.4 0-.5C10 9 9.3 7.6 9 7c-.1-.4-.4-.3-.5-.3h-.6s-.4.1-.7.3c-.3.3-1 1-1 2.4s1 2.8 1.1 3c.1.2 2 3.1 4.9 4.3.7.3 1.2.5 1.6.6.7.2 1.3.2 1.8.1.6-.1 1.7-.7 1.9-1.3.2-.7.2-1.2.2-1.3-.1-.3-.3-.4-.6-.5z" />
                                            </svg>
                                        </div>
                                    </div>
                                </span>
                            </div>
                        </div>
                    </div>


                </div>
                <div class="comments-section">
                    <h4>
                        <?php
                        $comments = $this->M_karya->countComment($data['karya_id']);
                        $comments = $comments->row();
                        echo $comments->jumlah;
                        ?> Komentar
                    </h4>
                    <hr>
                    <div class="comments p-3">
                        <?php
                        if ($data_comment == null) {
                            echo "<p> Tidak Ada Komentar </p>";
                        } else {
                            foreach ($data_comment as $key => $value) :
                        ?>
                                <div class="comment-group">
                                    <div class="row">
                                        <h5><?= $value['commentator']; ?></h5>
                                        &nbsp;<small>pada tanggal <?= $value['tgl_comment']; ?></small>
                                    </div>
                                    <div class="row">
                                        <p><?= $value['comment'] ?></p>
                                    </div>
                                </div>
                        <?php
                            endforeach;
                        } ?>
                    </div>

                    <hr>
                    <form action="<?php echo base_url() . 'karya_tulis/tambah_komentar' ?>" method="POST">
                        <div class="comment-add p-3">
                            <?= $this->session->flashdata('msg') ?>
                            <h4><b>Tambahkan Komentar</b></h4>
                            <div class="form-group pt-3">
                                <label>Nama</label>
                                <input type="hidden" class="form-control" id="karya_id" name="karya_id" value="<?= $data['karya_id'] ?>">
                                <input class="form-control" type="text" name="commentator" id="commentator" placeholder="Nama Anda.." required>
                            </div>
                            <div class="form-group">
                                <label>Komentar</label>
                                <textarea class="form-control" id="comment" name="comment" rows="4" style="background: #fff;" placeholder="Isi Komentar..." required></textarea>
                            </div>
                            <button type="submit" class="btn btn-primary">Submit</button>
                        </div>

                    </form>
                </div>



            </div>
            <div class="col-lg-4">
                <div class="blog_right_sidebar">


                    <aside class="single_sidebar_widget popular_post_widget">
                        <h3 class="widget_title">Karya Tulis Populer</h3>
                        <div class="media post_item">

                            <?php foreach ($popular_karya as $key => $value) : ?>
                                <div class="media-body">
                                    <a href="<?= site_url('karya_tulis/view/') . $value['karya_id']; ?>">
                                        <h3><?= $value['karya_judul']; ?></h3>
                                    </a>
                                    <p>
                                        <?= limit_words($value['karya_isi'], 8) . '...'; ?>
                                        <br>
                                        <a href="<?= site_url('karya_tulis/view/') . $value['karya_id']; ?>">Baca Lebih Lanjut...</a>
                                    </p>
                                    <br>
                                    <span>

                                        <p>
                                            <i class="fa fa-thumbs-up text-primary"></i>
                                            disukai oleh
                                            <?php
                                            if ($value['karya_reaction'] == null) {
                                                echo 0;
                                            } else {
                                                echo $value['karya_reaction'];
                                            }
                                            ?>
                                            orang

                                        </p>
                                    </span>
                                    <span>
                                        <p>
                                            <i class="fa fa-comment text-primary"></i>
                                            dikomentari oleh
                                            <?php
                                            $comments = $this->M_karya->countComment($value['karya_id']);
                                            $comments = $comments->row();
                                            echo $comments->jumlah;
                                            ?>
                                            orang
                                        </p>
                                    </span>
                                    <br>
                                    <div class="more">
                                        <a class="boxed-btn5" href="<?= site_url('karya_tulis/'); ?>">Karya Tulis Lainnya</a>
                                    </div>
                                </div>
                            <?php endforeach; ?>

                        </div>


                    </aside>

                </div>
            </div>

        </div>
    </div>
</section>

<script>
    function myFunction(x) {
        if (x.checked == true) {
            var postid = document.getElementById('karya_id').value;

            $.ajax({
                url: '<?= site_url('karya_tulis/add_like') ?>',
                type: 'POST',
                data: {
                    'react': 1,
                    'karya_id': postid
                },
                success: function(response) {
                    console.log('liked');
                }
            });
            var element = document.getElementById("reaction-text");
            element.innerHTML = "Disukai";
            document.getElementById("like").classList.add("text-primary");
        } else {
            var postid = document.getElementById('karya_id').value;

            $.ajax({
                url: '<?= site_url('karya_tulis/un_like') ?>',
                type: 'POST',
                data: {
                    'react': 1,
                    'karya_id': postid
                },
                success: function(response) {
                    console.log('unliked');
                }
            });

            var element = document.getElementById("reaction-text");
            element.innerHTML = "Suka";
            document.getElementById("like").classList.remove("text-primary");
        }
    }

    function shareFacebook() {
        var url = window.location.href;
        window.open('https://facebook.com/sharer/sharer.php?u=' + url, '_blank');
    }

    function shareTwitter() {
        var url = window.location.href;
        window.open('https://twitter.com/intent/tweet/?text=&amp;url=' + url, '_blank');
    }

    function shareWhatsApp() {
        var url = window.location.href;
        window.open('whatsapp://send?text=' + url, '_blank');
    }
</script>