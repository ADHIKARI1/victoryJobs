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

                             <p>
                            <?php 
                             if(isset($links)) 
                                echo $links; 
                            ?>
                            </p>                          

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
                                            <a href="#" aria-label="Next"> <span aria-hi
                            <aside>dden="true">»</span> </a>
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
                                        <li> <a href="#"> <?php echo $category['job_cat_name'].' ('.$category['job_count'].')'?></a></li>
                                        <?php endforeach; ?>                                        
                                    </ul>
                                </div>                              

                            </aside>
                        </div>
                        
                    </div>
                </div>
            </div>
        </section>
        