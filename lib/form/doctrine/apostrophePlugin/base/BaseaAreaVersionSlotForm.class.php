<?php

/**
 * aAreaVersionSlot form base class.
 *
 * @method aAreaVersionSlot getObject() Returns the current form's model object
 *
 * @package    asandbox
 * @subpackage form
 * @author     Your name here
 * @version    SVN: $Id: sfDoctrineFormGeneratedTemplate.php 24171 2009-11-19 16:37:50Z Kris.Wallsmith $
 */
abstract class BaseaAreaVersionSlotForm extends BaseFormDoctrine
{
  public function setup()
  {
    $this->setWidgets(array(
      'id'              => new sfWidgetFormInputHidden(),
      'slot_id'         => new sfWidgetFormDoctrineChoice(array('model' => $this->getRelatedModelName('Slot'), 'add_empty' => true)),
      'area_version_id' => new sfWidgetFormDoctrineChoice(array('model' => $this->getRelatedModelName('AreaVersion'), 'add_empty' => true)),
      'permid'          => new sfWidgetFormInputText(),
      'rank'            => new sfWidgetFormInputText(),
    ));

    $this->setValidators(array(
      'id'              => new sfValidatorDoctrineChoice(array('model' => $this->getModelName(), 'column' => 'id', 'required' => false)),
      'slot_id'         => new sfValidatorDoctrineChoice(array('model' => $this->getRelatedModelName('Slot'), 'required' => false)),
      'area_version_id' => new sfValidatorDoctrineChoice(array('model' => $this->getRelatedModelName('AreaVersion'), 'required' => false)),
      'permid'          => new sfValidatorInteger(array('required' => false)),
      'rank'            => new sfValidatorInteger(array('required' => false)),
    ));

    $this->widgetSchema->setNameFormat('a_area_version_slot[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    $this->setupInheritance();

    parent::setup();
  }

  public function getModelName()
  {
    return 'aAreaVersionSlot';
  }

}
