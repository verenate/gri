<?php

/**
 * aMediaCategory form base class.
 *
 * @method aMediaCategory getObject() Returns the current form's model object
 *
 * @package    gri
 * @subpackage form
 * @author     Your name here
 * @version    SVN: $Id: sfDoctrineFormGeneratedTemplate.php 24171 2009-11-19 16:37:50Z Kris.Wallsmith $
 */
abstract class BaseaMediaCategoryForm extends BaseFormDoctrine
{
  public function setup()
  {
    $this->setWidgets(array(
      'id'               => new sfWidgetFormInputHidden(),
      'name'             => new sfWidgetFormInputText(),
      'description'      => new sfWidgetFormTextarea(),
      'created_at'       => new sfWidgetFormDateTime(),
      'updated_at'       => new sfWidgetFormDateTime(),
      'slug'             => new sfWidgetFormInputText(),
      'media_items_list' => new sfWidgetFormDoctrineChoice(array('multiple' => true, 'model' => 'aMediaItem')),
      'pages_list'       => new sfWidgetFormDoctrineChoice(array('multiple' => true, 'model' => 'aPage')),
    ));

    $this->setValidators(array(
      'id'               => new sfValidatorDoctrineChoice(array('model' => $this->getModelName(), 'column' => 'id', 'required' => false)),
      'name'             => new sfValidatorString(array('max_length' => 255, 'required' => false)),
      'description'      => new sfValidatorString(array('required' => false)),
      'created_at'       => new sfValidatorDateTime(),
      'updated_at'       => new sfValidatorDateTime(),
      'slug'             => new sfValidatorString(array('max_length' => 255, 'required' => false)),
      'media_items_list' => new sfValidatorDoctrineChoice(array('multiple' => true, 'model' => 'aMediaItem', 'required' => false)),
      'pages_list'       => new sfValidatorDoctrineChoice(array('multiple' => true, 'model' => 'aPage', 'required' => false)),
    ));

    $this->validatorSchema->setPostValidator(
      new sfValidatorAnd(array(
        new sfValidatorDoctrineUnique(array('model' => 'aMediaCategory', 'column' => array('name'))),
        new sfValidatorDoctrineUnique(array('model' => 'aMediaCategory', 'column' => array('slug'))),
      ))
    );

    $this->widgetSchema->setNameFormat('a_media_category[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    $this->setupInheritance();

    parent::setup();
  }

  public function getModelName()
  {
    return 'aMediaCategory';
  }

  public function updateDefaultsFromObject()
  {
    parent::updateDefaultsFromObject();

    if (isset($this->widgetSchema['media_items_list']))
    {
      $this->setDefault('media_items_list', $this->object->MediaItems->getPrimaryKeys());
    }

    if (isset($this->widgetSchema['pages_list']))
    {
      $this->setDefault('pages_list', $this->object->Pages->getPrimaryKeys());
    }

  }

  protected function doSave($con = null)
  {
    $this->saveMediaItemsList($con);
    $this->savePagesList($con);

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

  public function savePagesList($con = null)
  {
    if (!$this->isValid())
    {
      throw $this->getErrorSchema();
    }

    if (!isset($this->widgetSchema['pages_list']))
    {
      // somebody has unset this widget
      return;
    }

    if (null === $con)
    {
      $con = $this->getConnection();
    }

    $existing = $this->object->Pages->getPrimaryKeys();
    $values = $this->getValue('pages_list');
    if (!is_array($values))
    {
      $values = array();
    }

    $unlink = array_diff($existing, $values);
    if (count($unlink))
    {
      $this->object->unlink('Pages', array_values($unlink));
    }

    $link = array_diff($values, $existing);
    if (count($link))
    {
      $this->object->link('Pages', array_values($link));
    }
  }

}
