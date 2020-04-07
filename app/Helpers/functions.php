<?php

if(!function_exists('on_page')){
    function on_page($path)
    {
        return request()->is($path);
    }
}

if(!function_exists('return_if')){
    function return_if($condition, $value)
    {
        if($condition)
            return $value;
    }
}

if(!function_exists('old_optional')){
    function old_optional($obj, $prop)
    {
        return old($prop, optional($obj)->$prop);
    }
}

if(!function_exists('can_do')){
    function can_do($permission)
    {
        if(!auth()->user()->can($permission)){
            abort(404);
        }
    }
}

if(!function_exists('show_unknown_if_null')){
    function show_unknown_if_null($expression)
    {
        return $expression == null ? __('Unknown') : $expression;
    }
}

