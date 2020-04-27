<section class="job-breadcrumb">
            <div class="container">
                <div class="row">
                    <div class="col-md-6 col-sm-7 co-xs-12 text-left">
                        <h3>Write us a line</h3>
                    </div>
                    <div class="col-md-6 col-sm-5 co-xs-12 text-right">
                        <div class="bread">
                            <ol class="breadcrumb">
                                <li><a href="#">Home</a> </li>
                                <li class="active">Contact Us</li>
                            </ol>
                        </div>
                    </div>
                </div>
            </div>
</section>
<section class="contact-us light-grey">
            <div class="container">
                <div class="row">
                    <?php 

                        if($this->session->flashdata('message')){
                                    ?>
                                    <div id="flashMessage" class="alert alert-info text-center" role="alert">
                                        <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                                        <?php echo $this->session->flashdata('message'); ?>                                        
                                    </div>
                                    <?php
                        }

                    ?>
                    <div class="col-md-12 col-sm-12 col-xs-12">
                        <div class="col-md-12 col-sm-12 col-xs-12">
                            <div class="Heading-title black">
                                <h1>Contact Us</h1>
                                <p></p>
                            </div>
                        </div>
                        <div class="col-md-8 col-sm-8 col-xs-12">
                            <form class="row" method="post" action = "<?php echo base_url(); ?>pages/contact">
                                <div class="col-md-6 col-sm-12">
                                    <div class="form-group">
                                        <label>Name <span class="required">*</span></label>
                                        <input name="name" placeholder="" class="form-control" type="text" required>
                                    </div>
                                </div>
                                <div class="col-md-6 col-sm-12">
                                    <div class="form-group">
                                        <label>Email <span class="required">*</span></label>
                                        <input name="email" placeholder="" class="form-control" type="email" required>
                                    </div>
                                </div>
                                <div class="col-md-6 col-sm-12">
                                    <div class="form-group">
                                        <label>Phone <span class="required">*</span></label>
                                        <input name="phone" placeholder="" class="form-control" type="tel" required>
                                    </div>
                                </div>
                                <div class="col-md-6 col-sm-12">
                                    <div class="form-group">
                                        <label>Subject <span class="required">*</span></label>
                                        <input name="subject" placeholder="" class="form-control" type="text" required>
                                    </div>
                                </div>
                                <div class="col-md-12 col-sm-12">
                                    <div class="form-group">
                                        <label>Message <span class="required">*</span></label>
                                        <textarea name="message" cols="6" rows="8" placeholder="" class="form-control" required></textarea>
                                    </div>
                                </div>
                                <div class="col-md-12 col-sm-12">
                                    <button href="#" class="btn btn-default"> Send Message <i class="fa fa-angle-right"></i> </button>
                                </div>
                            </form>
                        </div>
                        <div class="col-md-4 col-sm-4 col-xs-12">
                            <div class="contact_block">
                                <h4>Contact Information</h4>
                                <ul class="personal-info">
                                    <li><i class="fa fa-map-marker"></i> No 150, Templars Road, Mount Lavinia. Sri Lanka.</li>
                                    <li><i class="fa fa-envelope"></i> jobs@victoryinformation.lk</li>
                                    <li><i class="fa fa-phone"></i> (+94) 76 22 20 858</li>
                                    <li><i class="fa fa-clock-o"></i> Always </li>
                                </ul>
                                <ul class="social-network social-circle">
                                    <li><a href="https://www.facebook.com/victoryjobs.lk/" class="icoFacebook" title="Facebook"><i class="fa fa-facebook"></i></a></li>                                                                       
                                    <li><a href="https://www.linkedin.com/in/victory-jobs-bab156190/" class="icoLinkedin" title="Linkedin"><i class="fa fa-linkedin"></i></a></li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>