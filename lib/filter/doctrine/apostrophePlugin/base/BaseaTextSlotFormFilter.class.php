<?php

/**
 * aTextSlot filter form base class.
 *
 * @package    asandbox
 * @subpackage filter
 * @author     Your name here
 * @version    SVN: $Id: sfDoctrineFormFilterGeneratedInheritanceTemplate.php 24171 2009-11-19 16:37:50Z Kris.Wallsmith $
 */
abstract class BaseaTextSlotFormFilter extends aSlotFormFilter
{
  protected function setupInheritance()
  {
    parent::setupInheritance();

    $this->widgetSchema->setNameFormat('a_text_slot_filters[%s]');
  }

  public function getModelName()
  {
    return 'aTextSlot';
  }
}
