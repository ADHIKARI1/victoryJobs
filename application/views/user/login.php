<section class="job-breadcrumb">
    <div class="container">
            <div class="row">
                    <div class="col-md-6 col-sm-7 co-xs-12 text-left">
                        <h3>Login Page</h3>
                    </div>
                    <div class="col-md-6 col-sm-5 co-xs-12 text-right">
                        <div class="bread">
                            <ol class="breadcrumb">
                                <li><a href="#">Home</a></li>
                                <li class="active">Sign In</li>
                            </ol>
                        </div>
                    </div>
            </div>
    </div>
</section>
<section class="login-page light-blue">
            <div class="container">
                <div class="row">
                    <?php 

                        if($this->session->flashdata('message')){
                                    ?>
                                    <div id="flashMessage" class="alert alert-info text-center">
                                        <?php echo $this->session->flashdata('message'); ?>
                                    </div>
                                    <?php
                        }

                    ?>

                    <div class="col-md-12 col-sm-12 col-xs-12">
                        <div id="lresponseDiv" class="alert text-center" style="margin-top:20px; display:none;">
                            <button type="button" class="close" id="lclearMsg"><span aria-hidden="true">&times;</span></button>
                            <span id="lmessage"></span>
                        </div>  
                        <div class="login-container">
                            <div class="loginbox">
                            <div class="loginbox-title">Sign In Here</div>   
                            <form id="logForm">  
                            <fieldset>                           
                                <div class="form-group">
                                    <label>Email: <span class="required">*</span></label>
                                    <input name="lemail" placeholder="" class="form-control" type="email" required>
                                </div>
                                <div class="form-group">
                                    <label>Password: <span class="required">*</span></label>
                                    <input name="lpassword" placeholder="" class="form-control" type="password" required>
                                </div>                                
                                <div class="loginbox-submit">
                                   <button type="submit" class="btn btn-lg btn-primary btn-block"><span id="logText"></span></button>
                                </div>
                                <div class="loginbox-forgot">
                                    <a href="#">Forgot Password?</a>
                                </div>
                                <div class="loginbox-signup">
                                    <a href="<?php echo base_url(); ?>candidate/register">Sign Up With an Email?</a>
                                </div>
                            </fieldset>
                            </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
