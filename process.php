<?php
    if(isset($_FILES["imagens"])){
        $typeselect = $_POST['typeselect'];
        $imgs = $_FILES["imagens"];
        for($control = 0;$control<count($imgs['name']);$control++){
            $nameoffile = md5(time());
            switch ($imgs['type'][$control]) {
                case 'image/png' || 'image/x-png':
                    $tempimg = imagecreatefrompng($imgs['tmp_name'][$control]);
                    break;
                case 'image/jpeg' || 'image/pjpeg':
                    $tempimg = imagecreatefromjpeg($imgs['tmp_name'][$control]);
                    break;
                
                case 'image/webp':
                    $tempimg = imagecreatefromwebp($imgs['tmp_name'][$control]);
                    break;
                case 'image/gif':
                    $tempimg = imagecreatefromgif($imgs['tmp_name'][$control]);
                    break;
                default:
                    //header('Location: ./?msg=alguma%20imagem%20foi%20enviada%20com%20formato%20incompativel');
                    //echo var_dump($tempimg);
                    break;
                }
                    if(isset($tempimg) && isset($typeselect)){
                        echo $tempimg;
                        switch($typeselect){
                        case 'png':
                            imagepng($tempimg,"./images/{$nameoffile}.{$typeselect}");
                            break;
                        case 'jpeg':
                            imagejpeg($tempimg,"./images/{$nameoffile}.{$typeselect}");
                            break;
                        case 'webp':
                            imagewebp($tempimg,"./images/{$nameoffile}.{$typeselect}");
                            break;
                        case 'gif':
                            imagegif($tempimg,"./images/{$nameoffile}.{$typeselect}");
                            break;
                        default:
                            echo "Error";
                            break;
                    }
                }
        }
        
    }

?>
