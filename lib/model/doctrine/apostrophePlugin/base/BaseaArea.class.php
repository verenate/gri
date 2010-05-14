<?php

/**
 * BaseaArea
 * 
 * This class has been auto-generated by the Doctrine ORM Framework
 * 
 * @property integer $id
 * @property integer $page_id
 * @property string $name
 * @property string $culture
 * @property integer $latest_version
 * @property aPage $Page
 * @property Doctrine_Collection $AreaVersions
 * 
 * @method integer             getId()             Returns the current record's "id" value
 * @method integer             getPageId()         Returns the current record's "page_id" value
 * @method string              getName()           Returns the current record's "name" value
 * @method string              getCulture()        Returns the current record's "culture" value
 * @method integer             getLatestVersion()  Returns the current record's "latest_version" value
 * @method aPage               getPage()           Returns the current record's "Page" value
 * @method Doctrine_Collection getAreaVersions()   Returns the current record's "AreaVersions" collection
 * @method aArea               setId()             Sets the current record's "id" value
 * @method aArea               setPageId()         Sets the current record's "page_id" value
 * @method aArea               setName()           Sets the current record's "name" value
 * @method aArea               setCulture()        Sets the current record's "culture" value
 * @method aArea               setLatestVersion()  Sets the current record's "latest_version" value
 * @method aArea               setPage()           Sets the current record's "Page" value
 * @method aArea               setAreaVersions()   Sets the current record's "AreaVersions" collection
 * 
 * @package    gri
 * @subpackage model
 * @author     Your name here
 * @version    SVN: $Id: Builder.php 7490 2010-03-29 19:53:27Z jwage $
 */
abstract class BaseaArea extends sfDoctrineRecord
{
    public function setTableDefinition()
    {
        $this->setTableName('a_area');
        $this->hasColumn('id', 'integer', 4, array(
             'type' => 'integer',
             'primary' => true,
             'autoincrement' => true,
             'length' => 4,
             ));
        $this->hasColumn('page_id', 'integer', 4, array(
             'type' => 'integer',
             'length' => 4,
             ));
        $this->hasColumn('name', 'string', 100, array(
             'type' => 'string',
             'length' => 100,
             ));
        $this->hasColumn('culture', 'string', 7, array(
             'type' => 'string',
             'length' => 7,
             ));
        $this->hasColumn('latest_version', 'integer', 4, array(
             'type' => 'integer',
             'length' => 4,
             ));


        $this->index('page_index', array(
             'fields' => 
             array(
              0 => 'page_id',
             ),
             ));
        $this->option('symfony', array(
             'form' => false,
             'filter' => false,
             ));
    }

    public function setUp()
    {
        parent::setUp();
        $this->hasOne('aPage as Page', array(
             'local' => 'page_id',
             'foreign' => 'id',
             'onDelete' => 'cascade'));

        $this->hasMany('aAreaVersion as AreaVersions', array(
             'local' => 'id',
             'foreign' => 'area_id'));
    }
}