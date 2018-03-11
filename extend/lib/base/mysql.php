<?php 

           /**
            * 秀仙系统 shopxian_release/3.0.0
            * ============================================================================
            * * 版权所有 2017-2018 上海秀仙网络科技有限公司，并保留所有权利。
            * 网站地址: http://www.shopxian.com；
            * ----------------------------------------------------------------------------
            * 本软件只能免费使用  不允许对程序代码以任何形式任何目的再发布或者出售。
            * ============================================================================
            * 作者: 张启全 

            * 时间: 2018-03-11 16:08:53
            */
           namespace lib\base;  use think\Db;  use think\config;  class mysql {      public $mysqli=null;            public function table_fieldDel($table_name,$field_name){          if($table_name!=false&&$field_name!=false){              try {                  $this->query("ALTER TABLE `$table_name` DROP `$field_name`;");              } catch (Exception $exc) {                  exit($table_name.'表字段'.$field_name.'删除失败'.$exc->getTraceAsString());              }          }               }                  public function table_sql($table_name){          $return=$this->query("SHOW CREATE TABLE  $table_name");          return $return;      }                        public function table_Stru($table_name){          $desc=$this->query("SHOW FULL FIELDS FROM   $table_name");          $table_Stru=array();          if($desc&&  is_array($desc)){              foreach ($desc as $k => $v) {                  $table_Stru[$v['Field']]=$v;              }          }          return $table_Stru;      }            public function table_index($table_name){          $index=$this->query("show index from `$table_name`");          $index_arr=array();          if($index&&  is_array($index)){              foreach ($index as $k => $v) {                  $index_arr[$v['Key_name']][]=$v;              }          }          return $index_arr;      }            public function select_tableDetails($tableName){          $sql="show table status where name='$tableName';";          $desc= $this->query($sql);          return $desc;      }              private function ifindex($arr,$keyname){          foreach($arr as $k=>$v){              if(isset($v['index_name'])&&$v['index_name']==$keyname){                 return true;             }          }          return false;      }            private function returnIndex($arr,$keyname){          $indexarr=array();          foreach($arr as $k=>$v){              if($keyname==$v['key_name']){                  $indexarr[]=$v['column_name'];              }          }          return $indexarr;      }            public function alert_sql($arr,$table_name){          $str_sql='ALTER TABLE `'.$table_name.'` ';                   $table_Stru=$this->table_Stru($table_name);          $key_arr=  array_keys($arr['Stru']);         $key_table_Stru=  array_keys($table_Stru);         if(is_array($key_table_Stru)&&$key_table_Stru){              foreach ($key_table_Stru as $k=>$v){                                   if(!in_array($v, $key_arr)){                      $str_sql.="DROP COLUMN `{$v}`,";                  }else{                                           switch ($arr['Stru'][$v]['type']) {                      case 'enum':                         $str_sql.='MODIFY COLUMN  '.$this->enum_set($arr['Stru'][$v],$v);                          break;                      case 'set':                         $str_sql.='MODIFY COLUMN  '.$this->enum_set($arr['Stru'][$v],$v);                          break;                      default:                                                   if(isset($arr['Stru'][$v]['type'])==false||$arr['Stru'][$v]['type']==false)\trigger_error($table_name.'表'.$v.'字段配置有错,无type',E_USER_WARNING);                          if(isset($arr['Stru'][$v]['length'])==false)\trigger_error($table_name.'表'.$v.'字段配置有错,无length',E_USER_WARNING);                          $str_sql.="MODIFY COLUMN  `{$v}` ".$arr['Stru'][$v]['type'].'('.$arr['Stru'][$v]['length'].') ';                          if(isset($arr['Stru'][$v]['unsigned'])&&$arr['Stru'][$v]['unsigned']=='true')$str_sql.="unsigned ";                          if(isset($arr['Stru'][$v]['zerofill'])&&$arr['Stru'][$v]['zerofill']=='true')$str_sql.="zerofill ";                          if(isset($arr['Stru'][$v]['not_null'])&&$arr['Stru'][$v]['not_null']=='true')$str_sql.="NOT NULL ";                          if(isset($arr['Stru'][$v]['default'])&&isset($arr['Stru'][$v]['auto_increment'])!='true')$str_sql.="DEFAULT '".$arr['Stru'][$v]['default']."' ";                          if(isset($arr['Stru'][$v]['auto_increment'])&&$arr['Stru'][$v]['auto_increment']=='true')$str_sql.="AUTO_INCREMENT ";                          if(isset($arr['Stru'][$v]['comment']))$str_sql.="COMMENT '".$arr['Stru'][$v]['comment']."' ";                          $str_sql.=',';                          break;                      }                  }              }          }          if(is_array($key_arr)&&$key_arr){              foreach ($key_arr as $k=>$v){                                   if(!in_array($v, $key_table_Stru)){                      switch ($arr['Stru'][$v]['type']) {                      case 'enum':                         $str_sql.='ADD COLUMN '.$this->enum_set($arr['Stru'][$v],$v);                          break;                      case 'set':                         $str_sql.='ADD COLUMN '.$this->enum_set($arr['Stru'][$v],$v);                          break;                      default:                                                   if($arr['Stru'][$v]['type']==false)\trigger_error($table_name.'表'.$v.'字段配置有错,无type',E_USER_WARNING);                          if(isset($arr['Stru'][$v]['length'])==false)\trigger_error($table_name.'表'.$v.'字段配置有错,无length',E_USER_WARNING);                          if($arr['Stru'][$v]['length']==false){                              $str_sql.="ADD COLUMN `{$v}` ".$arr['Stru'][$v]['type'].' ';                          }else{                              $str_sql.="ADD COLUMN `{$v}` ".$arr['Stru'][$v]['type'].'('.$arr['Stru'][$v]['length'].') ';                          }                                                    if(isset($arr['Stru'][$v]['unsigned'])&&$arr['Stru'][$v]['unsigned']=='true')$str_sql.="unsigned ";                          if(isset($arr['Stru'][$v]['zerofill'])&&$arr['Stru'][$v]['zerofill']=='true')$str_sql.="zerofill ";                          if(isset($arr['Stru'][$v]['not_null'])&&$arr['Stru'][$v]['not_null']=='true')$str_sql.="NOT NULL ";                          if(isset($arr['Stru'][$v]['default'])&&isset($arr['Stru'][$v]['auto_increment'])!='true')$str_sql.="DEFAULT '".$arr['Stru'][$v]['default']."' ";                          if(isset($arr['Stru'][$v]['auto_increment'])&&$arr['Stru'][$v]['auto_increment']=='true')$str_sql.="AUTO_INCREMENT ";                          if(isset($arr['Stru'][$v]['comment']))$str_sql.="COMMENT '".$arr['Stru'][$v]['comment']."' ";                          $str_sql.=',';                          break;                      }                  }              }          }          $table_index=$this->table_index($table_name);         $table_index_arr=  array_keys($table_index);          $index=NULL;          if(isset($arr['index']))$index=  $arr['index'];         if(isset($arr['primary'])&&$arr['primary']&&  is_array($arr['primary'])){              $index['PRIMARY']=$arr['primary'];          }          $index_arr=[];          if(isset($index)&&  is_array($index_arr))$index_arr=  array_keys($index);          if($table_index_arr&&  is_array($table_index_arr)){              foreach($table_index_arr as $k=>$v){                  if(!in_array($v, $index_arr)){                     $str_sql.="DROP INDEX `{$v}`,";                  }else{                     if($v=='PRIMARY'){                         $str_sql.="DROP PRIMARY KEY,";                          if(isset($arr['primary'])&&  is_array($arr['primary'])){                          $primary='';                          foreach($arr['primary'] as $k1=>$v1){                              $primary.='`'.$v1.'`,';                          }                          $primary=rtrim($primary, ',');                          $str_sql.='ADD PRIMARY KEY ('.$primary.'),';                          }                      }else{                          $str_sql.="DROP INDEX `{$v}`,";                                                   if(isset($arr['index'])&&  is_array($arr['index'])&&count($arr['index'][$v]['columns'])>1){                              foreach($arr['index'][$v]['columns'] as $kk=>$vv){                                  if($arr['Stru'][$vv]['type']=='enum'||$arr['Stru'][$vv]['type']=='set'){                                      \trigger_error($table_name.'表索引'.$v.'是一个复合索引复合索引中不支持enum/set类型的字段',E_USER_WARNING);                                  }                              }                          }                          if(isset($arr['index'])&&  is_array($arr['index'])){                              if(isset($arr['index'])&&  is_array($arr['index'])){                              $str_sql.='ADD '.str_replace('KEY  ', 'INDEX ', $this->keystr($arr['index'][$v]['columns'], $arr['index'][$v]['index_type'], $v,$arr['index'][$v]['index_way']));                              }                          }                                               }                  }              }          }          if($index_arr&&  is_array($index_arr)){              foreach($index_arr as $k=>$v){                  if(!in_array($v, $table_index_arr)){                                           if($v=='PRIMARY'){                          if(isset($arr['primary'])&&  is_array($arr['primary'])){                          $primary='';                          foreach($arr['primary'] as $k1=>$v1){                              $primary.='`'.$v1.'`,';                          }                          $primary=rtrim($primary, ',');                          $str_sql.='ADD PRIMARY KEY ('.$primary.'),';                          }                      }else{                                                   if(isset($arr['index'])&&  is_array($arr['index'])){                                                           foreach($arr['index'] as $k2=>$v2){                                  if(!in_array($k2, $table_index_arr)){                                      $str_sql.='ADD '.str_replace('KEY  ', 'INDEX ', $this->keystr($v2['columns'], $v2['index_type'], $k2,$v2['index_way']));                                  }                              }                          }                      }                  }              }          }          return rtrim($str_sql, ',');      }              public function create_sql($arr,$table_name){          if(isset($arr['Stru'])==false){              return "";          }          $str_sql='CREATE TABLE `'.$table_name.'` (';          if(isset($arr['Stru'])&&$arr['Stru']&&  is_array($arr['Stru'])){              foreach ($arr['Stru'] as $k => $v) {                  if(isset($v['type'])==false)\trigger_error($table_name.'表'.$k.'字段配置有错,无type',E_USER_WARNING);                  if(isset($v['length'])==false)\trigger_error($table_name.'表'.$k.'字段配置有错,无length',E_USER_WARNING);                  switch ($v['type']) {                      case 'enum':                         $str_sql.=$this->enum_set($v,$k,$table_name);                          break;                      case 'set':                         $str_sql.=$this->enum_set($v,$k,$table_name);                          break;                      default:                                                   if($v['length']==false){                              $str_sql.="`{$k}` ".$v['type'].' ';                          }else{                              $str_sql.="`{$k}` ".$v['type'].'('.$v['length'].') ';                          }                          if(isset($v['unsigned'])&&$v['unsigned']=='true')$str_sql.="unsigned ";                          if(isset($v['zerofill'])&&$v['zerofill']=='true')$str_sql.="zerofill ";                          if(isset($v['not_null'])&&$v['not_null']=='true')$str_sql.="NOT NULL ";                          if(isset($v['default'])&&isset($v['auto_increment'])!='true')$str_sql.="DEFAULT '".$v['default']."' ";                          if(isset($v['auto_increment'])&&$v['auto_increment']=='true')$str_sql.="AUTO_INCREMENT ";                          if(isset($v['comment']))$str_sql.="COMMENT '".$v['comment']."' ";                          $str_sql.=',';                          break;                  }              }              if(isset($arr['primary'])&&  is_array($arr['primary'])){                  $primary='';                  foreach($arr['primary'] as $k1=>$v1){                      $primary.='`'.$v1.'`,';                  }                  $primary=rtrim($primary, ',');                  $str_sql.='PRIMARY KEY ('.$primary.'),';              }              if(isset($arr['index'])&&  is_array($arr['index'])){                  foreach($arr['index'] as $k2=>$v2){                          $str_sql.=$this->keystr($v2['columns'], $v2['index_type'], $k2,$v2['index_way']);                  }              }          }          $str_sql=  rtrim($str_sql, ',').')';          if(isset($arr['Engine']))$str_sql.='ENGINE='.$arr['Engine'].' ';          if(isset($arr['Charset']))$str_sql.='DEFAULT CHARSET='.$arr['Charset'].' ';          if(isset($arr['Collate']))$str_sql.='COLLATE='.$arr['Collate'].' ';          if(isset($arr['Annotation']))$str_sql.='COMMENT='."'".$arr['Annotation']."'";          return $str_sql;              }      protected function enum_set($v,$k,$table_name=''){          $str_sql='';          if($v['value']==false){              \trigger_error($table_name.'表'.$k.'字段配置有错,无value',E_USER_WARNING);          }          $value1='';          if($v['value']&&  is_array($v['value'])){              foreach($v['value'] as $k3=>$v3){                  $value1.='"'.$k3.'",';              }              $value1=rtrim($value1, ',');              $str_sql.="`{$k}` ".$v['type'].'('.$value1.') ';              if(isset($v['not_null'])&&$v['not_null']=='true')$str_sql.="NOT NULL ";              if(isset($v['default'])&&isset($v['auto_increment'])!='true')$str_sql.="DEFAULT '".$v['default']."' ";              if(isset($v['comment']))$str_sql.="COMMENT '".$v['comment']."' ";              return $str_sql.',';          }          return '';      }              protected function keystr($arr,$index_type,$key,$index_way){          $keystr='';          if(is_array($arr)&&$arr){              foreach($arr as $k1=>$v1){                      $keystr.='`'.$v1.'`,';              }              $keystr=rtrim($keystr, ',');              if($index_type=='Normal'){                  $keystr='KEY  `'.$key.'`('.$keystr.') USING '.$index_way.',';              }else if($index_way==''){                  $keystr=$index_type.' KEY  `'.$key.'`('.$keystr.')'.',';              }else{                  $keystr=$index_type.' KEY  `'.$key.'`('.$keystr.') USING '.$index_way.',';              }              return $keystr;          }          return '';      }              public function cite_delArr(&$arr,$str){          foreach($arr as $k=>$v){              if($str==$v){                  unset($arr[$k]);              }          }          $arr=  array_values($arr);      }      public function query($sql){          if($this->mysqli==false)return \trigger_error("mysql没有链接",E_USER_WARNING);;          $query_list=[];          try {              $query_obj=$this->mysqli->query($sql);              $list=[];              if($query_obj!=false){                  while ($row = mysqli_fetch_assoc ($query_obj)) {                      $list[]=$row;                  }              }              $query_list=$list;          } catch (Exception $exc) {                        }          return $query_list;      }  }  