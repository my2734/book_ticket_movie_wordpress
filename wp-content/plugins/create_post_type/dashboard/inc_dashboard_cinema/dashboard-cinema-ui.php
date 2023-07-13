<?php
//get all post type movie
$args = array(
    'post_type'   => 'movie',
    'numberposts'       => -1,
);
$movie = get_posts($args);

$arg = array(
    'post_type' => 'ticket',
    'numberposts'       => -1,
);
$tickets = get_posts($arg);


//get all genre => type post movie
$taxonomies = get_taxonomies(['object_type' => ['movie']]);
$taxonomyTerms = [];
// loop over your taxonomies
foreach ($taxonomies as $taxonomy) {
    // retrieve all available terms, including those not yet used
    $terms    = get_terms(['taxonomy' => $taxonomy, 'hide_empty' => false]);
    // make sure $terms is an array, as it can be an int (count) or a WP_Error
    $hasTerms = is_array($terms) && $terms;
    if ($hasTerms) {
        $taxonomyTerms[$taxonomy] = $terms;
    }
}
$argGenre = $taxonomyTerms['genreMovie'];


$count_movie = count($movie);
$count_ticket = count($tickets);
$count_genre = count($argGenre);
$count_profit = 0;

//handler price profit
foreach ($tickets as $key => $ticket) {
    $post_meta_ticket = get_post_meta($ticket->ID);
    $count_profit = (int)$post_meta_ticket['_price_promotion'][0] + $count_profit;
}

$arr_times_showtime_with_movie = [];

$arr_movie_name = [];
foreach ($movie as $movie_item) {
    $arr_movie_name[] = $movie_item->post_title;
}

$arr_movie_id = [];
foreach ($movie as $movie_item) {
    $arr_movie_id[] = $movie_item->ID;
};

$args = array(
    'post_type'   => 'showtimes',
    'numberposts'       => -1,
);
$showtimes = get_posts($args);

//   echo "========================================";
foreach ($arr_movie_id as $movie_item) {
    $count = 0;
    foreach ($showtimes as $showtime) {
        $movie_id_of_showtime = get_post_meta($showtime->ID, '_movie_id', true);
        if ($movie_item ==  $movie_id_of_showtime) $count++;
    }
    $arr_times_showtime_with_movie[] = $count;
}
//<!-- handler in table showtime -->
$data_table_showtime = [];
foreach ($showtimes as $key => $showtime) {
    //handler caculation total profit
    $args_ticket = array(
        'post_type'   => 'ticket',
        'numberposts'       => -1,
        'meta_query' => array(
            array(
                'key'       => '_showtime_id',
                'value'     => $showtime->ID,
                'compare'   => '='
            )
        )
    );
    $list_ticket = get_posts($args_ticket);
    $total = 0;
    foreach ($list_ticket as $ticket_item) {
        $total = $total + get_post_meta($ticket_item->ID, '_price_promotion', true);
    }

    $movie_id = get_post_meta($showtime->ID, '_movie_id', true);
    $room_id = get_post_meta($showtime->ID, '_room_id', true);
    $quantity_ticket_sale = count(get_post_meta($showtime->ID, '_array_chair', false)[0]);
    $quantity_ticket_slot = get_post_meta($room_id, '_quantity_chair_vip', true) + get_post_meta($room_id, '_quantity_chair_normal', true) - $quantity_ticket_sale;

    $data_table_showtime[] = array(
        'id'                        => json_encode($key + 1),
        'showtime_name'             => get_the_title($showtime->ID),
        'date_show'                 => get_post_meta($showtime->ID, '_date_show', true),
        'movie_name'                => get_the_title($movie_id),
        'room_show'                 => get_the_title($room_id),
        'time_show'                 => get_post_meta($showtime->ID, '_time_show', true),
        'quantity_ticket_sale'      => $quantity_ticket_sale,
        'quantity_ticket_slot'      => $quantity_ticket_slot,
        'total_profit'              => $total . " vnđ",
    );
}
$data_table_showtime =  json_encode($data_table_showtime);



