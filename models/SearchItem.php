<?php declare(strict_types=1);

namespace app\models;

use app\serializers\JsonSerializer;
use app\serializers\JsonSerializerInterface;
use yii\data\ActiveDataProvider;

/**
 * SearchItem represents the model behind the search form of `\app\models\Item`.
 */
class SearchItem extends Item implements JsonSerializerInterface
{
    use JsonSerializer;

    /**
     * @var string
     */
    public $name;
    /**
     * @var string
     */
    public $color;

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['name', 'color'], 'string', 'length' => [2, 100]],
        ];
    }

    public function attributeLabels()
    {
        return [
            'name' => \Yii::t('app', 'Name'),
            'color' => \Yii::t('app', 'Color'),
        ];
    }

    public function afterFind()
    {
        $this->data = $this->decode($this->data);
    }

    /**
     * Creates data provider instance with search query applied
     *
     * @param array $params
     *
     * @return ActiveDataProvider
     */
    public function search($params)
    {
        $query = self::find();

        // add conditions that should always apply here

        $dataProvider = new ActiveDataProvider(
            [
                'query' => $query,
                'sort' => false,
            ]
        );

        $this->load($params);

        if (!$this->validate()) {
            // uncomment the following line if you do not want to return any records when validation fails
            // $query->where('0=1');
            return $dataProvider;
        }

        // grid filtering conditions
        $query
            ->andFilterWhere(['ILIKE', '(data ->> \'name\')', $this->name])
            ->andFilterWhere(['ILIKE', '(data ->> \'color\')', $this->color])
        ;

        return $dataProvider;
    }
}
