<head>
    <title><?php if (isset($title)) echo $title ?></title>

    <link rel="stylesheet" href="<?= $GLOBALS["serverRoot"]?>/css/bootstrap.min.css">
<?php
    if(isset($csss))
    {
        foreach ($csss as $css)
        {
            echo '<link rel="stylesheet" href="'.$GLOBALS['serverRoot'].'/css/'.$css.'">';
        }
    }
    ?>
</head>