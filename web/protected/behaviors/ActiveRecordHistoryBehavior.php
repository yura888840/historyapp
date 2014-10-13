<?php

class ActiveRecordHistoryBehavior extends CActiveRecordBehavior
{
    private $_oldattributes = array();
 
    public function afterSave($event)
    {
        if (!$this->Owner->isNewRecord) {

            $newattributes = $this->Owner->getAttributes();
            $oldattributes = $this->getOldAttributes();
 
            // compare old and new
            foreach ($newattributes as $name => $value) {
                //check if attribute in list Save History
                if(!in_array($name, $this->Owner->attributesHistory)) continue;
                if (!empty($oldattributes)) {
                    $old = $oldattributes[$name];
                } else {
                    $old = '';
                }
 
                if ($value != $old) {
 
                    $history=new ActiveRecordHistory;

                    $history->value=        $value;
                    $history->model=        get_class($this->Owner);
                    $history->idModel=      $this->Owner->getPrimaryKey();
                    $history->field=        $name;
                    $history->creationdate= new CDbExpression('NOW()');
                    $history->userid=           Yii::app()->user->id;

                    if(!$history->save()) print_r($history->getErrors());
                }
            }
        }

    }
 
    public function afterFind($event)
    {
        $this->setOldAttributes($this->Owner->getAttributes());
    }
 
    public function getOldAttributes()
    {
        return $this->_oldattributes;
    }
 
    public function setOldAttributes($value)
    {
        $this->_oldattributes=$value;
    }

    public function getHistory($forwhat = array())
    {
        if(!$forwhat) return array();
        $history = array();
        $class =   get_class($this->Owner);
        $modelId = $this->Owner->id;

        $history = ActiveRecordHistory::model()->findAllByAttributes(array('model'=>    $class, 
                                                                           'idModel' => $modelId,
                                                                           'field' =>   $forwhat,
                                                                    ));
        $historyFormatted =  CHtml::listData($history, 'creationdate', 'value');

        return $historyFormatted;
    }
}
