<?php


class Bd
{
    public static $mysqli;

    public static function connect()
    {
        $dbhost = "phototim.mysql.ukraine.com.ua"; // Имя хоста БД
        $dbusername = "phototim_db"; // Пользователь БД
        $dbpass = "999805"; // Пароль к базе
         /*$dbhost = "localhost"; // Имя хоста БД
        $dbusername = "king"; // Пользователь БД
        $dbpass = "02011951"; // Пароль к базе*/

        /*self::$mysqli = new mysqli($dbhost, $dbusername, $dbpass, "tender");*/
        self::$mysqli = new mysqli($dbhost, $dbusername, $dbpass, "phototim_tender");
        mysqli_set_charset(self::$mysqli, "utf8");
        if (!self::$mysqli) {
            echo("Не могу подключиться к серверу базы данных!");
        }
    }

    public static function query($res)
    {
        $result = self::$mysqli->query($res);
        return $result;
    }

    public static function queryInsert($table, $arr)
    {
        $insertInto = "INSERT INTO `$table` (";
        $value = "VALUES (";
        foreach ($arr as $k => $v) {
            if (!next($arr)) {
                $insertInto .= $k . ") ";
                $value .= "'" . $v . "')";
            } else {
                $insertInto .= $k . ",";
                $value .= "'" . $v . "',";
            }
        }
        $res = $insertInto . $value;
        self::$mysqli->query($res);
        return self::$mysqli->insert_id;
    }

    public static function queryUpdate($table, $arr, $fieldValue, $fieldKey = 0)
    {
        $update = "UPDATE `$table` ";
        $set = "SET ";
        foreach ($arr as $k => $v) {
            if (!next($arr)) {
                $set .= "$k='$v'";
            } else {
                $set .= "$k='$v',";
            }
        }
        if ($fieldKey) {
            $where = " WHERE " . $fieldKey . "='" . $fieldValue . "'";
        } else {
            $where = " WHERE id='" . $fieldValue . "'";
        }
        self::$mysqli->query($update . $set . $where);
    }

    public static function querySelect($table, $fieldValue = 0, $fieldKey = 0, $fieldsSearch = "*", $count = FALSE)
    {
        $select = "SELECT $fieldsSearch FROM `$table` ";

        if ($fieldValue && $fieldKey === 0) {
            $select .= "WHERE id = $fieldValue";
        } elseif ($fieldValue !== 0 && $fieldKey !== 0) {
            if (is_int($fieldValue)) {
                $select .= "WHERE $fieldKey = $fieldValue";
            } else {
                $select .= "WHERE $fieldKey LIKE $fieldValue";
            }
        }
        $res = self::$mysqli->query($select);
        if ($count) {
            return $res->num_rows;
        } else {
            if ($res->num_rows > 1) {
                while ($row = $res->fetch_assoc()) {
                    $arr[] = $row;
                }
                return $arr;
            } else {
                return $res->fetch_assoc();
            }
        }

    }


    public static function queryDelete($table, $id)
    {
        $delete = "DELETE FROM `$table` WHERE id=$id";

        self::$mysqli->query($delete);
    }


    public static function querySelectMod($table, $where)
    {
        $select = "SELECT * FROM `$table` WHERE $where";

        $res = self::$mysqli->query($select);

        if ($res->num_rows > 1) {
            while ($row = $res->fetch_assoc()) {
                $arr[] = $row;
            }
            return $arr;
        } else {
            return $res->fetch_assoc();
        }
    }
} 