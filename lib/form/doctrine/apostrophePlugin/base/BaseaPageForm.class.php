<?php

/**
 * aPage form base class.
 *
 * @method aPage getObject() Returns the current form's model object
 *
 * @package    gri
 * @subpackage form
 * @author     Your name here
 * @version    SVN: $Id: sfDoctrineFormGeneratedTemplate.php 24171 2009-11-19 16:37:50Z Kris.Wallsmith $
 */
abstract class BaseaPageForm extends BaseFormDoctrine
{
  public function setup()
  {
    $this->setWidgets(array(
      'id'                    => new sfWidgetFormInputHidden(),
      'slug'                  => new sfWidgetFormInputText(),
      'template'              => new sfWidgetFormInputText(),
      'view_is_secure'        => new sfWidgetFormInputCheckbox(),
      'archived'              => new sfWidgetFormInputCheckbox(),
      'admin'                 => new sfWidgetFormInputCheckbox(),
      'author_id'             => new sfWidgetFormDoctrineChoice(array('model' => $this->getRelatedModelName('Author'), 'add_empty' => true)),
      'deleter_id'            => new sfWidgetFormInputText(),
      'engine'                => new sfWidgetFormInputText(),
      'created_at'            => new sfWidgetFormDateTime(),
      'updated_at'            => new sfWidgetFormDateTime(),
      'lft'                   => new sfWidgetFormInputText(),
      'rgt'                   => new sfWidgetFormInputText(),
      'level'                 => new sfWidgetFormInputText(),
      'media_categories_list' => new sfWidgetFormDoctrineChoice(array('multiple' => true, 'model' => 'aMediaCategory')),
    ));

    $this->setValidators(array(
      'id'                    => new sfValidatorDoctrineChoice(array('model' => $this->getModelName(), 'column' => 'id', 'required' => false)),
      'slug'                  => new sfValidatorString(array('max_length' => 255, 'required' => false)),
      'template'              => new sfValidatorString(array('max_length' => 100, 'required' => false)),
      'view_is_secure'        => new sfValidatorBoolean(array('required' => false)),
      'archived'              => new sfValidatorBoolean(array('required' => false)),
      'admin'                 => new sfValidatorBoolean(array('required' => false)),
      'author_id'             => new sfValidatorDoctrineChoice(array('model' => $this->getRelatedModelName('Author'), 'required' => false)),
      'deleter_id'            => new sfValidatorInteger(array('required' => false)),
      'engine'                => new sfValidatorString(array('max_length' => 255, 'required' => false)),
      'created_at'            => new sfValidatorDateTime(),
      'updated_at'            => new sfValidatorDateTime(),
      'lft'                   => new sfValidatorInteger(array('required' => false)),
      'rgt'                   => new sfValidatorInteger(array('required' => false)),
      'level'                 => new sfValidatorInteger(array('required' => false)),
      'media_categories_list' => new sfValidatorDoctrineChoice(array('multiple' => true, 'model' => 'aMediaCategory', 'required' => false)),
    ));

    $this->validatorSchema->setPostValidator(
      new sfValidatorDoctrineUnique(array('model' => 'aPage', 'column' => array('slug')))
    );

    $this->widgetSchema->setNameFormat('a_page[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    $this->setupInheritance();

    parent::setup();
  }

  public function getModelName()
  {
    return 'aPage';
  }

  public function updateDefaultsFromObject()
  {
    parent::updateDefaultsFromObject();

    if (isset($this->widgetSchema['media_categories_list']))
    {
      $this->setDefault('media_categories_list', $this->object->MediaCategories->getPrimaryKeys());
    }

  }

  protected function doSave($con = null)
  {
    $this->saveMediaCategoriesList($con);

    parent::doSave($con);
  }

  public function saveMediaCategoriesList($con = null)
  {
    if (!$this->isValid())
    {
      throw $this->getErrorSchema();
    }

    if (!isset($this->widgetSchema['media_categories_list']))
    {
      // somebody has unset this widget
      return;
    }

    if (null === $con)
    {
      $con = $this->getConnection();
    }

    $existing = $this->object->MediaCategories->getPrimaryKeys();
    $values = $this->getValue('media_categories_list');
    if (!is_array($values))
    {
      $values = array();
    }

    $unlink = array_diff($existing, $values);
    if (count($unlink))
    {
      $this->object->unlink('MediaCategories', array_values($unlink));
    }

    $link = array_diff($values, $existing);
    if (count($link))
    {
      $this->object->link('MediaCategories', array_values($link));
    }
  }

}
