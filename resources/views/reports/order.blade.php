@extends('layouts.master')
@section('content')
<!-- <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.24/css/jquery.dataTables.min.css"/> -->
<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.13.4/css/jquery.dataTables.min.css"/>
<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/buttons/2.3.6/css/buttons.dataTables.min.css"/>
<div class="container-fluid m-2">
		<!-- <button type="button" id="exportButton">Export to Excel</button> -->
		<div class="card py-4">

				<div class="row px-4 mt-2">

				<div class="col-md-1" id="tday2">							
					<label style="font-family:Times New Roman;color:black" >From Date</label>
                </div>

					<div class="col-md-2" id="tday2">							
						<div class="form-group" style="">
							<input type="date"  max="<?php echo  date('Y-m-d'); ?>" data-date-format="yyyy-mm-dd" data-date-viewmode="years" class="form-control from" name="from" id="start_date" autocomplete="off">
						</div>
					</div>
                   
					<div class="col-md-1" id="">							
                    <label  style="font-family:Times New Roman;color:black" >To Date</label>
                    </div>

					<div class="col-md-2" id="tday2">
						<div class="form-group" style="">
						<input type="date" max="<?php echo  date('Y-m-d'); ?>"  data-date-format="yyyy-mm-dd" data-date-viewmode="years" class="form-control to" name="to" id="end_date" autocomplete="off">
						</div>
					</div>

				</div>
				
					<div class="table-responsive text-nowrap mx-1 py-3">
						
					<table class="table" id="dataTable" width="100%" cellspacing="0">
					<thead>
				    <tr>
                    <th>#</th>
                    <th>Order Id</th>
					<th>Name</th>
					<th>Email</th>
					<th>Phone</th>
                    <th>Total Price</th>
					<th>Payment Status <br> Payment Mode</th>
					<th>Status</th>
				    </tr>
							</thead>
						   
							<tbody>
								
							</tbody>
						</table>
					</div>
</div>

<!-- <script src="https://code.jquery.com/jquery-3.5.1.js"></script>
<script src="https://cdn.datatables.net/1.10.24/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/buttons/1.7.0/js/dataTables.buttons.min.js"></script>
<script src="https://cdn.datatables.net/buttons/1.7.0/js/buttons.html5.min.js"></script> -->
<script src="https://code.jquery.com/jquery-3.5.1.js"></script>
<script src="https://cdn.datatables.net/1.13.4/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/buttons/2.3.6/js/dataTables.buttons.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.1.3/jszip.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/pdfmake.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/vfs_fonts.js"></script>
<script src="https://cdn.datatables.net/buttons/2.3.6/js/buttons.html5.min.js"></script>
<script src="https://cdn.datatables.net/buttons/2.3.6/js/buttons.print.min.js"></script>
<script>

$(document).ready(function() {
			
			var table = $('#dataTable').DataTable({
				processing: true,
				serverSide: true,
				"ajax": {
                    "url": "{{secure_url('/report/orders/ajax')}}",
                    "type": "GET",
                    "datatype": "json",
					"data": function(d){
						d.from = $('.from').val();
						d.to = $('.to').val();
					}
                },
				
				columns: [
					{ data: 'id',},
					{ data: 'order_id',orderable:false },
					{ data: 'name',orderable:false  },
					{ data: 'email',orderable:false  },
					{ data: 'phone',orderable:false  },
					{ data: 'total_price',orderable:false  },
                    { data: 'payment',orderable:false  },
					{ data: 'status',orderable:false  },
				],
				dom: 'Bfrtip',
				buttons: [
				 'pdf'
				],
			});

			$('#exportButton').on('click', function() {
               table.button('.buttons-excel').trigger();
            });
			
			$('body').on('change', '.from', function() {
		        table.ajax.reload();
			});

            $('body').on('change', '.to', function() {
		        table.ajax.reload();
			});
			
});

</script>


@endsection
