@extends('agent.agent_dashboard') @section('agent')
<div class="page-content">

    <nav class="page-breadcrumb">
        <ol class="breadcrumb">

        </ol>
    </nav>

    <div class="row">
        <div class="col-md-8">
            <div class="card">
                <h5 class="card-title"> Schedule Request Details</h5>
                <form action="{{ route('agent.update.schedule') }}" method="post">
                    @csrf
                    <input type="hidden" name="id" value="{{ $schedule->id }}">
                    <input type="hidden" name="user_email" value="{{ $schedule->user->email }}">
                    <div class="table-responsive pt-3">
                        <table class="table table-bordered">
                            
                            <tbody>
                                <tr>
                                    <td>User Name</td>
                                    <td>{{ $schedule->user->name??'' }}</td>
                                </tr>
                                <tr>
                                    <td>Property Name</td>
                                    <td>{{ $schedule->property->property_name??'' }}</td>
                                </tr>
                                <tr>
                                    <td>Tour Date</td>
                                    <td>{{ $schedule->tour_date??'' }}</td>
                                </tr>
                                <tr>
                                    <td>Tour Time</td>
                                    <td>{{ $schedule->tour_time??'' }}</td>
                                </tr>
                                <tr>
                                    <td>Message</td>
                                    <td>{{ $schedule->message??'' }}</td>
                                </tr>
                                <tr>
                                    <td>Request Time</td>
                                    <td>{{ $schedule->created_at->format('l M d Y')??'' }}</td>
                                </tr>
                               
                            </tbody>
                        </table>
                    </div>
                    
                        <br>
                        <button type="submit" class="btn btn-success">Confirm Request</button>
                        
                    <br><br>
                    
                </form>
            </div>
        </div>
    </div>
</div>

@endsection