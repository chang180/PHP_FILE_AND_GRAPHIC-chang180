<?php
$dsn = "mysql:host=localhost;charset=utf8;dbname=files";
$pdo = new PDO($dsn, 'root', '');
date_default_timezone_set("Asia/Taipei");

function all($table, ...$arg)
{
    global $pdo;
    $sql = "SELECT * FROM $table ";
    if (!empty($arg[0]) && is_array($arg[0])) {
        foreach ($arg[0] as $key => $value) {
            $tmp[] = sprintf("`%s`='%s'", $key, $value);
        }
        $sql = $sql . " WHERE " . implode(" && ", $tmp);
    }
    if (!empty($arg[1])) {
        $sql = $sql . $arg[1];
    }
    return $pdo->query($sql)->fetchAll();
}

function find($table, $arg)
{
    global $pdo;
    $sql = "SELECT * FROM $table ";


    if (is_array($arg)) {
        foreach ($arg[0] as $key => $value) {
            $tmp[] = sprintf("`%s`='%s'", $key, $value);
        }
        $sql = $sql . " WHERE " . implode(" && ", $tmp);
    } else {
        $sql = $sql . " WHERE id='" . $arg . "'";
    }
    return $pdo->query($sql)->fetch(PDO::FETCH_ASSOC);
}

function nums($table, ...$arg)
{
    global $pdo;
    $sql = "SELECT COUNT(*) FROM $table";
    if (!empty($arg[0]) && is_array($arg[0])) {
        foreach ($arg[0] as $key => $value) {
            $tmp[] = sprintf("`%s`='%s'", $key, $value);
        }
        $sql = $sql . " WHERE " . implode(" && ", $tmp);
    }
    if (!empty($arg[1])) {
        $sql = $sql . $arg[1];
    }
    return $pdo->query($sql)->fetchColumn();
}
function save($table, $arg)
{
    global $pdo;

    if (!empty($arg['id'])) {
        //update
        foreach ($arg as $key => $value) {
            if ($key != 'id') {
                $tmp[] = sprintf("`%s`='%s'", $key, $value);
            }
        }
        $sql = "UPDATE $table SET " . implode(",", $tmp) . " WHERE id='" . $arg['id'] . "'";
    } else {
        //insert
        $sql = "INSERT INTO $table (`" . implode("`,`", array_keys($arg)) . "`) VALUES('" . implode("','", $arg)  . "')";
        // echo $sql;
    }
    return $pdo->exec($sql);
}

function del($table, $arg)
{
    global $pdo;
    $sql = "DELETE FROM $table ";


    if (is_array($arg)) {
        foreach ($arg[0] as $key => $value) {
            $tmp[] = sprintf("`%s`='%s'", $key, $value);
        }
        $sql = $sql . " WHERE " . implode(" && ", $tmp);
    } else {
        $sql = $sql . " WHERE id='" . $arg . "'";
    }
    return $pdo->exec($sql);
}

function q($sql)
{
    global $pdo;
    return $pdo->query($sql)->fetchAll();
}

function to($url)
{
    header("location:" . $url);
}
