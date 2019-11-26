
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
                                    <form id="empUpdateProfileForm" enctype="multipart/form-data">
                                         <div class="col-md-6 col-sm-12">
                                            <div class="form-group">
                                                <label>Select Industry <span class="required">*</span></label>
                                                <select class="form-control" name="org-industry" id="org-industry" required>                                                    
                                                   <?php foreach($industries as $industry): ?>
                                                   <option value="<?php echo $industry['ind_id'] ?>" <?php if($industry['ind_id'] == $organization['org_ind_id'])echo "selected"; ?>><?php echo $industry['ind_name'] ?></option>
                                                   <?php endforeach; ?>
                                                </select>
                                            </div>
                                        </div>  
                                        <div class="col-md-6 col-sm-12">
                                            <div class="form-group">
                                                <label>Located District <span class="required">*</span></label>
                                                <select class="form-control filterSelect" name="preferDistrict" id="preferDistrict" >                                                    
                                                   <?php foreach($districts as $district): ?>
                                                   <option  value="<?php echo $district['district_id'] ?>" <?php if($district['district_name'] == $organization['org_district_id'])echo "selected"; ?>><?php echo $district['district_name'] ?></option>
                                                   <?php endforeach; ?> 
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-md-6 col-sm-12">
                                            <div class="form-group">
                                                <label>Located city <span class="required">*</span></label>
                                                <select class="form-control" name="preferLocationN" id="preferLocationN" required>                                                    
                                                   <?php foreach($locations as $location): ?>
                                                   <option value="<?php echo $location['city_id'] ?>" <?php if($location['city_id'] == $organization['org_city_id'])echo "selected"; ?> ><?php echo $location['city_name'] ?></option>
                                                   <?php endforeach; ?>
                                                </select>
                                            </div>
                                        </div>  
                                        <div class="col-md-12 col-sm-12">
                                            <div class="form-group">
                                                <label>Address <span class="required">*</span></label>
                                                <input name="address" type="text" placeholder="Address" class="form-control" value="<?php echo $organization['org_address']; ?>" required>
                                            </div>
                                        </div> 
                                        <div class="col-md-6 col-sm-12">
                                            <div class="form-group">
                                                <label>Contact Person <span class="required"></span></label>
                                                <input name="contact-person" type="text" placeholder="Contact Person" class="form-control" value="<?php echo $organization['org_contact_person']; ?>" required>
                                            </div>
                                        </div>                                  
                                        <div class="col-md-6 col-sm-12">
                                            <div class="form-group">
                                                <label>Mobile <span class="required"></span></label>
                                                <input name="mobile" pattern="[0-9]{10}" type="tel" placeholder="Mobile" class="form-control" value="<?php echo $organization['org_mobile']; ?>">
                                            </div>
                                        </div>    
                                        <div class="col-md-6 col-sm-12">
                                            <div class="form-group">
                                                <label>Office Email <span class="required"></span></label>
                                                <input name="office-email"  type="email" placeholder="Email" class="form-control" value ="<?php echo $organization['contact_email']; ?>">
                                            </div>
                                        </div>                                                                                                      
                                         <div class="col-md-6 col-sm-12">
                                            <div class="form-group">
                                                <label>No of Vacancies  <span class="required">*</span></label>
                                                <input name="no-of-vacancy" type="number" placeholder="Vacancies" class="form-control" value="<?php echo $organization['no_of_vacancies']; ?>" required>
                                            </div>
                                        </div>                                      
                                        <div class="col-md-6 col-sm-12">
                                                <div class="input-group image-preview form-group">
                                                    <label>Company Logo: <span class="required"></span></label>
                                                    <input type="text" placeholder="Upload Profile Image" class="form-control image-preview-filename" value="<?php echo $organization['org_logo']; ?>" disabled="disabled">
                                                    <span class="input-group-btn">
                                                    <button type="button" class="btn btn-default image-preview-clear" style="display:none;">
                                                    <span class="glyphicon glyphicon-remove"></span> Clear
                                                    </button>
                                                    <div class="btn btn-default image-preview-input">
                                                        <span class="glyphicon glyphicon-folder-open"></span>
                                                        <span class="image-preview-input-title">Browse</span>
                                                        <input type="file" accept="file_extension" name="input-file-preview" value="<?php echo $organization['org_logo']; ?>"/>
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

        
        