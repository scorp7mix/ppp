<?php

require_once __DIR__ . '/../core/db.php';

function moveIndex($db)
{
    return dbQuery($db, 'SELECT ' .
                        '  m.id, ' .
                        '  DATE_FORMAT(m.date, "%d.%m.%Y") AS date, ' .
                        '  m.id_consignment AS id_c, ' .
                        '  c.name AS consignment, ' .
                        '  p.name AS paint, ' .
                        '  m.id_from, ' .
                        '  pl1.name AS place1, ' .
                        '  wh1.name AS warehouse1, ' .
                        '  m.id_to, ' .
                        '  pl2.name AS place2, ' .
                        '  wh2.name AS warehouse2, ' .
                        '  m.id_type, ' .
                        '  t.name AS type, ' .
                        '  m.quantity ' .
                        'FROM moves AS m ' .
                        'LEFT JOIN consignment AS c ON c.id = m.id_consignment ' .
                        'LEFT JOIN paint AS p ON p.id = c.id_paint ' .
                        'LEFT JOIN place AS pl1 ON pl1.id = m.id_from ' .
                        'LEFT JOIN warehouse AS wh1 ON wh1.id = pl1.id_warehouse ' .
                        'LEFT JOIN place AS pl2 ON pl2.id = m.id_to ' .
                        'LEFT JOIN warehouse AS wh2 ON wh2.id = pl2.id_warehouse ' .
                        'LEFT JOIN types AS t ON t.id = m.id_type'
    );
}

function moveAdd($db, $params)
{
    return dbInsert($db, 'moves', $params);
}
