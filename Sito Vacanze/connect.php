<?php
$nome = $_POST['nome'];
$cognome = $_POST['cognome'];
$email = $_POST['email'];
$username = $_POST['username'];
$password = $_POST['password'];

echo "<style>
         body
         {
           background-color: #404040;
         }
        .testo
        {
          font-size: 40px;
          color: rgb(212, 212, 212);
        }
        a
        {
          font-size: 30px;
          color: rgb(212, 212, 212);
          text-decoration: none;
        }
        a:hover
        {
            color: rgb(21, 77, 150);
            font-size: 40px;
            transition: .5s;
        }

     </style>";

// Database connection
$conn = new mysqli('localhost','root','','sitocuborubik');
if($conn->connect_error){
	echo "$conn->connect_error";
	die("Connection Failed : ". $conn->connect_error);
} else {
	$stmt = $conn->prepare("insert into registrazioni(nome, cognome, email, username, password) values(?, ?, ?, ?, ?)");
	$stmt->bind_param("sssss",$nome, $cognome, $email, $username, $password);
	$execval = $stmt->execute();
	echo "<label class=testo> Ti sei registrato con successo </label>";
  echo "<a href=home.html> Torna alla home </a>";

	$stmt->close();
	$conn->close();
}
?>
