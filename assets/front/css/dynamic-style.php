<?php

header("Content-Type:text/css");

$color = $_GET['color']; // Change Your Color Form Here


function checkhexcolor($color){
    return preg_match('/^#[a-f0-9]{6}$/i', $color);
}

if( isset( $_GET[ 'color' ] ) AND $_GET[ 'color' ] != '' ) {
    $color = "#".$_GET[ 'color' ];
}

if( !$color OR !checkhexcolor( $color ) ) {
    $color = "#82b440";
}

?>


.custom-navbar.top-nav-collapse .logo a, 
.custom-navbar.top-nav-collapse .main-menu ul.navbar-nav li.active a, 
.welcome-text h1, 
.welcome-area .home-arrow a, 
.social-links a:hover, 
ul.work-list li.active, 
.modal-body h3, 
.project-list li a, 
.single-stat h2, 
.contact-form .form-group i.fa, 
.post-meta span:hover, 
.widget.category li a:hover, 
.widget.category li:before, 
.breadcroumb .active, 
.comment-reply-link, 
h4.about-heading span, 
h4.about-heading span, 
.footer p a,
#counterArea .counter_box span,
#counterArea .counter_box h2,
.breadcrumb-area .links li a:hover,
.mybtn-bg:hover,
.mybtn-bg:hover span,
.blog-details .blog-content .content .tag-social-link .social-links li a,
.mybtn-light span,
.footer .social-link ul li a,
.blog-aside .categori .categori-list li a:hover,
.blog-aside .recent-post-widget .post-list li .post .post-details .post-title:hover,
.blog-aside .archives .archives-list .single-category:hover a,
.header.style .nav-item .nav-link.active,
 .header.style .nav-item .nav-link:hover,
 .blog-details .blog-content .content .post-meta li a:hover,
 .blog-aside .categori .categori-list li:hover a,
 .blog-aside .categori .categori-list li.active a
{
     color: <?php echo $color; ?>!important;
}


.single-service .service-overlay ul,
.hover-content a, 
.testimonial-area .owl-dots div.active, 
.btn.btn-sent, 
.info-icon, 
.cta-area a,
.read-more-btn, 
.pagination ul li:hover a,
.pagination ul li.active a, 
.search-form button[type="submit"], 
.widget.tags a:hover, 
.btn-comment,
.skill-area .title:before,
#eduandex .title:before,
.section-title h2:before,
nav.pagination-nav .page-item.active .page-link,
.back-top-btn,
.mybtn-bg,
.mybtn-light:before,
.mybtn-light:after,
.mybtn-bord:before, 
.mybtn-bord:after,
#loader-wrapper .loader-section,
.blog-details .blog-content .content .tag-social-link .social-links li a:hover,
.header.style .nav-item .nav-link.active::before,
 .header.style .nav-item .nav-link.active::after,
 .header.style .nav-item .nav-link:hover::before,
 .header.style .nav-item .nav-link:hover::after
{
     background: <?php echo $color; ?>;
}

.about-area .progress .progress-bar,
.about-area .progress .progress-bar span{
    background-color: <?php echo $color; ?>;
}

.mybtn1 {
    background: <?php echo $color; ?>;
    border: 1px solid <?php echo $color; ?>;
}


#eduandex .education-list .single-education::before{
  border: 2px solid <?php echo $color; ?>;
}
#eduandex .education-list .single-education::after{
  border: 2px solid <?php echo $color; ?>;
}

#eduandex .education-list .single-education:hover{
   border-left: 2px solid <?php echo $color; ?>;
}
.portfolio-category li:hover a,
.portfolio-category li.active a{
    background: <?php echo $color; ?>;
}
.footer .social-link ul li a:hover{
    background: <?php echo $color; ?>;
}
.mybtn-bg,
.mybtn-bord:hover,
{
  border-color: <?php echo $color; ?>;
}
.mybtn-bord {
  border: 1px solid <?php echo $color; ?>; 
}
.mybtn-bg {
    border-color: <?php echo $color; ?>;
}
.progress-bar{
  background-color: <?php echo $color; ?>;
}
.readmore-btn{
  background: <?php echo $color; ?>;
}
nav.pagination-nav .page-item.active .page-link{
  background: <?php echo $color; ?>!important;
}
.form-control:focus {
    border-color: <?php echo $color; ?>;
}