<?php

namespace Controllers;

use Core\Controller;
use Models\MoveModel;
use Models\PaintModel;
use Models\ConsignmentModel;
use Models\ReportModel;

/**
 * Class ReportController
 * @package Controllers
 */
class ReportController extends Controller
{
    public function actionMain()
    {
        $moves = MoveModel::read();

        $this->render('read', ['moves' => $moves]);
    }

    public function actionStock()
    {
        $stocks = [
            ['id' => 1, 'name' => 'основной склад'],
            ['id' => 2, 'name' => 'склад в цеху'],
        ];

        $stocks = ReportModel::getRemains(
            $stocks,
            'paint.name AS paint_name',
            'WHERE wf.id = :id OR wt.id = :id
             GROUP BY paint_name'
        );

        $this->render('stock', ['stocks' => $stocks]);
    }

    public function actionPaint()
    {
        $paints = PaintModel::read();

        $paints = ReportModel::getRemains(
            $paints,
            'IFNULL(wf.name, wt.name) AS stock',
            'WHERE paint.id = :id
             GROUP BY stock'
        );

        $this->render('paint', ['paints' => $paints]);
    }

    public function actionConsignment()
    {
        $consignments = ConsignmentModel::read();

        $consignments = ReportModel::getRemains(
            $consignments,
            'IFNULL(wf.name, wt.name) AS stock',
            'WHERE consignment.id = :id
             GROUP BY stock'
        );

        $this->render('consignment', ['consignments' => $consignments]);
    }

    public function actionTo()
    {
        $list = ReportModel::getDataForType(1);

        $this->render('to', ['list' => $list]);
    }

    public function actionFrom()
    {
        $list = ReportModel::getDataForType(4);

        $this->render('from', ['list' => $list]);
    }
}