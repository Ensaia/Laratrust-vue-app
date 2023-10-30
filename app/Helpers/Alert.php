<?php

namespace App\Helpers;
class Alert
{
    public static function success($message){
        $html_output = null ;
        $html_output .= '<div class="flex flex-col text-green-800 border border-green-300 rounded-lg bg-green-50" role="alert">';
        $html_output .= '<div class="flex justify-between p-4">';
        $html_output .= '<div><span class="text-md">'.$message.'</span></div>';
        $html_output .= '<div><span class="text-md"><i class="fa-solid fa-check-circle"></i></span></div>';
        $html_output .= '</div>';
        $html_output .= '</div>';
        return $html_output;
    }
    public static function info($message){
        $html_output = null ;
        $html_output .= '<div class="flex flex-col text-blue-800 border border-blue-300 rounded-lg bg-blue-50" role="alert">';
        $html_output .= '<div class="flex justify-between p-4">';
        $html_output .= '<div><span class="text-md">'.$message.'</span></div>';
        $html_output .= '<div><span class="text-md"><i class="fa-solid fa-exclamation-triangle"></i></span></div>';
        $html_output .= '</div>';
        $html_output .= '</div>';
        return $html_output;
    }
    public static function warning($message){
        $html_output = null ;
        $html_output .= '<div class="flex flex-col text-yellow-800 border border-yellow-300 rounded-lg bg-yellow-50" role="alert">';
        $html_output .= '<div class="flex justify-between p-4">';
        $html_output .= '<div><span class="text-md">'.$message.'</span></div>';
        $html_output .= '<div><span class="text-md"><i class="fa-solid fa-exclamation-triangle"></i></span></div>';
        $html_output .= '</div>';
        $html_output .= '</div>';
        return $html_output;
    }
    public static function danger($message){
        $html_output = null ;
        $html_output .= '<div class="flex flex-col text-red-800 border border-red-300 rounded-lg bg-red-50" role="alert">';
        $html_output .= '<div class="flex justify-between p-4">';
        $html_output .= '<div><span class="text-md">'.$message.'</span></div>';
        $html_output .= '<div><span class="text-md"><i class="fa-solid fa-exclamation-triangle"></i></span></div>';
        $html_output .= '</div>';
        $html_output .= '</div>';
        return $html_output;
    }
    public static function forbidden($message = ''){
        if($message === ''){
            $message = 'ﻻ يمتلك صاحب هذا الحساب الصلاحيات الكاملة لدخول هذه الصفحة!!!!';
        }
        $html_output = null ;
        $html_output .= '<div class="flex flex-col text-gray-800 border border-gray-300 rounded-lg bg-gray-50" role="alert">';
        $html_output .= '<div class="flex justify-between p-4">';
        $html_output .= '<div><span class="text-md">'.$message.'</span></div>';
        $html_output .= '<div><span class="text-md"><i class="fa-solid fa-exclamation-triangle"></i></span></div>';
        $html_output .= '</div>';
        $html_output .= '</div>';
        return $html_output;
    }

}
/**

<div class="flex items-center p-4 mb-4 text-sm text-blue-800 border border-blue-300 rounded-lg bg-blue-50 dark:bg-gray-800 dark:text-blue-400 dark:border-blue-800" role="alert">
<svg class="flex-shrink-0 inline w-4 h-4 mr-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 20 20">
<path d="M10 .5a9.5 9.5 0 1 0 9.5 9.5A9.51 9.51 0 0 0 10 .5ZM9.5 4a1.5 1.5 0 1 1 0 3 1.5 1.5 0 0 1 0-3ZM12 15H8a1 1 0 0 1 0-2h1v-3H8a1 1 0 0 1 0-2h2a1 1 0 0 1 1 1v4h1a1 1 0 0 1 0 2Z"/>
</svg>
<span class="sr-only">Info</span>
<div>
<span class="font-medium">Info alert!</span> Change a few things up and try submitting again.
</div>
</div>
<div class="flex items-center p-4 mb-4 text-sm text-red-800 border border-red-300 rounded-lg bg-red-50 dark:bg-gray-800 dark:text-red-400 dark:border-red-800" role="alert">
<svg class="flex-shrink-0 inline w-4 h-4 mr-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 20 20">
<path d="M10 .5a9.5 9.5 0 1 0 9.5 9.5A9.51 9.51 0 0 0 10 .5ZM9.5 4a1.5 1.5 0 1 1 0 3 1.5 1.5 0 0 1 0-3ZM12 15H8a1 1 0 0 1 0-2h1v-3H8a1 1 0 0 1 0-2h2a1 1 0 0 1 1 1v4h1a1 1 0 0 1 0 2Z"/>
</svg>
<span class="sr-only">Info</span>
<div>
<span class="font-medium">Danger alert!</span> Change a few things up and try submitting again.
</div>
</div>
<div class="flex items-center p-4 mb-4 text-sm text-green-800 border border-green-300 rounded-lg bg-green-50 dark:bg-gray-800 dark:text-green-400 dark:border-green-800" role="alert">
<svg class="flex-shrink-0 inline w-4 h-4 mr-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 20 20">
<path d="M10 .5a9.5 9.5 0 1 0 9.5 9.5A9.51 9.51 0 0 0 10 .5ZM9.5 4a1.5 1.5 0 1 1 0 3 1.5 1.5 0 0 1 0-3ZM12 15H8a1 1 0 0 1 0-2h1v-3H8a1 1 0 0 1 0-2h2a1 1 0 0 1 1 1v4h1a1 1 0 0 1 0 2Z"/>
</svg>
<span class="sr-only">Info</span>
<div>
<span class="font-medium">Success alert!</span> Change a few things up and try submitting again.
</div>
</div>
<div class="flex items-center p-4 mb-4 text-sm text-yellow-800 border border-yellow-300 rounded-lg bg-yellow-50 dark:bg-gray-800 dark:text-yellow-300 dark:border-yellow-800" role="alert">
<svg class="flex-shrink-0 inline w-4 h-4 mr-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 20 20">
<path d="M10 .5a9.5 9.5 0 1 0 9.5 9.5A9.51 9.51 0 0 0 10 .5ZM9.5 4a1.5 1.5 0 1 1 0 3 1.5 1.5 0 0 1 0-3ZM12 15H8a1 1 0 0 1 0-2h1v-3H8a1 1 0 0 1 0-2h2a1 1 0 0 1 1 1v4h1a1 1 0 0 1 0 2Z"/>
</svg>
<span class="sr-only">Info</span>
<div>
<span class="font-medium">Warning alert!</span> Change a few things up and try submitting again.
</div>
</div>
<div class="flex items-center p-4 text-sm text-gray-800 border border-gray-300 rounded-lg bg-gray-50 dark:bg-gray-800 dark:text-gray-300 dark:border-gray-600" role="alert">
<svg class="flex-shrink-0 inline w-4 h-4 mr-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 20 20">
<path d="M10 .5a9.5 9.5 0 1 0 9.5 9.5A9.51 9.51 0 0 0 10 .5ZM9.5 4a1.5 1.5 0 1 1 0 3 1.5 1.5 0 0 1 0-3ZM12 15H8a1 1 0 0 1 0-2h1v-3H8a1 1 0 0 1 0-2h2a1 1 0 0 1 1 1v4h1a1 1 0 0 1 0 2Z"/>
</svg>
<span class="sr-only">Info</span>
<div>
<span class="font-medium">Dark alert!</span> Change a few things up and try submitting again.
</div>
</div>

 **/
