<div class="col-md-8 col-sm-8 col-xs-12">
                            <div class="heading-inner first-heading">
                                <p class="title">Resumes on Job's</p>
                            </div>
                            <div class="resume-list">
                                <div class="table-responsive">
                                    <table class="table table-striped">
                                        <thead class="thead-inverse">
                                            <tr>
                                                <th>Sr. #</th>
                                                <th>Applicant Mail</th>
                                                <th>Remove</th>
                                                <th>Delete</th>
                                            </tr>
                                        </thead>
                                        <tbody>

                                            <?php 
                                            $count = 1;
                                            foreach ($resumes as $resume): 
                                            ?>
                                            <tr>
                                                <th scope="row"><?php echo $count;  ?></th>
                                                <td>
                                                    <h5><?php echo  $resume['user_email']; ?></h5></td>
                                                <td><a class="btn btn-primary" href="<?php echo base_url(); ?>uploads/cv/<?php echo  $resume['applied_cv']; ?>"> Download </a></td>
                                                <td><a class="btn btn-danger" href="#"> Delete </a></td>
                                            </tr>      
                                            <?php
                                             $count++;
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