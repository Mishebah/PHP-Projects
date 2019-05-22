'campaignID',
            'campaignName', 
            'description',
            'uuid',
            //'campaignType' ,
            //'clientID' ,
            'startDate' ,
            'endDate' ,
            'status' ,
            'entries' ,




            <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
           'campaignID',
            'campaignName', 
            'description',
            'uuid',
            //'campaignType' ,
            //'clientID' ,
            'startDate' ,
            'endDate' ,
            'status' ,
            'entries' ,
        ],
    ]) ?>



























<div class ="row">		
											<div class="col-sm-12">
											<div class="card">
                                    <div class="card-body">
                                        <h4 class="header-title mb-3">More Detetails</h4>
            
                                        <div class="table-responsive">
                                            <table class="table mb-0">
                                                <thead class="thead-light">
                                                <tr>
                                                    <th>Entry point</th>
													<th>Active</th>
                                                    <th>Actions</th>
                                                   
                                                </tr>
                                                </thead>
                                                <tbody>
                                                <tr>
                                                    <td>Facebook</td>
													<td>
                                                            <!-- Switch-->
                                                            <div>
                                                                <input type="checkbox" id="switch1" checked="" data-switch="success">
                                                                <label for="switch1" data-on-label="Yes" data-off-label="No" class="mb-0 d-block"></label>
                                                            </div>
                                                        </td>
                                                    <td>
                                                            <a href="javascript:void(0);" class="action-icon"> <i class="mdi mdi-eye"></i></a>
                                                            <a href="javascript:void(0);" class="action-icon"> <i class="mdi mdi-square-edit-outline"></i></a>
                                                            <a href="javascript:void(0);" class="action-icon"> <i class="mdi mdi-delete"></i></a>
                                                        </td>
                                                </tr>
                                                <tr>
                                                    <td>Custom</td>
																								<td>
                                                            <!-- Switch-->
                                                            <div>
                                                                <input type="checkbox" id="switch1" checked="" data-switch="success">
                                                                <label for="switch1" data-on-label="Yes" data-off-label="No" class="mb-0 d-block"></label>
                                                            </div>
                                                        </td>
                                                    <td>
                                                            <a href="javascript:void(0);" class="action-icon"> <i class="mdi mdi-eye"></i></a>
                                                            <a href="javascript:void(0);" class="action-icon"> <i class="mdi mdi-square-edit-outline"></i></a>
                                                            <a href="javascript:void(0);" class="action-icon"> <i class="mdi mdi-delete"></i></a>
                                                        </td>
                                                </tr>
                                                <tr>
                                                    <td>Instragram</td>
																								<td>
                                                            <!-- Switch-->
                                                            <div>
                                                                <input type="checkbox" id="switch1" checked="" data-switch="success">
                                                                <label for="switch1" data-on-label="Yes" data-off-label="No" class="mb-0 d-block"></label>
                                                            </div>
                                                        </td>
                                                    <td>
                                                            <a href="javascript:void(0);" class="action-icon"> <i class="mdi mdi-eye"></i></a>
                                                            <a href="javascript:void(0);" class="action-icon"> <i class="mdi mdi-square-edit-outline"></i></a>
                                                            <a href="javascript:void(0);" class="action-icon"> <i class="mdi mdi-delete"></i></a>
                                                        </td>
                                                </tr>
                                                <tr>
                                                    <td>Twitter</td>
																								<td>
                                                            <!-- Switch-->
                                                            <div>
                                                                <input type="checkbox" id="switch1" checked="" data-switch="success">
                                                                <label for="switch1" data-on-label="Yes" data-off-label="No" class="mb-0 d-block"></label>
                                                            </div>
                                                        </td>
                                                    <td>
                                                            <a href="javascript:void(0);" class="action-icon"> <i class="mdi mdi-eye"></i></a>
                                                            <a href="javascript:void(0);" class="action-icon"> <i class="mdi mdi-square-edit-outline"></i></a>
                                                            <a href="javascript:void(0);" class="action-icon"> <i class="mdi mdi-delete"></i></a>
                                                        </td>
                                                </tr>
												                                           <tr>
                                                    <td>Paypal</td>
																								<td>
                                                            <!-- Switch-->
                                                            <div>
                                                                <input type="checkbox" id="switch2" checked="" data-switch="success">
                                                                <label for="switch2" data-on-label="Yes" data-off-label="No" class="mb-0 d-block"></label>
                                                            </div>
                                                        </td>
                                                    <td>
                                                            <a href="javascript:void(0);" class="action-icon"> <i class="mdi mdi-eye"></i></a>
                                                            <a href="javascript:void(0);" class="action-icon"> <i class="mdi mdi-square-edit-outline"></i></a>
                                                            <a href="javascript:void(0);" class="action-icon"> <i class="mdi mdi-delete"></i></a>
                                                        </td>
                                                </tr>
                                                </tbody>
                                            </table>
                                        </div>
                                        <!-- end table-responsive -->
            
                                    </div>
                                </div>
								 </div>
										
										</div>