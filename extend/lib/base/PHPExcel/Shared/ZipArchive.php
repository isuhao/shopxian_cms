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

            * 时间: 2018-03-11 16:08:51
            */
           if (!defined('PCLZIP_TEMPORARY_DIR')) {      define('PCLZIP_TEMPORARY_DIR', PHPExcel_Shared_File::sys_get_temp_dir() . DIRECTORY_SEPARATOR);  }  require_once PHPEXCEL_ROOT . 'PHPExcel/Shared/PCLZip/pclzip.lib.php';      class PHPExcel_Shared_ZipArchive  {              const OVERWRITE = 'OVERWRITE';      const CREATE    = 'CREATE';                private $tempDir;              private $zip;                public function open($fileName)      {          $this->tempDir = PHPExcel_Shared_File::sys_get_temp_dir();          $this->zip = new PclZip($fileName);            return true;      }                public function close()      {      }                public function addFromString($localname, $contents)      {          $filenameParts = pathinfo($localname);            $handle = fopen($this->tempDir.'/'.$filenameParts["basename"], "wb");          fwrite($handle, $contents);          fclose($handle);            $res = $this->zip->add($this->tempDir.'/'.$filenameParts["basename"], PCLZIP_OPT_REMOVE_PATH, $this->tempDir, PCLZIP_OPT_ADD_PATH, $filenameParts["dirname"]);          if ($res == 0) {              throw new PHPExcel_Writer_Exception("Error zipping files : " . $this->zip->errorInfo(true));          }            unlink($this->tempDir.'/'.$filenameParts["basename"]);      }              public function locateName($fileName)      {          $fileName = strtolower($fileName);            $list = $this->zip->listContent();          $listCount = count($list);          $index = -1;          for ($i = 0; $i < $listCount; ++$i) {              if (strtolower($list[$i]["filename"]) == $fileName ||                  strtolower($list[$i]["stored_filename"]) == $fileName) {                  $index = $i;                  break;              }          }          return ($index > -1) ? $index : false;      }              public function getFromName($fileName)      {          $index = $this->locateName($fileName);            if ($index !== false) {              $extracted = $this->getFromIndex($index);          } else {              $fileName = substr($fileName, 1);              $index = $this->locateName($fileName);              if ($index === false) {                  return false;              }              $extracted = $this->zip->getFromIndex($index);          }            $contents = $extracted;          if ((is_array($extracted)) && ($extracted != 0)) {              $contents = $extracted[0]["content"];          }            return $contents;      }            public function getFromIndex($index) {          $extracted = $this->zip->extractByIndex($index, PCLZIP_OPT_EXTRACT_AS_STRING);          $contents = '';          if ((is_array($extracted)) && ($extracted != 0)) {              $contents = $extracted[0]["content"];          }            return $contents;      }  }  