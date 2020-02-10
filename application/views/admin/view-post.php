 <div class="modal fade apply-job-modal" id="myModal">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-body contact-form-container">
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true"><i class="fa fa-close"></i></span></button>
                        <div class="job-modal">
                            <picture>
                                      <source srcset="" type="image/svg+xml">
                                      <img src="<?php echo base_url(); ?>uploads/advertisement/<?php echo $job[0]['post_image']; ?>" class="img-fluid img-thumbnail" alt="Advertisement">
                            </picture>
                        </div>
                        
                    </div>
                </div>
            </div>
 </div> 

<div class="col-md-8 col-sm-8 col-xs-12">
      <form class="row" id="admin-get-employer" enctype="multipart/form-data">
        <fieldset class="scheduler-border">
          <legend class="scheduler-border">Change Employer/Organization</legend>        
                        <div class="form-group">
                            <label>Employer/Organization ID #.</label>
                            <input name="org-id" type="text" placeholder="Type ID" class="form-control" required>
                        </div>
                         <div class="col-md-12 col-sm-12 col-xs-12">
                      <button   class="btn btn-default pull-right">Get Data<i class="fa fa-angle-right"></i></button>
                    </div>
        </fieldset>
                 
      </form>
</div>
<div class="col-md-8 col-sm-8 col-xs-12">
			<div id="responseDiv" class="alert text-center" style="margin-top:20px; display:none;">
                                <button type="button" class="close" id="clearMsg"><span aria-hidden="true">&times;</span></button>
                                <span id="message"></span>
      </div>  
			<form class="row" id="admin-update-job" enctype="multipart/form-data">
				<div class="col-md-6 col-sm-6 col-xs-12">
                        <div class="form-group">
                            <label>Employer Name<span class="required">*</span></label>
                            <input name="emp-ref-id" id="emp-ref-id" type="hidden" value="<?php echo $job[0]['ref_emp_id']; ?>">
                            <input name="emp-name" id="emp-name" type="text" placeholder="Em<?php echo $job[0]['org_name']; ?>ployer Name" value="<?php echo $job[0]['org_name']; ?>" class="form-control" readonly>
                        </div>
                     </div>
                    <div class="col-md-6 col-sm-6 col-xs-12">
                        <div class="form-group">
                            <label>Employer Email<span class="required">*</span></label>
                            <input name="emp-email" id="emp-email" type="text" placeholder="Employer Email" class="form-control" value="<?php echo $job[0]['org_email']; ?>" readonly>
                        </div>
                     </div>
					<div class="col-md-12 col-sm-12 col-xs-12">
                        <div class="form-group">
                            <label>Job Title<span class="required">*</span></label>
                            <input name="post-id" id="post-id" type="hidden" value="<?php echo $job[0]['post_id']; ?>">
                            <input name="job-title" type="text"  class="form-control" value="<?php echo $job[0]['post_title']; ?>" required>
                        </div>
                     </div>
						
					<div class="col-md-12 col-sm-12">
                                <div class="form-group">
                                    <label>Job Type <span class="required">*</span></label>
                                    <select class="form-control" name="job-type" id="job-type" required>
                                        <option value="">--- Select ---</option>
                                    <?php foreach($job_types as $job_type): ?>
                                        <option value="<?php echo $job_type['type_id'] ?>" <?php if($job_type['type_id'] == $job[0]['post_type']) echo "selected"; ?>><?php echo $job_type['type_name'] ?></option>
                                    <?php endforeach; ?>
                                    </select>
                                </div>
                    </div>
                    <div class="col-md-6 col-sm-12">
                                            <div class="form-group">
                                                <label>District <span class="required">*</span></label>
                                                <select class="form-control filterSelect" name="district" id="preferDistrict" required>
                                                    <option value="">--- Select ---</option>
                                                   <?php foreach($districts as $district): ?>
                                                   <option  value="<?php echo $district['district_id'] ?>" <?php if($district['district_id'] == $job[0]['post_district_id']) echo "selected"; ?> ><?php echo $district['district_name'] ?></option>
                                                   <?php endforeach; ?>
                                                </select>
                                            </div>
                    </div>
                    <div class="col-md-6 col-sm-12">
                                            <div class="form-group">
                                                <label>Location <span class="required">*</span></label>
                                                <select class="form-control" name="location"  required>
                                                    <option value="">--- Select ---</option>
                                                   <?php foreach($locations as $location): ?>
                                                   <option data-foo ="<?php echo $location['ref_district_id'] ?>"  value="<?php echo $location['city_id'] ?>" <?php if($location['city_id'] == $job[0]['post_city_id']) echo "selected"; ?> ><?php echo $location['city_name'] ?></option>
                                                   <?php endforeach; ?>
                                                </select>
                                            </div>
                    </div>
                    <div class="col-md-6 col-sm-12">
                                            <div class="form-group">
                                                <label>Industry <span class="required">*</span></label>
                                                <select class="form-control" name="industry" id="org-industry" required>
                                                    <option value="">--- Select ---</option>
                                                   <?php foreach($industries as $industry): ?>
                                                   <option value="<?php echo $industry['ind_id'] ?>" <?php if($industry['ind_id'] == $job[0]['post_industry']) echo "selected"; ?> ><?php echo $industry['ind_name'] ?></option>
                                                   <?php endforeach; ?>
                                                </select>
                                            </div>
                    </div>
                    <div class="col-md-6 col-sm-12">
                                            <div class="form-group">
                                                <label>Job Category <span class="required">*</span></label>
                                               <select class="form-control" name="category" id="CanJobCat" required>
                                                    <option value="">--- Select ---</option>
                                                   <?php foreach($job_categories as $job_category): ?>
                                                   <option  value="<?php echo $job_category['job_cat_id'] ?>" <?php if($job_category['job_cat_id'] == $job[0]['post_category']) echo "selected"; ?> ><?php echo $job_category['job_cat_name'] ?></option>
                                                   <?php endforeach; ?>
                                                </select>
                                            </div>
                    </div> 
                    <div class="col-md-6 col-sm-12">
                                <div class="form-group">
                                    <label>No of Vacancies  <span class="required">*</span></label>
                                    <input name="no-of-vacancy" type="number" placeholder="Vacancies" value="<?php echo $job[0]['no_of_vacancies']; ?>" class="form-control" required>
                                </div>
                    </div>
                    <div class="col-md-6 col-sm-12">
	                            <div class="form-group">
	                                <label>Post Expire Date <span class="required">*</span></label>
	                                <input name="ex-date" type="date" placeholder="" class="form-control" value="<?php echo $job[0]['post_expire_date']; ?>" required> 
	                            </div>
	                </div>
	                <div class="col-md-6 col-sm-12">
	                                <div class=" image-preview form-group">
	                                    <label> <?php if($job[0]['post_image'] == "") echo "No Image Found Upload:";else echo "Image Found :"; ?> <span class="required"></span></label>                                 
	                                        <input type="file" accept="file_extension" name="input-file-preview" />	 
                                          <input name="old-post-img" id="old-post-img" type="hidden" value="<?php echo $job[0]['post_image']; ?>">
                                          <a class="btn btn-default" data-toggle="modal" data-target="#myModal"><i class="fa fa-upload"></i> View Image</a>                                  
	                                    </span>
	                                </div>
	                </div>
	                <div class="col-md-6 col-sm-12">
	                            <div class="form-check">
	                            <input name="is-image" type="checkbox" class="form-check-input" value="<?php echo $job[0]['is_image']; ?>" <?php if($job[0]['is_image'] == 1) echo "checked"; ?>  >
	                            <label  class="form-check-label" for="materialChecked2"> Show Image As Job Post</label>
	                            </div>
	                </div>    
	                <div class="clearfix"></div>
	                <div class="col-md-6 col-sm-6 col-xs-12">
	                    <div class="form-group">
	                        <label>Proposed Salary</label>
	                        <select name="salary" class="questions-category form-control">
                            <option  value="<?php echo $job[0]['post_salary']; ?>" selected ><?php echo $job[0]['post_salary']; ?></option>
	                            <option value="Less than 10,000">Less than 10,000</option>
	                            <option value="10,000 +">10,000 +</option>
	                            <option value="30,000 +">30,000 +</option>
	                            <option value="40,000 +">40,000 +</option>
	                            <option value="50,000 +">50,000 +</option>
	                            <option value="70,000 +">70,000 +</option>
	                            <option value="100,000 +">100,000 +</option>
	                            <option value="100,000 +">100,000 +</option>
	                            <option value="150,000 +">150,000 +</option>
	                            <option value="200,000 +">200,000 +</option>
	                            <option value="200,000 +">300,000 +</option>
	                            <option value="Negotiable">Negotiable</option>
	                        </select>
	                    </div>
	                </div>
	                <div class="col-md-6 col-sm-12">
	                            <div class="form-check">
	                            <input name="intern" type="checkbox" class="form-check-input"   value="<?php echo $job[0]['is_intern']; ?>" <?php if($job[0]['is_intern'] == 1) echo "checked"; ?> >
	                            <label  class="form-check-label" for="materialChecked2"> Internship</label>
	                            </div>
	                </div>    
	                <div class="col-md-12 col-sm-12">
	                            <div class="form-group">
	                                <label>Job Overview <span class="required">*</span></label>
	                                <textarea name="overview" cols="6" rows="3" placeholder="" class="form-control" required><?php echo $job[0]['post_overview']; ?></textarea>
	                            </div>
	                </div>  
	                <div class="col-md-12 col-sm-12">
	                            <div class="form-group">
	                                <label>Job Description <span class="required"></span></label>
	                                <textarea name="description" cols="6" rows="8" placeholder="" class="form-control"><?php echo $job[0]['post_description']; ?></textarea>
	                            </div>
	                </div> 
	                <div class="col-md-6 col-sm-12">
	                                <div class=" image-preview form-group">
	                                    <label>Payment Proof <span class="required"></span></label>
	                                    <input type="file"  name="paymentSlip" />
	                                </div>
	                </div>                 
	                <div class="clearfix"></div>                                       
	                <div class="col-md-12 col-sm-12 col-xs-12">
	                    <button   class="btn btn-default pull-right">Update Job <i class="fa fa-angle-right"></i></button>
	                </div>
          </form>
	</div>

 				</div>
            </div>
        </div>
</section>   