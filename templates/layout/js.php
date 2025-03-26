<!-- Js Config -->
<script type="text/javascript">
    var NN_FRAMEWORK = NN_FRAMEWORK || {};
    var CONFIG_BASE = '<?= $config_base ?>';
    var WEBSITE_NAME = '<?= (isset($setting['ten' . $lang]) && $setting['ten' . $lang] != '') ? $setting['ten' . $lang] : '' ?>';
    var TIMENOW = '<?= date("d/m/Y", time()) ?>';
    var SHIP_CART = <?= (isset($config['order']['ship']) && $config['order']['ship'] == true) ? 'true' : 'false' ?>;
    var GOTOP = 'assets/images/top.png';
    var LANG = {
        'no_keywords': "<?= chuanhaptukhoatimkiem ?>",
        'delete_product_from_cart': "<?= banmuonxoasanphamnay ?>",
        'no_products_in_cart': "<?= khongtontaisanphamtronggiohang ?>",
        'wards': "<?= phuongxa ?>",
        'back_to_home': "<?= vetrangchu ?>",
    };
</script>

<!-- Js Files -->
<?php
$js->setCache("cached");
$js->setJs(ASSETS_URL . "js/jquery.min.js");
$js->setJs(ASSETS_URL . "bootstrap/bootstrap.js");
$js->setJs(ASSETS_URL . "js/wow.min.js");
// $js->setJs(ASSETS_URL . "js/waypoints.min.js");
// $js->setJs(ASSETS_URL . "js/counterup.min.js");
$js->setJs(ASSETS_URL . "owlcarousel2/owl.carousel.js");
$js->setJs(ASSETS_URL . "magiczoomplus/magiczoomplus.js");
$js->setJs(ASSETS_URL . "simplyscroll/jquery.simplyscroll.js");
$js->setJs(ASSETS_URL . "slick/slick.js");
$js->setJs(ASSETS_URL . "fancybox3/jquery.fancybox.js");
$js->setJs(ASSETS_URL . "toc/toc.js");
$js->setJs(ASSETS_URL . "js/lazyload.min.js");
$js->setJs(ASSETS_URL . "js/functions.js");
$js->setJs(ASSETS_URL . "js/apps.js");
$js->setJs(ASSETS_URL . "js/webhd.js");
echo $js->getJs();
?>
<script>
    var myLazyLoad = new LazyLoad({
        elements_selector: ".lazy"
    });
</script>
<script async defer crossorigin="anonymous" src="https://connect.facebook.net/en_US/sdk.js"></script>
<script src="https://cdn.jsdelivr.net/npm/@easepick/bundle@1.2.1/dist/index.umd.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
<script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/Readmore.js/2.0.2/readmore.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/Readmore.js/2.0.2/readmore.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/ion-rangeslider/2.3.1/js/ion.rangeSlider.min.js"></script>
<script>
    AOS.init();
</script>
<script>
    
</script>

<!-- FB LOGIN -->
<?php if ($source == 'user') { ?>
    <script>
        // FB LOGIN
        function statusChangeCallback(response) {
            // console.log('statusChangeCallback');
            // console.log(response);
            if (response.status === 'connected') {
                testAPI();

            } else if (response.status === 'not_authorized') {
                FB.login(function(response) {
                    statusChangeCallback2(response);
                }, {
                    scope: 'public_profile,email'
                });

            } else {
                // alert("not connected, not logged into facebook, we don't know");
            }
        }

        function statusChangeCallback2(response) {
            // console.log('statusChangeCallback2');
            // console.log(response);
            if (response.status === 'connected') {
                testAPI();

            } else if (response.status === 'not_authorized') {
                console.log('still not authorized!');

            } else {
                // alert("not connected, not logged into facebook, we don't know");
            }
        }

        function checkLoginState() {
            FB.getLoginStatus(function(response) {
                statusChangeCallback(response);
            });
        }

        function testAPI() {
            console.log('Welcome!  Fetching your information.... ');
            FB.api('/me', function(response) {
                console.log('Successful login for: ' + response.name);
                // document.getElementById('status').innerHTML =
                //     'Thanks for logging in, ' + response.name + '!';
                // console.log(response);
                // console.log(response.authResponse.userID);
                // console.log(response.authResponse.accessToken);
                var name = response.name;
                var user_id = response.id;
                console.log("bbb");

                $.ajax({
                    url: "ajax/ajax_loginfb.php",
                    type: "POST",
                    dataType: "html",
                    data: {
                        cmd: 'login',
                        name: name,
                        user_id: user_id,
                    },
                    success: function(result) {
                        if (result != "") {
                            console.log("aaa");

                            // var redirected = sessionStorage.getItem('redirected');
                            // if (!redirected) {
                            //     sessionStorage.setItem('redirected', true);
                            //     window.location.href = 'https://bbracing.vn/account/tongquan';
                            // } else {
                            //     sessionStorage.removeItem('redirected');
                            // }
                        }
                    },
                });
            });
        }

        function FBLogout() {
            event.preventDefault();
            FB.logout(function(response) {
                // $facebook->destroySession();
                $.ajax({
                    url: "ajax/ajax_loginfb.php",
                    type: "POST",
                    dataType: "html",
                    data: {
                        cmd: 'logout',
                    },
                    success: function(result) {
                        if (result != "") {
                            // window.location = CONFIG_BASE;
                            // window.location.reload();
                        }
                    },
                });
            });
        }

        $(document).ready(function() {
            FB.init({
                appId: '1201502001982941',
                xfbml: true,
                version: 'v2.2'
            });
            checkLoginState();
        });
    </script>
<?php } ?>

<?php if (isset($config['googleAPI']['recaptcha']['active']) && $config['googleAPI']['recaptcha']['active'] == true) { ?>
    <!-- Js Google Recaptcha V3 -->
    <?php if ($source == 'contact' || $source == 'dangkydaily') { ?>
        <script src="https://www.google.com/recaptcha/api.js?render=<?= $config['googleAPI']['recaptcha']['sitekey'] ?>"></script>
        <script type="text/javascript">
            grecaptcha.ready(function() {


                grecaptcha.execute('<?= $config['googleAPI']['recaptcha']['sitekey'] ?>', {
                    action: 'contact'
                }).then(function(token) {
                    var recaptchaResponseContact = document.getElementById('recaptchaResponseContact');
                    recaptchaResponseContact.value = token;
                });
                grecaptcha.execute('<?= $config['googleAPI']['recaptcha']['sitekey'] ?>', {
                    action: 'Newsletter'
                }).then(function(token) {
                    var recaptchaResponseNewsletter = document.getElementById('recaptchaResponseNewsletter');
                    recaptchaResponseNewsletter.value = token;
                });

            });
        </script>
    <?php } ?>
<?php } ?>

<?php if (isset($config['oneSignal']['active']) && $config['oneSignal']['active'] == true) { ?>
    <!-- Js OneSignal -->
    <script src="https://cdn.onesignal.com/sdks/OneSignalSDK.js" async=""></script>
    <script type="text/javascript">
        var OneSignal = window.OneSignal || [];
        OneSignal.push(function() {
            OneSignal.init({
                appId: "<?= $config['oneSignal']['id'] ?>"
            });
        });
    </script>
<?php } ?>

<!-- Js Structdata -->
<?php include TEMPLATE . LAYOUT . "strucdata.php"; ?>

<!-- Js Addons -->
<?= $addons->setAddons('script-main', 'script-main', 0.5); ?>
<?= $addons->getAddons(); ?>

<!-- Js Body -->
<?= htmlspecialchars_decode($setting['bodyjs']) ?>