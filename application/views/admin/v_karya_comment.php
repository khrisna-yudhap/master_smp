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
                <div class="table-responsive">
                    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>
                                    Log Komentar
                                </th>
                                <th>Status Komentar</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php $no = 1;
                            foreach ($comment_data as $k) : ?>
                                <tr>
                                    <td><?= $no++; ?></td>
                                    <td>Pengunjung <b><?php echo $k['commentator']; ?></b>
                                        berkomentar</b>
                                        pada tanggal <b><?php echo $k['comment_tanggal']; ?></b>
                                        di postingan Karya Tulis berjudul <b>Puisi</b></td>
                                    <td>
                                        <?php
                                        $status = $k['comment_active'];

                                        if ($status != 0) :
                                        ?>
                                            <h4><span class="badge badge-success">Ditampilkan</span> </h4>
                                        <?php else : ?>
                                            <h4><span class="badge badge-warning">Butuh Tinjauan</span> </h4>
                                        <?php endif; ?>
                                    </td>
                                    <td>
                                        <button class="btn btn-info btn-sm" data-toggle="modal" data-target="#ModalEdit<?php echo $k['comment_id']; ?>">Tinjau Komentar</button>
                                    </td>
                                </tr>

                            <?php endforeach; ?>
                        </tbody>
                    </table>
                </div>
            </div>

        </div>


    </div>

</div>

<?php foreach ($comment_data as $k) : ?>
    <!--Modal Edit Pengguna-->
    <div class="modal fade" id="ModalEdit<?= $k['comment_id']; ?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true"><span class="fa fa-close"></span></span></button>
                    <h4 class="modal-title" id="myModalLabel">Tinjau Komentar dari <?= $k['commentator']; ?></h4>
                </div>
                <form class="form-horizontal" action="<?php echo base_url() . 'admin/kategori/update_kategori' ?>" method="post" enctype="multipart/form-data">
                    <div class="modal-body">
                        <div class="form-group">
                            <label for="inputUserName" class="control-label">Username</label>
                            <div class="col">
                                <input type="hidden" name="komentar_id" value="<?php echo $k['comment_id']; ?>" />
                                <input type="text" name="commentator" class="form-control" id="inputUserName" value="<?php echo $k['commentator']; ?>" placeholder="Kategori" disabled>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="inputUserName" class=" control-label">Isi Komentar</label>
                            <div class="col">
                                <textarea name="commentator" class="form-control" id="inputUserName" rows="8"><?php echo $k['comment']; ?> </textarea>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="inputUserName" class=" control-label">Tanggal Komentar</label>
                            <div class="col">
                                <input type="text" name="comment_tanggal" class="form-control" id="inputUserName" value="<?php echo $k['comment_tanggal']; ?>" disabled></input>
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="inputUserName" class=" control-label">Status Komentar</label>
                            <div class="col">
                                <select class="form-control" name="comment_active" id="comment_active">
                                    <option value="0">Tidak Ditampilkan</option>
                                    <option value="1">Tampilkan</option>
                                </select>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="col">
                                <a href="<?php echo base_url() . 'admin/kategori/delete_comment' ?>" class="btn btn-danger">Delete Komentar</a>
                            </div>
                        </div>


                    </div>
                    <div class=" modal-footer">
                        <button type="button" class="btn btn-default btn-flat" data-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary btn-flat" id="simpan">Update</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
<?php endforeach; ?>