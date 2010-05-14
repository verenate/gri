<?php

/**
 * aBlogEvent form base class.
 *
 * @method aBlogEvent getObject() Returns the current form's model object
 *
 * @package    asandbox
 * @subpackage form
 * @author     Your name here
 * @version    SVN: $Id: sfDoctrineFormGeneratedInheritanceTemplate.php 24171 2009-11-19 16:37:50Z Kris.Wallsmith $
 */
abstract class BaseaBlogEventForm extends aBlogItemForm
{
  protected function setupInheritance()
  {
    parent::setupInheritance();

    $this->widgetSchema->setNameFormat('a_blog_event[%s]');
  }

  public function getModelName()
  {
    return 'aBlogEvent';
  }

}
