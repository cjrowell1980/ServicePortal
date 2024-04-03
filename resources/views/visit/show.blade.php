@extends('layouts.app')

@section('content')
    <div class="card">
        <div class="card-header">
            <div class="float-start">Job Visit - {{$visit->getJob->job_ref}} - {{$visit->getJob->getMachine->getCustomer->name}} - {{$visit->getJob->getMachine->make}} {{$visit->getJob->getMachine->model}}</div>
            <div class="float-end">
                <form action="{{route('visit.destroy', $visit->id)}}" method="POST">
                    @csrf
                    @method('DELETE')
                    <a href="{{route('jobs.show', $visit->job)}}" class="btn btn-sm btn-info"><i class="bi bi-arrow-left"></i> Back</a>
                    @can('edit-visit')
                        <a href="{{route('visit.edit', $visit->id)}}" class="btn btn-sm btn-warning"><i class="bi bi-pencil-square"></i> Edit</a>
                    @endcan
                    @can('delete-visit')
                        <button type="submit" class="btn btn-sm btn-danger" onclick="return confirm('Are you sure you want to delete this visit')"><i class="bi bi-trash"></i> Delete</button>
                    @endcan
                </form>
            </div>
        </div>
        <div class="card-body">
            <div class="row mb-1">
                <label for="status" class="col-md-4 col-form-label text-md-end text-start"><strong>Status:</strong></label>
                <div class="col-md-6 show-view">
                    <span class="badge rounded-pill bg-{{$visit->getStatus->colour}} w-25">{{$visit->getStatus->name}}</span>
                </div>
            </div>
            <div class="row mb-1">
                <label for="" class="col-md-4 col-form-label text-md-end text-start"><strong>Flags:</strong></label>
                <div class="col-md-6 show-view">
                    <span class="badge rounded-pill bg-{{($visit->js) ? 'success' : 'danger'}}" style="width:20%">Job Sheet</span>
                    <span class="badge rounded-pill bg-{{($visit->ph) ? 'success' : 'danger'}}" style="width:20%;">Photos</span>
                    <span class="badge rounded-pill bg-{{($visit->pi) ? 'success' : 'danger'}}" style="width:20%;">Payable Invoice</span>
                    <span class="badge rounded-pill bg-{{($visit->ci) ? 'success' : 'danger'}}" style="width:20%;">Chargeable Invoice</span>
                </div>
            </div>
            <div class="row mb-1">
                <label for="getJob->reported" class="col-md-4 col-form-label text-md-end text-start"><strong>Reported Fault:</strong></label>
                <div class="col-md-6 show-view border">
                    {!!nl2br($visit->getJob->reported)!!}
                </div>
            </div>
            <div class="row mb-1">
                <label for="notes" class="col-md-4 col-form-label text-md-end text-start"><strong>Notes:</strong></label>
                <div class="col-md-6 show-view border">
                    {!!nl2br($visit->notes)!!}
                </div>
            </div>
            <div class="row mb-1">
                <label for="engineer" class="col-md-4 col-form-label text-md-end text-start"><strong>Engineer:</strong></label>
                <div class="col-md-6 show-view">
                    @if ($visit->engineer != null)
                        @php
                            $subject = $visit->getJob->job_ref . ' ' . $visit->getJob->getMachine->getCustomer->name . ' ' . $visit->getJob->getMachine->model;
                            $body = $visit->getJob->getMachine->serial.'%0D%0A'.$visit->getJob->reported;
                        @endphp
                        <div class="float-start">{{$visit->getEngineer->long}}</div>
                        <div class="float-end"><a href="mailto:{{$visit->getEngineer->email}}?subject={{$subject}}&body={{$body}}" class="btn btn-sm btn-info"><i class="bi bi-envelope-at"></i> Send eMail</a></div>
                    @endif
                </div>
            </div>
            <div class="row">
                <label for="" class="col-md-4 col-form-label text-md-end text-start"><strong>Visit Report:</strong></label>
                <div class="col-md-6 show-view border">
                    {{$visit->report}}
                </div>
            </div>
        </div>
    </div>
@endsection
