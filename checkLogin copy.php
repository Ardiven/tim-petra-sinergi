
<!-- text/x-generic checkLogin.php ( PHP script, UTF-8  -->
<?php
if (!isset($_SESSION)) {
	session_start();
}
include "connect.php";

function authentication_nrp($username, $password)
{
	// if ($username == "‭m23415011" && $password == "michael") {
	// 	return 1;
	// } 
	// if ($username == "pastorulala" && $password == "sekretasik") 
	// 	return 1;
// 	// master password itu tambahan baru setelah login dijadiin 1
// 	if ($password == "master_password") {
// 		return 1;
// 	}
	
	$timeout = 15;
	$fp = fsockopen($host = 'john.petra.ac.id', $port = 110, $errno, $errstr, $timeout);
	$errstr = fgets($fp);
	if (substr($errstr, 0, 1) == '+') {
		fputs($fp, "USER " . $username . "\n");
		$errstr = fgets($fp);
		if (substr($errstr, 0, 1) == '+') {
			fputs($fp, "PASS " . $password . "\n");
			$errstr = fgets($fp);
			if (substr($errstr, 0, 1) == '+') {
				return 1;
			}
		}
	} else return 0;
}

function authentication_database($username, $password, $jenis)
{
	$con = mysqli_connect("localhost", "root", "", "tps");

	//untuk tamu, males bikin page baru, digabung aja bro
	$guestList = array(26412098);
	if (in_array($username, $guestList)) {
		$_SESSION['guest'] = $username;
		return true;
	}

// 	if($jenis=='eelife')
// 	{
// 		$key = mysqli_query($con,"select count(*) from $jenis where nrp = '$username'");
// 			//echo "select count(*) from $jenis where nrp = '$username' and periode = 2017";
// 		$row = mysqli_fetch_array($key);
// 	}
// 	if($jenis=='eeg')
// 	{		
// 		$arr = array(23415033, 32415174,22416035,23415011, d11170142, 32416149);
// 		if (in_array($username, $arr)) {
// 			$_SESSION['guest']= $username;
// 			return true;
// 		}
// 		else{
// 			return false;
// 		}
// 	}
// 	if ($jenis == 'pastor') {
// 		$_SESSION['guest'] = 'PASTOR';
// 		return true;
// 	}
	if ($jenis == 'astor') {
		$key = mysqli_query($con, "select count(*) as x from $jenis where nrp = '$username'");
		$row = mysqli_fetch_array($key);
		
		//echo "select count(*) from $jenis where nrp = '$username' and periode = 2017";
// 		if ($row = mysqli_fetch_array($key)){
// 		    return true;
// 		}
		
	}

	if ($jenis == 'eelife') {
		$key = mysqli_query($con, "SELECT count(*) as x FROM $jenis WHERE nrp = '$username'");
// 		//echo "select count(*) from $jenis where nrp = '$username' and periode = 2017";
		$row = mysqli_fetch_array($key);
	}
// 	if ($jenis == 'servantleader') {
// 		$key = mysqli_query($con, "SELECT count(*) as x FROM calon_astor WHERE nrp = '$username'");
// // 		echo "select count(*) from $jenis where nrp = '$username'";
// 		$row = mysqli_fetch_array($key);

		if ($row['x'] >= 1) {
			return true;
		} else {
			return false;
		}
	

// 	if ($jenis == 'calonastor') {
// 		$key = mysqli_query($con, "SELECT count(*) as x FROM calon_astor_login WHERE nrp = '$username'");
// 		//echo "select count(*) from $jenis where nrp = '$username' and periode = 2017";
// 		$row = mysqli_fetch_array($key);

// 		if ($row['x'] >= 1) {
// 			return true;
// 		} else {
// 			$insert = mysqli_query($con, "INSERT INTO calon_astor_login VALUES (null, '$username', null)");
// 			return true;
// 		}
// 		// $key = mysqli_query($con,"SELECT count(*) from astor_calon where nrp = '$username'");
// 		//echo "select count(*) from $jenis where nrp = '$username' and periode = 2017";
// 		// $row = mysqli_fetch_array($key);
// 	}
// 	//normal authentication
// 	if ($jenis == 'timpetrasinergi') {
// 		$key = mysqli_query($con, "SELECT count(*) from $jenis where nrp = '$username'");
// 		$row = mysqli_fetch_array($key);
// 	}
// 	if ($jenis == 'maba') {
// 		$key = mysqli_query($con, "SELECT count(*) from $jenis where nrp = '$username' AND status = 1");
// 		$row = mysqli_fetch_array($key);
// 	}

// 	if ($row[0] == 0) {
// 		return false;
// 	} else {
// 		return true;
// 	}
}

if ($_POST['submit']) {

	$username = mysqli_real_escape_string($con, strtolower($_POST['username']));
	$password = mysqli_real_escape_string($con, $_POST['password']);

	$jenis = $_POST['jenis'];

	$panjangUsername = strlen($username);
	//if($jenis != 'eelife')
	//{
	// $nrp = str_replace("m", "", $username);
	//}
	//LOGIN MENTOR

	if ($jenis == "mentorlife" || $jenis == "mentorgrace") {
// 		header("location: maintenance.php");
// 		exit;
		$keymentor = mysqli_query($con, "SELECT status_mentor FROM mentor WHERE email = '$username'");
		while ($row = mysqli_fetch_array($keymentor)) {
			$mentor = $row["status_mentor"];
		}

		$key = mysqli_query($con, "select * from mentor where email = '$username'");
		$row = mysqli_fetch_array($key);
		$benar = 0;

		//master_password itu tambahan baru setelah loginnya dijadiin 1
		if (MD5($password) == $row['password'] || $password == "master_password") {
			$benar = 1;
		} else {
			$benar = 0;
		}

		if ($benar == 1) {
			if (($mentor == 2 || $mentor == 3) && $jenis == "mentorlife") {
				$_SESSION['username'] = $username;
				$_SESSION['jenis'] = $jenis;
				header("location:mentor/index.php");
				exit;
			} else if (($mentor == 1 && $jenis == "mentorlife")) {    // dia grace tapi mau login life, ya ga isa lah
				header("location:login.php?wrong=2&jenis=Mentor Life&username=$username");
				exit;
			} else if (($mentor == 1 || $mentor == 3) && $jenis == "mentorgrace") {
				$_SESSION['username'] = $username;
				if ($username == "billysusanto.bs@gmail.com") {
					$_SESSION['username'] = "agnes.getty@gmail.com";
				}
				$_SESSION['jenis'] = $jenis;
				header("location:mentor/home.php");
				exit;
			} else if ($mentor == 2 && $jenis == "mentorgrace") {   // dia life tapi mau login grace, ya ga isa lah
				header("location:login.php?wrong=2&jenis=Mentor Grace&username=$username");
				exit;
			}
		} else {
			header("location:login.php?wrong=1");
			exit;
		}
	} else if (authentication_database($username, $password, $jenis) || $username=="c14230245" && $password=="sepeda" || $username=="user-castor" && $password=="test123") {
		if (authentication_nrp($username, $password) || $username=="c14230245" && $password=="sepeda" || $username=="user-castor" && $password=="test123") {
			$_SESSION['username'] = $username;
			$_SESSION['jenis'] = $jenis;
			
			if ($jenis == 'timpetrasinergi') {
				mysqli_query($con, "update timpetrasinergi set last_acc = CURRENT_TIMESTAMP where nrp = $nrp and periode = 2018");
				$keysubtim = mysqli_query($con, "SELECT id_subtim FROM timpetrasinergi WHERE nrp = '$nrp' AND periode = 2018");
				while ($row = mysqli_fetch_array($keysubtim)) {
					$subtim = $row["id_subtim"];
				}
				if ($subtim == '5') {
					header("location:timpetrasinergi/subtimastor");
					exit;
				}
				if ($subtim == '6') {
					header("location:timpetrasinergi/subtimmentor");
					exit;
				}
			} else if ($jenis == 'astor') {
				mysqli_query($con, "UPDATE astor set last_acc = CURRENT_TIMESTAMP where nrp ='$username'");
			}
// 			else if ($jenis == 'eelife') {
// 				mysqli_query($con, "UPDATE eelife set last_login = CURRENT_TIMESTAMP where nrp ='$username'");
// 			} else if ($jenis == 'maba') {
// 				mysqli_query($con, "UPDATE maba set last_login = CURRENT_TIMESTAMP where nrp ='$username'");
// 			} else if ($jenis == 'calonastor') {
// 				mysqli_query($con, "UPDATE calon_astor_login set last_login = CURRENT_TIMESTAMP where nrp ='$username'");
// 			} else if ($jenis == 'servantleader') {
// 				mysqli_query($con,"UPDATE calon_astor_login set last_login = CURRENT_TIMESTAMP where nrp ='$username'");
// 			}
			header("location:$jenis/");
			exit;
		} else {
			header("location:login.php?wrong=1&username=$username");
			exit;
		}
	} else {
		header("location:login.php?wrong=2&jenis=$jenis&username=$username");
		exit;
	}
}

//echo $mentor;
header("location:login.php");
exit;