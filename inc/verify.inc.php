<?php



if(isset($_POST['otp']) && isset($_POST['url'])){
    $url = filter_var($_POST['url'], FILTER_VALIDATE_URL);
    $otp = filter_var($_POST['otp'], FILTER_SANITIZE_STRING);

    if($url == false || $otp == false){
        echo "Invalid Url";
        exit;
    }
    if(empty($url) || empty($otp)){
        echo "Empty Parameters";
        exit;
    }

    $tags = @get_meta_tags($url);
    if(!$tags){
        echo "Invalid Url";
        exit;
    }
    if(!isset($tags['ridox'])){
        echo "Cannot Find Our Meta Tag";
        exit;   
        
    }
    $target = $tags['ridox'];

    if($target !== $otp){
        echo "Fail to Verify Website";
    }

    else{
        echo "Successfully verified";
    }
}