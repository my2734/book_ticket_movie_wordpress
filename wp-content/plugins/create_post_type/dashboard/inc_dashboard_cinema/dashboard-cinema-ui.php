<?php
    //get all post type movie
   $args = array(
    'post_type'   => 'movie',
    'numberposts'       => -1,
  );
  $movie = get_posts( $args );

  //get all post type ticket

  $arg = array(
    'post_type' => 'ticket',
    'numberposts'       => -1,
  );
  $tickets = get_posts($arg);


  //get all genre => type post movie
  $taxonomies = get_taxonomies(['object_type' => ['movie']]);
  $taxonomyTerms = [];
  // loop over your taxonomies
  foreach ($taxonomies as $taxonomy)
  {
      // retrieve all available terms, including those not yet used
      $terms    = get_terms(['taxonomy' => $taxonomy, 'hide_empty' => false]);
      // make sure $terms is an array, as it can be an int (count) or a WP_Error
      $hasTerms = is_array($terms) && $terms;
      if($hasTerms)
      {
          $taxonomyTerms[$taxonomy] = $terms;        
      }
  }
  $argGenre = $taxonomyTerms['genreMovie'];
  

  $count_movie = count($movie);
  $count_ticket = count($tickets);
  $count_genre = count($argGenre);
  $count_profit = 0;

  //handler price profit
  foreach($tickets as $key => $ticket){
    // echo json_encode($ticket);
    $post_meta_ticket = get_post_meta($ticket->ID);
    $count_profit = (int)$post_meta_ticket['_price'][0] + $count_profit;
   
  }
//   die();

  $arr_times_showtime_with_movie = [];

  $arr_movie_name = [];
  foreach($movie as $movie_item){
    $arr_movie_name[] = $movie_item->post_title;
  }

  $arr_movie_id = [];
  foreach($movie as $movie_item){
    $arr_movie_id[] = $movie_item->ID;
  }

//   print_r($arr_movie_name);
//   die();

;

  $args = array(
    'post_type'   => 'showtimes'
  );
  $showtimes = get_posts( $args );

//   echo "========================================";
  foreach($arr_movie_id as $movie_item){
    $count = 0;
    foreach($showtimes as $showtime){
        $movie_id_of_showtime = get_post_meta($showtime->ID, '_movie_id',true);
        if($movie_item ==  $movie_id_of_showtime) $count++;
    }
    $arr_times_showtime_with_movie[] = $count;
  }

//   print_r($arr_times_showtime_with_movie);
//   die();
//   echo json_encode($arr_times_showtime_with_movie);
//   die();
//   print_r($arr_movie_name);
//   die();


?>

<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
<style>
    .card-custom{
        height: 120px;
        padding: 10px !important;
        color: white;
    }

    .btn-custom{
        background-color: white;
        color: black !important;
    }
</style>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.0/jquery.min.js" integrity="sha512-3gJwYpMe3QewGELv8k/BX9vcqhryRdzRMxVfq6ngyWXwo03GFEzjsUm8Q7RZcHPHksttq7/GFoxjCVUjkjvPdw==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
<h1>Dashboard Cinema</h1>
<div class="container">
    <div class="row">
        <div class="col-12">
            <?php
                foreach($arr_movie_name as $movie_item){ ?>
                    <input type="checkbox" style="display: none;" checked name="arr_movie_name[]" value="<?php echo $movie_item ?>">
            <?php }
            ?>
        </div>

        <div class="col-12">
            <?php
                foreach($arr_times_showtime_with_movie as $arr_times_showtime_with_movie_item){ ?>
                    <input type="checkbox" style="display: none;" checked name="arr_times_showtime_with_movie_item[]" value="<?php echo $arr_times_showtime_with_movie_item ?>">
            <?php }
            ?>
        </div>
    </div>
    <div class="row">
        <div class="col-lg-3 col-sm-6">
            <div class="card card-custom bg-danger">
            <div class="card-body">
                    <h5 class="card-title">Total Movie</h5>
                    <h5 class="d-flex justify-content-between">
                        <?php echo $count_movie; ?> 
                        <a href="edit.php?post_type=movie" class="btn btn-custom">View</a>
                </h5>
                </div>
            </div>
       
        </div>
        <div class="col-lg-3 col-sm-6">
            <div class="card card-custom bg-success">
                <div class="card-body">
                    <h5 class="card-title">Total Ticket Sale</h5>
                    <h5 class="d-flex justify-content-between"><?php echo $count_ticket; ?> <a href="edit.php?post_type=ticket" class="btn btn-custom">View</a></h5>

                </div>
            </div>
        </div>
        <div class="col-lg-3 col-sm-6">
            <div class="card card-custom bg-primary">
               
                <div class="card-body">
                    <h5 class="card-title">Total Genre</h5>
                    <h5 class="d-flex justify-content-between"><?php echo $count_genre; ?> <a href="edit-tags.php?taxonomy=genreMovie&post_type=movie" class="btn btn-custom">View</a></h5>

                </div>
            </div>
        </div>
        <div class="col-lg-3 col-sm-6">
            <div class="card card-custom bg-warning">
               
                <div class="card-body">
                    <h5 class="card-title">Total Profit</h5>
                    <h5 class="d-flex justify-content-between"><?php echo number_format($count_profit, 0, '', ','); ?> vnđ <a href="edit.php?post_type=ticket" class="btn btn-custom">View</a></h5>
                </div>
            </div>
        </div>
    </div>
    <div class="row mt-5">
        <div class="col-12">
        <canvas id="myChart"></canvas>
        </div>
    </div>
</div>
<script>
    $(document).ready(function(){
      
        // $.ajax({
        //     type : "post", //Phương thức truyền post hoặc get
        //     dataType : "json", //Dạng dữ liệu trả về xml, json, script, or html
        //     url : '<?php echo admin_url('admin-ajax.php');?>', //Đường dẫn chứa hàm xử lý dữ liệu. Mặc định của WP như vậy
        //     data : {
        //         action: "chart_first", 
        //     },
        //     context: this,
        //     beforeSend: function(){
        //         //Làm gì đó trước khi gửi dữ liệu vào xử lý
        //     },
        //     success: function(response) {
        //         //Làm gì đó khi dữ liệu đã được xử lý
        //         if(response.success) {
        //             console.log(response.data)
        //         }
        //         else {
        //             alert('Đã có lỗi xảy ra');
        //         }
        //     },
        //     error: function( jqXHR, textStatus, errorThrown ){
        //         console.log( 'The following error occured: ' + textStatus, errorThrown );
        //     }
        // })
    })
</script>
<script>
    var arr_movie_name = []
    $("input:checkbox[name='arr_movie_name[]']:checked").each(function(){    
        arr_movie_name.push($(this).val());
    });

    var arr_times_showtime_with_movie_item = []
    $("input:checkbox[name='arr_times_showtime_with_movie_item[]']:checked").each(function(){    
        arr_times_showtime_with_movie_item.push($(this).val());
    });
    // console.log(arr_times_showtime_with_movie_item)
    const label_name = arr_movie_name
    const ctx = document.getElementById('myChart');
    new Chart(ctx, {
    type: 'bar',
    data: {
    labels: label_name,
    datasets: [{
      label: 'Number of premieres',
      data: arr_times_showtime_with_movie_item,
      borderWidth: 1
    }]
    },
    options: {
    scales: {
      y: {
        beginAtZero: true
      }
    }
    }
    });
</script>