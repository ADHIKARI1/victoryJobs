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
                                <li class="active">Verify</li>
                            </ol>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <?php 

        if($this->session->flashdata('message')){
                    ?>
                    <div class="alert alert-info text-center">
                        <?php echo $this->session->flashdata('message'); ?>
                    </div>
                    <?php
        }   

         ?>
