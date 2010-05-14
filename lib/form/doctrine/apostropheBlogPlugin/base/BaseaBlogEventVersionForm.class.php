<?php

/**
 * aBlogEventVersion form base class.
 *
 * @method aBlogEventVersion getObject() Returns the current form's model object
 *
 * @package    asandbox
 * @subpackage form
 * @author     Your name here
 * @version    SVN: $Id: sfDoctrineFormGeneratedTemplate.php 24171 2009-11-19 16:37:50Z Kris.Wallsmith $
 */
abstract class BaseaBlogEventVersionForm extends BaseFormDoctrine
{
  public function setup()
  {
    $this->setWidgets(array(
      'id'           => new sfWidgetFormInputHidden(),
      'type'         => new sfWidgetFormChoice(array('choices' => array('post' => 'post', 'event' => 'event'))),
      'author_id'    => new sfWidgetFormInputText(),
      'category_id'  => new sfWidgetFormInputText(),
      'title'        => new sfWidgetFormInputText(),
      'excerpt'      => new sfWidgetFormTextarea(),
      'body'         => new sfWidgetFormTextarea(),
      'published'    => new sfWidgetFormInputCheckbox(),
      'published_at' => new sfWidgetFormDateTime(),
      'media'        => new sfWidgetFormTextarea(),
      'start_date'   => new sfWidgetFormDate(),
      'start_time'   => new sfWidgetFormTime(),
      'end_date'     => new sfWidgetFormDate(),
      'end_time'     => new sfWidgetFormTime(),
      'created_at'   => new sfWidgetFormDateTime(),
      'updated_at'   => new sfWidgetFormDateTime(),
      'slug'         => new sfWidgetFormInputText(),
      'version'      => new sfWidgetFormInputHidden(),
    ));

    $this->setValidators(array(
      'id'           => new sfValidatorDoctrineChoice(array('model' => $this->getModelName(), 'column' => 'id', 'required' => false)),
      'type'         => new sfValidatorChoice(array('choices' => array('post' => 'post', 'event' => 'event'))),
      'author_id'    => new sfValidatorInteger(array('required' => false)),
      'category_id'  => new sfValidatorInteger(array('required' => false)),
      'title'        => new sfValidatorString(array('max_length' => 255)),
      'excerpt'      => new sfValidatorString(array('required' => false)),
      'body'         => new sfValidatorString(array('required' => false)),
      'published'    => new sfValidatorBoolean(array('required' => false)),
      'published_at' => new sfValidatorDateTime(array('required' => false)),
      'media'        => new sfValidatorString(array('required' => false)),
      'start_date'   => new sfValidatorDate(array('required' => false)),
      'start_time'   => new sfValidatorTime(array('required' => false)),
      'end_date'     => new sfValidatorDate(array('required' => false)),
      'end_time'     => new sfValidatorTime(array('required' => false)),
      'created_at'   => new sfValidatorDateTime(),
      'updated_at'   => new sfValidatorDateTime(),
      'slug'         => new sfValidatorString(array('max_length' => 255, 'required' => false)),
      'version'      => new sfValidatorDoctrineChoice(array('model' => $this->getModelName(), 'column' => 'version', 'required' => false)),
    ));

    $this->widgetSchema->setNameFormat('a_blog_event_version[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    $this->setupInheritance();

    parent::setup();
  }

  public function getModelName()
  {
    return 'aBlogEventVersion';
  }

}
