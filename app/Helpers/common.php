<?php
use Illuminate\Support\Facades\DB;

function prx($arr){
    echo "<pre>";
    print_r($arr);
    die();
}

function getTopNavCat(){
    $result['parent_categories']=DB::table('categories')
            ->where(['status'=>1])
			->where(['parent_category_id'=>0])
            ->get();
    $html="";
    foreach($result['parent_categories'] as $list){
        global $html;
        $categorySlug = $list->category_slug;
        $categoryLink = "category/".$categorySlug;
        $html.='<li class="mega-menu-item">
        <a href="'.$categoryLink.'" class="mega-menu-item-title">'.$list->category_name.'</a>';
        $html.='<ul class="mega-menu-sub">';
        $result['parent_child_categories']=DB::table('categories')
            ->where(['status'=>1])
		 	->where(['parent_category_id'=>$list->id])
            ->get();

    foreach($result['parent_child_categories'] as $child_list){
        if($child_list->parent_category_id == $list->id){
        $Child_categorySlug = $child_list->category_slug;
        $Child_categoryLink = "category/".$Child_categorySlug;

            $html.='<li><a href="'.$Child_categoryLink.'">'.$child_list->category_name.'</a></li>';
             }
             else{
                 $html.='';
             }
    }

    $html.='</ul></li>';
}
    return $html;
}
?>
