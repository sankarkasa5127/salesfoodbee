@extends('layouts.master')
@section('content')
<div class="container-fluid">
	 <div class="col-xl-12 col-md-12 mb-12">
         <table id="example1" class="display table-responcive" >
            <thead>
                <tr>
                    <th>Order id</th>
                    <th>name.</th>
                    <th>Email</th>
                    <th>Phone no</th>
                    <th>order_pick_up</th>
                    <th>order_status</th>
                    <th>payment_mode</th>
                    <th>total_price</th>
                    <th>item_name</th>
                    <th>item_price</th>
                    <th>item_qty</th>
                </tr>
            </thead>
            <tfoot>
                <tr>
                    <th>Order id</th>
                    <th>name.</th>
                    <th>Email</th>
                    <th>Phone no</th>
                    <th>order_pick_up</th>
                    <th>order_status</th>
                    <th>payment_mode</th>
                    <th>total_price</th>
                    <th>item_name</th>
                    <th>item_price</th>
                    <th>item_qty</th>
                </tr>
            </tfoot>
        </table>
    </div>
</div>


@endsection