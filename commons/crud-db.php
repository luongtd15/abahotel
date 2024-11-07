<?php

// CRUD -> create/read(list,detail)/upodate/delete

if (!function_exists('getStrKeys')) {
    function getStrKeys($data)
    {
        return implode(',', array_keys($data));
    }
}

if (!function_exists('getVirtualParams')) {
    function getVirtualParams($data)
    {
        $keys = array_keys($data);

        $tmp = [];

        foreach ($keys as $key) {
            $tmp[] = ":$key";
        }

        return implode(',', $tmp);
    }
}

if (!function_exists('getSetParams')) {
    function getSetParams($data)
    {
        $keys = array_keys($data);

        $tmp = [];

        foreach ($keys as $key) {
            $tmp[] = "`$key` = :$key";
        }

        return implode(',', $tmp);
    }
}


if (!function_exists('insert')) {
    function insert($tableName, $data = [])
    {

        $getStrKeys = getStrKeys($data);

        $getVirtualParams = getVirtualParams($data);

        try {
            $sql = "INSERT INTO $tableName($getStrKeys) VALUES ($getVirtualParams)";

            $stmt = $GLOBALS['conn']->prepare($sql);

            foreach ($data as $fieldName => &$value) {
                $stmt->bindParam(":$fieldName", $value);
            }

            $stmt->execute();
        } catch (\Exception $err) {
            debug($err);
        }
    }
}

if (!function_exists('listAll')) {
    function listAll($tableName)
    {

        try {
            $sql = "SELECT*FROM $tableName ORDER BY id DESC";

            $stmt = $GLOBALS['conn']->prepare($sql);

            $stmt->execute();

            return $stmt->fetchAll();
        } catch (\Exception $err) {
            debug($err);
        }
    }
}

if (!function_exists('detail')) {
    function detail($tableName, $id)
    {

        try {
            $sql = "SELECT*FROM $tableName WHERE id = :id LIMIT 1";

            $stmt = $GLOBALS['conn']->prepare($sql);

            $stmt->bindParam(":id", $id);

            $stmt->execute();

            return $stmt->fetch();
        } catch (\Exception $err) {
            debug($err);
        }
    }
}

if (!function_exists('update')) {
    function update($tableName, $id, $data = [])
    {
        $getSetParams = getSetParams($data);

        try {
            $sql = "
                UPDATE $tableName
                SET $getSetParams
                WHERE id = :id
            ";

            $stmt = $GLOBALS['conn']->prepare($sql);

            foreach ($data as $fieldName => &$value) {
                $stmt->bindParam(":$fieldName", $value);
            }

            $stmt->bindParam(":id", $id);

            $stmt->execute();
        } catch (\Exception $err) {
            debug($err);
        }
    }
}

if (!function_exists('deleteSt')) {
    function deleteSt($tableName, $id)
    {

        try {
            $sql = "DELETE FROM $tableName WHERE id = :id";

            $stmt = $GLOBALS['conn']->prepare($sql);

            $stmt->bindParam(":id", $id);

            $stmt->execute();
        } catch (\Exception $err) {
            debug($err);
        }
    }
}

if (!function_exists('statistics')) {
    function statistics($tableName)
    {

        try {
            $sql = "SELECT COUNT(*) FROM $tableName";

            $stmt = $GLOBALS['conn']->prepare($sql);

            $stmt->execute();

            return $stmt->fetch();
        } catch (\Exception $err) {
            debug($err);
        }
    }
}
