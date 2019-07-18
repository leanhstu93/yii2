<?php

namespace frontend\models;

use Yii;

/**
 * This is the model class for table "router".
 *
 * @property int $id
 * @property int $idObject
 * @property string $alias
 * @property int $type
 * @property int $active
 */
class Router extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'router';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['idObject', 'alias', 'type', 'active'], 'required'],
            [['idObject', 'type', 'active'], 'integer'],
            [['alias'], 'string', 'max' => 255],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'idObject' => 'Id Object',
            'alias' => 'Alias',
            'type' => 'Type',
            'active' => 'Active',
        ];
    }

    public static function processRouter($data,$exc = 'create')
    {
        extract($data);
        /**
         * @property $alias
         * @property $idObject
         * @property $type
         */
        switch ($exc) {
            case 'create':
                $router = \Router::model()->find("alias = '$alias'");
                if(!empty($router)) {
                    $alias = $alias .'-'.$idObject;
                }
                $self = new Router;
                $self->attributes = $data;
                $self->alias = $alias;
                $self->save();
                break;
            case 'update':
                $self = Router::model()->find("idObject = $idObject AND type = $type");
                if(!empty($router)) {
                    # check alias ton tai
                    $check  = Router::model()->find("alias = '$alias' AND idObject != $idObject ");
                    if(!empty($check)) {
                        $alias = $alias.'-'.$idObject;
                    }
                    # END
                    $self->alias = $alias;
                    $self->save();
                }
                break;
            case 'delete':
                $self = Router::model()->find("idObject = $idObject AND type = $type")->delete();
                break;
        }

    }
}
