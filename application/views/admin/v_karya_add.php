<div id="content">


    <nav class="navbar navbar-expand navbar-light bg-white topbar mb-4 static-top shadow">


        <button id="sidebarToggleTop" class="btn btn-link d-md-none rounded-circle mr-3">
            <i class="fa fa-bars"></i>
        </button>




    </nav>

    <div class="container-fluid">

        <form action="<?php echo base_url() . 'admin/karya/simpan_karya' ?>" method="post" enctype="multipart/form-data">
            <div class="card shadow mb-4">
                <div class="card-header py-3">
                    <h6 class="m-0 font-weight-bold text-primary"><?php echo isset($breadcrumb) ? $breadcrumb : ''; ?></h6>
                </div>
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-10">
                            <input type="text" name="judul_karya" class="form-control mb-2" placeholder="Judul atau nama Karya Tulis" autocomplete="off" required />
                        </div>
                        <!-- /.col -->
                        <div class="col pl-3">
                            <div class="form-group">
                                <div class="row">
                                    <div class="col">
                                        <button type="submit" class="btn btn-primary btn-flat"> Publish</button>
                                    </div>
                                </div>
                            </div>
                            <!-- /.col -->
                        </div>
                        <!-- /.row -->
                    </div>

                </div>
            </div>
            <div class="row">
                <!-- Area Chart -->
                <div class="col-xl-8 col-lg-7">
                    <div class="card shadow mb-4">
                        <!-- Card Header - Dropdown -->
                        <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                            <h6 class="m-0 font-weight-bold text-primary">Isi Karya Tulis</h6>

                        </div>
                        <!-- Card Body -->
                        <div class="card-body">
                            <div class="chart-area">
                                <textarea class="ckeditor" id="ckeditor" name="isi_karya" required></textarea>
                            </div>

                        </div>
                    </div>
                </div>
                <!-- Pie Chart -->
                <div class="col-xl-4 col-lg-5">
                    <div class="card shadow mb-4">
                        <!-- Card Header - Dropdown -->
                        <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                            <h6 class="m-0 font-weight-bold text-primary">Identitas Karya Tulis</h6>
                        </div>
                        <div class="card-body">
                            <div class="form-group">
                                <label><b> Penulis :</b></label>
                                <input class="form-control" type="text" name="nama_penulis" id="nama_penulis" placeholder="Nama Penulis...">
                            </div>
                            <div class="form-group">

                                <label><b>Jenis Karya</b></label>
                                <select class="custom-select" name="jenis_karya" id="jenis_karya">
                                    <option value="">Pilih Jenis Karya Tulis</option>
                                    <option value="Puisi">Puisi</option>
                                    <option value="Pantun">Pantun</option>
                                    <option value="Artikel Ilmiah">Artikel Ilmiah</option>
                                    <option value="Eksposisi">Eksposisi</option>
                                    <option value="Berita">Berita</option>
                                    <option value="Lainnya">Lainnya</option>
                            </div>
                            </select>
                        </div>

                    </div>
                </div>
            </div>



    </div>
    <!-- DataTales Example -->
    </form>

</div>