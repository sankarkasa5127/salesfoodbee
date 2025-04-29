@extends('layouts.master')
@section('content')
<div class="container-fluid">
	 <div class="col-xl-12 col-md-12 mb-12">
                     <table id="example" class="display" >
                        <thead>
                            <tr>
                                <th>Reservation id</th>
                                <th>No_of_person</th>
                                <th>name.</th>
                                <th>Email</th>
                                <th>Phone no</th>
                                <th>Message</th>
                                <th>slot</th>
                                <th>Booking Date</th>
                                <th>status</th>
                            </tr>
                        </thead>
                        <tfoot>
                            <tr>
                                <th>Reservation id</th>
                                <th>No_of_person</th>
                                <th>name.</th>
                                <th>Email</th>
                                <th>Phone no</th>
                                <th>Message</th>
                                <th>slot</th>
                                <th>Booking Date</th>
                                <th>Status</th> 
                            </tr>
                        </tfoot>
                    </table>
                </div>
</div>


@endsection