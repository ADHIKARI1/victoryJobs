        <section class="job-breadcrumb">
            <div class="container">
                <div class="row">
                    <div class="col-md-6 col-sm-7 co-xs-12 text-left">
                        <h3>Registration Page</h3>
                    </div>
                    <div class="col-md-6 col-sm-5 co-xs-12 text-right">
                        <div class="bread">
                            <ol class="breadcrumb">
                                <li><a href="#">Home</a></li>
                                <li class="active">Registeration</li>
                            </ol>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        
<section class="login-page light-blue">
    <div class="container">
    <h1 class="page-header text-center">Create Account</h1>
    <div class="row">        
        
        <div class="col-md-6 col-md-offset-3">
            <div id="responseDiv" class="alert text-center" style="margin-top:20px; display:none;">
                <button type="button" class="close" id="clearMsg"><span aria-hidden="true">&times;</span></button>
                <span id="message"></span>
            </div>             
                <div class="panel panel-login">
                    <div class="panel-heading">
                        <div class="row">
                            <div class="col-xs-6">
                                <a href="#"  id="EmployeeRegForm-link">RECRUITER</a>
                            </div>
                            <div class="col-xs-6">
                                <a href="#" class="active" id="CandidateRegForm-link">CANDIDATE</a>
                            </div>
                        </div>
                        <hr>
                    </div>
                    <div class="panel-body">
                        <div class="row">
                            <div class="col-lg-12">                                                              
                                <form id="CandidateRegForm"  method="post" role="form" style="display: block;" enctype="multipart/form-data">
                                    <div class="form-group">
                                        <label>DISPLAY NAME: <span class="required">*</span></label>
                                        <input type="text" name="fullname" id="username" tabindex="1" class="form-control" placeholder="Display Name" value="" required>
                                    </div>
                                    <div class="form-group">
                                        <label>EMAIL ADDRESS: <span class="required">*</span></label>
                                        <input type="email" name="email" id="email" tabindex="1" class="form-control" placeholder="Email Address" value="" required>
                                    </div>
                                    <div class="form-group">
                                        <label>PASSWORD: <span class="required">*</span></label>
                                        <input type="password" name="password" id="password" tabindex="2" class="form-control" placeholder="Password" required>
                                    </div>
                                    <div class="form-group">
                                        <label>CONFIRM PASSWORD: <span class="required">*</span></label>
                                        <input type="password" name="confirm_password" id="confirm-password" tabindex="2" class="form-control" placeholder="Confirm Password" required>
                                    </div>
                                    <div class="form-group">
                                        <label>UPLOAD YOUR CV: <span class="required">*</span></label>
                                        <input  type="file" id="attachment" tabindex="2" class="form-control" name="attachment" size="33" required/>
                                    </div>  
                                    <div class="form-group">
                                        <div class="row">
                                            <div class="col-sm-6 col-sm-offset-3">
                                                <input type="submit" name="register-submit" id="regSubmitBtn" tabindex="4" class="form-control btn btn-register" value="Register Now">
                                            </div>
                                        </div>
                                    </div>
                                </form>
                                <form id="EmployeeRegForm"  method="post" role="form" style="display: none;">
                                    <div class="form-group">
                                        <label>ORGANIZATION NAME: <span class="required">*</span></label>
                                        <input type="text" name="org-name"  tabindex="1" class="form-control" placeholder="Organization" value="" required>
                                    </div>
                                    <div class="form-group">
                                        <label>USERNAME: <span class="required">*</span></label>
                                        <input type="text" name="username"  tabindex="1" class="form-control" placeholder="Username" value="" required>
                                    </div>
                                    <div class="form-group">
                                        <label>PHONE NUMBER: <span class="required">*</span></label>
                                        <input type="tel" name="phone"  tabindex="1" class="form-control" placeholder="Phone Number" value="" pattern="[0-9]{10}" required>
                                    </div>
                                    <div class="form-group">
                                        <label>EMAIL ADDRESS: <span class="required">*</span></label>
                                        <input type="email" name="email" id="email" tabindex="1" class="form-control" placeholder="Email Address" value="" required>
                                    </div>
                                    <div class="form-group">
                                        <label>PASSWORD: <span class="required">*</span></label>
                                        <input type="password" name="password" id="password" tabindex="2" class="form-control" placeholder="Password" required>
                                    </div>
                                    <div class="form-group">
                                        <label>CONFIRM PASSWORD: <span class="required">*</span></label>
                                        <input type="password" name="confirm-password" id="confirm-password" tabindex="2" class="form-control" placeholder="Confirm Password" required>
                                    </div>
                                    <div class="form-group">
                                        <label>ORGANIZATION LOGO: </label>
                                        <input  type="file" id="logo" tabindex="2" class="form-control" name="logo" size="33" />
                                    </div>  
                                    <div class="form-group">
                                        <div class="row">
                                            <div class="col-sm-6 col-sm-offset-3">
                                                <input type="submit" name="register-submit" id="employer-submit" tabindex="4" class="form-control btn btn-register" value="Register Now">
                                            </div>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
       
    </div>
    </div>
</section>