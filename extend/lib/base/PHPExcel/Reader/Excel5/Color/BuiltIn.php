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
           class PHPExcel_Reader_Excel5_Color_BuiltIn  {      protected static $map = array(          0x00 => '000000',          0x01 => 'FFFFFF',          0x02 => 'FF0000',          0x03 => '00FF00',          0x04 => '0000FF',          0x05 => 'FFFF00',          0x06 => 'FF00FF',          0x07 => '00FFFF',          0x40 => '000000',          0x41 => 'FFFFFF',      );              public static function lookup($color)      {          if (isset(self::$map[$color])) {              return array('rgb' => self::$map[$color]);          }          return array('rgb' => '000000');      }  }