<?php

/**
 * aAreaVersionSlot filter form base class.
 *
 * @package    asandbox
 * @subpackage filter
 * @author     Your name here
 * @version    SVN: $Id: sfDoctrineFormFilterGeneratedTemplate.php 24171 2009-11-19 16:37:50Z Kris.Wallsmith $
 */
abstract class BaseaAreaVersionSlotFormFilter extends BaseFormFilterDoctrine
{
  public function setup()
  {
    $this->setWidgets(array(
      'slot_id'         => new sfWidgetFormDoctrineChoice(array('model' => $this->getRelatedModelName('Slot'), 'add_empty' => true)),
      'area_version_id' => new sfWidgetFormDoctrineChoice(array('model' => $this->getRelatedModelName('AreaVersion'), 'add_empty' => true)),
      'permid'          => new sfWidgetFormFilterInput(),
      'rank'            => new sfWidgetFormFilterInput(),
    ));

    $this->setValidators(array(
      'slot_id'         => new sfValidatorDoctrineChoice(array('required' => false, 'model' => $this->getRelatedModelName('Slot'), 'column' => 'id')),
      'area_version_id' => new sfValidatorDoctrineChoice(array('required' => false, 'model' => $this->getRelatedModelName('AreaVersion'), 'column' => 'id')),
      'permid'          => new sfValidatorSchemaFilter('text', new sfValidatorInteger(array('required' => false))),
      'rank'            => new sfValidatorSchemaFilter('text', new sfValidatorInteger(array('required' => false))),
    ));

    $this->widgetSchema->setNameFormat('a_area_version_slot_filters[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    $this->setupInheritance();

    parent::setup();
  }

  public function getModelName()
  {
    return 'aAreaVersionSlot';
  }

  public function getFields()
  {
    return array(
      'id'              => 'Number',
      'slot_id'         => 'ForeignKey',
      'area_version_id' => 'ForeignKey',
      'permid'          => 'Number',
      'rank'            => 'Number',
    );
  }
}
