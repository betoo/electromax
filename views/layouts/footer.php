<?php 
use yii\helpers\Html;
use yii\bootstrap\Nav;
use yii\bootstrap\NavBar;
use yii\widgets\Breadcrumbs;
use app\assets\AppAsset;
use app\assets\AppAssetElectromax;
use app\models\Empresa;
use app\models\ServicioSearch;

 ?>

<?php 
    $emp=Empresa::findOne(1);
 ?>

<footer class="">
	<div class="content-footer">
	    <div class="img_sec col-md-3 col-xs-12 col-sm-4 col-lg-4">
	    	<?=  Html::img(Yii::$app->getUrlManager()->createAbsoluteUrl(Yii::$app->view->theme->baseUrl.'/img/'.'sec.png'), ['alt' => 'logo electromax', 'class'=>'img-thumbnail']) ?>    
	    </div>
	    <div  class="contacto-footer col-md-3 col-xs-12 col-sm-4 col-lg-4">
	        <div id="telefono-footer" class="telefono-footer center-block">
	        	<?=  Html::img(Yii::$app->getUrlManager()->createAbsoluteUrl(Yii::$app->view->theme->baseUrl.'/img/'.'telefono-footer.png'), ['alt' => 'logo electromax', 'class'=>'']) ?> 
	            <p>
	            	<?php if (!empty($emp->emp_num_tel)): ?>
	                	<?= $emp->emp_num_tel  ?>
	            	<?php endif ?>
	            </p>
	        </div>
	        <div class="clear"></div>
	        <div id="celular-footer" class="celular-footer center-block">
	        	<?=  Html::img(Yii::$app->getUrlManager()->createAbsoluteUrl(Yii::$app->view->theme->baseUrl.'/img/'.'celular-footer.png'), ['alt' => 'logo electromax', 'class'=>'']) ?> 
	            <p>
	            	<?php if (!empty($emp->emp_num_cel)): ?>
	            		<?= $emp->emp_num_cel  ?>	
	            	<?php endif ?>
	                
	            </p>
	        </div>
	        <div class="clear"></div>
	        <div id="mail-footer" class="mail-footer center-block">
	        	<?=  Html::img(Yii::$app->getUrlManager()->createAbsoluteUrl(Yii::$app->view->theme->baseUrl.'/img/'.'mail-footer.png'), ['alt' => 'logo electromax', 'class'=>'']) ?> 
	            <p>
	            	<?php if (!empty($emp->emp_mail)): ?>
	            		<?= $emp->emp_mail  ?>	
	            	<?php endif ?>
	                
	            </p>
	        </div>
	        <div class="clear"></div>
	    </div>
	    <div class="vertical-center col-md-3 col-xs-12 col-sm-4 col-lg-4">
		    <div class="center-block social-media-footer col-md-12">
		    	<div class="content-social-media center-block">
		    		<?php if (!empty($emp->emp_twitter)): ?>
				        <a target="_BLANK" href="http://www.twitter.com/<?= $emp->emp_twitter  ?>" class="tw-footer">

							<?=  Html::img(Yii::$app->getUrlManager()->createAbsoluteUrl(Yii::$app->view->theme->baseUrl.'/img/'.'tw-footer.png'), ['alt' => 'logo electromax', 'class'=>'']) ?> 	        	
				        </a>
		    		<?php endif ?>
		    		<?php if (!empty($emp->emp_facebook)): ?> 
				        <a target="_BLANK" href="http://www.fb.com/<?= $emp->emp_facebook  ?>" class="fb-footer">
				        	<?=  Html::img(Yii::$app->getUrlManager()->createAbsoluteUrl(Yii::$app->view->theme->baseUrl.'/img/'.'fb-footer.png'), ['alt' => 'logo electromax', 'class'=>'']) ?> 
				        </a>
		    		<?php endif ?>
		    	</div>
		    </div>
	    </div>
	    <div class="clear"></div>
	</div>
</footer>