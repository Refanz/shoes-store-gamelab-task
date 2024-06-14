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
                    <div class="card-header">
                        <div class="card-title">
                            List Shoes
                        </div>
                    </div>
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-12">
                                <table class="table table-head-bg-primary">
                                    <thead>
                                    <tr>
                                        <th scope="col">No</th>
                                        <th scope="col">Nama</th>
                                        <th scope="col">Harga</th>
                                        <th scope="col">Foto</th>
                                        <th scope="col">Aksi</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    <?php if ($result->num_rows < 1) {
                                        echo '<tr>
                                                <td class="text-center" colspan="5">
                                                Data sepatu kosong!
                                                </td>
                                              </tr>';
                                    } ?>

                                    <?php foreach ($datas as $row): ?>
                                        <tr>
                                            <td><?= $row[0]; ?></td>
                                            <td><?= $row[1]; ?></td>
                                            <td><?= $row[2]; ?></td>
                                            <td>
                                                <img class="img-fluid" width="100" src="<?= BASE_URL . $row[3] ?>"/>
                                            </td>
                                            <td>
                                                <a class="btn btn-primary"
                                                   href="<?= BASE_URL . '/views/pages/admin/product-shoes/edit-shoes.php?id=' . $row[0] ?>">Edit</a>
                                                <a class="btn btn-danger"
                                                   href="<?= BASE_URL . '/actions/delete-shoes.php?id=' . $row[0] ?>">Hapus</a>
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
        </div>
    </div>
</div>