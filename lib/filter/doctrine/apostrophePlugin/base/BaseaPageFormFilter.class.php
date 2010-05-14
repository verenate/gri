<?php

/**
 * aPage filter form base class.
 *
 * @package    gri
 * @subpackage filter
 * @author     Your name here
 * @version    SVN: $Id: sfDoctrineFormFilterGeneratedTemplate.php 24171 2009-11-19 16:37:50Z Kris.Wallsmith $
 */
abstract class BaseaPageFormFilter extends BaseFormFilterDoctrine
{
  public function setup()
  {
    $this->setWidgets(array(
      'slug'                  => new sfWidgetFormFilterInput(),
      'template'              => new sfWidgetFormFilterInput(),
      'view_is_secure'        => new sfWidgetFormChoice(array('choices' => array('' => 'yes or no', 1 => 'yes', 0 => 'no'))),
      'archived'              => new sfWidgetFormChoice(array('choices' => array('' => 'yes or no', 1 => 'yes', 0 => 'no'))),
      'admin'                 => new sfWidgetFormChoice(array('choices' => array('' => 'yes or no', 1 => 'yes', 0 => 'no'))),
      'author_id'             => new sfWidgetFormDoctrineChoice(array('model' => $this->getRelatedModelName('Author'), 'add_empty' => true)),
      'deleter_id'            => new sfWidgetFormFilterInput(),
      'engine'                => new sfWidgetFormFilterInput(),
      'created_at'            => new sfWidgetFormFilterDate(array('from_date' => new sfWidgetFormDate(), 'to_date' => new sfWidgetFormDate(), 'with_empty' => false)),
      'updated_at'            => new sfWidgetFormFilterDate(array('from_date' => new sfWidgetFormDate(), 'to_date' => new sfWidgetFormDate(), 'with_empty' => false)),
      'lft'                   => new sfWidgetFormFilterInput(),
      'rgt'                   => new sfWidgetFormFilterInput(),
      'level'                 => new sfWidgetFormFilterInput(),
      'media_categories_list' => new sfWidgetFormDoctrineChoice(array('multiple' => true, 'model' => 'aMediaCategory')),
    ));

    $this->setValidators(array(
      'slug'                  => new sfValidatorPass(array('required' => false)),
      'template'              => new sfValidatorPass(array('required' => false)),
      'view_is_secure'        => new sfValidatorChoice(array('required' => false, 'choices' => array('', 1, 0))),
      'archived'              => new sfValidatorChoice(array('required' => false, 'choices' => array('', 1, 0))),
      'admin'                 => new sfValidatorChoice(array('required' => false, 'choices' => array('', 1, 0))),
      'author_id'             => new sfValidatorDoctrineChoice(array('required' => false, 'model' => $this->getRelatedModelName('Author'), 'column' => 'id')),
      'deleter_id'            => new sfValidatorSchemaFilter('text', new sfValidatorInteger(array('required' => false))),
      'engine'                => new sfValidatorPass(array('required' => false)),
      'created_at'            => new sfValidatorDateRange(array('required' => false, 'from_date' => new sfValidatorDateTime(array('required' => false, 'datetime_output' => 'Y-m-d 00:00:00')), 'to_date' => new sfValidatorDateTime(array('required' => false, 'datetime_output' => 'Y-m-d 23:59:59')))),
      'updated_at'            => new sfValidatorDateRange(array('required' => false, 'from_date' => new sfValidatorDateTime(array('required' => false, 'datetime_output' => 'Y-m-d 00:00:00')), 'to_date' => new sfValidatorDateTime(array('required' => false, 'datetime_output' => 'Y-m-d 23:59:59')))),
      'lft'                   => new sfValidatorSchemaFilter('text', new sfValidatorInteger(array('required' => false))),
      'rgt'                   => new sfValidatorSchemaFilter('text', new sfValidatorInteger(array('required' => false))),
      'level'                 => new sfValidatorSchemaFilter('text', new sfValidatorInteger(array('required' => false))),
      'media_categories_list' => new sfValidatorDoctrineChoice(array('multiple' => true, 'model' => 'aMediaCategory', 'required' => false)),
    ));

    $this->widgetSchema->setNameFormat('a_page_filters[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    $this->setupInheritance();

    parent::setup();
  }

  public function addMediaCategoriesListColumnQuery(Doctrine_Query $query, $field, $values)
  {
    if (!is_array($values))
    {
      $values = array($values);
    }

    if (!count($values))
    {
      return;
    }

    $query->leftJoin('r.aMediaPageCategory aMediaPageCategory')
          ->andWhereIn('aMediaPageCategory.media_category_id', $values);
  }

  public function getModelName()
  {
    return 'aPage';
  }

  public function getFields()
  {
    return array(
      'id'                    => 'Number',
      'slug'                  => 'Text',
      'template'              => 'Text',
      'view_is_secure'        => 'Boolean',
      'archived'              => 'Boolean',
      'admin'                 => 'Boolean',
      'author_id'             => 'ForeignKey',
      'deleter_id'            => 'Number',
      'engine'                => 'Text',
      'created_at'            => 'Date',
      'updated_at'            => 'Date',
      'lft'                   => 'Number',
      'rgt'                   => 'Number',
      'level'                 => 'Number',
      'media_categories_list' => 'ManyKey',
    );
  }
}
