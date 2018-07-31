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

require_once TEMPLATE_DIR. '/header.php';

require_once TEMPLATE_DIR. '/main_menu.php';

require_once TEMPLATE_DIR. '/content.php';

require_once TEMPLATE_DIR. '/footer.php';


?>

</body>

</html>



