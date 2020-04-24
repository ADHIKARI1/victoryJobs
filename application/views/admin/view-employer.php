				
                        <!-- <div class="col-md-8 col-sm-8 col-xs-12">
                            <form class="row" id="admin-update-employer" enctype="multipart/form-data">                                
                                        <div class="form-group">
                                            <label>Employer/Organization ID #.</label>
                                            <input name="org-id" type="text" placeholder="Type ID" class="form-control" required>
                                        </div>
                                         <div class="col-md-12 col-sm-12 col-xs-12">
                                        <button   class="btn btn-default pull-right">Get Data<i class="fa fa-angle-right"></i></button>
                                        </div>
                                 
                            </form>
                        </div> -->
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
                                    <form id="admUpdateEmployerForm" enctype="multipart/form-data">
                                    	<div class="col-md-6 col-sm-12">
		                            		<div class="form-group">
		                                        <label>Organization Name <span class="required">*</span></label>
		                                        <input type="text" name="org-name"  id="org-name" tabindex="1" class="form-control" placeholder="Organization" value="<?php echo $organization['org_name']; ?>" required>
                                                <input name="emp-ref-id" id="emp-ref-id" type="hidden" value="<?php echo $organization['ref_emp_id']; ?>">
		                                    </div>
	                                	</div>
	                                	<div class="col-md-6 col-sm-12">
		                                    <div class="form-group">
		                                        <label>Username <span class="required">*</span></label>
		                                        <input type="text" name="username" id ="username"  tabindex="1" class="form-control" placeholder="Username" value="<?php echo $organization['org_username']; ?>" required>
		                                    </div>
                                    	</div>
                                    	<div class="col-md-6 col-sm-12">
		                                    <div class="form-group">
		                                        <label>Phone Number <span class="required">*</span></label>
		                                        <input type="tel" name="phone"  id ="phone" tabindex="1" class="form-control" placeholder="Phone Number" value="<?php echo $organization['org_telephone']; ?>" pattern="[0-9]{10}" required>
		                                    </div>
                                    	</div>
                                    	<div class="col-md-6 col-sm-12">
	                                    <div class="form-group">
	                                        <label>Email Address <span class="required">*</span></label>
	                                        <input type="email" name="email" id="email" tabindex="1" class="form-control" placeholder="Email Address" value="<?php echo $organization['org_email']; ?>" required>
	                                    </div>
                                    	</div>
                                    	
                                         <div class="col-md-6 col-sm-12">
                                            <div class="form-group">
                                                <label>Select Industry <span class="required">*</span></label>
                                                <select class="form-control" name="org-industry" id="org-industry" required>
                                                    <option value="">--- Select ---</option>
                                                   <?php foreach($industries as $industry): ?>
                                                   <option value="<?php echo $industry['ind_id'] ?>" <?php if($industry['ind_id'] == $organization['org_ind_id'])echo "selected"; ?> ><?php echo $industry['ind_name'] ?></option>
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
                                                   <option  value="<?php echo $district['district_id'] ?>" <?php if($district['district_id'] == $organization['org_district_id']) echo "selected"; ?> ><?php echo $district['district_name'] ?></option>
                                                   <?php endforeach; ?>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-md-6 col-sm-12">
                                            <div class="form-group">
                                                <label>Located city <span class="required">*</span></label>
                                                <select class="form-control" name="preferLocation"  required>
                                                    <option value="">--- Select ---</option>
                                                   <?php foreach($locations as $location): ?>
                                                   <option data-foo ="<?php echo $location['ref_district_id'] ?>"  value="<?php echo $location['city_id'] ?>" <?php if($location['city_id'] == $organization['org_city_id'])echo "selected"; ?> ><?php echo $location['city_name'] ?></option>
                                                   <?php endforeach; ?>
                                                </select>
                                            </div>
                                        </div>  
                                        <div class="col-md-12 col-sm-12">
                                            <div class="form-group">
                                                <label>Address <span class="required">*</span></label>
                                                <input name="address" id = "address" type="text" placeholder="Address" class="form-control"  value="<?php echo $organization['org_address']; ?>" required>
                                            </div>
                                        </div> 
                                        <div class="col-md-6 col-sm-12">
                                            <div class="form-group">
                                                <label>Contact Person <span class="required"></span></label>
                                                <input name="contact-person" id ="contact-person" type="text" placeholder="Contact Person" class="form-control" value="<?php echo $organization['org_contact_person']; ?>" required>
                                            </div>
                                        </div>                                  
                                        <div class="col-md-6 col-sm-12">
                                            <div class="form-group">
                                                <label>Mobile <span class="required"></span></label>
                                                <input name="mobile" id="mobile" pattern="[0-9]{10}" type="tel" placeholder="Mobile" value="<?php echo $organization['org_mobile']; ?>" class="form-control">
                                            </div>
                                        </div>    
                                        <div class="col-md-6 col-sm-12">
                                            <div class="form-group">
                                                <label>Office Email <span class="required"></span></label>
                                                <input name="office-email" id ="office-email"  type="email" placeholder="Email" value="<?php echo $organization['contact_email']; ?>" class="form-control">
                                            </div>
                                        </div>                                                                                                      
                                         <div class="col-md-6 col-sm-12">
                                            <div class="form-group">
                                                <label>No of Vacancies  <span class="required">*</span></label>
                                                <input name="no-of-vacancy" id="no-of-vacancy" type="number" placeholder="Vacancies" class="form-control" value="<?php echo $organization['no_of_vacancies']; ?>" required>
                                            </div>
                                        </div>                                      
                                        <div class="col-md-6 col-sm-12">
                                                <div class="input-group image-preview form-group">
                                                    <label>Company Logo: <span class="required"></span></label>                                                
                                                        <input type="file" accept="file_extension" name="input-file-preview" id ="input-file-preview" value="<?php echo $organization['org_logo']; ?>" />   
                                                        <input name="old-logo" id="old-logo" type="hidden" value="<?php echo $organization['org_logo']; ?>">                                         
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

        
        