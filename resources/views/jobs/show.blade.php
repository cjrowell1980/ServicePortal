@extends('layouts.app')

@section('content')
    <div class="card">
        <div class="card-header">
            <div class="float-start">View Job - [{{$job->getMachine->stock}}] {{$job->getMachine->make}} {{$job->getMachine->model }}</div>
            <div class="float-end">
                <form action="{{route('jobs.destroy', $job->id)}}" method="POST">
                    @csrf
                    @method('DELETE')
                    <a href="{{route('jobs.index')}}" class="btn btn-sm btn-info"><i class="bi bi-arrow-left"></i> Back</a>
                    @can('edit-job')
                        <a href="{{route('jobs.edit', $job->id)}}" class="btn btn-sm btn-warning"><i class="bi bi-pencil-square"></i> Edit</a>
                    @endcan
                    @can('delete-job')
                        <button type="submit" class="btn btn-sm btn-danger" onclick="return confirm('Are you sure you want to delete this job')"><i class="bi bi-trash"></i> Delete</button>
                    @endcan
                </form>
            </div>
        </div>
        <div class="card-body">
            <div class="row">
                <label for="job_ref" class="col-md-4 col-form-label text-md-end text-start"><strong>Job Number:</strong></label>
                <div class="col-md-6 show-view">
                    {{$job->job_ref}}
                </div>
            </div>
            <div class="row">
                <label for="type" class="col-md-4 col-form-label text-md-end text-start"><strong>Job Type:</strong></label>
                <div class="col-md-6 show-view">
                    {{$job->getType->name}}
                </div>
            </div>
            <div class="row">
                <label for="status" class="col-md-4 col-form-label text-md-end text-start"><strong>Job Status:</strong></label>
                <div class="col-md-6 show-view">
                    <span class="badge rounded-pill bg-{{$job->getStatus->colour}} w-25">{{$job->getStatus->name}}</span>
                </div>
            </div>
            <div class="row">
                <label for="reported" class="col-md-4 col-form-label text-md-end text-start"><strong>Reported Job:</strong></label>
                <div class="col-md-6 show-view">
                    {!!nl2br($job->reported)!!}
                </div>
            </div>
        </div>
    </div>
    <div class="card mt-3">
        <div class="card-header">
            <div class="float-start">Visits</div>
            <div class="float-end"></div>
        </div>
        <div class="card-body">
            <table class="table table-striped table-bordered">
                <thead>
                    <tr>
                        <th scope="col" class="fit-center">#</th>
                        <th scope="col" class="fit-center">Opened</th>
                        <th scope="col" class="fit-center">Updated</th>
                        <th scope="col">Notes</th>
                        <th scope="col" class="fit-center">Flags</th>
                        <th scope="col" class="fit-center">Status</th>
                        <th scope="col" class="fit-center">Action</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td class="fit-center" scope="row">1</td>
                        <td class="fit-center">31 Mar 24</td>
                        <td class="fit-center">1 Apr 24</td>
                        <td>Damaged</td>
                        <td class="fit-center">
                            <span class="badge rounded-pill bg-success" style="width:30px" data-bs-toggle="tooltip" title="Job Sheet">JS</span>
                            <span class="badge rounded-pill bg-danger" style="width:30px" data-bs-toggle="tooltip" title="Photos">PH</span>
                            <span class="badge rounded-pill bg-danger" style="width:30px" data-bs-toggle="tooltip" title="Payable Invoice">PI</span>
                            <span class="badge rounded-pill bg-danger" style="width:30px" data-bs-toggle="tooltip" title="Chargeable Invoice">CI</span>
                        </td>
                        <td class="fit-center">
                            <span class="badge rounded-pill bg-info">Scheduled</span>
                        </td>
                        <td class="fit-center">
                            <a href="#" class="btn btn-sm btn-warning"><i class="bi bi-eye"></i> View</a>
                        </td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>
@endsection

@section('endscript')
    <script>
        $(document).ready(function() {
            $('[data-bs-tooltip="tooltip"]').tooltip();
        });
    </script>

@endsection
