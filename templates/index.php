<!DOCTYPE html>
<html lang="<?= $config['website']['lang-doc'] ?>">

<head>
    <?php include LAYOUT_PATH . "head.php"; ?>
    <?php include LAYOUT_PATH . "css.php"; ?>
</head>

<body>
    <div id="wrapper">
        <?php
        include LAYOUT_PATH . "seo.php";
        include LAYOUT_PATH . "menu.php";
        require LAYOUT_PATH . "slide.php";
        // if($source!='index') include TEMPLATE.LAYOUT."breadcrumb.php";
        ?>
        <?php if ($source == 'index') { ?>
            <div class="all_wrap-home">
                <div class="wrap-home w-clear"><?php include TEMPLATE_PATH . $template . "_tpl.php"; ?></div>
                <?php
                include LAYOUT_PATH . "footer.php";
                ?>
            </div>

        <?php } else { ?>
            <div class="<?= ($source == 'user') ? 'all_wrap-user' : 'all_wrap-main' ?>">
                <div class="<?= ($source == 'index') ? 'wrap-home' : 'wrap-main' ?> w-clear"><?php include TEMPLATE_PATH . $template . "_tpl.php"; ?></div>
                <?php
                include LAYOUT_PATH . "footer.php";
                ?>
            </div>
        <?php } ?>
        <?php
        //include TEMPLATE.LAYOUT."mmenu.php";
        include LAYOUT_PATH . "phone3.php";
        include LAYOUT_PATH . "modal.php";
        include LAYOUT_PATH . "js.php";
        // if($deviceType=='mobile') include TEMPLATE.LAYOUT."phone.php";
        ?>
    </div>
</body>

</html>