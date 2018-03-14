<?php
    //数据相关操作提出来
    class DB{
        //构造函数：连接到数据库，设置编码是UTF8
        function __construct($dbconfig){
            $this->dblink = new mysqli($dbconfig['host'], $dbconfig['username'], $dbconfig['passwd'], 
                    $dbconfig['dbname'], $dbconfig['port']);
            //设置数据编码
            $this->dblink->query('SET NAMES UTF8');
        }
        //添加数据的方法
        function insertData($tablename, $data){
            // 'INSERT INTO '.$tablename.'(f1, f2...) VALUES(v1, "v2"...)';
            $filedA = array();
            foreach ($data as $filed => $value) {
                //收集字段名
                array_push($filedA, $filed);
                //处理字符串类型的数据
                if(is_string($value)){
                   $data[$filed] = '"' . addslashes($value) . '"'; 
                }
            }
            $sql = 'INSERT INTO '.$tablename.'('.implode(', ', $filedA).') VALUES('.implode(', ', $data).');';
            // echo $sql;
            $result = $this->dblink->query($sql);  
            if($result){
                return $this->dblink->insert_id;
            }else{
                echo $sql;
                return $result;
            }
        }
        //删除数据
        function delData($tablename, $where){
            $sql    = 'DELETE FROM '.$tablename.' WHERE '.$where.';';
            $r      = $this->dblink->query($sql);
            if($r){
                //执行成功，返回影响的记录数
                return $this->dblink->affected_rows;
            }else{
                return false;
            }
        }
        //获取单条记录
        function getOneData($tablename, $filelds, $where){
            $sql    = 'SELECT '.$filelds.' FROM '.$tablename.' WHERE '.$where.' LIMIT 1;';
            $r      = $this->dblink->query($sql);
            if($r){
                $data   = $r->fetch_array(MYSQLI_ASSOC);
                return  $data;
            }else{
                echo $sql;
                return $r;
            }
        }
        //获取多条记录
        //$orderby: 'aid ASC, catename DESC'
        function getData($tablename,$filelds,  $where=1, $orderby='', $start = 0, $limit = 0){
            $sql    = 'SELECT '.$filelds.' FROM '.$tablename.' WHERE '.$where;
            //排序
            if($orderby){
                $sql .= ' ORDER BY ' . $orderby;
            }
            //指定查询范围
            if($limit){
                $sql .= ' LIMIT ' . $start . ', ' . $limit;
            }
            $sql    .= ';';
            $r      = $this->dblink->query($sql);
            if($r){
                $data   = $r->fetch_all(MYSQLI_ASSOC);
                return  $data;
            }else{
                // echo $sql;
                return $r;
            }
        }
        //修改数据
        //$data:array 下标是字段名称，值就是对应的值
        function updateData($tablename, $data, $where){
            $filedA = array();
            foreach ($data as $filed => $value) {
                //处理字符串类型的数据
                if(is_string($value)){
                   $value = '"' . addslashes($value) . '"'; 
                }
                //收集字段和值
                $filed .= ' = ' . $value;
                array_push($filedA, $filed);
            }
            $sql    = 'UPDATE '.$tablename.' SET '.implode(', ', $filedA).' WHERE ' . $where.';';
            // echo $sql;
            $r      = $this->dblink->query($sql); 
            return $r;
        }
        //获取满足条件的记录数
        
        //析构函数：关闭数据库连接
        function __destruct(){
            $this->dblink->close();
        }
    }