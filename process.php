<!DOCTYPE html>
<html lang="en">
<head>
    <meta name="description" content="um conversor de tipos de imagem seja de png para jpeg seja de gif para jpeg ou jpeg para webp teste e se surprendera com a facilidade">
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Images download</title>
    <style>
        a{
            display: none;
        }
        body{
            background-color: black;
        }
    </style>
</head>
<body>
    <?php
    $imgsnames= [];
    if(isset($_FILES["imagens"])){
        $typeselect = $_POST['typeselect'];
        $imgs = $_FILES["imagens"];
        for($control = 0;$control<count($imgs['name']);$control++){
            $nameoffile = md5(time());
            //$imgsnames += $nameoffile;
            array_push($imgsnames,$nameoffile);
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
    for($control1 = 0;$control1<count($imgsnames);$control1++){
        echo "<a href='./images/{$imgsnames[$control1]}.{$typeselect}' download='{$imgsnames[$control1]}.{$typeselect}'></a>";
    }
    }
    ?>
    <script>
            document.querySelectorAll('a').forEach((e)=>{
                e.click()
            })
            setTimeout(()=>{
                window.location.href = 'https://darkeclipse.com.br/corverterimg/'
            },3000)
    </script>
</body>
</html>
