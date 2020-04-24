 <section class="categories-list-page light-grey">
            <div class="container">
                <div class="row">
                    <div class="col-md-12 col-sm-12 col-xs-12 nopadding">
                        <div class="col-md-8 col-sm-12 col-xs-12">
                            <!-- <h4 class="search-result-text">Available job(s)</h4> -->
                        </div>
                        <div class="col-md-8 col-sm-12 col-xs-12">
                            <div class="all-jobs-list-box">
                                <?php foreach($jobs as $job): ?>
                                <div class="job-box">
                                    <div class="col-md-2 col-sm-2 col-xs-12 hidden-xs hidden-sm">
                                        <div class="comp-logo">
                                            <a href="#"> <img src="<?php echo base_url(); ?>uploads/logo/<?php echo $job['org_logo']; ?>" class="img-responsive" alt="scriptsbundle"></a>
                                        </div>
                                    </div>
                                    <div class="col-md-6 col-sm-6 col-xs-12 nopadding">
                                        <div class="job-title-box">
                                            <a href="#">
                                                <div class="job-title"><?php echo $job['post_title']; ?></div>
                                            </a>
                                            <a href="#"><span class="comp-name"><?php echo $job['org_name']; ?></span></a>
                                        </div>
                                    </div>
                                    <div class="col-md-2 col-sm-3 col-xs-6">
                                        <a href="#">
                                            <div class="job-type jt-remote-color">
                                                <i class="fa fa-clock-o"></i> <?php echo $job['type_name']; ?>
                                            </div>
                                        </a>
                                    </div>
                                    <div class="col-md-2 col-sm-2 col-xs-12 nopadding">
                                        <a href="<?php echo base_url(); ?>job/view/<?php echo $job['post_id']; ?>" class="btn btn-primary btn-custom">View</a>
                                    </div>
                                </div> 
                            <?php endforeach; ?>
                            </div>
                          <div class="col-md-12 col-sm-12 col-xs-12">
                                <div class="load-more-btn">
                                   <a href="<?php echo base_url(); ?>job/index/1"><button class="btn-default"> View All <i class="fa fa-angle-right"></i> </button></a> 
                                </div>
                            </div> 

                            <!--<div class="col-md-12 col-sm-12 col-xs-12 nopadding">
                                <div class="pagination-box clearfix">
                                    <ul class="pagination">
                                        <li>
                                            <a href="#" aria-label="Previous"> <span aria-hidden="true">«</span> </a>
                                        </li>
                                        <li class="active"><a href="#">1</a></li>
                                        <li><a href="#">2</a></li>
                                        <li><a href="#">3</a></li>
                                        <li><a href="#">4</a></li>
                                        <li><a href="#">5</a></li>
                                        <li>
                                            <a href="#" aria-label="Next"> <span aria-hidden="true">»</span> </a>
                                        </li>
                                    </ul>
                                </div>
                            </div> -->
                        </div>
                        <div class="col-md-4 col-sm-12 col-xs-12">
                            <aside>
                                <div class="widget">
                                    <div class="widget-heading"><span class="title">Categories</span></div>
                                    <ul class="categories-module">
                                        <?php  foreach($categories as $category): ?>
                                        <li> <a href="<?php echo base_url(); ?>job/category/<?php echo $category['job_cat_id']; ?>"> <?php echo $category['job_cat_name'].' ('.$category['job_count'].')'?></a></li>
                                        <?php endforeach; ?>                                        
                                    </ul>
                                </div>          

                            </aside>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <section class="testimoniial-section light-grey">
        <div class="container">
            <div class="row">
                <div class="col-md-12 col-sm-12 col-xs-12">
                    <div class="Heading-title black">
                        <h1>Victory Jobs team</h1>                        
                    </div>
                </div>
                <div class="col-md-12 col-sm-12 col-xs-12">
                    <div id="owl-testimonial">

                        <div class="item">
                            <a href="<?php echo base_url(); ?>pages/team/1">
                            <div class="testimonial text-center">
                                <div class="testimonial-image"> <img src="<?php echo base_url(); ?>assets/images/users/profiles/Warren.jpg" alt="Jane Doe" title1="Jane Doe" class="img-circle img-responsive"> </div>                    
                                <div class="testimonial-body">                                   
                                    <div class="testimonial-info-1">- Warren Mills</div>
                                    <div class="testimonial-info-2">Senior Human Resources Consultant</div>
                                </div>
                            </div>
                        </a>
                        </div>
                        <div class="item">
                             <a href="<?php echo base_url(); ?>pages/team/2">
                            <div class="testimonial text-center">
                                <div class="testimonial-image"> <img src="<?php echo base_url(); ?>assets/images/users/profiles/shalika.png" alt="Jane Doe" title1="Jane Doe" class="img-circle img-responsive"> </div>                    
                                <div class="testimonial-body">                                   
                                    <div class="testimonial-info-1">- Shalika Senarath</div>
                                    <div class="testimonial-info-2">Senior Human Resources Consultant</div>
                                </div>
                            </div>
                            </a>
                        </div>
                        <div class="item">
                            <a href="<?php echo base_url(); ?>pages/team/3">
                            <div class="testimonial text-center">
                                <div class="testimonial-image"> <img src="<?php echo base_url(); ?>assets/images/users/profiles/Shani.jpg" alt="Jane Doe" title1="Jane Doe" class="img-circle img-responsive"> </div>                    
                                <div class="testimonial-body">                                   
                                    <div class="testimonial-info-1">- Shani Fernando</div>
                                    <div class="testimonial-info-2">Senior Legal Officer/ Consultant</div>
                                </div>
                            </div>
                            </a>
                        </div>
                         <div class="item">
                            <a href="<?php echo base_url(); ?>pages/team/4">
                            <div class="testimonial text-center">
                                <div class="testimonial-image"> <img src="<?php echo base_url(); ?>assets/images/users/profiles/tharanga.jpg" alt="Jane Doe" title1="Jane Doe" class="img-circle img-responsive"> </div>                    
                                <div class="testimonial-body">                                   
                                    <div class="testimonial-info-1">- Ms. Tharanga Samarakkody Alutwalap</div>
                                    <div class="testimonial-info-2">Senior Consultant of the Talent Acquisition Team</div>
                                </div>
                            </div>
                            </a>
                        </div>
                        <div class="item">
                            <a href="<?php echo base_url(); ?>pages/team/5">
                            <div class="testimonial text-center">
                                <div class="testimonial-image"> <img src="<?php echo base_url(); ?>assets/images/users/profiles/MajorPrasanna.jpg" alt="Jane Doe" title1="Jane Doe" class="img-circle img-responsive"> </div>                    
                                <div class="testimonial-body">                                   
                                    <div class="testimonial-info-1">- Major Prasanna Liyanage</div>
                                    <div class="testimonial-info-2">Senior Consultant of the Talent Acquisition Team</div>
                                </div>
                            </div>
                            </a>
                        </div>
                        <div class="item">
                            <a href="<?php echo base_url(); ?>pages/team/6">
                            <div class="testimonial text-center">
                                <div class="testimonial-image"> <img src="<?php echo base_url(); ?>assets/images/users/profiles/Kevin.jpg" alt="Jane Doe" title1="Jane Doe" class="img-circle img-responsive"> </div>                    
                                <div class="testimonial-body">                                   
                                    <div class="testimonial-info-1">- Kevin Almeida</div>
                                    <div class="testimonial-info-2">Business and Marketing Strategy Consultant</div>
                                </div>
                            </div>
                            </a>
                        </div>
                        <div class="item">
                            <a href="<?php echo base_url(); ?>pages/team/7">
                            <div class="testimonial text-center">
                                <div class="testimonial-image"> <img src="<?php echo base_url(); ?>assets/images/users/profiles/ColSaman.jpg" alt="Jane Doe" title1="Jane Doe" class="img-circle img-responsive"> </div>                    
                                <div class="testimonial-body">                                   
                                    <div class="testimonial-info-1">- Col. Saman Jayawickrama</div>
                                    <div class="testimonial-info-2">Senior Consultant of the Talent Acquisition Team</div>
                                </div>
                            </div>
                            </a>
                        </div>
                        <div class="item">
                            <a href="<?php echo base_url(); ?>pages/team/8">
                            <div class="testimonial text-center">
                                <div class="testimonial-image"> <img src="<?php echo base_url(); ?>assets/images/users/profiles/aruna.jpg" alt="Jane Doe" title1="Jane Doe" class="img-circle img-responsive"> </div>                    
                                <div class="testimonial-body">                                   
                                    <div class="testimonial-info-1">- Commander (Retired) Aruna Maganaarachchi</div>
                                    <div class="testimonial-info-2">Senior Consultant of the Talent Acquisition Team</div>
                                </div>
                            </div>
                            </a>
                        </div>
                         <div class="item">
                            <a href="<?php echo base_url(); ?>pages/team/9">
                            <div class="testimonial text-center">
                                <div class="testimonial-image"> <img src="<?php echo base_url(); ?>assets/images/users/profiles/thisal.png" alt="Consultant" title1="Jane Doe" class="img-circle img-responsive"> </div>                    
                                <div class="testimonial-body">                                   
                                    <div class="testimonial-info-1">- Thisal Aluthge</div>
                                    <div class="testimonial-info-2">Senior Consultant of the Talent Acquisition Team</div>
                                </div>
                            </div>
                            </a>
                        </div>
                        
                    </div>
            </div>
        </div>
    </section>