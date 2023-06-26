<?php 

if (!class_exists('WP_List_Table')) {
    require_once(ABSPATH . 'wp-admin/includes/class-wp-list-table.php');
}


class Supporthost_List_Table extends WP_List_Table{

    function get_columns(){
        $columns = array(
            'booktitle' => 'Title',
            'author'    => 'Author',
            'isbn'      => 'ISBN'
        );
        return $columns;
    }

    function prepare_items() {
        $data = $this->get_table_data();
        $columns = $this->get_columns();
        $hidden = array();
        $sortable = $this->get_sortable_columns();
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
        $example_data = array(
            array('ID' => 1,'booktitle' => 'Quarter Share', 'author' => 'Nathan Lowell',
                  'isbn' => '978-0982514542'),
            array('ID' => 2, 'booktitle' => '7th Son: Descent','author' => 'J. C. Hutchins',
                  'isbn' => '0312384378'),
            array('ID' => 3, 'booktitle' => 'Shadowmagic', 'author' => 'John Lenahan',
                  'isbn' => '978-1905548927'),
            array('ID' => 4, 'booktitle' => 'The Crown Conspiracy', 'author' => 'Michael J. Sullivan',
                  'isbn' => '978-0979621130'),
            array('ID' => 5, 'booktitle'     => 'Max Quick: The Pocket and the Pendant', 'author'    => 'Mark Jeffrey',
                  'isbn' => '978-0061988929'),
            array('ID' => 6, 'booktitle' => 'Jack Wakes Up: A Novel', 'author' => 'Seth Harwood',
                  'isbn' => '978-0307454355')
        );
        return $example_data;
    }

    function column_default( $item, $column_name ) {
        switch( $column_name ) { 
            case 'booktitle':
            case 'author':
            case 'isbn':
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

    function usort_reorder( $a, $b ) {
        // If no sort, default to title
        $orderby = ( ! empty( $_GET['orderby'] ) ) ? $_GET['orderby'] : 'booktitle';
        // If no order, default to asc
        $order = ( ! empty($_GET['order'] ) ) ? $_GET['order'] : 'asc';
        // Determine sort order
        $result = strcmp( $a[$orderby], $b[$orderby] );
        // Send final sort direction to usort
        return ( $order === 'asc' ) ? $result : -$result;
      }
}


function supporthost_list_init(){
    $table = new Supporthost_List_Table();
    echo '<div class="wrap"><h2>SupportHost Admin Table</h2>';
    echo '<form method="post">';
    // Prepare table
    $table->prepare_items();
    // // Search form
    $table->search_box('search', 'search_id');
    // // Display table
    $table->display();
    echo '</div></form>';
}