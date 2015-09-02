<?php

namespace Models;

use Core\Model;

/**
 * Class ReportModel
 * @package Models
 */
class ReportModel extends Model
{
    /**
     * @param $objects
     * @param $fields
     * @param $conditions
     * @return mixed
     */
    public static function getRemains($objects, $fields, $conditions)
    {
        $sql = 'SELECT
        ' . $fields . ',
            SUM(move.qty_from) AS qty_from,
            SUM(move.qty_to) AS qty_to,
            SUM(IFNULL(move.qty_to, 0) - IFNULL(move.qty_from, 0)) AS qty_res
            FROM move
            LEFT JOIN consignment ON consignment.id = move.id_consignment
            LEFT JOIN paint ON paint.id = consignment.id_paint
            LEFT JOIN place AS pf ON pf.id = move.id_from
            LEFT JOIN place AS pt ON pt.id = move.id_to
            LEFT JOIN warehouse AS wf ON wf.id = pf.id_warehouse
            LEFT JOIN warehouse AS wt ON wt.id = pt.id_warehouse
        ' . $conditions;

        foreach ($objects as $key => $object) {
            $objects[$key]['rows'] = MoveModel::query($sql, [':id' => $object['id']]);
        }

        return $objects;
    }

    /**
     * @param $id
     * @return array
     */
    public static function getDataForType($id)
    {
        $list = MoveModel::query('
            SELECT DISTINCT
               DATE_FORMAT(move.date, "%Y") AS year
            FROM move
        ');

        foreach ($list as $key => $value) {
            $list[$key]['months'] = MoveModel::query('
                SELECT DISTINCT
                   DATE_FORMAT(move.date, "%M") AS month
                FROM move
                WHERE DATE_FORMAT(move.date, "%Y") = ' . $value['year'] . '
            ');
            foreach ($list[$key]['months'] as $mkey => $mvalue) {
                $list[$key]['months'][$mkey]['rows'] = MoveModel::readByCondition('
                    move.id_type = :id AND
                    DATE_FORMAT(move.date, "%Y") = :year AND
                    DATE_FORMAT(move.date, "%M") = :month
                ', [
                    ':id' => $id,
                    ':year' => $value['year'],
                    ':month' => $mvalue['month']
                ]);
            }
        }

        return $list;
    }
}