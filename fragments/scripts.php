<script src="../js/jquery-3.4.1.min.js"></script>
<script src="../js/bootstrap.bundle.min.js"></script>
<script src="https://kit.fontawesome.com/1009de5554.js" crossorigin="anonymous"></script>
<?php
    if(isset($scripts))
    {
        foreach ($scripts as $script)
        {
            echo '<script src="../js/'.$script.'"></script>';
        }
    }
?>