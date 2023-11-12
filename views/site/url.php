<?php
use \yii\helpers\Url;
use \yii\helpers\Html;
// URL ke home atau web index
?>

<a href="<?= Url::to(['person/index']) ?>">Data Person</a> <br>

<?php 
echo Html::a('example', 'http://example.com'); 
echo '<br>';
echo Html::a('Data Person', ['person/index']);

?>