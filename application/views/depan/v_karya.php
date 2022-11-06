<?php
function limit_words($string, $word_limit)
{
    $words = explode(" ", $string);
    return implode(" ", array_splice($words, 0, $word_limit));
}
?>
<div class="recent_event_area" style="padding-top: 4rem;">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-lg-8 col-md-10">
                <div class="section_title text-center mb-70">
                    <h3 class="mb-45">KARYA TULIS</h3>
                </div>
            </div>
        </div>

        <div class="row justify-content-center">
            <div class="col-lg-10">
                <?php foreach ($data->result() as $row) : ?>
                    <div class="single_event d-flex align-items-center" style="margin:10px;">
                        <div class="date text-center">
                            <span><?php echo date("d", strtotime($row->karya_tanggal)); ?></span>
                            <p><?php echo date("M Y", strtotime($row->karya_tanggal)); ?></p>
                        </div>
                        <div class="event_info p-4 pl-5">
                            <a href="<?= site_url('karya_tulis/view/') . $row->karya_id ?>">
                                <h4 style="margin:0"><?= $row->karya_judul; ?></h4>
                            </a>
                            <p><span><i class="fa fa-bookmark"></i><?= $row->karya_jenis; ?> |
                                    <span> oleh <b><?= $row->karya_penulis; ?></b></span></p>
                            <p><?php echo limit_words($row->karya_isi, 7) . '...'; ?></p>
                            <p>
                                <span>
                                    <i class="fa fa-thumbs-up text-primary"></i>
                                    <?php
                                    if ($row->karya_reaction == null) {
                                        echo 0;
                                    } else {
                                        echo $row->karya_reaction;
                                    }
                                    ?>
                                </span>
                                <span>
                                    <i class="fa fa-comment text-primary"></i>
                                    <?php
                                    $comments = $this->M_karya->countComment($row->karya_id);
                                    $comments = $comments->row();
                                    echo $comments->jumlah;
                                    ?>
                                </span>
                            </p>
                        </div>
                    </div>
                <?php endforeach; ?>
            </div>
            <div class="col-md-12 text-center m-3">
                <?php echo $page; ?>
            </div>
        </div>


    </div>
</div>