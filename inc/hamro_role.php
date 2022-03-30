<?php

function is_merchant($id=''){
    if($id){
    $author_obj = get_user_by('id',$id);
    }
    else{
        $author_obj = wp_get_current_user();
    }
    if($author_obj->roles[0]=="merchant"){
        return true;
    }else{
        return false;
    }
    return false;
}

function is_customer($id=''){
    if($id){
    $author_obj = get_user_by('id',$id);
    }
    else{
        $author_obj = wp_get_current_user();
    }
    if($author_obj->roles[0]=="subscriber"){
        return true;
    }else{
        return false;
    }
    return false;
}