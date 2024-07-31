<!-- <div class="col-md-12">
                <span>< ?php echo $footer[0]['footer_text'] ?> | Created by <a href="#" target="_blank">Tahsan Tanjim</a></span>
            </div> -->
<!-- footer -->

<!-- newsletter -->
<div class="newsletter">
    <div class="container">
        <div class="col-md-6 newsletter_left">
            <h3>Newsletter</h3>
            <p>Excepteur sint occaecat cupidatat non proident, sunt.</p>
        </div>
        <div class="col-md-6 newsletter_right">
            <form action="#" method="post">
                <input type="email" name="Email" placeholder="Email" required="">
                <input type="submit" value="" />
            </form>
        </div>
        <div class="clearfix"> </div>
    </div>
</div>
<!-- //newsletter -->


<div class="footer">
    <div class="container">
        <div class="footer_grids">
            <div class="col-md-3 footer_grid">
                <?php
                //  $db = new Database();
                $db->select('options', 'site_name,footer_text,site_desc,contact_phone,contact_email,contact_address', null, null, null, null);
                $footer = $db->getResult();  ?>
                <h3>Contact</h3>
                <p><?php echo $footer[0]['site_desc']; ?></p>
                <ul class="address">
                    <?php if (!empty($footer[0]['contact_address'])) { ?>
                        <li><i class="fal fa-map-marker-alt"></i><span> <?php echo $footer[0]['contact_address']; ?></span></li>
                    <?php } ?>
                    <?php if (!empty($footer[0]['contact_email'])) { ?>
                        <li><i class="glyphicon glyphicon-envelope" aria-hidden="true"></i><span><?php echo $footer[0]['contact_email']; ?></span></li>
                    <?php } ?>
                    <?php if (!empty($footer[0]['contact_phone'])) { ?>
                        <li><i class="fas fa-phone-alt"></i><span><?php echo $footer[0]['contact_phone']; ?></span></li>
                    <?php } ?>
                </ul>
            </div>
            <div class="col-md-3 footer_grid">
                <h3>Useful Links</h3>
                <ul class="info">
                    <li><a href="<?php echo $hostname; ?>">Home</a></li>
                    <li><a href="all_products.php">All Products</a></li>
                    <li><a href="latest_products.php">Latest Products</a></li>
                    <li><a href="popular_products.php">Popular Products</a></li>
                </ul>
            </div>
            <div class="col-md-3 footer_grid">
                <h3>Category</h3>
                <ul class="info">
                    <?php
                    $db = new Database();
                    $db->select('sub_categories', '*', null, 'cat_products > 0 AND show_in_footer ="1"', null, null);
                    $result = $db->getResult();
                    if (count($result) > 0) {
                        foreach ($result as $res) { ?>
                            <li><a href="category.php?cat=<?php echo $res['sub_cat_id']; ?>"><?php echo $res['sub_cat_title']; ?></a></li>
                    <?php    }
                    } ?>
                </ul>
            </div>
            <div class="col-md-3 footer_grid">
                <h3>Profile</h3>
                <h4>Follow Us</h4>
                <div class="social-icon">
                    <ul>
                        <li>
                            <a href=" https://www.facebook.com/kaziomar144" target="_blank">
                                <span></span>
                                <span></span>
                                <span></span>
                                <span></span>
                                <span class="fab fa-facebook-f" aria-hidden="true"></span>
                            </a>
                        </li>
                        <li>
                            <a href="#">
                                <span></span>
                                <span></span>
                                <span></span>
                                <span></span>
                                <span class="fab fa-twitter" aria-hidden="true"></span>
                            </a>
                        </li>
                        <li>
                            <a href="#">
                                <span></span>
                                <span></span>
                                <span></span>
                                <span></span>
                                <span class="fab fa-google-plus" aria-hidden="true"></span>
                            </a>
                        </li>
                        <li>
                            <a href="#">
                                <span></span>
                                <span></span>
                                <span></span>
                                <span></span>
                                <span class="fab fa-linkedin" aria-hidden="true"></span>
                            </a>
                        </li>

                    </ul>
                </div>
            </div>
            <div class="clearfix"> </div>
        </div>
    </div>
    <div class="footer-copy">
        <div class="footer-copy1">
            <div class="footer-copy-pos">
                <a href="#home1" class="scroll"><img src="images/arrow.png" alt=" " class="img-responsive" /></a>
            </div>
        </div>
        <div class="container">
            <p>&copy; 2021 <span style="font-weight: 800; color: red; font-size: 15px;">t</span>-Electronic. All rights reserved | Design by <a href="https://www.facebook.com/kaziomar144" target="_blank"><span style="font-weight: 800; color: red;">T</span>AHSAN</a></p>
        </div>
    </div>
</div>
<!-- //footer -->


<script src="js\jquery-1.10.2.min.js" type="text/javascript"></script>
<script src="js\bootstrap.min.js"></script>
<script src="js\actions.js"></script>
<!--okzoom Plugin-->
<script src="js/okzoom.min.js" type="text/javascript"></script>
<!--owl carousel plugin-->
<script type="text/javascript" src="js/owl.carousel.js"></script>


<script>
    $(document).ready(function() {

        $('#product-img').okzoom({
            width: 200,
            height: 200,
            scaleWidth: 800,
            round: true,
            background: "#fff",
            shadow: "0 0 5px #000",
            border: "1px solid black"
        });

        $('.banner-carousel').owlCarousel({
            loop: true,
            margin: 0,
            responsiveClass: true,
            navText: ["", ""],
            responsive: {
                0: {
                    items: 1,
                    nav: true

                },
                600: {
                    items: 1,
                    nav: true
                },
                1000: {
                    items: 1,
                    nav: true,
                    loop: false,
                    margin: 10
                }
            }
        });

        $('.popular-carousel').owlCarousel({
            loop: true,
            margin: 0,
            responsiveClass: true,
            navText: ["", ""],
            responsive: {
                0: {
                    items: 1,
                    nav: true

                },
                600: {
                    items: 2,
                    nav: true
                },
                800: {
                    items: 4,
                    nav: true
                },
                1000: {
                    items: 5,
                    nav: true,
                    loop: false,
                    margin: 10
                }
            }
        });

        $('.latest-carousel').owlCarousel({
            loop: true,
            margin: 0,
            responsiveClass: true,
            navText: ["", ""],
            responsive: {
                0: {
                    items: 1,
                    nav: true

                },
                600: {
                    items: 2,
                    nav: true
                },
                800: {
                    items: 3,
                    nav: true
                },
                1000: {
                    items: 4,
                    nav: true,
                    loop: false,
                    margin: 5
                }
            }
        });
    });
</script>

</body>

</html>