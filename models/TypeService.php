<?php
namespace app\models;

class TypeService Extends \yii\db\ActiveRecord{


	public static function tableName()
    {
        return 'type_service';
    }
    public function rules()
	{
	    return [
	        // the name, email, subject and body attributes are required
	        [['title', 'value'], 'unique'],  
	    ];
	}

}