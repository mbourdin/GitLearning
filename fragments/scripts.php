
<script src="<?=$GLOBALS["serverRoot"]?>/js/jquery-3.4.1.min.js" type="text/javascript"></script>
<script src="<?=$GLOBALS["serverRoot"]?>/js/popper.min.js"  type="text/javascript"></script>
<script src="<?=$GLOBALS["serverRoot"]?>/js/bootstrap.min.js"></script>
<script type="text/javascript">
    const serverRoot="<?=$GLOBALS['serverRoot']?>";
</script>
<?php
    if(isset($scripts))
    {
        foreach ($scripts as $script)
        {
            echo '<script src="'.$GLOBALS["serverRoot"].'/js/'.$script.'"></script>';
        }
    }
?>