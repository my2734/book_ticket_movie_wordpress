<?php 

class CreartShortcode{
    function __construct()
    {
        add_shortcode('query_taxonomy_genre_loop', [$this, 'func_query_taxonomy_genre_loop']);
        
    }

    function func_query_taxonomy_genre_loop(){
        $taxonomies = get_taxonomies(['object_type' => ['movie']]);
        $taxonomyTerms = [];
        foreach ($taxonomies as $taxonomy)
        {
            $terms    = get_terms(['taxonomy' => $taxonomy, 'hide_empty' => false]);
            $hasTerms = is_array($terms) && $terms;
            if($hasTerms)
            {
                $taxonomyTerms[$taxonomy] = $terms;        
            }
        }
        $argGenre = $taxonomyTerms['genreMovie'];
        $displayList = "<div class='custom-div-genre'>";
        foreach($argGenre as $genre){
            $displayList .= "<a style='margin-right: 20px !important;' href='".get_term_link($genre->term_id)."' class='custom_btn_geren_list'>".$genre->name."</a>";
        }
        $displayList .= "/<div>";
        return $displayList;
    }
}

