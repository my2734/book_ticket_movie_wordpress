<?php 

if (!class_exists('WP_List_Table')) {
    require_once(ABSPATH . 'wp-admin/includes/class-wp-list-table.php');
}


class Supporthost_List_Table extends WP_List_Table{

    function get_columns(){
        $columns = array(
            'showtime_name'=> 'Showtime',
            'movie_name'    => 'Movie',
            'room_name'     => 'Room',
            'date_show'     => 'Date show',
            'time_show'     => 'Time show',
            'slot'          => 'Slot'
        );
        return $columns;
    }

    function prepare_items() {
        $data = $this->get_table_data();
        $columns = $this->get_columns();
        $hidden = array();
        $sortable = [];
        $this->_column_headers = array($columns, $hidden, $sortable);
        usort( $data, [$this, 'usort_reorder']);
        $this->items = $data;
    }

    function column_booktitle($item) {
        $actions = array(
                  'edit'      => sprintf('Edit',$_REQUEST['page'],'edit',$item['ID']),
                  'delete'    => sprintf('Delete',$_REQUEST['page'],'delete',$item['ID']),
              );
      
        return sprintf('%1$s %2$s', $item['booktitle'], $this->row_actions($actions) );
      }

      function get_bulk_actions() {
        $actions = array(
          'delete'    => 'Delete'
        );
        return $actions;
      }


      function column_cb($item) {
        return sprintf(
            '<input type="checkbox">', $item['ID']
        );    
    }

    function get_table_data() {
        // $example_data = array(
        //     array('ID' => 1,'booktitle' => 'Quarter Share', 'author' => 'Nathan Lowell',
        //           'isbn' => '978-0982514542'),
        //     array('ID' => 2, 'booktitle' => '7th Son: Descent','author' => 'J. C. Hutchins',
        //           'isbn' => '0312384378'),
        //     array('ID' => 3, 'booktitle' => 'Shadowmagic', 'author' => 'John Lenahan',
        //           'isbn' => '978-1905548927'),
        //     array('ID' => 4, 'booktitle' => 'The Crown Conspiracy', 'author' => 'Michael J. Sullivan',
        //           'isbn' => '978-0979621130'),
        //     array('ID' => 5, 'booktitle'     => 'Max Quick: The Pocket and the Pendant', 'author'    => 'Mark Jeffrey',
        //           'isbn' => '978-0061988929'),
        //     array('ID' => 6, 'booktitle' => 'Jack Wakes Up: A Novel', 'author' => 'Seth Harwood',
        //           'isbn' => '978-0307454355')
        // );
        // return $example_data;

        $datetime =  new DateTime();
        $datetime = $datetime->format('Y-m-d');
        $arg_showtimes = array(
            'post_type' => 'showtimes',
            'meta_query'=> array(
                array(
                    'key' => '_date_show',
                    'compare' => '>=',
                    'value' => $datetime,
                )
        ));
        $list_showtimes = get_posts($arg_showtimes);
        $time_now =  date('H');
        // return $time_now;
        foreach($list_showtimes as $key => $showtime){
            
            $time_show = explode('h',get_post_meta($showtime->ID,'_time_show',true))[0];
            // return $time_show;
            if($time_show<=$time_now && get_post_meta($showtime->ID,'_date_show',true)==$datetime){
                // array_splice($list_showtimes,$key,1);
                unset($list_showtimes[$key]);
            }
        }

        $posts_array = [];

        if (count($list_showtimes) > 0) {
            foreach ($list_showtimes as $key => $showtime) {
                $movie_id = get_post_meta($showtime->ID,'_movie_id',true);
                $room_id = get_post_meta($showtime->ID,'_room_id',true);
                $total_chair = get_post_meta($room_id,'_quantity_chair_vip',true)+get_post_meta($room_id,'_quantity_chair_normal',true);
                $posts_array[] = array(
                    "showtime_name" => "<a href=".get_the_permalink($showtime->ID).">".get_the_title($showtime->ID)."</a>",
                    "movie_name" => "<a href=".get_the_permalink($movie_id).">".get_the_title($movie_id)."</a>",
                    "room_name" => "<a href=".get_the_permalink($room_id).">".get_the_title($room_id)."</a>",
                    "date_show" => get_post_meta($showtime->ID,'_date_show',true),
                    "time_show" => get_post_meta($showtime->ID,'_time_show',true),
                    "slot" =>   $total_chair-count(get_post_meta($showtime->ID,'_array_chair',false)[0])
                );
            }
        }

        return $posts_array;
    }

    function column_default( $item, $column_name ) {
        switch( $column_name ) { 
            case 'showtime_name':
            case 'movie_name':
            case 'room_name':
            case 'date_show':
            case 'time_show':
            case 'slot':
              return $item[ $column_name ];
            default:
              return print_r( $item, true ) ; //Show the whole array for troubleshooting purposes
        }
    }

    function get_sortable_columns() {
        $sortable_columns = array(
            'booktitle'  => array('booktitle',false),
            'author' => array('author',false),
            'isbn'   => array('isbn',true)
        );
        return $sortable_columns;
    }

    // function usort_reorder( $a, $b ) {
    //     // If no sort, default to title
    //     $orderby = ( ! empty( $_GET['orderby'] ) ) ? $_GET['orderby'] : '';
    //     // If no order, default to asc
    //     $order = ( ! empty($_GET['order'] ) ) ? $_GET['order'] : 'asc';
    //     // Determine sort order
    //     $result = strcmp( $a[$orderby], $b[$orderby] );
    //     // Send final sort direction to usort
    //     return ( $order === 'asc' ) ? $result : -$result;
    //   }
}


function supporthost_list_init(){
    $table = new Supporthost_List_Table();
    echo '<div class="wrap"><h2>MOVIE COOMING SOON</h2>';
    echo '<form method="post">';
    // Prepare table
    $table->prepare_items();
    // // Search form
    // $table->search_box('search', 'search_id');
    // // Display table
    $table->display();
    echo '</form></div>';
}