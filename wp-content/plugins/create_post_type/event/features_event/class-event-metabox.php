<?php 

class CreateEventMetaBox extends CreateEvent{
    public function __construct()
    {
        add_action('add_meta_boxes', [$this, 'custom_event_metabox']);
        add_action('save_post', [$this, 'save_custom_event_metabox'], 20);
    }

    function custom_event_metabox(){
        add_meta_box(
            // ID của metabox, phải là duy nhất
            'custom_movie_metabox',
            // Tiêu đề của metabox
            'Infomation Another',
            // Callback function để hiển thị nội dung metabox
            [$this, 'custom_event_metabox_callback'],
            // Tên của custom post type mà bạn muốn thêm metabox vào
            $this->post_type,
            // Vị trí của metabox: normal (bên cạnh editor), side (ở bên phải) hoặc advanced (ở dưới editor)
            'normal',
            // Ưu tiên hiển thị của metabox (high, core hoặc default)
            'high'
        );
    }

    function custom_event_metabox_callback(){
        require_once PROJECT_MANAGEMENT_PATH . 'event/inc_event/metabox-event-infomation.php';
    }

    function save_custom_event_metabox($post_id){
        //start_date
        if(isset($_POST['start_date'])){
            update_post_meta($post_id,'_start_date',$_POST['start_date']);
        }

        //end_date
        if(isset($_POST['end_date'])){
            update_post_meta($post_id,'_end_date',$_POST['end_date']);
        }

        //percent_discount
        if(isset($_POST['percent_discount'])){
            update_post_meta($post_id,'_percent_discount',$_POST['percent_discount']);
        }

        //description
        if(isset($_POST['description'])){
            update_post_meta($post_id,'_description',$_POST['description']);
        }
    }
}


new CreateEventMetaBox();