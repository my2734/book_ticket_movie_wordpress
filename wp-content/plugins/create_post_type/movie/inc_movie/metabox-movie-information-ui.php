<?php
    wp_nonce_field(basename(__FILE__), 'custom_post_metabox_nonce'); // Thêm nonce để bảo vệ form
    // $actor = get_post_meta($post->ID, '_actor', true);
    $time = get_post_meta($post->ID, '_time', true);
    $description = get_post_meta($post->ID, '_description', true);
    $genre = get_post_meta($post->ID, '_genre', true);
    

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
    // print_r($argGenre);
    // die();
    $status_edit = (isset($_GET['action']) && $_GET['action'] == 'edit')?true:false;
    if($status_edit){
        $movie_id = $_GET['post'];
        $movie_meta = get_post_meta($movie_id);
        $time_edit = $movie_meta['_time'][0];
        $genre_edit = $movie_meta['_genre'][0];
        $description_edit = $movie_meta['_description'][0];
    }
?>

<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.0/jquery.min.js" integrity="sha512-3gJwYpMe3QewGELv8k/BX9vcqhryRdzRMxVfq6ngyWXwo03GFEzjsUm8Q7RZcHPHksttq7/GFoxjCVUjkjvPdw==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>

<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">



<div class="Container">
    <!-- <div>
        <label>Một số diễn viễn</label>
        <input type="text" name="actor" class="form-control" aria-describedby="textHelp" placeholder="Một số diễn viên">
    </div> -->
    <div class="row">
        <div class="col-sm-6">
            <label>Thời lượng</label>
            <input id="time" value="<?php echo $status_edit?$time_edit:""; ?>" type="text" name="time" class="form-control" aria-describedby="emailHelp" placeholder="Thời lượng">
            <span id="validateTime" class="text-danger"><span>
        </div>
        <div class="col-sm-6">
            <label>Thể loại</label>
            <select name="genre" class="form-control">
            <?php 
            // print_r($argGenre);
            // die();
                foreach($argGenre as $genreItem){ ?>
                        <option <?php echo ($status_edit && $genreItem->name == $genre_edit)?"selected":""; ?> value="<?php echo $genreItem->name; ?>"><?php echo $genreItem->name; ?></option>  
            <?php    }
            ?>
            </select>
        </div>
  </div>
  <div class="row mt-2">
    <div class="col-sm-6">
        <label>Đạo diễn</label>
        <input type="text" class="form-control" name="director">
    </div>
    <div class="col-sm-6">
        <label>Link youtube</label>
        <input type="text" class="form-control" name="link_ytb">
    </div>
    <div class="col-sm-12 mt-2">
        <label>Diễn viên</label>
        <input type="text" class="form-control" name="actors">           
    </div>
    <div class="col-12 mt-2">
        <label>Mô tả</label>
        <textarea name="description" class="form-control" id="exampleFormControlTextarea1" rows="3"><?php echo $status_edit?$description_edit:""; ?></textarea>
    </div>
  </div>

  <script>
    $( document ).ready(function() {
        var statusSubmit = false;

        function validateForm(){
            const time = $('#time').val();
            let errorTime = "";
            let statusTime = true;

            //validate time
            if(time == ""){
                errorTime = "Vui lòng nhập thời gian";
                statusTime = false;
            }else if(isNaN(time)){
                errorTime = "Nhập sai định dạng";
                statusTime = false;
            }
            $('#validateTime').html(errorTime);
            //validate title
           
            if(!errorTime) {
                statusSubmit = true;
            }
        }

        $('#post').submit(function(e){
            validateForm();
            if(!statusSubmit){
                e.preventDefault();
                // alert("hello ca nha yeu")
            }
        })
    });

</script>
