<div class="tab-pane fade" id="saved-jobs" role="tabpanel" aria-labelledby="saved-jobs-tab">
    <div class="card">
        <div class="card-header">
            Saved Jobs
        </div>
        <div class="card-body">
            <table class="table text-center">
                <thead>
                <tr>
                    <th scope="col">SL</th>
                    <th scope="col">Job Title:</th>
                    <th scope="col">Job Type:</th>
                    <th scope="col">Job posted:</th>
                    <th scope="col">Action:</th>
                </tr>
                </thead>
                <tbody>
                @foreach ($savedJobs as $key => $job)
                    <tr>
                        <th scope="row">{{ $key + 1 }}</th>
                        <td width="25%">{{ $job->title }}</td>
                        <td><span class="badge badge-secondary">{{ $job->type }}</span></td>
                        <td><span class="badge badge-info">{{ $job->created_at->diffForHumans() }}</span></td>
                        <td width="20%">
                            &nbsp;<a class="btn btn-success btn-sm" href="{{ route('jobs.show', $job->id) }}">View</a>
                            &nbsp;<button class="btn btn-sm btn-danger" data-toggle="modal" data-target="#jobUnsave-{{ $job->id }}" type="button">Unsave</button>

                            <!-- Unsave modal -->
                            <div class="modal fade" id="jobUnsave-{{ $job->id }}" data-backdrop="static" data-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel-{{ $job->id }}" aria-hidden="true">
                                <div class="modal-dialog modal-dialog-centered">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title text-center" id="staticBackdropLabel-{{ $job->id }}">Job Title : {{ $job->title }}</h5>
                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                <span aria-hidden="true">&times;</span>
                                            </button>
                                        </div>
                                        <div class="modal-body text-center">
                                            <h4>Do you want to unsave this job?</h4>
                                        </div>
                                        <form action="{{ route('user.unsaveJob', $job->id) }}" method="POST">
                                            @csrf
                                            @method('DELETE')
                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
                                                <button type="submit" class="btn btn-danger">Unsave</button>
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
