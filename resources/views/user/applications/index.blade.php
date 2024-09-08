<div class="tab-pane fade show active" id="applied-jobs" role="tabpanel" aria-labelledby="profile-tab">
    <!-- Profile content here -->
    <div class="card">
        <div class="card-header">
            Applied Jobs
        </div>
        <div class="card-body">
            <table class="table text-center">
                <thead>
                <tr>
                    <th scope="col">SL</th>
                    <th scope="col">Job Title:</th>
                    <th scope="col">Job Type:</th>
                    <th scope="col">Job posted:</th>
                    <th scope="col">Status:</th>
                    <th scope="col">Action:</th>
                </tr>
                </thead>
                <tbody>
                <!-- Static Example Data -->
                <tr>
                    <th scope="row">1</th>
                    <td width="25%">Software Developer</td>
                    <td><span class="badge badge-secondary">Full-time</span></td>
                    <td><span class="badge badge-info">2 days ago</span></td>
                    <td>
                        <a class="badge badge-lg badge-success text-white" href="#">Active</a>
                    </td>
                    <td width="20%">
                        &nbsp;<a class="btn btn-success btn-sm" href="#">View</a>
                        &nbsp;<button class="btn btn-sm btn-danger" data-toggle="modal" data-target="#jobDelete-1" type="button">Delete</button>

                        <!-- Delete modal -->
                        <div class="modal fade" id="jobDelete-1" data-backdrop="static" data-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel-1" aria-hidden="true">
                            <div class="modal-dialog modal-dialog-centered">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title text-center" id="staticBackdropLabel-1">Job Title : Software Developer</h5>
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                        </button>
                                    </div>
                                    <div class="modal-body text-center">
                                        <h4>Do you want to delete?</h4>
                                    </div>
                                    <form action="#" method="POST">
                                        @csrf
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
                                            <button type="submit" class="btn btn-danger">Delete</button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </td>
                </tr>
                <!-- Static Example Data End -->
                <!-- Add more static rows as needed -->
                </tbody>
            </table>
        </div>
    </div>
</div>
