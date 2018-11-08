<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
date_default_timezone_set('Etc/UTC');

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require './phpmailer/src/Exception.php';
require './phpmailer/src/PHPMailer.php';
require './phpmailer/src/SMTP.php';
/*autoload phpmailer*/
//require '../syamrabu/smis-libs-out/php-mailer/PHPMailerAutoload.php';
//require_once('./phpmailer/PHPMailerAutoload.php');
//require './phpmailer/src/PHPMailerAutoload.php';

$mail = new PHPMailer;
$mail->isSMTP();


/*dipakai debugging,
 * 0 = off (for production use)
 * 1 = client messages
 * 2 = client and server messages
 * */
$mail->SMTPDebug = 2;
$mail->Debugoutput = 'html';
$mail->Host = 'smtp.gmail.com'; 
/**jika kebetulan network SMTP di block lewat IPv6 maka gunakan kode ini
 * $mail->Host = gethostbyname('smtp.gmail.com');
 * */
$mail->Port = 587; //ini adalah port default mbah google
$mail->SMTPSecure = 'tls'; //security pakai ssl atau tls, tapi ssl telah deprecated
$mail->SMTPAuth = true; //menandakan butuh authentifikasi
$mail->Username = "hanungsmbd@gmail.com";//email anda
$mail->Password = "kopongSS217"; //password anda, silakan diganti
$mail->setFrom('admin@berkasgamatechno.ga', 'Admin');
$mail->addReplyTo('admin@berkasgamatechno.ga', 'Admin');
$mail->Subject = 'Notifikasi berkas kadaluarsa';

/*melakukan koneksi ke MySQL*/
$link = mysqli_connect("localhost", "id7757521_root", "12345678", "id7757521_gamatechno"); 

/*perbedaan dari source code kemarin adalah disini dia cari yang penandanya 0 dan dilimit 1 saja */
$result=mysqli_query($link,"SELECT * FROM user WHERE penanda=0 LIMIT 0,1");

/*loop untuk mengirimakn email*/
while($row=mysqli_fetch_array($result)){
	$mail->addAddress($row["email"], $row["nama_user"]);
	$pesan="Hai ".$row['nama_user'].", berkas dengan username ".$row['username'].", ada yang kadaluarsa segera cek di www.berkasgamatechno.ga";
	$mail->msgHTML($pesan, "");
	
	if (!$mail->send()) {
		echo "Ada Yang Error Gan: " . $mail->ErrorInfo;
	} else {
		echo "Berhasil di Send!";
	}
	
	/* setiap email yang sudah dicoba untuk dikirim email, maka 
	 * diupdate penandanya menjadi 1 */
	mysqli_query($link,"UDPATE user set penanda=1 WHERE id_user='".$row['id_user']."' ");
}

//mysqli_close();




