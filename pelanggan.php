<?php 
include_once('koneksi.php');

if (isset($_REQUEST) && isset($_REQUEST['method'])) {
	
	// ADD PELANGGAN
	if ($_REQUEST['method'] == "post") {
		$nama_pelanggan = $_GET['nama_pelanggan'];
		$no_hp = $_GET['no_hp'];
		$alamat = $_GET['alamat'];

		$query = "INSERT INTO tb_pelanggan (nama_pelanggan, no_hp, alamat) VALUES ('".$nama_pelanggan."', '".$no_hp."', '".$alamat."')";
		$result = $koneksi->query($query);

		if ($result === TRUE) {
			$data = [
				'status' => "berhasil",
				'message' => "Berhasil Ditambahkan!"
 			];
		}else{
			$data = [
				'status' => "Gagal",
				'message' => "Gagal Ditambahkan!"
 			];
		}
		header('Content-type: application/json');
		echo json_encode($data);
	}

	// UPDATE PELANGGAN
	if ($_REQUEST['method'] == "put") {
		$id_pelanggan = $_GET['id_pelanggan'];
		$nama_pelanggan = $_GET['nama_pelanggan'];
		$no_hp = $_GET['no_hp'];
		$alamat = $_GET['alamat'];

		$query = "UPDATE tb_pelanggan SET nama_pelanggan='".$nama_pelanggan."', no_hp='".$no_hp."', alamat='".$alamat."' WHERE id_pelanggan='".$id_pelanggan."'";
		$result = $koneksi->query($query);

		if ($result === TRUE) {
			$data = [
				'status' => "berhasil",
				'message' => "Berhasil Diedit!"
 			];
		}else{
			$data = [
				'status' => "Gagal",
				'message' => "Gagal Diedit!"
 			];
		}
		header('Content-type: application/json');
		echo json_encode($data);
	}

	// GET PELANGGAN
	if ($_REQUEST['method'] == "get") {
		$query = "SELECT * FROM tb_pelanggan";
		$result = $koneksi->query($query);

		$data = [];
		while ($a = $result->fetch_assoc()){
			$data[] = $a;
		}
		header('Content-type: application/json');
		echo json_encode($data);
	}

	// DELETE PELANGGAN
	if ($_REQUEST['method'] == "delete") {
		$id_pelanggan = $_GET['id_pelanggan'];
		$query = "DELETE FROM tb_pelanggan WHERE id_pelanggan='".$id_pelanggan."'";
		$result = $koneksi->query($query);

		if ($result === TRUE) {
			$data = [
				'status' => "berhasil",
				'message' => "Berhasil DiHapus!"
 			];
		}else{
			$data = [
				'status' => "Gagal",
				'message' => "Gagal DiHapus!"
 			];
		}
		header('Content-type: application/json');
		echo json_encode($data);
	}
}
?>