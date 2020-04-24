<div class="clearfix"></div>
<div class="search">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12 col-sm-12 col-xs-12 nopadding">
                    <div class="input-group">
                        <div class="input-group-btn search-panel">
                            <button type="button" class="btn btn-default dropdown-toggle" data-toggle="dropdown"> <span id="search_concept">Filter By</span> <span class="caret"></span> </button>
                            <ul class="dropdown-menu" role="menu">
                                <li><a href="#">By Company</a></li>
                                <li><a href="#">By Function</a></li>
                                <li><a href="#">By City </a></li>
                                <li><a href="#">By Salary </a></li>
                                <li><a href="#">By Industry</a></li>
                            </ul>
                        </div>
                        <input type="hidden" name="search_param" value="all" id="search_param">
                        <input type="text" class="form-control search-field" name="x" placeholder="Search term...">
                        <span class="input-group-btn">
                        <button class="btn btn-default" type="button"><span class="fa fa-search"></span></button>
                        </span> </div>
                </div>
            </div>
        </div>
    </div>
    <section class="main-section parallex">
        <div class="container">
            <div class="row">
                <div class="col-md-10 col-sm-12 col-md-offset-1 col-xs-12 nopadding">
                    <div class="search-form-contaner">
                        <h1 class="search-main-title"> Our talent is finding yours.... </h1>
                        <form class="form-inline" id ="jobSearchForm" method="post" action = "<?php echo base_url(); ?>job/search?status=search">
                            <div class="col-md-3 col-sm-3 col-xs-12 nopadding"></div>
                            <div class="col-md-4 col-sm-4 col-xs-12 nopadding">
                                <div class="form-group">                                    
                                    <input type="text" class="form-control" name="keyword" id="search" placeholder="Search Keyword" value="" required>
                                    <i class="icon-magnifying-glass"></i>
                                </div>
                            </div>  
                            <!--                          
                            <div class="col-md-3 col-sm-3 col-xs-12 nopadding">
                                <div class="form-group">
                                    <select class="select-category form-control">
                                        <option label="Select Option"></option>
                                        <option value="0">Customer Service</option>
                                        <option value="1">Designer</option>
                                        <option value="2">Developer</option>
                                        <option value="3">Finance</option>
                                        <option value="4">Human Resource</option>
                                        <option value="5">Information Technology</option>
                                        <option value="6">Marketing</option>
                                        <option value="7">Others</option>
                                        <option value="8">Sales</option>
                                    </select>
                                </div>
                            </div>
                            
                            <div class="col-md-3 col-sm-3 col-xs-12 nopadding">
                                <div class="form-group">
                                    <select class="select-location form-control">
                                        <option value="">&nbsp;</option>
                                        <option value="0">SriLanka</option>
                                        <option value="1">Australia</option>
                                        <option value="2">Bahrain</option>
                                        <option value="3">Canada</option>
                                        <option value="4">Denmark</option>
                                        <option value="5">Germany</option>
                                    </select>
                                </div>
                            </div>
                        -->
                            <div class="col-md-2 col-sm-2 col-xs-12 nopadding">
                                <div class="form-group form-action">
                                    <button type="submit" id="btnSearchForm" class="btn btn-default btn-search-submit">Search <i class="fa fa-angle-right"></i> </button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>