<?php

/**
 * aSlot filter form base class.
 *
 * @package    asandbox
 * @subpackage filter
 * @author     Your name here
 * @version    SVN: $Id: sfDoctrineFormFilterGeneratedTemplate.php 24171 2009-11-19 16:37:50Z Kris.Wallsmith $
 */
abstract class BaseaSlotFormFilter extends BaseFormFilterDoctrine
{
  public function setup()
  {
    $this->setWidgets(array(
      'type'             => new sfWidgetFormFilterInput(),
      'variant'          => new sfWidgetFormFilterInput(),
      'value'            => new sfWidgetFormFilterInput(),
      'media_items_list' => new sfWidgetFormDoctrineChoice(array('multiple' => true, 'model' => 'aMediaItem')),
    ));

    $this->setValidators(array(
      'type'             => new sfValidatorPass(array('required' => false)),
      'variant'          => new sfValidatorPass(array('required' => false)),
      'value'            => new sfValidatorPass(array('required' => false)),
      'media_items_list' => new sfValidatorDoctrineChoice(array('multiple' => true, 'model' => 'aMediaItem', 'required' => false)),
    ));

    $this->widgetSchema->setNameFormat('a_slot_filters[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    $this->setupInheritance();

    parent::setup();
  }

  public function addMediaItemsListColumnQuery(Doctrine_Query $query, $field, $values)
  {
    if (!is_array($values))
    {
      $values = array($values);
    }

    if (!count($values))
    {
      return;
    }

    $query->leftJoin('r.aSlotMediaItem aSlotMediaItem')
          ->andWhereIn('aSlotMediaItem.media_item_id', $values);
  }

  public function getModelName()
  {
    return 'aSlot';
  }

  public function getFields()
  {
    return array(
      'id'               => 'Number',
      'type'             => 'Text',
      'variant'          => 'Text',
      'value'            => 'Text',
      'media_items_list' => 'ManyKey',
    );
  }
}
