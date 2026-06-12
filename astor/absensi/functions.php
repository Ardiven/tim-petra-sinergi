<?php

function getFile($data, $ket)
{
	/*!!! IMPORTANT !!!
			$data = $_FILES['data']
			jangan lupa folder buat simpan harus rwxrwxrwx
		*/

	$dataName = $data['name'];
	$dataSize = $data['size'];
	$dataError = $data['error'];
	$dataTmpName = $data['tmp_name'];
	$dataContent = file_get_contents($dataTmpName);

	//cek apakah ada gambar yang diupload
	// if ($dataError === 4) {
	// 	echo "alert('Pilih file terlebih dahulu.');";
	// 	exit();
	// }

	// cek jika bukan gambar
	$ekstensiGambarValid = ['jpg', 'jpeg', 'png', 'PNG', 'JPG', 'JPEG', 'pdf', 'PDF', 'zip', 'ZIP', 'rar', 'RAR'];
	$ekstensiData = strtolower(pathinfo($dataName, PATHINFO_EXTENSION));

	if (!in_array($ekstensiData, $ekstensiGambarValid)) {
		echo "File harus memiliki ekstensi .jpg atau .png";
		exit();
	}

	// cek ukuran terlalu besar
	if ($dataSize > 2000000) {
		echo "Ukuran file harus dibawah 2MB.";
		exit();
	}

	//lolos pengecekan, mulai proses penguploadan
	$dataFinal = $ket . '.' . $ekstensiData;

	$currentDir = getcwd();

	move_uploaded_file($dataTmpName, getcwd() . '/bukti_absen/' . $dataFinal);

	/*!!! IMPORTANT
			jangan lupa ditambahi kode buat masukin ke database
		*/

	$file = array(
		'ekstensi' => $ekstensiData,
		'name' => $dataFinal,
		'content' => $dataContent
	);

	return $file;
}

function reArrayFiles(&$file_post)
{
	$isMulti    = is_array($file_post['name']);
	$file_count    = $isMulti ? count($file_post['name']) : 1;
	$file_keys    = array_keys($file_post);

	$file_ary    = [];    //Итоговый массив
	for ($i = 0; $i < $file_count; $i++)
		foreach ($file_keys as $key)
			if ($isMulti)
				$file_ary[$i][$key] = $file_post[$key][$i];
			else
				$file_ary[$i][$key]    = $file_post[$key];

	return $file_ary;
}
