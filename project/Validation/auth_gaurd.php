<?php 
session_start();
if(!isset($_SESSION['ls'])){
    echo "You skiped login page";
    echo "<br>";
    echo "<a href='../Validation/login.html'><button>Login</button></a>";
    die;
}
if($_SESSION['ls']==false){
    echo "Please login ";
    echo "<br>";
    echo "<a href='../Validation/login.html'><button>Login</button></a>";
    die;
}

?>