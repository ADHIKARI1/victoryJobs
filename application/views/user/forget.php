<section class="job-breadcrumb">
    <div class="container">
            <div class="row">
                    <div class="col-md-6 col-sm-7 co-xs-12 text-left">
                        <h3>Forget Password</h3>
                    </div>
                    <div class="col-md-6 col-sm-5 co-xs-12 text-right">
                        <div class="bread">
                            <ol class="breadcrumb">
                                <li><a href="#">Home</a></li>
                                <li class="active">Forget Password</li>
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

                        /*if($this->session->flashdata('message')){
                                    ?>
                                    <div id="flashMessage" class="alert alert-info text-center">
                                        <?php echo $this->session->flashdata('message'); ?>
                                    </div>
                                    <?php
                        }*/

                    ?>

                    <div class="col-md-12 col-sm-12 col-xs-12">
                        <div id="lresponseDiv" class="alert text-center" style="margin-top:20px; display:none;">
                            <button type="button" class="close" id="lclearMsg"><span aria-hidden="true">&times;</span></button>
                            <span id="lmessage"></span>
                        </div>  
                        <div class="login-container">
                            <div class="loginbox">
                            <div class="loginbox-title">Please Enter Your Email Address :</div>   
                            <form id="forgetForm">  
                                <fieldset>                           
                                    <div class="form-group">
                                        <label>Email: <span class="required">*</span></label>
                                        <input name="lemail" placeholder="" class="form-control" type="email" required>
                                    </div>
                                                                 
                                    <div class="loginbox-submit">
                                       <button type="submit" id="btnForgetForm" class="btn btn-lg btn-primary btn-block"><span >RESET PASSWORD</span></button>
                                    </div>
                                    
                                </fieldset>
                            </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>