// handler find milestone_total 
$args = array(
    'post_type'   => 'movie',
    'numberposts'       => -1,
);
$list_movie = get_posts($args);
$total_showtime_movie = [];
foreach ($list_movie as $movie) {
    $args = array(
        'post_type'   => 'showtimes',
        'numberposts'       => -1,
        'meta_query' => array(
            array(
                'key'       => '_movie_id',
                'value'     => $movie->ID,
                'compare'   => '='
            )
        )
    );
    $list_showtime_of_movie = get_posts($args);

    $total = 0;
    foreach ($list_showtime_of_movie as $showtime) {
        $args = array(
            'post_type'   => 'ticket',
            'numberposts'       => -1,
            'meta_query' => array(
                array(
                    'key'       => '_showtime_id',
                    'value'     => $showtime->ID,
                    'compare'   => '='
                )
            )
        );
        $list_ticket_showtime = get_posts($args);
        foreach ($list_ticket_showtime as $ticket) {
            $total = $total + get_post_meta($ticket->ID, '_price_promotion', true);
        }
    }

    $total_showtime_movie[] = $total;
}

for ($i = 0; $i < count($total_showtime_movie) - 1; $i++) {
    for ($j = $i + 1; $j < count($total_showtime_movie); $j++) {
        if ($total_showtime_movie[$i] < $total_showtime_movie[$j]) {
            $temp = $total_showtime_movie[$i];
            $total_showtime_movie[$i] = $total_showtime_movie[$j];
            $total_showtime_movie[$j] = $temp;
        }
    }
}

$milestone_total = 0;
if ($total_showtime_movie[4] != 0) {
    $milestone_total = $total_showtime_movie[4];
}



// handler chart movie
$args = array(
    'post_type'   => 'movie',
    'numberposts'       => -1,
);
$list_movie = get_posts($args);
$arr_movie_name = [];
$arr_quantity_showtime = [];
$arr_profit_movie = [];
foreach ($list_movie as $movie) {
    $args = array(
        'post_type'   => 'showtimes',
        'numberposts'       => -1,
        'meta_query' => array(
            array(
                'key'       => '_movie_id',
                'value'     => $movie->ID,
                'compare'   => '='
            )
        )
    );
    $list_showtime_of_movie = get_posts($args);

    $total = 0;
    foreach ($list_showtime_of_movie as $showtime) {
        $args = array(
            'post_type'   => 'ticket',
            'numberposts'       => -1,
            'meta_query' => array(
                array(
                    'key'       => '_showtime_id',
                    'value'     => $showtime->ID,
                    'compare'   => '='
                )
            )
        );
        $list_ticket_showtime = get_posts($args);
        foreach ($list_ticket_showtime as $ticket) {
            $total = $total + get_post_meta($ticket->ID, '_price_promotion', true);
        }
    }
    if ($total > $milestone_total) {
        $arr_profit_movie[] = $total;
        $arr_quantity_showtime[] = count($list_showtime_of_movie);
        $arr_movie_name[] = get_the_title($movie->ID) . " (" . count($list_showtime_of_movie) . ")";
    }
}

$arr_movie_name = json_encode($arr_movie_name);
$arr_quantity_showtime = json_encode($arr_quantity_showtime);
$arr_profit_movie = json_encode($arr_profit_movie);

?>




<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
<style>
    .card-custom {
        height: 120px;
        padding: 10px !important;
        color: white;
    }

    .btn-custom {
        background-color: white;
        color: black !important;
    }

    .paginate_button {
        padding: 8px 18px;
        color: white;
        border-radius: 10px;
        background: #e5e5e5;
        color: #000;
        margin-top: 30px;
        margin-right: 10px;
    }

    .paginate_button:hover {
        padding: 8px 18px;
        color: white;
        border-radius: 10px;
        background: #14213d;
        color: #fff;
        text-decoration: none;
        cursor: pointer;
    }

    .dataTables_paginate {
        margin-top: 20px;
    }
