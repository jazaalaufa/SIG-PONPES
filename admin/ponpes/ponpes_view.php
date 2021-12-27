<div class="row">
  <div class="col-md-12">
    <div class="box">
      <div class="box-header with-border">
        <h3 class="box-title">Data Pondok Pesantren</h3>

        <div class="box-tools pull-right">
          <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
          </button>
          <button type="button" class="btn btn-box-tool" data-widget="remove"><i class="fa fa-times"></i></button>
        </div>
      </div>
      <!-- /.box-header -->
      <div class="box-body">
        <div class="row">
          <div class="col-md-12">
            <div class="box">
              <div class="box-body">

                <a href="?page=add" class="btn btn-success"><i class="fa fa-plus"></i> Tambah Data</a>
                <br><br>
                <table id="example1" class="table table-bordered table-striped">
                  <thead>
                    <tr>
                      <th>No</th>
                      <th>NSPP</th>
                      <th>Jenis</th>
                      <th>Nama</th>
                      <th>Foto</th>
                      <th>Telpon/Hp</th>
                      <th width="150px">Alamat</th>
                      <th>Kecamatan</th>
                      <th>Latitude</th>
                      <th>Longtitude</th>
                      <th width="100px">Aksi</th>
                    </tr>
                  </thead>
                  <tbody>
                    <?php

                    //Query
                    $sql = $conn->query("SELECT * from ponpes order by nspp desc");
                    $nomor = 1;

                    while ($data = $sql->fetch_assoc()) {
                    ?>
                      <tr>
                        <td><?= $nomor++; ?></td>
                        <td><?= $data['nspp']; ?></td>
                        <td><?= $data['jenis']; ?></td>
                        <td><?= $data['nama']; ?></td>
                        <td><img src="../assets/images/gambar/<?= $data['gambar'] ?>" width="50px" height="50px"></td>
                        <td><?= $data['telp']; ?></td>
                        <td><?= $data['alamat']; ?></td>
                        <td><?= $data['kec']; ?></td>
                        <td><?= $data['lat']; ?></td>
                        <td><?= $data['lng']; ?></td>
                        <td>
                          <a href="?page=delete&nspp=<?php echo $data['nspp'] ?>" class="btn-danger btn btn-sm"><i class="fa fa-trash"></i></a>
                          <a href="?page=edit&nspp=<?php echo $data['nspp'] ?>" class="btn btn-warning btn-sm"><i class="fa fa-edit"></i></a>
                        </td>
                      </tr>
                    <?php
                    }
                    ?>
                  </tbody>
                </table>
              </div>
              <!-- /.box-body -->
            </div>
            <!-- /.box -->
          </div>
        </div>
        <!-- /.row -->
      </div>
      <!-- ./box-body -->

    </div>
    <!-- /.box -->
  </div>
  <!-- /.col -->
</div>
<!-- /.row -->