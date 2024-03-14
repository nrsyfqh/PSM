<?php

session_start();
if(session_destroy())
{
    echo "<script>alert('Successful log out!!');";
    echo "window.location.href = '../applicationlayer/login.php'</script>";
}
?>
