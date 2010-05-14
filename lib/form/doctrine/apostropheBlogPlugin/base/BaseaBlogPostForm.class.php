<?php

/**
 * aBlogPost form base class.
 *
 * @method aBlogPost getObject() Returns the current form's model object
 *
 * @package    asandbox
 * @subpackage form
 * @author     Your name here
 * @version    SVN: $Id: sfDoctrineFormGeneratedInheritanceTemplate.php 24171 2009-11-19 16:37:50Z Kris.Wallsmith $
 */
abstract class BaseaBlogPostForm extends aBlogItemForm
{
  protected function setupInheritance()
  {
    parent::setupInheritance();

    $this->widgetSchema->setNameFormat('a_blog_post[%s]');
  }

  public function getModelName()
  {
    return 'aBlogPost';
  }

}
