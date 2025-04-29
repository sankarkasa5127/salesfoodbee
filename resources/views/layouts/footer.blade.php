<footer class="sticky-footer bg-white">
	
    <div class="container my-auto">
        <div class="copyright text-center my-auto">
            <span>Copyright &copy; Foodbee Reservation System 2022</span>
               <!-- <button type="button" class="btn btn-primary clicklmodal" data-toggle="modal" data-target="#pusherModal">
          Launch demo modal
      </button>  -->
        </div>
    </div>
 <!-- Modal -->
<div id="replace_div">
    <div class="modal fade" id="pusherModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true" data-keyboard="false" data-backdrop="static">
        <div class="modal-dialog">
            <div class="modal-content" id="pusherOrderFooter">
            
                   
            </div>
        </div>
    </div>

    </div>
    <?php $user = Session::get('user');?>
    <input type="hidden" name="" id="user" value="<?php echo $user->userId;?>">
</footer>
 <script type="text/javascript">
        $(document).ready(function () {

            var user = $('#user').val();
            // Enable pusher logging - don't include this in production
            Pusher.logToConsole = false;
            var pusher = new Pusher('78bc35691b912f78399d', {
              cluster: 'eu'
            });
            var channel = pusher.subscribe('foodbeeApp');
            channel.bind('NewOrder-'+user, function(data) {
            
            console.log(data);
            var orderId=data.message.orderid;

            var url = '{{secure_url("pusher_popup")}}';
            $.ajax({
            url: url,
            type: "post",
            dataType: 'json',
            data: { 
                  
                    orderId:orderId,
                    },
                success:function(data){
                    console.log(data.html);
                    $('#pusherOrderFooter').html(data.html);
                    // $('#pusherModal').modal('show');
                    $('#pusherModal').modal({backdrop: 'static', keyboard: false}, 'show');
                    var times = 4;
                    //  var loop = setInterval(repeat, 3000); 
                    // function repeat() {
                    // var  audio = new Audio('https://sale.harjassinfotech.org/public/img/OrderReceivedNotification.mp3');
                    // audio.play();
                    // }

                    // repeat();
                    
                },
                 complete: function () {
                    $("#ajax-loader").hide(); //Request is complete so hide spinner
                    $("#card_img").hide(); //Request is complete so hide spinner
                },   
                 error: function (xhr, exception) {
                    console.log()
                 }
                });
            });
        });
    
    </script>

    <script type="text/javascript">
        $(document).ready(function () {
            $('body').on('click', '.clicklmodal', function() {
                    var url = '{{secure_url("pusher_popup")}}';
  $.ajax({
            url: url,
            type: "post",
            dataType: 'json',
            data: { 
                   _token: "{{ csrf_token() }}",
                    orderId:'1673864181',
                    },
                success:function(data){
                    console.log(data.html);
                    $('#pusherOrderFooter').html(data.html);
                    // $('#pusherModal').modal('show');
                    $('#pusherModal').modal({backdrop: 'static', keyboard: false}, 'show');
                    var times = 4;
                    //  var loop = setInterval(repeat, 3000); 
                    // function repeat() {
                    // var  audio = new Audio('https://sale.harjassinfotech.org/public/img/OrderReceivedNotification.mp3');
                    // audio.play();
                    // }

                    // repeat();

                    
                },
                 complete: function () {
                    $("#ajax-loader").hide(); //Request is complete so hide spinner
                    $("#card_img").hide(); //Request is complete so hide spinner
                },   
                 error: function (xhr, exception) {
                    console.log()
                 }
                });

            });
            $('body').on('click', '.odrCancelled', function() {
                $('#remClass2').removeClass('odrAccepted');
                 $(this).text('Please wait ......');
             var status = $(this).attr('data-status'); 
             var id = $(this).attr('data-id'); 
            var url = '{{secure_url("order_status_update")}}';
            $.ajax({
            url: url,
            type: "post",
            async: true,
            data: { 
                    id:id,
                    status:"Cancelled"
                    },
                success:function(data){
                    location.reload();
                  console.log(data);
                },
                 complete: function () {
                    $("#ajax-loader").hide(); //Request is complete so hide spinner
                },   
                 error: function (xhr, exception) {
                    console.log()
                 }
                });
            });

            $('body').on('click', '.odrAccepted', function() {
            $('#remClass').removeClass('odrCancelled');
             $(this).text('Please wait ......');
             var status = $(this).attr('data-status'); 
             var id = $(this).attr('data-id'); 
             var time = $('.timeTrack').val();
             $("#printAreapusher").print();
            var url = '{{secure_url("order_status_update")}}';
           $.ajax({
            url: url,
            type: "post",
            async: true,
            data: { 
                  
                    id:id,
                     time:time,
                    status:"Accepted"
                    },
                success:function(data){
                    location.reload();
                  console.log(data);
                },
                 complete: function () {
                    $("#ajax-loader").hide(); //Request is complete so hide spinner
                },   
                 error: function (xhr, exception) {
                    console.log()
                 }
                });
            });
        });
    
    </script>

<script src="https://cdnjs.cloudflare.com/ajax/libs/jQuery.print/1.6.2/jQuery.print.min.js" integrity="sha512-t3XNbzH2GEXeT9juLjifw/5ejswnjWWMMDxsdCg4+MmvrM+MwqGhxlWeFJ53xN/SBHPDnW0gXYvBx/afZZfGMQ==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>

    <script type="text/javascript">
            $(document).ready(function () {
                 $('body').on('click', '.printData', function() {
                        $("#printArea").print();
                 });
                  $('body').on('click', '.printDatapusher', function() {
                        $("#printAreapusher").print();
                 });
            });
    </script>

