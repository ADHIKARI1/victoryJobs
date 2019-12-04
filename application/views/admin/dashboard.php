<div class="col-md-8 col-sm-8 col-xs-12">
        <div class="heading-inner first-heading">
            <p class="title">All Registered Employers.</p>
        </div>
            <div class="resume-list">
                <div class="table-responsive">
                                    <table id="TblEmployers" class="table table-striped">
                                        <thead class="thead-inverse">
                                            <tr>
                                                <th scope="col">ORG ID. #</th>
                                                <th scope="col">Employer Name</th>
                                                <th scope="col">Contact Person</th>
                                                <th scope="col">Contact No</th>
                                                <th scope="col">Contact Email</th>
                                                <th scope="col"></th>
                                                <!-- <th>Delete</th> -->
                                            </tr>
                                        </thead>
                                        <tbody>

                                            <?php                                            
                                            foreach ($employers as $employer): 
                                            ?>
                                            <tr>
                                                <td scope="row"><?php echo $employer['org_id'];  ?></td>                                                
                                                <td>
                                                    <?php echo  $employer['org_name']; ?>
                                                </td>
                                                <td>
                                                    <?php echo  $employer['org_username']; ?>
                                                </td>
                                                <td>
                                                    <?php echo  $employer['org_telephone']; ?>
                                                </td>
                                                <td>
                                                    <?php echo  $employer['org_email']; ?>
                                                </td>
                                                <td>
                                                    <div class="bs-component">
                                                        <a href="<?php echo site_url('admin/view_employer/'.$employer['ref_org_id']); ?>"
                                                           class="btn btn-primary btn-block" data-toggle="tooltip" data-placement="bottom"
                                                           title="" data-original-title="Click to view ">View</a>
                                                    </div>
                                                </td>
                                                <!-- <td><a class="btn btn-danger" href="#"> Delete </a></td> -->
                                            </tr>      
                                            <?php                                             
                                             endforeach; 
                                             ?>                                      
                                        </tbody>
                                    </table>
            </div>
        </div>
</div>


                </div>
            </div>
        </div>
</section>   

