<?php

class Database extends PDO
{
    public $_ERROR = array();
    public $_LASTID = 0;
    public function __construct($DB_TYPE, $DB_HOST, $DB_NAME, $DB_USER, $DB_PASS)
    {
        parent::__construct(
            $DB_TYPE.':host='.$DB_HOST.';dbname='.$DB_NAME, $DB_USER, $DB_PASS,
            array(PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES utf8"));
        // revizar esto SET GLOBAL general_log = 'ON' para el log de mysql
        
        //parent::setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTIONS);
    }
    
    /**
     * select
     * @param string $sql An SQL string
     * @param array $array Paramters to bind
     * @param constant $fetchMode A PDO Fetch mode
     * @return mixed
     */
    public function select($sql, $array = array(), $prefix = FALSE, $fetchMode = PDO::FETCH_ASSOC){
        /* ejemplo para borrado logico */
        /* SELECT * FROM (SELECT * FROM `article` WHERE `idarticle`=1 ORDER BY `idarticle` DESC) AS QUERY WHERE status=0 */
        $sth = $this->prepare($sql);
        foreach ($array as $key => $value) {
            $sth->bindValue("$key", $value);
        }
        
        $sth->execute();
        $subResult = $sth->fetchAll($fetchMode);
        if ($prefix == TRUE) {
            foreach(range(0, $sth->columnCount() - 1) as $column_index){
                $meta = $sth->getColumnMeta($column_index);
                $metaPrefix[$meta['name']] = $meta['table'];
            }
            foreach ($subResult as $posicion => $row) {
                foreach ($row as $key => $value) {
                    $resultPrefix[$posicion][$metaPrefix[$key]][$key]=$value;
                }
            }
            $result = $resultPrefix;
        } else {
            $result = $subResult;
        }
        return $result;
    }
    /**
     * insert
     * @param string $table A name of table to insert into
     * @param string $data An associative array
     */
    public function insert($table, $data)
    {
        ksort($data);
        
        $fieldNames = implode('`, `', array_keys($data));
        $fieldValues = ':' . implode(', :', array_keys($data));
        
        $sth = $this->prepare("INSERT INTO $table (`$fieldNames`) VALUES ($fieldValues)");
            foreach ($data as $key => $value) {
                $sth->bindValue(":$key", $value);
            }
            $ejecutar=$sth->execute();
            if($ejecutar){
                $this->_LASTID=PDO::lastInsertId();
                return $ejecutar;
            }else{
                $this->_ERROR=$sth->errorInfo();
                return $ejecutar;
            }
    }
    /**
     * update
     * @param string $table A name of table to insert into
     * @param string $data An associative array
     * @param string $where the WHERE query part
     */
    public function update($table, $data, $where)
    {
        ksort($data);
        
        $fieldDetails = NULL;
        foreach($data as $key=> $value) {
            $fieldDetails .= "`$key`=:$key,";
        }
        $fieldDetails = rtrim($fieldDetails, ',');
        $sth = $this->prepare("UPDATE $table SET $fieldDetails WHERE $where");
        
        foreach ($data as $key => $value) {
            $sth->bindValue(":$key", $value);
        }
        
        $ejecutar = $sth->execute();
        if($ejecutar){
            return TRUE;
        }else{
            return FALSE;
        }
        
    }
    
    /**
     * delete
     * 
     * @param string $table
     * @param string $where
     * @param integer $limit
     * @return integer Affected Rows
     */
    public function delete($table, $where, $limit = 1)
    {
        return $this->exec("DELETE FROM $table WHERE $where LIMIT $limit");
    }
    
}