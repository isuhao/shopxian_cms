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
             if (!defined('PHPEXCEL_ROOT')) {            define('PHPEXCEL_ROOT', dirname(__FILE__) . '/../../');      require(PHPEXCEL_ROOT . 'PHPExcel/Autoloader.php');  }      class PHPExcel_Reader_CSV extends PHPExcel_Reader_Abstract implements PHPExcel_Reader_IReader  {            private $inputEncoding = 'UTF-8';              private $delimiter = ',';              private $enclosure = '"';              private $sheetIndex = 0;              private $contiguous = false;              private $contiguousRow = -1;                public function __construct()      {          $this->readFilter = new PHPExcel_Reader_DefaultReadFilter();      }              protected function isValidFormat()      {          return true;      }              public function setInputEncoding($pValue = 'UTF-8')      {          $this->inputEncoding = $pValue;          return $this;      }              public function getInputEncoding()      {          return $this->inputEncoding;      }              protected function skipBOM()      {          rewind($this->fileHandle);            switch ($this->inputEncoding) {              case 'UTF-8':                  fgets($this->fileHandle, 4) == "\xEF\xBB\xBF" ?                      fseek($this->fileHandle, 3) : fseek($this->fileHandle, 0);                  break;              case 'UTF-16LE':                  fgets($this->fileHandle, 3) == "\xFF\xFE" ?                      fseek($this->fileHandle, 2) : fseek($this->fileHandle, 0);                  break;              case 'UTF-16BE':                  fgets($this->fileHandle, 3) == "\xFE\xFF" ?                      fseek($this->fileHandle, 2) : fseek($this->fileHandle, 0);                  break;              case 'UTF-32LE':                  fgets($this->fileHandle, 5) == "\xFF\xFE\x00\x00" ?                      fseek($this->fileHandle, 4) : fseek($this->fileHandle, 0);                  break;              case 'UTF-32BE':                  fgets($this->fileHandle, 5) == "\x00\x00\xFE\xFF" ?                      fseek($this->fileHandle, 4) : fseek($this->fileHandle, 0);                  break;              default:                  break;          }      }              protected function checkSeparator()      {          $line = fgets($this->fileHandle);          if ($line === false) {              return;          }            if ((strlen(trim($line, "\r\n")) == 5) && (stripos($line, 'sep=') === 0)) {              $this->delimiter = substr($line, 4, 1);              return;          }          return $this->skipBOM();      }              public function listWorksheetInfo($pFilename)      {                   $this->openFile($pFilename);          if (!$this->isValidFormat()) {              fclose($this->fileHandle);              throw new PHPExcel_Reader_Exception($pFilename . " is an Invalid Spreadsheet file.");          }          $fileHandle = $this->fileHandle;                     $this->skipBOM();          $this->checkSeparator();            $escapeEnclosures = array( "\\" . $this->enclosure, $this->enclosure . $this->enclosure );            $worksheetInfo = array();          $worksheetInfo[0]['worksheetName'] = 'Worksheet';          $worksheetInfo[0]['lastColumnLetter'] = 'A';          $worksheetInfo[0]['lastColumnIndex'] = 0;          $worksheetInfo[0]['totalRows'] = 0;          $worksheetInfo[0]['totalColumns'] = 0;                     while (($rowData = fgetcsv($fileHandle, 0, $this->delimiter, $this->enclosure)) !== false) {              $worksheetInfo[0]['totalRows']++;              $worksheetInfo[0]['lastColumnIndex'] = max($worksheetInfo[0]['lastColumnIndex'], count($rowData) - 1);          }            $worksheetInfo[0]['lastColumnLetter'] = PHPExcel_Cell::stringFromColumnIndex($worksheetInfo[0]['lastColumnIndex']);          $worksheetInfo[0]['totalColumns'] = $worksheetInfo[0]['lastColumnIndex'] + 1;                     fclose($fileHandle);            return $worksheetInfo;      }              public function load($pFilename)      {                   $objPHPExcel = new PHPExcel();                     return $this->loadIntoExisting($pFilename, $objPHPExcel);      }              public function loadIntoExisting($pFilename, PHPExcel $objPHPExcel)      {          $lineEnding = ini_get('auto_detect_line_endings');          ini_set('auto_detect_line_endings', true);                     $this->openFile($pFilename);          if (!$this->isValidFormat()) {              fclose($this->fileHandle);              throw new PHPExcel_Reader_Exception($pFilename . " is an Invalid Spreadsheet file.");          }          $fileHandle = $this->fileHandle;                     $this->skipBOM();          $this->checkSeparator();                     while ($objPHPExcel->getSheetCount() <= $this->sheetIndex) {              $objPHPExcel->createSheet();          }          $sheet = $objPHPExcel->setActiveSheetIndex($this->sheetIndex);            $escapeEnclosures = array( "\\" . $this->enclosure,                                     $this->enclosure . $this->enclosure                                   );                     $currentRow = 1;          if ($this->contiguous) {              $currentRow = ($this->contiguousRow == -1) ? $sheet->getHighestRow(): $this->contiguousRow;          }                     while (($rowData = fgetcsv($fileHandle, 0, $this->delimiter, $this->enclosure)) !== false) {              $columnLetter = 'A';              foreach ($rowData as $rowDatum) {                  if ($rowDatum != '' && $this->readFilter->readCell($columnLetter, $currentRow)) {                                           $rowDatum = str_replace($escapeEnclosures, $this->enclosure, $rowDatum);                                             if ($this->inputEncoding !== 'UTF-8') {                          $rowDatum = PHPExcel_Shared_String::ConvertEncoding($rowDatum, 'UTF-8', $this->inputEncoding);                      }                                             $sheet->getCell($columnLetter . $currentRow)->setValue($rowDatum);                  }                  ++$columnLetter;              }              ++$currentRow;          }                     fclose($fileHandle);            if ($this->contiguous) {              $this->contiguousRow = $currentRow;          }            ini_set('auto_detect_line_endings', $lineEnding);                     return $objPHPExcel;      }              public function getDelimiter()      {          return $this->delimiter;      }              public function setDelimiter($pValue = ',')      {          $this->delimiter = $pValue;          return $this;      }              public function getEnclosure()      {          return $this->enclosure;      }              public function setEnclosure($pValue = '"')      {          if ($pValue == '') {              $pValue = '"';          }          $this->enclosure = $pValue;          return $this;      }              public function getSheetIndex()      {          return $this->sheetIndex;      }              public function setSheetIndex($pValue = 0)      {          $this->sheetIndex = $pValue;          return $this;      }              public function setContiguous($contiguous = false)      {          $this->contiguous = (bool) $contiguous;          if (!$contiguous) {              $this->contiguousRow = -1;          }            return $this;      }              public function getContiguous()      {          return $this->contiguous;      }  }  