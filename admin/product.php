<h2>Data Product</h2>

<table class="table table-bordered">
	<thead>
		<tr>
			<th>No</th>
			<th>Nama Product</th>
			<th>Harga</th>
			<th>Gambar</th>
			<th>Rating</th>
			<th>Aksi</th>
		</tr>
	</thead>
	<tbody>
		<?php $nomor=1; ?>
		<?php $ambil=$CON->query("SELECT * FROM product"); ?>
		<?php while ($pecah=$ambil->fetch_assoc()){ ?>

		<tr>
			<td><?php echo $nomor; ?></td>
			<td><?php echo $pecah['nama'];?></td>
			<td><?php echo $pecah['harga'];?></td>
			<td><img src="../images/<?php echo $pecah['gambar']?>" width="300px" class="img-thumbnail"></td>
			<td><?php echo $pecah['rating'];?></td>
			<td>
				<a href="index.php?halaman=hapusproduct&id=<?php echo $pecah['id_product']; ?>" class="btn-danger btn">hapus</a>
				<a href="index.php?halaman=ubahproduct&id=<?php echo $pecah['id_product']; ?>" class="btn-warning btn">ubah</a>
			</td>
		</tr> 
		<?php $nomor++; ?>
		<?php } ?>
	</tbody>
</table>
<a href="index.php?halaman=tambahproduct" class="btn btn-primary">Tambah Data</a>

