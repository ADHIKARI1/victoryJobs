				

                        <div class="col-md-8 col-sm-8 col-xs-12">
                            <div id="responseDiv" class="alert text-center" style="margin-top:20px; display:none;">
                                <button type="button" class="close" id="clearMsg"><span aria-hidden="true">&times;</span></button>
                                <span id="message"></span>
                            </div>  
                            <div class="heading-inner first-heading">
                                <p class="title">Create Profile</p>
                            </div>
                            
                            <div class="col-md-12 col-sm-12 col-xs-12 nopadding">
                                <div class="profile-edit row">
                                    <form id="admCreateProfileForm" enctype="multipart/form-data">
                                    	<div class="col-md-6 col-sm-12">
		                            		<div class="form-group">
		                                        <label>Organization Name <span class="required">*</span></label>
		                                        <input type="text" name="org-name"  tabindex="1" class="form-control" placeholder="Organization" value="" required>
		                                    </div>
	                                	</div>
	                                	<div class="col-md-6 col-sm-12">
		                                    <div class="form-group">
		                                        <label>Username <span class="required">*</span></label>
		                                        <input type="text" name="username"  tabindex="1" class="form-control" placeholder="Username" value="" required>
		                                    </div>
                                    	</div>
                                    	<div class="col-md-6 col-sm-12">
		                                    <div class="form-group">
		                                        <label>Phone Number <span class="required">*</span></label>
		                                        <input type="tel" name="phone"  tabindex="1" class="form-control" placeholder="Phone Number" value="" pattern="[0-9]{10}" required>
		                                    </div>
                                    	</div>
                                    	<div class="col-md-6 col-sm-12">
	                                    <div class="form-group">
	                                        <label>Email Address <span class="required">*</span></label>
	                                        <input type="email" name="email" id="email" tabindex="1" class="form-control" placeholder="Email Address" value="" required>
	                                    </div>
                                    	</div>
                                    	<div class="col-md-6 col-sm-12">
	                                    <div class="form-group">
	                                        <label>Password <span class="required">*</span></label>
	                                        <input type="password" name="password" id="password" tabindex="2" class="form-control" placeholder="Password" required>
	                                    </div>
                                    	</div>
                                    	<div class="col-md-6 col-sm-12">
	                                    <div class="form-group">
	                                        <label>Confirm Password <span class="required">*</span></label>
	                                        <input type="password" name="confirm-password" id="confirm-password" tabindex="2" class="form-control" placeholder="Confirm Password" required>
	                                    </div>
	                                 	</div>
                                         <div class="col-md-6 col-sm-12">
                                            <div class="form-group">
                                                <label>Select Industry <span class="required">*</span></label>
                                                <select class="form-control" name="org-industry" id="org-industry" required>
                                                    <option value="">--- Select ---</option>
                                                   <?php foreach($industries as $industry): ?>
                                                   <option value="<?php echo $industry['ind_id'] ?>"><?php echo $industry['ind_name'] ?></option>
                                                   <?php endforeach; ?>
                                                </select>
                                            </div>
                                        </div>  
                                        <div class="col-md-6 col-sm-12">
                                            <div class="form-group">
                                                <label>Located District <span class="required">*</span></label>
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
                                                <label>Located city <span class="required">*</span></label>
                                                <select class="form-control" name="preferLocation" id="preferLocation" required>
                                                    <option value="">--- Select ---</option>
                                                   <?php foreach($locations as $location): ?>
                                                   <option data-foo ="<?php echo $location['ref_district_id'] ?>"  value="<?php echo $location['city_id'] ?>" ><?php echo $location['city_name'] ?></option>
                                                   <?php endforeach; ?>
                                                </select>
                                            </div>
                                        </div>  
                                        <div class="col-md-12 col-sm-12">
                                            <div class="form-group">
                                                <label>Address <span class="required">*</span></label>
                                                <input name="address" type="text" placeholder="Address" class="form-control" required>
                                            </div>
                                        </div> 
                                        <div class="col-md-6 col-sm-12">
                                            <div class="form-group">
                                                <label>Contact Person <span class="required"></span></label>
                                                <input name="contact-person" type="text" placeholder="Contact Person" class="form-control" required>
                                            </div>
                                        </div>                                  
                                        <div class="col-md-6 col-sm-12">
                                            <div class="form-group">
                                                <label>Mobile <span class="required"></span></label>
                                                <input name="mobile" pattern="[0-9]{10}" type="tel" placeholder="Mobile" class="form-control">
                                            </div>
                                        </div>    
                                        <div class="col-md-6 col-sm-12">
                                            <div class="form-group">
                                                <label>Office Email <span class="required"></span></label>
                                                <input name="office-email"  type="email" placeholder="Email" class="form-control">
                                            </div>
                                        </div>                                                                                                      
                                         <div class="col-md-6 col-sm-12">
                                            <div class="form-group">
                                                <label>No of Vacancies  <span class="required">*</span></label>
                                                <input name="no-of-vacancy" type="number" placeholder="Vacancies" class="form-control" required>
                                            </div>
                                        </div>                                      
                                        <div class="col-md-6 col-sm-12">
                                                <div class="input-group image-preview form-group">
                                                    <label>Company Logo: <span class="required"></span></label>
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

        