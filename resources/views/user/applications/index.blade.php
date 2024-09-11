<div class="tab-pane fade show active" id="applied-jobs" role="tabpanel" aria-labelledby="profile-tab">
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
                @foreach ($applications as $key => $application)
                    <tr>
                        <th scope="row">{{ $key + 1 }}</th>
                        <td width="25%">{{ $application->job->title }}</td>
                        <td><span class="badge badge-secondary">{{ $application->job->type }}</span></td>
                        <td><span class="badge badge-info">{{ $application->job->created_at->diffForHumans() }}</span></td>
                        <td>
                            <a class="badge badge-lg badge-success text-white" href="#">Active</a> <!-- Statü burada dinamik olabilir -->
                        </td>
                        <td width="20%">
                            &nbsp;<a class="btn btn-success btn-sm" href="{{ route('user.application.show', $application->id) }}">View</a>
                            &nbsp;<button class="btn btn-sm btn-danger" data-toggle="modal" data-target="#jobDelete-{{ $application->id }}" type="button">Delete</button>

                            <!-- Delete modal -->
                            <div class="modal fade" id="jobDelete-{{ $application->id }}" data-backdrop="static" data-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel-{{ $application->id }}" aria-hidden="true">
                                <div class="modal-dialog modal-dialog-centered">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title text-center" id="staticBackdropLabel-{{ $application->id }}">Job Title : {{ $application->job->title }}</h5>
                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                <span aria-hidden="true">&times;</span>
                                            </button>
                                        </div>
                                        <div class="modal-body text-center">
                                            <h4>Do you want to delete?</h4>
                                        </div>
                                        <form action="{{ route('user.application.destroy', $application->id) }}" method="POST">
                                            @csrf
                                            @method('DELETE')
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
                @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>
