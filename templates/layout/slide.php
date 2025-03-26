<!-- </?php if (count($slider)) { ?>
    <div class="wrap_slider slideshow_des">
        <div class="slideshow ">
            <p class="control-slideshow prev-slideshow transition"><i class="fas fa-chevron-left"></i></p>
            <div id="slider" class="owl-carousel owl-theme owl-slideshow">
                <?php foreach ($slider as $v) { ?>
                    <div class="item_slider item_img_ani ">
                        <a href="<?= $v['link'] ?>" target="_blank" title="<?= $v['ten' . $lang] ?>" aria-label="slide" class="link_item_slider">
                            <img onerror="this.src='<?= Helper::noimage() ?>';" src="<?= Helper::thumbnail_link($v['photo']) ?>" alt="<?= $v['ten' . $lang] ?>" title="<?= $v['ten' . $lang] ?>" width="1520" height="580" />
                        </a>
                    </div>
                <?php } ?>
            </div>
            <p class="control-slideshow next-slideshow transition"><i class="fas fa-chevron-right"></i></p>
        </div>
    </div>
</?php } ?> -->