<?php 
    $status_edit = (isset($_GET['action']) && $_GET['action'] == 'edit')?true:false;
    if($status_edit){
        $event_id = $_GET['post'];
        $start_date_edit = get_post_meta($event_id,'_start_date',true);
        $end_date_edit = get_post_meta($event_id,'_end_date',true);
        $percent_discount = get_post_meta($event_id,'_percent_discount',true);
        $description = get_post_meta($event_id,'_description',true);
       
    }
?>

<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.0/jquery.min.js" integrity="sha512-3gJwYpMe3QewGELv8k/BX9vcqhryRdzRMxVfq6ngyWXwo03GFEzjsUm8Q7RZcHPHksttq7/GFoxjCVUjkjvPdw==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>

<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
<div class="container">
    <div class="row">
        <div class="col-sm-6">
            <lable>Date start</label>
            <input id="start_date" type='date' value="<?php echo isset($status_edit)?$start_date_edit:""; ?>" name="start_date" class="form-control">
            <span id="start_date_error" class="text-danger"></span>
        </div>
        <div class="col-sm-6">
            <lable>Date end</label>
            <input id="end_date" type='date' value="<?php echo isset($status_edit)?$end_date_edit:""; ?>" name="end_date" class="form-control">
            <span id="end_date_error" class="text-danger"></span>
        </div>
        <div class="col-12 mt-3">
            <lable class="mb-1">Percent discount</label>
            <input id="percent_discount" type='number' value="<?php echo isset($status_edit)?$percent_discount:""; ?>" name="percent_discount" class="form-control" min="1" max="99">
            <span id="percent_discount_error" class="text-danger"></span>
        </div>
        <div class="col-12 mt-2">
            <label>Description</label>
            <textarea id="description" name="description" class="form-control" rows="7"><?php echo (isset($status_edit)&&$status_edit)?$description:"";?></textarea>
            <span id="description_error" class="text-danger"></span>
        </div>
    </div>
</div>


<script>

$(document).ready(function(){

    $('#post').submit(function(e){
    //    e.preventDefault();
    //     const statusSubmit = validation();
        // if(!statusSubmit) {
        //     e.preventDefault()
        // } 
    })

    function validation(){
        let statusSubmit = true
        //start_date
        if($('#start_date').val()==""){
            statusSubmit = false
            $('#start_date_error').html('Please enter event start date')
        }else{
            $('#start_date_error').html('')
        }
        //end_date 
        if($('#end_date').val() == ""){
            statusSubmit = false
            $('#end_date_error').html('Please enter the event end date')
        }else{
            $('#end_date_error').html('')
        }

        //percent_discount
        if($('#percent_discount').val()==""){
            $('#percent_discount_error').html('Please enter discount percentage')
        }else{
            $('#percent_discount_error').html('');
        }

        //description
        if($('#description').val() == ""){
            statusSubmit = false;
            $('#description_error').html('Please enter event description')
        }else{
            $('#description_error').html('')
        }
        return statusSubmit
    }
})

</script>