<div class="col-md-8 col-sm-8 col-xs-12">
        <div class="heading-inner first-heading">
            <p class="title">All Job Posts.</p>
        </div>
            <div class="resume-list">
                <div class="table-responsive">
                                    <table id="TblEmployers" class="table table-striped">
                                        <thead class="thead-inverse">
                                            <tr>
                                                <th scope="col">POST ID. #</th>
                                                <th scope="col">Title</th>                                                
                                                <th scope="col">Type</th>
                                                <th scope="col">Organization Name</th>  
                                                <th scope="col">Create Date</th>   
                                                <th scope="col">Expire Date</th> 
                                                <th scope="col"></th>                                              
                                                <!-- <th>Delete</th> -->
                                            </tr>
                                        </thead>
                                        <tbody>

                                            <?php                                            
                                            foreach ($jobs as $job): 
                                            ?>
                                            <tr>
                                                <td><?php echo $job['post_id'];  ?></td>                                                
                                                <td>
                                                    <?php echo  $job['post_title']; ?>
                                                </td>
                                                <td>
                                                    <?php echo  $job['type_name']; ?>
                                                </td>
                                                <td>
                                                    <?php echo  $job['org_name']; ?>
                                                </td>
                                                <td>
                                                    <?php echo  $job['date_created']; ?>
                                                </td>
                                                <td>
                                                    <?php echo  $job['post_expire_date']; ?>
                                                </td>
                                                <td>
                                                    <div class="bs-component">
                                                        <a href="<?php echo site_url('admin/view_post/'.$job['post_id']); ?>"
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

