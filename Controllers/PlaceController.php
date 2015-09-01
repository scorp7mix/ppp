<?php

namespace Controllers;

use Core\Controller;
use Models\PlaceModel;

class PlaceController extends Controller
{
    public function actionRead()
    {
        $places = PlaceModel::read();

        $this->render('read', ['places' => $places]);
    }

    public function actionCreate()
    {
        if (
            isset($_POST['name']) &&
            isset($_POST['id_warehouse'])
        ) {
            $place = new PlaceModel();

            $place->name = $_POST['name'];
            $place->id_warehouse = $_POST['id_warehouse'];
            $place->create();

            header('Location: /place/read');
        }

        $this->render('create');
    }

    public function actionUpdate($id)
    {
        $place = PlaceModel::readById($id);

        if (
            isset($_POST['name']) &&
            isset($_POST['id_warehouse'])
        ) {
            $place->name = $_POST['name'];
            $place->id_warehouse = $_POST['id_warehouse'];
            $place->update();

            header('Location: /place/read');
        }

        $this->render('update', ['place' => $place->data]);
    }

    public function actionDelete($id)
    {
        $place = PlaceModel::readById($id);

        $place->delete();

        header('Location: /place/read');
    }
}