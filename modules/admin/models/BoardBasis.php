<?php

namespace app\modules\admin\models;

use Yii;

/**
 * This is the model class for table "board_basis".
 *
 * @property int $id
 * @property string $title
 *
 * @property PreferenceBoardBasis[] $preferenceBoardBases
 */
class BoardBasis extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'board_basis';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['title'], 'required'],
            [['title'], 'string', 'max' => 255],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => Yii::t('app', 'ID'),
            'title' => Yii::t('app', 'Title'),
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getPreferenceBoardBases()
    {
        return $this->hasMany(PreferenceBoardBasis::className(), ['board_basis_id' => 'id']);
    }
}
