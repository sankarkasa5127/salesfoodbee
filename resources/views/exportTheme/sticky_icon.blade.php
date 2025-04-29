<style>
.whats-app {
    position: fixed;
    width: 60px;
    height: 60px;
    bottom: 40px;
    right: 15px;
    background-color: #25d366;
    color: #FFF;
    border-radius: 50px;
    text-align: center;
    font-size: 30px;
    box-shadow: 2px 2px 3px #999;
    z-index: 100;
}

.my-float {
    margin-top: 16px;
}
</style>

<form action="{{route('theme_download')}}" method="post">
    @csrf
    <input type="hidden" name="restaurant_id" value="<?php echo $_POST['restaurant_id']; ?>"> 
    <input type="hidden" name="Theme" value="<?php echo $_POST['Theme']; ?>"> 
    <input type="hidden" name="export_id" value="<?php echo $_POST['export_id']; ?>"> 
    <input type="hidden" name="image_name" value="<?php echo $_POST['image_name']; ?>">
    <input type="hidden" name="downloads" value="yes">
    <div >
        <button type="submit"  class="whats-app show_confirm"><i class="fa fa-download" aria-hidden="true"></i></button> 
    </div> 
   
</form>

<script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/2.1.0/sweetalert.min.js"></script>
<script type="text/javascript">
 
     $('.show_confirm').click(function(event) {
          var form =  $(this).closest("form");
          var name = $(this).data("name");
          event.preventDefault();
          swal({
              title: `Are you sure you want to Download this HTML?`,
              text: "",
              icon: "info",
              buttons: true,
              dangerMode: true,
          })
          .then((willDelete) => {
            if (willDelete) {
           
              form.submit();
            }
          });
      });
  
</script>