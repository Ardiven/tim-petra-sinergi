<?php
require "../../connect.php";
//tambahan
header('Content-Type: application/json');

$_SESSION['materi'] = $_POST['sesi'];

$output = "";
$qry = mysqli_query($con, "SELECT * FROM absen_eeg WHERE id_kelompok = " . $_POST['kelompok'] . " AND materi = " . $_POST['sesi']);
if (mysqli_num_rows($qry) == 0) {

	$i = 1;
	$query = mysqli_query($con, "SELECT * FROM maba WHERE id_kelompok = " . $_POST['kelompok'] . " ORDER BY nrp");
	while ($row = mysqli_fetch_assoc($query)) {
		$output .= '<tr class="">
		<td id="nama" class ="  sm:text-base text-xs border-r border-l border-orange-300 px-4 py-4 max-w-[100px] sm:max-w-[200px] truncate overflow-hidden whitespace-nowrap" title="' . $row["nama"] . '">' . $row["nama"] . '</td>
		<td id="nrp" class ="  sm:text-base text-xs text-center border-r border-l border-orange-300 px-4 py-4 max-w-[100px] sm:max-w-full lg:min-w-[100px] lg:max-w-[100px] truncate overflow-hidden whitespace-nowrap ">' . $row["nrp"] . '</td>
		<td class ="  sm:text-base text-xs border-r border-l border-orange-300 px-2 py-4 max-w-[130px] ">
		<div class="flex justify-center items-center">
			<div class="flex justify-center items-center bg-[#FCDD79] rounded">
				<select name="' . $row["nrp"] . '" class="form-control w-[85px]">
				<option value="Hadir">Hadir</option>
				<option value="Susulan">Susulan</option>
				<option value="Tidak Hadir">Tidak Hadir</option>
				<option value="Keluar">Keluar</option>
				</select>
			</div>
		</div>
		
		</td>
		<td class="max-w-[100px]">
			<div class="flex items-center justify-between w-full px-4">
				<label class="inline-flex flex-col items-center gap-1 sm:gap-2">
					<input type="radio" id="kh1" name="kh-' . $row["nrp"] . '" value="1" class="form-radio h-4 w-4 sm:h-6 sm:w-6" />
						<span class="text-sm">1</span>
				</label>

				<label class="inline-flex flex-col items-center gap-1 sm:gap-2">
					<input type="radio" id="kh2" name="kh-' . $row["nrp"] . '" value="2" class="form-radio h-4 w-4 sm:h-6 sm:w-6" />
					<span class="text-sm">2</span>
				</label>

				<label class="inline-flex flex-col items-center gap-1 sm:gap-2">
					<input type="radio" id="kh3" name="kh-' . $row["nrp"] . '" value="3" class="form-radio h-4 w-4 sm:h-6 sm:w-6" />
					<span class="text-sm">3</span>
				</label>

				<label class="inline-flex flex-col items-center gap-1 sm:gap-2">
					<input type="radio" id="kh4" name="kh-' . $row["nrp"] . '" value="4" class="form-radio h-4 w-4 sm:h-6 sm:w-6" />
					<span class="text-sm">4</span>
				</label>

			</div>
		</td>
		
		</tr>';
	}
	$show = json_encode(array('a' => $output, 'b' => 'insert'));
	echo $show;
} else {
	$i = 1;
	$query = mysqli_query($con, "SELECT * FROM maba WHERE id_kelompok = " . $_POST['kelompok'] . " ORDER BY nrp");
	while ($row = mysqli_fetch_assoc($query)) {
		$absen = mysqli_fetch_assoc(mysqli_query($con, "SELECT * FROM absen_eeg WHERE nrp_maba = '" . $row['nrp'] . "' AND materi = " . $_POST['sesi']));
		$output .= '<tr>
		<td id="nama" class ="md:text-xl sm:text-md text-xs border-r border-l border-orange-300 px-4 py-4 max-w-[100px] sm:max-w-[200px] truncate overflow-hidden whitespace-nowrap" title="' . $row["nama"] . '">' . $row["nama"] . '</td>
		<td id="nrp" class ="md:text-xl sm:text-md text-xs text-center border-r border-l border-orange-300 px-4 py-4 max-w-[100px] sm:max-w-full lg:min-w-[100px] lg:max-w-[100px] truncate overflow-hidden whitespace-nowrap ">' . $row["nrp"] . '</td>
		<td class ="md:text-xl sm:text-md text-xs border-r border-l border-orange-300 px-1 sm:px-2 py-4 max-w-[130px] text-center">' . $absen["status"] . '</td>
		<td class="md:text-xl sm:text-md text-xs px-1 text-center sm:px-2 py-4 max-w-[130px]">4</td>
		</tr>';
	}

	$output .= '<tr>
			</tr>';
	$show = json_encode(array('a' => $output, 'b' => 'show'));
	echo $show;
}
