<?php 
require_once PRESENTATION_DIR. 'store_front.php';
$sf_obj = new StoreFront;
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title><?php echo $sf_obj->mPageTitle;?></title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <base href="<?php echo $sf_obj->mCurrentUrl;?>">
</head>

<body>

<?php 

include TEMPLATE_DIR. '/header.php';

include TEMPLATE_DIR. '/main_menu.php';

include TEMPLATE_DIR. '/content.php';

include TEMPLATE_DIR. '/footer.php';


?>

</body>

</html>



