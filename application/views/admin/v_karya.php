<?php
function limit_words($string, $word_limit)
{
    $words = explode(" ", $string);
    return implode(" ", array_splice($words, 0, $word_limit));
}

?>
<div id="content">


    <nav class="navbar navbar-expand navbar-light bg-white topbar mb-4 static-top shadow">


        <button id="sidebarToggleTop" class="btn btn-link d-md-none rounded-circle mr-3">
            <i class="fa fa-bars"></i>
        </button>




    </nav>

    <div class="container-fluid">

        <!-- DataTales Example -->
        <div class="card shadow mb-4">
            <div class="card-header py-3">
                <h6 class="m-0 font-weight-bold text-primary"><?php echo isset($breadcrumb) ? $breadcrumb : ''; ?></h6>
            </div>
            <div class="card-body">

                <div class="box-header">
                    <a class="btn btn-success btn-flat" href="<?php echo base_url() . 'admin/karya/add_karya' ?>">
                        <span class="fa fa-plus"></span> Tambah Karya Tulis</a>
                </div>

                <br>

                <div class="table-responsive">
                    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                        <thead>
                            <tr>
                                <th>Judul Karya Tulis</th>
                                <th>Jenis Karya</th>
                                <th>Isi Karya Tulis</th>
                                <th>Penulis</th>
                                <th>Tanggal Upload</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            foreach ($data as $key => $value) :
                            ?>
                                <tr>
                                    <td><?php echo $value['karya_judul']; ?></td>
                                    <td><?php echo $value['karya_jenis']; ?></td>
                                    <td><?php echo $value['karya_isi']; ?></td>
                                    <td><?php echo $value['karya_penulis']; ?></td>
                                    <td><?php echo $value['tanggal']; ?></td>
                                    <td>
                                        <a href="<?php echo base_url() . 'admin/karya/edit_karya/' . $value['karya_id']; ?>" class="btn btn-info btn-icon-split">
                                            <span class="icon text-white-50">
                                                <i class="fas fa-info-circle"></i>
                                            </span>
                                            <span class="text">Edit</span>
                                        </a>

                                        <a href="#" class="btn btn-danger btn-icon-split" data-toggle="modal" data-target="#ModalHapus<?= $value['karya_id']; ?>">
                                            <span class="icon text-white-50">
                                                <i class="fas fa-trash"></i>
                                            </span>
                                            <span class="text">Hapus</span>
                                        </a>
                                    </td>
                                </tr>
                            <?php endforeach; ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>

    </div>

    <?php foreach ($data as $key => $value) : ?>
        <!--Modal Hapus Pengguna-->
        <div class="modal fade" id="ModalHapus<?= $value['karya_id'] ?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true"><span class="fa fa-close"></span></span></button>
                        <h4 class="modal-title" id="myModalLabel">Hapus Karya Tulis?</h4>
                    </div>
                    <form class="form-horizontal" action="<?php echo base_url() . 'admin/karya/hapus_karya' ?>" method="post" enctype="multipart/form-data">
                        <div class="modal-body">
                            <input type="hidden" name="karya_id" value="<?= $value['karya_id']; ?>" />
                            <p>Apakah Anda yakin ingin menghapus Karya Tulis berjudul <b><?= $value['karya_judul']; ?></b> ?</p>

                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-default btn-flat" data-dismiss="modal">Close</button>
                            <button type="submit" class="btn btn-primary btn-flat" id="simpan">Hapus</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    <?php endforeach; ?>