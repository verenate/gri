<?php use_helper('jQuery', 'I18N') ?>

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
				<button type="submit" class="a-btn"><?php echo __('sign in', null, 'apostrophe') ?></button>
			</li>
			<li>
				<?php echo jq_link_to_function(__('Cancel', null, 'apostrophe'), "$('#a-login-form-container').fadeOut('fast'); $('.a-page-overlay').fadeOut('fast');", array('class' => 'a-cancel event-default', )) ?>
			</li>
		</ul>
		
  </form>
</div>
