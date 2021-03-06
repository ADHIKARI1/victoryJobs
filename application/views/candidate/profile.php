        <section class="job-breadcrumb">
            <div class="container">
                <div class="row">                    
                    <div class="col-md-6 col-sm-7 co-xs-12 text-left">
                        <h3>Edit profile</h3>
                    </div>
                    <div class="col-md-6 col-sm-5 co-xs-12 text-right">
                        <div class="bread">
                            <ol class="breadcrumb">
                                <li><a href="#">Home</a> </li>
                                <li class="active">edit profile</li>
                            </ol>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <section class="dashboard-body">
            <div class="container">
                <div class="row">
                    <div class="col-md-12 col-sm-12 col-xs-12">
                        <div class="col-md-4 col-sm-4 col-xs-12">                            
                            <div class="profile-nav">
                                <div class="panel">
                                    <ul class="nav nav-pills nav-stacked">
                                        <li>
                                            <a href="user-dashboard.html"> <i class="fa fa-user"></i> Profile</a>
                                        </li>
                                        <li class="active">
                                            <a href="user-edit-profile.html"> <i class="fa fa-edit"></i> Edit Profile</a>
                                        </li>                                       
                                        <li>
                                            <a href="user-job-applied.html"> <i class="fa  fa-list-ul"></i> Jobs Applied</a>
                                        </li>                                      
                                    </ul>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-8 col-sm-8 col-xs-12">
                            <div id="responseDiv" class="alert text-center" style="margin-top:20px; display:none;">
                                <button type="button" class="close" id="clearMsg"><span aria-hidden="true">&times;</span></button>
                                <span id="message"></span>
                            </div>  
                            <div class="heading-inner first-heading">
                                <p class="title">Edit Profile</p>
                            </div>
                            <div class="col-md-12 col-sm-12 col-xs-12 nopadding">
                                <div class="profile-edit row">
                                    <form id="canCreateProfileForm" enctype="multipart/form-data">
                                        
                                        <div class="col-md-6 col-sm-12">
                                            <div class="form-group">
                                                <label>First Name <span class="required">*</span></label>
                                                <input name="firstName" type="text" placeholder="" class="form-control" required>
                                            </div>
                                        </div>
                                        <div class="col-md-6 col-sm-12">
                                            <div class="form-group">
                                                <label>Last Name <span class="required">*</span></label>
                                                <input name="lastName" type="text" placeholder="" class="form-control" required>
                                            </div>
                                        </div>
                                        
                                        <div class="col-md-6 col-sm-12">
                                            <div class="form-group">
                                                <label>Date Of Birth <span class="required">*</span></label>
                                                <input name="dob" type="date" placeholder="" class="form-control" required> 
                                            </div>
                                        </div>                                        
                                        <div class="col-md-6 col-sm-12">
                                            <div class="form-group">
                                                <label>Telephone <span class="required">*</span></label>
                                                <input name="telephone"  pattern="[0-9]{10}" type="tel" placeholder="" class="form-control" required>
                                            </div>
                                        </div>
                                        <div class="col-md-6 col-sm-12">
                                            <div class="form-group">
                                                <label>Mobile <span class="required"></span></label>
                                                <input name="mobile" pattern="[0-9]{10}" type="tel" placeholder="" class="form-control">
                                            </div>
                                        </div>                                         
                                        <div class="col-md-12 col-sm-12">
                                            <div class="form-group">
                                                <label>Address <span class="required">*</span></label>
                                                <input name="address" type="text" placeholder="" class="form-control" required>
                                            </div>
                                        </div>                                                                   
                                         <div class="col-md-6 col-sm-12">
                                            <div class="form-group">
                                                <label>Experience No of Years <span class="required">*</span></label>
                                                <input name="experience" type="number" placeholder="" class="form-control" required>
                                            </div>
                                        </div>
                                         <div class="col-md-6 col-sm-12">
                                            <div class="form-group">
                                                <label>Highest Qualification <span class="required">*</span></label>
                                                <select class="form-control" name="CandidateHQ" id="CandidateHQ" required>
                                                    <option value="">--- Select ---</option>
                                                   <?php foreach($qualifications as $qualification): ?>
                                                   <option value="<?php echo $qualification['q_id'] ?>"><?php echo $qualification['q_name'] ?></option>
                                                   <?php endforeach; ?>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-md-6 col-sm-12">
                                            <div class="form-group">
                                                <label>Prefered Field <span class="required">*</span></label>
                                               <select class="form-control" name="CanJobCat" id="CanJobCat">
                                                    <option value="">--- Select ---</option>
                                                   <?php foreach($job_categories as $job_category): ?>
                                                   <option  value="<?php echo $job_category['job_cat_id'] ?>"><?php echo $job_category['job_cat_name'] ?></option>
                                                   <?php endforeach; ?>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-md-6 col-sm-12">
                                            <div class="form-group">
                                                <label>Preference 1 <span class="required">*</span></label>
                                                 <select class="form-control" name="CanPreference1" id="CanPreference1" required>
                                                    <option value="">--- Select ---</option>
                                                   <?php foreach($job_designations as $job_designation): ?>
                                                   <option data-foo = "<?php echo $job_designation['ref_cat_id'] ?>" value="<?php echo $job_designation['desig_id'] ?>"><?php echo $job_designation['desig_name'] ?></option>
                                                   <?php endforeach; ?>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-md-6 col-sm-12">
                                            <div class="form-group">
                                                <label>Preference 2 <span class="required"></span></label>
                                                <select class="form-control" name="CanPreference2" id="CanPreference2">
                                                    <option value="">--- Select ---</option>
                                                   <?php foreach($job_designations as $job_designation): ?>
                                                   <option data-foo = "<?php echo $job_designation['ref_cat_id'] ?>" value="<?php echo $job_designation['desig_id'] ?>"><?php echo $job_designation['desig_name'] ?></option>
                                                   <?php endforeach; ?>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-md-6 col-sm-12">
                                            <div class="form-group">
                                                <label>Preference 3 <span class="required"></span></label>
                                                <select class="form-control" name="CanPreference3" id="CanPreference3">
                                                    <option value="">--- Select ---</option>
                                                   <?php foreach($job_designations as $job_designation): ?>
                                                   <option data-foo = "<?php echo $job_designation['ref_cat_id'] ?>" value="<?php echo $job_designation['desig_id'] ?>"><?php echo $job_designation['desig_name'] ?></option>
                                                   <?php endforeach; ?>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-md-6 col-sm-12">
                                            <div class="form-group">
                                                <label>Current Occupation <span class="required">*</span></label>
                                                <input name="curOccupation" type="text" placeholder="" class="form-control" required>
                                            </div>
                                        </div>
                                        <div class="col-md-6 col-sm-12">
                                            <div class="form-group">
                                                <label>Current Organization <span class="required"></span></label>
                                                <input name="curOrganization" type="text" placeholder="" class="form-control">
                                            </div>
                                        </div>
                                        <div class="col-md-6 col-sm-12">
                                            <div class="form-group">
                                                <label>Prefered District <span class="required">*</span></label>
                                                <select class="form-control filterSelect" name="preferDistrict" id="preferDistrict" >
                                                    <option value="">--- Select ---</option>
                                                   <?php foreach($districts as $district): ?>
                                                   <option  value="<?php echo $district['district_id'] ?>"><?php echo $district['district_name'] ?></option>
                                                   <?php endforeach; ?>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-md-6 col-sm-12">
                                            <div class="form-group">
                                                <label>Prefered Location <span class="required">*</span></label>
                                                <select class="form-control" name="preferLocation" id="preferLocation" required>
                                                    <option value="">--- Select ---</option>
                                                   <?php foreach($locations as $location): ?>
                                                   <option data-foo ="<?php echo $location['ref_district_id'] ?>"  value="<?php echo $location['city_id'] ?>" ><?php echo $location['city_name'] ?></option>
                                                   <?php endforeach; ?>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-md-6 col-sm-12">
                                                <div class="input-group image-preview form-group">
                                                    <label>Profile Image: <span class="required"></span></label>
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
                                                <div class="form-group" >
                                                <div style="margin-left:30px">
                                                    <label class="radio">
                                                          <input type="radio" name="gender" value = "male" required>Male
                                                    </label>
                                                    <label class="radio">
                                                          <input type="radio" name="gender" value ="female">Female
                                                    </label>
                                                </div> 
                                                </div>                                       
                                         </div> 
                                                   
                                        <div class="col-md-12 col-sm-12">
                                            <div class="form-group">
                                                <label>About yourSelf <span class="required"></span></label>
                                                <textarea name="description" cols="6" rows="8" placeholder="" class="form-control"></textarea>
                                            </div>
                                        </div>
                                        <div class="col-md-12 col-sm-12">
                                            <button class="btn btn-default pull-right"> Save Profile <i class="fa fa-angle-right"></i></button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>       

        <div class="modal add-resume-modal" tabindex="-1" role="dialog" aria-labelledby="">
            <div class="modal-dialog modal-sm" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                        <h4 class="modal-title" id="myModalLabel">Add New Resume</h4>
                    </div>
                    <div class="modal-body">
                        <div class="form-group">
                            <label>Title <span class="required">*</span></label>
                            <input type="text" placeholder="" class="form-control">
                        </div>
                        <input type="file" class="">
                        <p>Only pdf and doc files are accepted</p>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
                        <a href="#" type="button" class="btn btn-primary">Save Resume</a>
                    </div>
                </div>
            </div>
        </div>

        