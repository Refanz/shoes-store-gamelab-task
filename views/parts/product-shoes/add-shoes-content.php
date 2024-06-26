<div class="container">
    <div class="page-inner">
        <div class="page-header">
            <h4 class="page-title">Shoes</h4>
            <ul class="breadcrumbs">
                <li class="nav-home">
                    <a href="#">
                        <i class="icon-home"></i>
                    </a>
                </li>
                <li class="separator">
                    <i class="icon-arrow-right"></i>
                </li>
                <li class="nav-item">
                    <a href="#">Pages</a>
                </li>
                <li class="separator">
                    <i class="icon-arrow-right"></i>
                </li>
                <li class="nav-item">
                    <a href="#">Add Shoes</a>
                </li>
            </ul>
        </div>
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <form method="POST" action="" enctype="multipart/form-data">
                        <div class="card-header">
                            <div class="card-title">
                                Add Shoes
                            </div>
                        </div>
                        <div class="card-body">
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="nama-sepatu">Nama / Merk Sepatu</label>
                                        <input type="text" class="form-control" id="nama-sepatu"
                                               placeholder="Masukkan nama" name="nama-sepatu" required>
                                    </div>
                                </div>

                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="harga">Harga</label>
                                        <input type="number" class="form-control" id="harga"
                                               placeholder="Masukkan harga" name="harga-sepatu" required>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="form-img-shoes">Foto Sepatu</label><br>
                                        <input type="file" class="form-control-file" name="foto-sepatu" id="form-img-shoes" required>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="card-action">
                            <button class="btn btn-primary" type="submit" name="submit">Tambah</button>
                            <button class="btn btn-danger" type="reset">Reset</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>