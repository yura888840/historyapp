<?php

/**
 * This is the model class for table "goods".
 *
 */
class Goods extends CActiveRecord
{

    protected $attributesHistory = array(
        'price',
    );

    /**
     * Returns the static model of the specified AR class.
     * @param string $className active record class name.
     * @return Page the static model class
     */
    public static function model($className = __CLASS__)
    {
        return parent::model($className);
    }

    /**
     * @return string the associated database table name
     */
    public function tableName()
    {
        return 'goods';
    }

    public function behaviors()
    {
        return array(
            // Classname => path to Class
            'ActiveRecordHistoryBehavior'=>
                'application.behaviors.ActiveRecordHistoryBehavior',
        );
    }

    /**
     * @return array validation rules for model attributes.
     */
    public function rules()
    {
        // NOTE: you should only define rules for those attributes that
        // will receive user inputs.
        return array(
            array('link', 'length', 'max' => 64),
            array('name', 'length', 'max' => 256),
            array('title', 'length', 'max' => 512),
            array('projects_list', 'length', 'max' => 128),
            array('content, description, keywords, projectIds', 'safe'),
            // The following rule is used by search().
            // Please remove those attributes that should not be searched.
            array('client_id', 'safe', 'on' => 'search'),
        );
    }

    /**
     * @return array relational rules.
     */
    public function relations()
    {
        // NOTE: you may need to adjust the relation name and the related
        // class name for the relations automatically generated below.
        return array(
        );
    }

    /**
     * Retrieves a list of models based on the current search/filter conditions.
     * @return CActiveDataProvider the data provider that can return the models based on the search/filter conditions.
     */
    public function search()
    {
        // Warning: Please modify the following code to remove attributes that
        // should not be searched.

        $criteria = new CDbCriteria;

        $criteria->compare('id', $this->id);

        return new CActiveDataProvider($this, array(
            'criteria' => $criteria,
        ));
    }


}
