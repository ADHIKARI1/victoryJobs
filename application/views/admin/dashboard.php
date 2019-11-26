<div class="col-md-8 col-sm-8 col-xs-12">
        <div class="heading-inner first-heading">
            <p class="title">Resumes on Job's</p>
        </div>
            <div class="resume-list">
                <div class="table-responsive">
                                    <table id="TblEmployers" class="table table-striped">
                                        <thead class="thead-inverse">
                                            <tr>
                                                <th>ORG ID. #</th>
                                                <th>Employer Name</th>
                                                <th>Contact Person</th>
                                                <th>Contact No</th>
                                                <th>Contact Email</th>
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

