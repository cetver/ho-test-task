<?php declare(strict_types=1);

namespace app\controllers;

use app\models\SearchItem;
use yii\web\Controller;
use yii\web\Request;

/**
 * ItemsController implements the CRUD actions for Item model.
 */
class ItemsController extends Controller
{
    /**
     * @var Request
     */
    private $request;
    /**
     * @var SearchItem
     */
    private $searchItem;

    public function __construct($id, $module, Request $request, SearchItem $searchItem, $config = [])
    {
        $this->request = $request;
        $this->searchItem = $searchItem;
        parent::__construct($id, $module, $config);
    }

    /**
     * Lists all Item models.
     *
     * @return mixed
     */
    public function actionIndex()
    {
        $dataProvider = $this->searchItem->search($this->request->queryParams);

        return $this->render(
            'index',
            [
                'searchModel'  => $this->searchItem,
                'dataProvider' => $dataProvider,
            ]
        );
    }
}
