<div class="container">
	<div class="box">
		<div class="box-body">
			<div class="row">
				<div class="col-md-12">
					<div class="box">
						<div class="box-body">

							<br><br>
							<table id="example1" class="table table-bordered table-striped">
								<thead>
									<tr>
										<th>No</th>
										<th>NSPP</th>
										<th>Nama</th>
										<th width="100px">Jenis Potren</th>
										<th width="120px">Alamat</th>
										<th>Telpon</th>
										<th>Latitude</th>
										<th>Longtitude</th>
										<th width="100px">Foto</th>
									</tr>
								</thead>
								<tbody>
									<?php

									//Query
									$sql = $conn->query("SELECT * from ponpes WHERE jenis='salafyah' order by nspp desc");
									$nomor = 1;

									while ($data = $sql->fetch_assoc()) {
									?>
										<tr>
											<td><?= $nomor++; ?></td>
											<td><?= $data['nspp']; ?></td>
											<td><?= $data['nama']; ?></td>
											<td><?= $data['jenis']; ?></td>
											<td><?= $data['alamat']; ?></td>
											<td><?= $data['telp']; ?></td>
											<td><?= $data['lat']; ?></td>
											<td><?= $data['lng']; ?></td>
											<td><img src="../SIGPONPES/assets/images/gambar/<?= $data['gambar'] ?>" width="80px"></td>

											<!-- <td>
												<a href="?page=delete&nspp=<?php echo $data['nspp'] ?>" class="btn-danger btn btn-sm"><i class="fa fa-trash"></i> hapus</a>
												<a href="?page=edit&nspp=<?php echo $data['nspp'] ?>" class="btn btn-warning btn-sm"><i class="fa fa-edit"></i> Edit</a>
											</td> -->
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
	</div>
</div>
<!-- /.row -->