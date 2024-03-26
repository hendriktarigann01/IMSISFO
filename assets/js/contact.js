// Contact Form (buat ngirim message ke gmail)
function emailSend(){

	var userName = document.getElementById('name').value;
	var email = document.getElementById('email').value;
	var subject = document.getElementById('subject').value;
  var message = document.getElementById('message').value;

  // Mengambil email pengguna dari input email
  var userEmailAddress = email;

	var messageBody = "Nama " + userName +
  "<br/> Email " + email +
	"<br/> Subjek " + subject+
  "<br/> Pesan " + message;

	Email.send({
    Host : "smtp.elasticemail.com",
    Username : "hendriktarigan25@gmail.com",
    Password : "85E481AF4DF4D316829AEE04871556A72F76",
    To : userEmailAddress, // Menggunakan email pengguna sebagai alamat tujuan
    From : "hendriktarigan25@gmail.com",
    Subject : "This is the subject",
    Body : messageBody
}).then(
  message => {
  	if(message === 'OK'){
      swal("Berhasil", "Pesan berhasil terkirim!", "success");
    }
    else{
      swal("Error", "Gagal mengirim pesan!", "error");
    }
  }
);
}