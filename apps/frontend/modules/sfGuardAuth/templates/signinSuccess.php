<?php use_helper('I18N', 'jQuery') ?>

<?php slot('a-tabs', '') ?>
<?php slot('a-login', '') ?>

<div id="a-signin">
  <form action="<?php echo url_for('@sf_guard_signin') ?>" method="post" id="a-signin-form" <?php echo ($form->hasErrors())? 'class="has-errors"':''; ?>>
  	<?php echo $form->renderHiddenFields() ?>

		<div class="a-form-row">
    	<?php echo $form['username']->renderLabel() ?>
    	<?php echo $form['username']->render() ?>
    	<?php echo $form['username']->renderError() ?>
		</div>
		
		<div class="a-form-row">		
    	<?php echo $form['password']->renderLabel() ?>
    	<?php echo $form['password']->render() ?>
    	<?php echo $form['password']->renderError() ?>
		</div>

		<div class="a-form-row">
    	<?php echo $form['remember']->renderRow() ?>
		</div>
		
		<ul class="a-form-row submit">
    	<li>
				<button type="submit" class="a-btn"><?php echo __('sign in', '', 'apostrophe') ?></button>
			</li>
		</ul>
		
  </form>
</div>
