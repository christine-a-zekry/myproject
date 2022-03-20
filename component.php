<?php

function inputElement($label, $placeholder, $name, $value){
    $ele="<div class=\"input-group mb-2\">
    <div class=\"input-group-prepend\">
        <div class=\"input-group-text\">$label


    </div>
        </div>
    <input type=\"text\" name='$name'value='$value' class=\"form-control\"  placeholder='$placeholder'>

</div>
    
    
    
    
    
    ";
    echo $ele;

}
function input_Element($label, $placeholder, $name, $value){
    $ele="<div class=\"input-group mb-2\">
    <div class=\"input-group-prepend\">
        <div class=\"input-group-text\">$label


    </div>
        </div>
    <input type=\"number\" name='$name'value='$value' class=\"form-control\"  placeholder='$placeholder'>

</div>
    
    
    
    
    
    ";
    echo $ele;

}


function buttonElement($BTN, $STYLE, $text, $name, $attr){
    $btn = "
        <button name='$name' '$attr' class='$STYLE' id='$BTN'>$text</button>
    ";
    echo $btn;
}