</style>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.0/jquery.min.js" integrity="sha512-3gJwYpMe3QewGELv8k/BX9vcqhryRdzRMxVfq6ngyWXwo03GFEzjsUm8Q7RZcHPHksttq7/GFoxjCVUjkjvPdw==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
<!-- <script src="https://cdn.jsdelivr.net/npm/chart.js"></script> -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.6.0/Chart.min.js"></script>
<h1>Dashboard Cinema</h1>
<div class="container">
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
        <h3>Movie statistics</h3>
        <div class="col-12 d-flex justify-content-end pl-5 mb-5">
            <div class="mr-3">
                <lable style="font-size: 12px; font-weight: 500;">Ngày bắt đầu</label>
                    <input id="start_date_movie" type="date" class="form-control">
                    <span id="start_date_movie_error" style="font-size: 12px; font-weight: 500;" class="text-danger d-none ">Vui lòng chọn ngày bắt đầu</span>
            </div>
            <div class="mr-3">
                <lable style="font-size: 12px; font-weight: 500;">Ngày kết thúc</label>
                    <input id="end_date_movie" type="date" class="form-control">
                    <span id="end_date_movie_error" style="font-size: 12px; font-weight: 500;" class="text-danger d-none ">Vui lòng chọn ngày kết thúc</span>
            </div>
            <div class="mr-5">
                <button id="btn_statistical_movie" style="margin-top: 25px;" class="btn btn-sm btn-success">Lọc</button>
            </div>
            <div class="mt-4">
                <span>Filter:</span>
                <select id="filter_time_movie" class="form-select ml-5" aria-label="Default select example">
                    <option value="0" selected>Default</option>
                    <option value="1">1 Week</option>
                    <option value="2">1 Month</option>
                    <option value="3">3 Month</option>
                </select>
            </div>
        </div>
        <div class="col-12">
            <div class="alert alert-success alert_success_filter_movie d-none" role="alert">
                <!-- <strong>Thống kê phim nênnf</strong> -->
            </div>
            <canvas id="line-chart"></canvas>
        </div>
    </div>
    <div class="row mt-5">
        <h3>Showtime statistics</h3>

        <div class="col-12 d-flex justify-content-end pl-5">
            <div class="mr-3">
                <lable style="font-size: 12px; font-weight: 500;">Date start</label>
                    <input type="date" id="start_date" class="form-control">
                    <span style="font-size: 12px; font-weight: 500;" class="text-danger d-none start_date_error">Vui lòng chọn ngày bắt đầu</span>
            </div>
            <div class="mr-3">
                <lable style="font-size: 12px; font-weight: 500;">Date end</label>
                    <input type="date" id="end_date" class="form-control">
                    <span style="font-size: 12px; font-weight: 500;" class="text-danger d-none end_date_error">Vui lòng chọn ngày kết thúc</span>
            </div>
            <div class="mr-5">
                <button style="margin-top: 25px;" class="btn btn-sm btn-success" id="btn_filter_start_end_date">Lọc</button>
            </div>
            <div class="mt-4">
                <span>Filter:</span>
                <select id="filter_time" class="form-select ml-5" aria-label="Default select example">
                    <option value="0" selected>Default</option>
                    <option value="1">1 Week</option>
                    <option value="2">1 Month</option>
                    <option value="3">3 Month</option>
                </select>
            </div>
        </div>
        <div class="col-12 mt-4">
            <div class="alert alert-success alert_success_filter d-none" role="alert">
            </div>
            <table id="table_statistical_showtime" class="table table-striped table-hover">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th width="160">Name showtimes</th>
                        <th>Date show</th>
                        <th width="160">Movie name</th>
                        <th>Room show</th>
                        <th>Time show</th>
                        <th>Quantity sale</th>
                        <th>Quantity slot</th>
                        <th>Total Profit</th>
                    </tr>
                </thead>
            </table>
        </div>
    </div>
</div>
<script type="text/javascript" src="https://cdn.datatables.net/1.10.16/js/jquery.dataTables.min.js"></script>
<script>




