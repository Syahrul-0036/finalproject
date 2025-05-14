<?php
    session_start(); 
    session_destroy(); 
    echo "<script>
            alert('Logout Berhasil, byee byeeee!!!1!!');
            window.location.href = '../pages/login.php';
            </script>";
?>