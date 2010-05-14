<?php

/**
 * aRichTextSlot form base class.
 *
 * @method aRichTextSlot getObject() Returns the current form's model object
 *
 * @package    asandbox
 * @subpackage form
 * @author     Your name here
 * @version    SVN: $Id: sfDoctrineFormGeneratedInheritanceTemplate.php 24171 2009-11-19 16:37:50Z Kris.Wallsmith $
 */
abstract class BaseaRichTextSlotForm extends aSlotForm
{
  protected function setupInheritance()
  {
    parent::setupInheritance();

    $this->widgetSchema->setNameFormat('a_rich_text_slot[%s]');
  }

  public function getModelName()
  {
    return 'aRichTextSlot';
  }

}