</script>
<script>
    $(document).ready(function() {
        Chart.defaults.global.defaultFontColor = '#000000';
        Chart.defaults.global.defaultFontFamily = 'Arial';
        var lineChart = $('#line-chart');
        const data_label_name_movie = <?php echo $arr_movie_name ?>;
        const data_profit_movie = <?php echo $arr_profit_movie ?>;
        var myChart = new Chart(lineChart, {
            type: 'bar',
            data: {
                labels: data_label_name_movie,
                datasets: [{
                    label: 'Revenue of the movie',
                    data: data_profit_movie,
                    backgroundColor: 'rgba(0, 128, 128, 0.7)',
                    borderColor: 'rgba(0, 128, 128, 1)',
                    borderWidth: 1
                }]
            },
            options: {
                scales: {
                    yAxes: [{
                        ticks: {
                            beginAtZero: true
                        }
                    }]
                },
            }
        });
        var json = <?php echo $data_table_showtime ?>;
        let table = $('#table_statistical_showtime').DataTable({
            data: json,
            columns: [{
                    data: 'id'
                },
                {
                    data: 'showtime_name'
                },
                {
                    data: 'date_show'
                },
                {
                    data: 'movie_name'
                },
                {
                    data: 'room_show'
                },
                {
                    data: 'time_show'
                },
                {
                    data: 'quantity_ticket_sale'
                },
                {
                    data: 'quantity_ticket_slot'
                },
                {
                    data: 'total_profit'
                },
            ],
            "pageLength": 20
        });

        $('#filter_time').change(function() {
            const id_filter_time_showtime = $(this).val();
            $.ajax({
                type: "post", //Phương thức truyền post hoặc get
                dataType: "json", //Dạng dữ liệu trả về xml, json, script, or html
                url: '<?php echo admin_url('admin-ajax.php'); ?>', //Đường dẫn chứa hàm xử lý dữ liệu. Mặc định của WP như vậy
                data: {
                    action: "filter_datetable_show", //Tên action
                    id_filter_time_showtime: id_filter_time_showtime,
                },
                context: this,
                beforeSend: function() {
                    //Làm gì đó trước khi gửi dữ liệu vào xử lý
                },
                success: function(response) {
                    if (response.success) {
                        $('.alert_success_filter').removeClass('d-none')
                        if (id_filter_time_showtime == 1) {
                            $('.alert_success_filter').html('<strong>Showtime filter results with the past 1 week</strong>')
                        } else if (id_filter_time_showtime == 2) {
                            $('.alert_success_filter').html('<strong>Showtime filter results with the past 1 month</strong>')
                        } else {
                            $('.alert_success_filter').html('<strong>Screening results for the last 3 months</strong>')
                        }
                        data = JSON.parse(response.data)
                        table.clear();
                        table.rows.add(data).draw();
                        setTimeout(function() {
                            $('.alert_success_filter').addClass('d-none')
                        }, 5000)
                    } else {
                        alert('Đã có lỗi xảy ra');
                    }
                },
                error: function(jqXHR, textStatus, errorThrown) {
                    console.log('The following error occured: ' + textStatus, errorThrown);
                }
            })
        })

        $('#btn_filter_start_end_date').click(function() {
            const status = validateStartEndDate();
            const start_date = $('#start_date').val()
            const end_date = $('#end_date').val()
            if (status) {
                $.ajax({
                    type: "post", //Phương thức truyền post hoặc get
                    dataType: "json", //Dạng dữ liệu trả về xml, json, script, or html
                    url: '<?php echo admin_url('admin-ajax.php'); ?>', //Đường dẫn chứa hàm xử lý dữ liệu. Mặc định của WP như vậy
                    data: {
                        action: "filter_datetable_show_start_end_start", //Tên action
                        start_date: start_date,
                        end_date: end_date
                    },
                    context: this,
                    beforeSend: function() {
                        //Làm gì đó trước khi gửi dữ liệu vào xử lý
                    },
                    success: function(response) {
                        if (response.success) {
                            $('.alert_success_filter').removeClass('d-none')
                            const message = '<strong>Showtime filter results from ' + start_date + ' to ' + end_date + '</strong>'
                            $('.alert_success_filter').html(message)
                            data = JSON.parse(response.data)
                            table.clear();
                            table.rows.add(data).draw();
                            // setTimeout(function() {
                            //     $('.alert_success_filter').addClass('d-none')
                            // }, 5000)
                        } else {
                            alert('Đã có lỗi xảy ra');
                        }
                    },
                    error: function(jqXHR, textStatus, errorThrown) {
                        console.log('The following error occured: ' + textStatus, errorThrown);
                    }
                })
            }
        })

        function validateStartEndDate() {
            let status = true
            //start_date
            if ($('#start_date').val() == "") {
                $('.start_date_error').removeClass('d-none')
                status = false
            } else {
                $('.start_date_error').addClass('d-none')
            }
            //end_date
            if ($('#end_date').val() == "") {
                $('.end_date_error').removeClass('d-none')
                status = false
            } else {
                $('.end_date_error').addClass('d-none')
            }
            return status;
        }


        $('#filter_time_movie').change(function() {
            const id_filter_time_movie = $(this).val()
            $.ajax({
                type: "post", //Phương thức truyền post hoặc get
                dataType: "json", //Dạng dữ liệu trả về xml, json, script, or html
                url: '<?php echo admin_url('admin-ajax.php'); ?>', //Đường dẫn chứa hàm xử lý dữ liệu. Mặc định của WP như vậy
                data: {
                    action: "filter_chart_movie_time", //Tên action
                    id_filter_time_movie: id_filter_time_movie
                },
                context: this,
                beforeSend: function() {
                    //Làm gì đó trước khi gửi dữ liệu vào xử lý
                },
                success: function(response) {
                    if (response.success) {
                        const arr_movie_name = response.data.arr_movie_name
                        const arr_profit_movie = response.data.arr_profit_movie
                        // console.log(arr_movie_name);
                        // console.log(response.data)
                        myChart.data.datasets[0].data = arr_profit_movie
                        myChart.data.labels = arr_movie_name
                        myChart.update();
                        $('.alert_success_filter_movie').removeClass('d-none')
                        let message = ""
                        if(id_filter_time_movie==1){
                            message = 'Statistics of movies in the past 1 week'
                        }else if(id_filter_time_movie==2){
                            message = 'Statistics of movies in the past 1 month'
                        }else if(id_filter_time_movie == 3){
                            message = 'Movie statistics in the last 3 months'
                        }
                        
                        $('.alert_success_filter_movie').html('<strong>'+message+'</strong>')
                    } else {
                        alert('Đã có lỗi xảy ra');
                    }
                },
                error: function(jqXHR, textStatus, errorThrown) {
                    console.log('The following error occured: ' + textStatus, errorThrown);
                }
            })
        })

        $('#btn_statistical_movie').click(function(){
            const status = validateStartEndDateMovie();
            const start_date = $('#start_date_movie').val()
            const end_date = $('#end_date_movie').val()
            if(status){
                $.ajax({
                type: "post", //Phương thức truyền post hoặc get
                dataType: "json", //Dạng dữ liệu trả về xml, json, script, or html
                url: '<?php echo admin_url('admin-ajax.php'); ?>', //Đường dẫn chứa hàm xử lý dữ liệu. Mặc định của WP như vậy
                data: {
                    action: "filter_chart_movie_start_end_date", //Tên action
                    start_date: start_date,
                    end_date : end_date

                },
                context: this,
                beforeSend: function() {
                    //Làm gì đó trước khi gửi dữ liệu vào xử lý
                },
                success: function(response) {
                    if (response.success) {
                        const arr_movie_name = response.data.arr_movie_name
                        const arr_profit_movie = response.data.arr_profit_movie
                        // console.log(arr_movie_name);
                        // console.log(response.data)
                        myChart.data.datasets[0].data = arr_profit_movie
                        myChart.data.labels = arr_movie_name
                        myChart.update();
                        $('.alert_success_filter_movie').removeClass('d-none')
                        let message = "Movie statistics from "+start_date+"to "+end_date;
                        $('.alert_success_filter_movie').html('<strong>'+message+'</strong>')
                    } else {
                        alert('Đã có lỗi xảy ra');
                    }
                },
                error: function(jqXHR, textStatus, errorThrown) {
                    console.log('The following error occured: ' + textStatus, errorThrown);
                }
            }) 
            }
        })

        function validateStartEndDateMovie(){
            let status = true
            //start date
            if($('#start_date_movie').val()==""){
                $('#start_date_movie_error').removeClass('d-none')
                status = false;
            }else{
                $('#start_date_movie_error').addClass('d-none')
            }
            //end date
            if($('#end_date_movie').val()==""){
                $('#end_date_movie_error').removeClass('d-none')
                status = false
            }else{
                $('#end_date_movie_error').addClass('d-none')
            }

            // if($('#start_date_movie').val() > $('#end_date_movie').val()){
            //     $('#end_date_movie_error').addClass('d-none')
            //     $('#end_date_movie_error').html('Chọn ngày kết thúc phải lớn hơn ngày bắt đầu')
            //     status = false
            // }
            return status
        }

    })
</script>