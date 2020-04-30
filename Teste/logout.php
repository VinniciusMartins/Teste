<?php 
session_start();
if(isset($_SESSION['inputUser'])){
    // se você possui algum cookie relacionado com o login deve ser removido
    session_destroy();
    header("location:index.php");
    exit();
}

?>

<script>
    location.reload();
</script>