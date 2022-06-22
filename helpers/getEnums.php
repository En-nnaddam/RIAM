<?php

function getEnums($tableName, $columnName)
{
    $conn = DB::connect();
    $sql = "SELECT  
                        TRIM(TRAILING ')' FROM substr(COLUMN_TYPE, 6)) as types
                    FROM
                        information_schema.columns
                    WHERE
                        TABLE_NAME = ?
                    AND
                        COLUMN_NAME = ?
                    ";
    $stmt = $conn->prepare($sql);
    $stmt->execute([$tableName, $columnName]);
    $infos = $stmt->fetch();
    $types = explode(',', $infos['types']);
    return $types;
}
