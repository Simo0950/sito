<?php
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

$con = new mysqli("localhost","root","","sitocuborubik");
if($con->connect_error)
{
    die("Errore di connessione ".con->connect_error);
}else{
    $stmt = $con->prepare("select * from registrazioni where username = ?");
    $stmt->bind_param("s", $username);
    $stmt->execute();
    $stmt_result = $stmt->get_result();
    if($stmt_result->num_rows >0)
    {
        $data = $stmt_result->fetch_assoc();
        echo "<center>";
        if($data['password'] === $password)
        {
          
            echo "<h2 class=testo> Login effetuato </h2>";
            echo "<a href=home.html> <i class=fas fa-home></i> </a>";
        }else
        {
          echo "<h2 class=testo> Username o Password invalida </h2>";
          echo "<a href=fileHtml/login.html> Torna al login </a>";
        }
    }else
    {
        echo "<h2 class=testo> Username o Password invalida </h2>";
        echo "<a href=fileHtml/login.html> Torna al login </a>";
    }
    echo "</center>"
}
?>
