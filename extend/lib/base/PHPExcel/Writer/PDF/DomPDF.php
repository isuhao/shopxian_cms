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

            * 时间: 2018-03-11 16:08:52
            */
             $pdfRendererClassFile = PHPExcel_Settings::getPdfRendererPath() . '/dompdf_config.inc.php';  if (file_exists($pdfRendererClassFile)) {      require_once $pdfRendererClassFile;  } else {      throw new PHPExcel_Writer_Exception('Unable to load PDF Rendering library');  }      class PHPExcel_Writer_PDF_DomPDF extends PHPExcel_Writer_PDF_Core implements PHPExcel_Writer_IWriter  {            public function __construct(PHPExcel $phpExcel)      {          parent::__construct($phpExcel);      }              public function save($pFilename = null)      {          $fileHandle = parent::prepareForSave($pFilename);                     $paperSize = 'LETTER';                        if (is_null($this->getSheetIndex())) {              $orientation = ($this->phpExcel->getSheet(0)->getPageSetup()->getOrientation()                  == PHPExcel_Worksheet_PageSetup::ORIENTATION_LANDSCAPE) ? 'L' : 'P';              $printPaperSize = $this->phpExcel->getSheet(0)->getPageSetup()->getPaperSize();              $printMargins = $this->phpExcel->getSheet(0)->getPageMargins();          } else {              $orientation = ($this->phpExcel->getSheet($this->getSheetIndex())->getPageSetup()->getOrientation()                  == PHPExcel_Worksheet_PageSetup::ORIENTATION_LANDSCAPE) ? 'L' : 'P';              $printPaperSize = $this->phpExcel->getSheet($this->getSheetIndex())->getPageSetup()->getPaperSize();              $printMargins = $this->phpExcel->getSheet($this->getSheetIndex())->getPageMargins();          }                    $orientation = ($orientation == 'L') ? 'landscape' : 'portrait';                     if (!is_null($this->getOrientation())) {              $orientation = ($this->getOrientation() == PHPExcel_Worksheet_PageSetup::ORIENTATION_DEFAULT)                  ? PHPExcel_Worksheet_PageSetup::ORIENTATION_PORTRAIT                  : $this->getOrientation();          }                   if (!is_null($this->getPaperSize())) {              $printPaperSize = $this->getPaperSize();          }            if (isset(self::$paperSizes[$printPaperSize])) {              $paperSize = self::$paperSizes[$printPaperSize];          }                       $pdf = new DOMPDF();          $pdf->set_paper(strtolower($paperSize), $orientation);            $pdf->load_html(              $this->generateHTMLHeader(false) .              $this->generateSheetData() .              $this->generateHTMLFooter()          );          $pdf->render();                     fwrite($fileHandle, $pdf->output());            parent::restoreStateAfterSave($fileHandle);      }  }  