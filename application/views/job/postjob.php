<section class="job-breadcrumb">
            <div class="container">
                <div class="row">
                    <div class="col-md-6 col-sm-7 co-xs-12 text-left">
                        <h3>Post Job </h3>
                    </div>
                    <div class="col-md-6 col-sm-5 co-xs-12 text-right">
                        <div class="bread">
                            <ol class="breadcrumb">
                                <li><a href="#">Home</a> </li>
                                <li><a href="#">Dashboard</a> </li>
                                <li class="active">Post Job</li>
                            </ol>
                        </div>
                    </div>
                </div>
            </div>
</section>
<section class="post-job">
            <div class="container">
                <div class="row">
                    <div class="col-md-12 col-sm-12 col-xs-12">
                        <div id="responseDiv" class="alert text-center" style="margin-top:20px; display:none;">
                                <button type="button" class="close" id="clearMsg"><span aria-hidden="true">&times;</span></button>
                                <span id="message"></span>
                        </div>  
                        <div class="box-panel">
                            <div class="Heading-title black">
                                <h3>Post A job</h3>
                                <!-- <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor.At vero eos et accusamus et iusto odio dignissimos ducimus qui blanditiis praesentium</p>
                                -->
                            </div>
                            <form class="row" id="post-job-form" enctype="multipart/form-data">
                                
                                <div class="col-md-6 col-sm-6 col-xs-12">
                                    <div class="form-group">
                                        <label>Job Title</label>
                                        <input name="job-title" type="text" placeholder="Job Title" class="form-control" required>
                                    </div>
                                </div>
                                <div class="col-md-6 col-sm-12">
                                            <div class="form-group">
                                                <label>Job Type <span class="required">*</span></label>
                                                <select class="form-control" name="job-type" id="job-type" required>
                                                    <option value="">--- Select ---</option>
                                                   <?php foreach($job_types as $job_type): ?>
                                                   <option value="<?php echo $job_type['type_id'] ?>"><?php echo $job_type['type_name'] ?></option>
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
                                                   <option  value="<?php echo $district['district_id'] ?>"><?php echo $district['district_name'] ?></option>
                                                   <?php endforeach; ?>
                                                </select>
                                            </div>
                                </div>
                                <div class="col-md-6 col-sm-12">
                                            <div class="form-group">
                                                <label>Location <span class="required">*</span></label>
                                                <select class="form-control" name="location" id="preferLocation" required>
                                                    <option value="">--- Select ---</option>
                                                   <?php foreach($locations as $location): ?>
                                                   <option data-foo ="<?php echo $location['ref_district_id'] ?>"  value="<?php echo $location['city_id'] ?>" ><?php echo $location['city_name'] ?></option>
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
                                                   <option value="<?php echo $industry['ind_id'] ?>"><?php echo $industry['ind_name'] ?></option>
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
                                                   <option  value="<?php echo $job_category['job_cat_id'] ?>"><?php echo $job_category['job_cat_name'] ?></option>
                                                   <?php endforeach; ?>
                                                </select>
                                            </div>
                                </div> 
                                <div class="col-md-6 col-sm-12">
                                            <div class="form-group">
                                                <label>No of Vacancies(keep '0' for 1 or more)  <span class="required">*</span></label>
                                                <input name="no-of-vacancy" type="number" placeholder="Vacancies" value="0" class="form-control" required>
                                            </div>
                                </div>
                                <div class="col-md-6 col-sm-12">
                                            <div class="form-group">
                                                <label>Post Expire Date <span class="required">*</span></label>
                                                <input name="ex-date" type="date" placeholder="" class="form-control" required> 
                                            </div>
                                </div>     

                                <div class="col-md-6 col-sm-12">
                                                <div class=" image-preview form-group">
                                                    <label>Advertisement Image: <span class="required"></span></label>
                                                    <input type="text" placeholder="Upload Profile Image" class="form-control image-preview-filename" disabled="disabled">
                                                    <span class="input-group-btn">
                                                    <button type="button" class="btn btn-default image-preview-clear" style="display:none;">
                                                    <span class="glyphicon glyphicon-remove"></span> Clear
                                                    </button>
                                                    <div class="btn btn-default image-preview-input">
                                                        <span class="glyphicon glyphicon-folder-open"></span>
                                                        <span class="image-preview-input-title">Browse</span>
                                                        <input type="file" accept="file_extension" name="input-file-preview" />
                                                    </div>
                                                    </span>
                                                </div>
                                </div>
                                <div class="col-md-6 col-sm-12">
                                            <div class="form-check">
                                            <input name="is-image" type="checkbox" class="form-check-input" value="1" >
                                            <label  class="form-check-label" for="materialChecked2"> Show Image As Job Post</label>
                                            </div>
                                </div>    
                                <div class="clearfix"></div>
                                <div class="col-md-6 col-sm-6 col-xs-12">
                                    <div class="form-group">
                                        <label>Proposed Salary</label>
                                        <select name="salary" class="questions-category form-control">
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
                                            <input name="intern" type="checkbox" class="form-check-input"  value="1">
                                            <label  class="form-check-label" for="materialChecked2"> Internship</label>
                                            </div>
                                </div>    
                                <div class="col-md-12 col-sm-12">
                                            <div class="form-group">
                                                <label>Job Overview <span class="required">*</span></label>
                                                <textarea name="overview" cols="6" rows="3" placeholder="" class="form-control" required></textarea>
                                            </div>
                                </div>  
                                <div class="col-md-12 col-sm-12">
                                            <div class="form-group">
                                                <label>Job Description <span class="required">*</span></label>
                                                <textarea name="description" cols="6" rows="8" placeholder="" class="form-control"></textarea>
                                            </div>
                                </div> 
                                <div class="col-md-6 col-sm-12">
                                                <div class=" image-preview form-group">
                                                    <label>Payment Proof <span class="required">*</span></label>
                                                    <input type="file"  name="paymentSlip" required />
                                                </div>
                                </div>                 
                                <div class="clearfix"></div>          
                                                       
                                <div class="col-md-12 col-sm-12 col-xs-12">
                                    <button id="jobPostBtn"   class="btn btn-default pull-right">Publish Job <i class="fa fa-angle-right"></i></button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </section>
