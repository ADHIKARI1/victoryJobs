<div class="modal fade apply-job-modal" id="myModal">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-body contact-form-container">
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true"><i class="fa fa-close"></i></span></button>
                        <div class="job-modal">
                            <h2>Want To Apply For this Job?</h2>
                        </div>
                        <form method="post" id="job-form" enctype="multipart/form-data">
                            <div class="row clearfix">
                                <div class="column col-md-12 col-sm-12 col-xs-12">
                                    <div class="form-group">
                                        <input type="text" class="form-control" name="app-name" placeholder="Applicant Name" value="<?php echo $user[0]['user_fullname']; ?>">
                                        <input type="hidden"  name = "post-id"  value = "<?php echo $details[0]['post_id']; ?>" >
                                        <input type="hidden"  name = "org-id"  value = "<?php echo $details[0]['ref_emp_id']; ?>" > 
                                        <input type="hidden"  name = "app-user"  value = "<?php echo $user[0]['ref_emp_id']; ?>" >  
                                        <input type="hidden"  name="org-email"  value= "<?php echo $details[0]['org_email']; ?>">                                            
                                    </div>
                                    <div class="form-group">
                                        <input type="email" class="form-control" name="app-email"  placeholder="Email" value="<?php echo $user[0]['user_email']; ?>">
                                    </div>
                                </div>
                                <div class="column col-md-12 col-sm-12 col-xs-12">
                                    <div class="form-group">
                                        <select name="cv-uploaded" class="select-resume form-control">                                            
                                            <option value="<?php echo $user[0]['cv_name']; ?>" selected>CV Uploaded</option>                                            
                                        </select>
                                    </div>
                                </div>
                                <div class="column col-md-12 col-sm-12 col-xs-12">
                                    <div class="input-group image-preview form-group">
                                        <input type="text" placeholder="Upload Resume" class="form-control image-preview-filename" disabled="disabled">
                                        <span class="input-group-btn">
                                        <button type="button" class="btn btn-default image-preview-clear" style="display:none;">
                                            <span class="glyphicon glyphicon-remove"></span> Clear
                                        </button>
                                        <div class="btn btn-default image-preview-input">
                                            <span class="glyphicon glyphicon-folder-open"></span>
                                            <span class="image-preview-input-title">Browse</span>
                                            <input type="file" accept="file_extension" name="input-file-preview"  value="<?php echo $user[0]['user_email']; ?>"/>
                                        </div>
                                        </span>
                                    </div>
                                </div>
                                <div class="column col-md-12 col-sm-12 col-xs-12">
                                    <div class="form-group">
                                        <textarea name="cover" rows="6" class="form-control" placeholder="Cover Letter" required></textarea>
                                    </div>
                                </div>
                                <div class="col-md-12 col-xs-12">
                                    <div class="text-center">                                        
                                            <button type="submit" name="submit" class="btn btn-default btn-block">Apply Now</button>                                        
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
 </div>
<section class="job-breadcrumb">
            <div class="container">
                <div class="row">
                    <div class="col-md-6 col-sm-7 co-xs-12 text-left">
                        <h3><?php echo $details[0]['post_title']; ?></h3>
                    </div>
                    <div class="col-md-6 col-sm-5 co-xs-12 text-right">
                        <div class="bread">
                            <ol class="breadcrumb">
                                <li><a href="#">Home</a> </li>
                                <li class="active">job Detail</li>
                            </ol>
                        </div>
                    </div>
                </div>
            </div>
 </section>       
 <section class="single-job-section">
            <div class="container">
                <div class="row">
                    <div class="col-md-12 col-sm-12 col-xs-12 nopadding">
                        <div id="responseDiv" class="alert text-center" style="margin-top:20px; display:none;">
                            <button type="button" class="close" id="clearMsg"><span aria-hidden="true">&times;</span></button>
                            <span id="message"></span>
                        </div> 
                        <div class="col-md-8 col-sm-8 col-xs-12">
                            <div class="single-job-page">
                                <div class="job-short-detail">
                                    <div class="heading-inner">
                                        <p class="title">Job Details</p>
                                    </div>
                                    <div class="col-md-12 col-sm-12 col-xs-12 nopadding">
                                        <dl>
                                            <dt>Job Type:</dt>
                                            <dd><?php echo $details[0]['type_name']; ?></dd>                                            

                                            <dt>Posted On:</dt>
                                            <dd><?php echo $details[0]['date_created']; ?></dd>

                                            <dt>Closing Date:</dt>
                                            <dd><?php echo $details[0]['post_expire_date']; ?></dd>

                                            <dt>No. of Vacancies:</dt>
                                            <dd><?php echo $details[0]['no_of_vacancies'] == 0 ? "1 or More" : $details[0]['no_of_vacancies']; ?></dd>

                                            <dt>Location:</dt>
                                            <dd><?php echo $details[0]['city_name']; ?></dd>

                                            <dt>Expected Salary:</dt>
                                            <dd><?php echo $details[0]['post_salary']; ?></dd>
                                        </dl>
                                    </div>
                                </div>

                                <div class="heading-inner">
                                    <p class="title">Job Overview</p>
                                </div>
                                <div class="job-desc job-detail-boxes">
                                    <p>
                                        <?php echo $details[0]['post_overview']; ?>
                                    </p>
                                    <div class="heading-inner">
                                        <p class="title">Job Description:</p>
                                    </div>
                                    <p>
                                        <?php echo $details[0]['post_description']; ?>
                                    </p> 
                                    <br>
                                    ​<picture>
                                      <source srcset="" type="image/svg+xml">
                                      <img src="<?php echo base_url(); ?>uploads/advertisement/<?php echo $details[0]['post_image']; ?>" class="img-fluid img-thumbnail" alt="Advertisement">
                                    </picture>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-4 col-sm-4 col-xs-12">
                            <aside>
                                <div class="apply-job">
                                    <?php if($this->session->userdata('islogged_mko789') && $this->session->userdata('userid_mko789') != ""): ?>
                                        <?php if($this->session->userdata('idtype_mko789') == 2): ?>
                                            <a class="btn btn-default" data-toggle="modal" data-target="#myModal"><i class="fa fa-upload"></i>Apply For Position</a>
                                        <?php endif; ?>
                                    <?php else: ?>
                                        <a class="btn btn-default"  href="<?php echo base_url(); ?>user/signin"><i class="fa fa-upload"></i>Apply For Position</a>
                                    <?php endif; ?>
                                    <a class="btn btn-default bookmark"><i class="fa fa-star"></i>Bookmark This Job</a>
                                </div>
                                <div class="company-detail">
                                    <div class="company-img">
                                        <img src="images/company/logo2.png" class="img-responsive" alt="">
                                    </div>
                                    <div class="company-contact-detail">
                                        <table>
                                            <tr>
                                                <th>Name:</th>
                                                <td><?php echo $details[0]['org_name']; ?></td>
                                            </tr>
                                            <tr>
                                                <th>Email:</th>
                                                <td><?php echo $details[0]['org_email']; ?></td>
                                            </tr>
                                            <tr>
                                                <th>Phone:</th>
                                                <td><?php echo $details[0]['org_telephone']; ?></td>
                                            </tr>
                                            <!-- <tr>
                                                <th>Website:</th>
                                                <td><?php echo $details[0]['org_email']; ?></td>
                                            </tr> -->
                                            <tr>
                                                <th>Address:</th>
                                                <td><?php echo $details[0]['org_address']; ?></td>
                                            </tr>
                                        </table>
                                    </div>
                                </div>
                            </aside>
                            
                            
                        </div>
                    </div>
                </div>
            </div>
        </section>

