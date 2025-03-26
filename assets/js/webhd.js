jQuery(function($) {

    jQuery('.catagory-title').on("click", function() {
        if ($('.catagory-list__fix').css('display') == 'none') {
            $('.catagory-list__fix').animate({
                height: 'show'
            }, 400);
        } else {
            $('.catagory-list__fix').animate({
                height: 'hide'
            }, 200);
        }
    });
    jQuery('.catagory-list__fix li span').on("click", function() {
        let id = $(this).attr('data-id');
        if ($('#cat2__fix_' + id).css('display') == 'none') {
            $('#cat2__fix_' + id).animate({
                height: 'show'
            }, 400);
        } else {
            $('#cat2__fix_' + id).animate({
                height: 'hide'
            }, 200);
        }
    });
    jQuery('.catagory-list li span').on("click", function() {
        let id = $(this).attr('data-id');
        if ($('#cat2_' + id).css('display') == 'none') {
            $('#cat2_' + id).animate({
                height: 'show'
            }, 400);
        } else {
            $('#cat2_' + id).animate({
                height: 'hide'
            }, 200);
        }
    });

    $('.tailvideo_item_owl').click(function() {
        let id = $(this).attr('data-src');
        let img = $(this).attr('data-image');
        let name = $(this).attr('data-name');
        $('.pic-video').attr('data-src', id);
        $('.pic-video img').attr('src', img);
        $('.name-video').html(name);
    });

    $(document).on('click', '.menu_mobi .menulicha', function(event) {
        $('.close_menu').trigger('click');
        return false;
    });

    var menu_mobi = $('.menu_cap_cha').html();
    $('.menu_mobi_add').append('<span class="close_menu"><i class="fas fa-times"></i></span><ul>' + menu_mobi + '</ul>');

    $('.menu_mobi_add ul li ul').removeClass('menu_cap_con');
    $('.menu_mobi_add ul li ul').css({
        'display': 'none'
    });
    $('.menu_mobi_add ul li ul li ul').removeClass('menu_cap_2');
    $('.menu_mobi_add ul li ul li ul').css({
        'display': 'none'
    });
    $('.menu_mobi_add ul li ul li ul li ul').removeClass('menu_cap_3');
    $('.menu_mobi_add ul li ul li ul li ul').css({
        'display': 'none'
    });

    $(".menu_mobi_add ul li").each(function(index, element) {
        if ($(this).children('ul').children('li').length > 0) {
            $(this).children('a').append('<i class="fas fa-chevron-right"></i>');
        }
    });
    $(".menu_mobi_add ul li a i").click(function() {
        if ($(this).parent('a').hasClass('active2')) {
            $(this).parent('a').removeClass('active2');
            if ($(this).parent('a').parent('li').children('ul').children('li').length > 0) {
                $(this).parent('a').parent('li').children('ul').css({
                    display: 'none',
                });
                //$(this).parent('a').parent('li').children('ul').hide(300);
                return false;
            }
        } else {
            $(this).parent('a').addClass('active2');
            if ($(this).parents('li').children('ul').children('li').length > 0) {
                //$(".menu_m ul li ul").hide(0);
                //$(this).parents('li').children('ul').show(300);
                $(".menu_m ul li ul").css({
                    display: 'none',
                });
                $(this).parents('li').children('ul').css({
                    display: 'block',
                });
                return false;
            }
        }
    });

    $('.icon_menu_mobi,.close_menu,.menu_baophu').click(function() {
        if ($('.menu_mobi_add').hasClass('menu_mobi_active')) {
            $('.menu_mobi_add').removeClass('menu_mobi_active');
            $('.menu_baophu').fadeOut(300);
        } else {
            $('.menu_mobi_add').addClass('menu_mobi_active');
            $('.menu_baophu').fadeIn(300);
        }
        return false;
    });

    $(function() {
        $('[data-toggle="tooltip"]').tooltip()
    })

    $(document).ready(function() {
        $('.next_step_thongtin').click(function() {
            var currentUrl = window.location.href;
            var step = $(this).data('step');
            var newUrl = 'gio-hang?step=' + step;

            // Cập nhật URL và thay đổi lịch sử
            window.history.replaceState({}, "", newUrl);
            window.location.href = newUrl;
        });
    })

    $(document).ready(function() {

        let firstActiveItem = $('.auto_quatrinhhinhthanh .owl-item.active').first();
        if (firstActiveItem.length) {
            firstActiveItem.addClass('new-class');
        }

        let owl = $('.auto_quatrinhhinhthanh');
        owl.on('initialized.owl.carousel translated.owl.carousel', function() {
            $('.auto_quatrinhhinhthanh .owl-item').removeClass('new-class');
            let firstActiveItem = $('.auto_quatrinhhinhthanh .owl-item.active').first();
            if (firstActiveItem.length) {
                firstActiveItem.addClass('new-class');
            }
        });
    });

    $(document).ready(function() {
        $(".name_cauhoithuonggap").click(function() {
            if ($(this).parent(".cauhoithuonggap").hasClass("active")) {
                $(this).parent(".cauhoithuonggap").removeClass("active");
                $(this).parent(".cauhoithuonggap").children(".name_cauhoithuonggap").children(".icon_chinhsach_des").html('<i class="fas fa-plus"></i>');
                $(this).parent(".cauhoithuonggap").children(".noidung_cauhoithuonggap").fadeOut(200);
            } else {
                $(this).parent(".cauhoithuonggap").addClass("active");
                $(this).parent(".cauhoithuonggap").children(".name_cauhoithuonggap").children(".icon_chinhsach_des").html('<i class="fas fa-minus"></i>');
                $(this).parent(".cauhoithuonggap").children(".noidung_cauhoithuonggap").fadeIn(200);
            }
            return false;
        });

        $(".title_drop_khoahoc_user").click(function() {
            if ($(this).parent(".all_drop_khoahoc_user").hasClass("active")) {
                $(this).parent(".all_drop_khoahoc_user").removeClass("active");
                $(this).parent(".all_drop_khoahoc_user").children(".title_drop_khoahoc_user").children(".icon_khoahoc_user").html('<i class="fas fa-angle-down"></i>');
                $(this).parent(".all_drop_khoahoc_user").children(".noidung_drop_khoahoc_user").fadeOut(200);
            } else {
                $(this).parent(".all_drop_khoahoc_user").addClass("active");
                $(this).parent(".all_drop_khoahoc_user").children(".title_drop_khoahoc_user").children(".icon_khoahoc_user").html('<i class="fas fa-angle-up"></i>');
                $(this).parent(".all_drop_khoahoc_user").children(".noidung_drop_khoahoc_user").fadeIn(200);
            }
            return false;
        });

        $(".title_chuong_khoahoc_user").click(function() {
            if ($(this).parent(".chuong_khoa_hoc_user").hasClass("active")) {
                $(this).parent(".chuong_khoa_hoc_user").removeClass("active");
                $(this).parent(".chuong_khoa_hoc_user").children(".title_chuong_khoahoc_user").children(".icon_khoahoc_user").html('<i class="fas fa-angle-down"></i>');
                $(this).parent(".chuong_khoa_hoc_user").children(".all_bai_khoahoc_user").fadeOut(200);
            } else {
                $(this).parent(".chuong_khoa_hoc_user").addClass("active");
                $(this).parent(".chuong_khoa_hoc_user").children(".title_chuong_khoahoc_user").children(".icon_khoahoc_user").html('<i class="fas fa-angle-up"></i>');
                $(this).parent(".chuong_khoa_hoc_user").children(".all_bai_khoahoc_user").fadeIn(200);
            }
            return false;
        });

    });

    $(document).ready(function() {
        $(".name_decuongkhoahoc").click(function() {
            if ($(this).parent(".decuongkhoahoc").hasClass("active")) {
                $(this).parent(".decuongkhoahoc").removeClass("active");
                $(this).parent(".decuongkhoahoc").children(".name_decuongkhoahoc").children(".icon_decuongkhoahoc_des").html('<i class="fas fa-plus"></i>');
                $(this).parent(".decuongkhoahoc").children(".noidung_decuongkhoahoc").fadeOut(200);
            } else {
                $(this).parent(".decuongkhoahoc").addClass("active");
                $(this).parent(".decuongkhoahoc").children(".name_decuongkhoahoc").children(".icon_decuongkhoahoc_des").html('<i class="fas fa-minus"></i>');
                $(this).parent(".decuongkhoahoc").children(".noidung_decuongkhoahoc").fadeIn(200);
            }
            return false;
        });
    });

    $(document).ready(function() {
        $(".tongtin_tk_index").click(function() {
            if ($(this).parent(".all_thontin_tk_index").hasClass("active")) {
                $(this).parent(".all_thontin_tk_index").removeClass("active");
            } else {
                $(this).parent(".all_thontin_tk_index").addClass("active");
            }
            return false;
        });
    });

    $(".title_chuong_khoahoc").click(function() {
        if ($(this).parent(".chuong_khoa_hoc").hasClass("active")) {
            $(this).parent(".chuong_khoa_hoc").removeClass("active");
            $(this).parent(".chuong_khoa_hoc").children(".title_chuong_khoahoc").children(".icon_khoahoc_detail").html('<i class="fas fa-angle-down"></i>');
            $(this).parent(".chuong_khoa_hoc").children(".all_bai_khoahoc").fadeOut(200);
        } else {
            $(this).parent(".chuong_khoa_hoc").addClass("active");
            $(this).parent(".chuong_khoa_hoc").children(".title_chuong_khoahoc").children(".icon_khoahoc_detail").html('<i class="fas fa-angle-up"></i>');
            $(this).parent(".chuong_khoa_hoc").children(".all_bai_khoahoc").fadeIn(200);
        }
        return false;
    });

    $(".all_noidung_title_khoahoc_baihoc").click(function() {
        if ($(this).hasClass("active")) {
            $(this).removeClass("active");
            $(this).children(".noidung_khoahoc_baihoc").fadeOut(200);
        } else {
            $(this).addClass("active");
            $(this).children(".noidung_khoahoc_baihoc").fadeIn(200);
        }
        // return false;
    });

});
