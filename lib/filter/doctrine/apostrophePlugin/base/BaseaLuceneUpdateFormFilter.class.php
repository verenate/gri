<?php

/**
 * aLuceneUpdate filter form base class.
 *
 * @package    asandbox
 * @subpackage filter
 * @author     Your name here
 * @version    SVN: $Id: sfDoctrineFormFilterGeneratedTemplate.php 24171 2009-11-19 16:37:50Z Kris.Wallsmith $
 */
abstract class BaseaLuceneUpdateFormFilter extends BaseFormFilterDoctrine
{
  public function setup()
  {
    $this->setWidgets(array(
      'page_id' => new sfWidgetFormDoctrineChoice(array('model' => $this->getRelatedModelName('Page'), 'add_empty' => true)),
      'culture' => new sfWidgetFormFilterInput(),
    ));

    $this->setValidators(array(
      'page_id' => new sfValidatorDoctrineChoice(array('required' => false, 'model' => $this->getRelatedModelName('Page'), 'column' => 'id')),
      'culture' => new sfValidatorPass(array('required' => false)),
    ));

    $this->widgetSchema->setNameFormat('a_lucene_update_filters[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    $this->setupInheritance();

    parent::setup();
  }

  public function getModelName()
  {
    return 'aLuceneUpdate';
  }

  public function getFields()
  {
    return array(
      'id'      => 'Number',
      'page_id' => 'ForeignKey',
      'culture' => 'Text',
    );
  }
}
