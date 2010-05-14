<?php

/**
 * aSlot form base class.
 *
 * @method aSlot getObject() Returns the current form's model object
 *
 * @package    asandbox
 * @subpackage form
 * @author     Your name here
 * @version    SVN: $Id: sfDoctrineFormGeneratedTemplate.php 24171 2009-11-19 16:37:50Z Kris.Wallsmith $
 */
abstract class BaseaSlotForm extends BaseFormDoctrine
{
  public function setup()
  {
    $this->setWidgets(array(
      'id'               => new sfWidgetFormInputHidden(),
      'type'             => new sfWidgetFormInputText(),
      'variant'          => new sfWidgetFormInputText(),
      'value'            => new sfWidgetFormTextarea(),
      'media_items_list' => new sfWidgetFormDoctrineChoice(array('multiple' => true, 'model' => 'aMediaItem')),
    ));

    $this->setValidators(array(
      'id'               => new sfValidatorDoctrineChoice(array('model' => $this->getModelName(), 'column' => 'id', 'required' => false)),
      'type'             => new sfValidatorString(array('max_length' => 100, 'required' => false)),
      'variant'          => new sfValidatorString(array('max_length' => 100, 'required' => false)),
      'value'            => new sfValidatorString(array('required' => false)),
      'media_items_list' => new sfValidatorDoctrineChoice(array('multiple' => true, 'model' => 'aMediaItem', 'required' => false)),
    ));

    $this->widgetSchema->setNameFormat('a_slot[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    $this->setupInheritance();

    parent::setup();
  }

  public function getModelName()
  {
    return 'aSlot';
  }

  public function updateDefaultsFromObject()
  {
    parent::updateDefaultsFromObject();

    if (isset($this->widgetSchema['media_items_list']))
    {
      $this->setDefault('media_items_list', $this->object->MediaItems->getPrimaryKeys());
    }

  }

  protected function doSave($con = null)
  {
    $this->saveMediaItemsList($con);

    parent::doSave($con);
  }

  public function saveMediaItemsList($con = null)
  {
    if (!$this->isValid())
    {
      throw $this->getErrorSchema();
    }

    if (!isset($this->widgetSchema['media_items_list']))
    {
      // somebody has unset this widget
      return;
    }

    if (null === $con)
    {
      $con = $this->getConnection();
    }

    $existing = $this->object->MediaItems->getPrimaryKeys();
    $values = $this->getValue('media_items_list');
    if (!is_array($values))
    {
      $values = array();
    }

    $unlink = array_diff($existing, $values);
    if (count($unlink))
    {
      $this->object->unlink('MediaItems', array_values($unlink));
    }

    $link = array_diff($values, $existing);
    if (count($link))
    {
      $this->object->link('MediaItems', array_values($link));
    }
  }

}
