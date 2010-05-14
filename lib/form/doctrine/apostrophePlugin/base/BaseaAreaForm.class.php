<?php

/**
 * aArea form base class.
 *
 * @method aArea getObject() Returns the current form's model object
 *
 * @package    asandbox
 * @subpackage form
 * @author     Your name here
 * @version    SVN: $Id: sfDoctrineFormGeneratedTemplate.php 24171 2009-11-19 16:37:50Z Kris.Wallsmith $
 */
abstract class BaseaAreaForm extends BaseFormDoctrine
{
  public function setup()
  {
    $this->setWidgets(array(
      'id'             => new sfWidgetFormInputHidden(),
      'page_id'        => new sfWidgetFormDoctrineChoice(array('model' => $this->getRelatedModelName('Page'), 'add_empty' => true)),
      'name'           => new sfWidgetFormInputText(),
      'culture'        => new sfWidgetFormInputText(),
      'latest_version' => new sfWidgetFormInputText(),
    ));

    $this->setValidators(array(
      'id'             => new sfValidatorDoctrineChoice(array('model' => $this->getModelName(), 'column' => 'id', 'required' => false)),
      'page_id'        => new sfValidatorDoctrineChoice(array('model' => $this->getRelatedModelName('Page'), 'required' => false)),
      'name'           => new sfValidatorString(array('max_length' => 100, 'required' => false)),
      'culture'        => new sfValidatorString(array('max_length' => 7, 'required' => false)),
      'latest_version' => new sfValidatorInteger(array('required' => false)),
    ));

    $this->widgetSchema->setNameFormat('a_area[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    $this->setupInheritance();

    parent::setup();
  }

  public function getModelName()
  {
    return 'aArea';
  }

}
