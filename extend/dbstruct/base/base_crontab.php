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
         return [      'Stru'=>[          'id'=>[              'type'=>'int',              'length'=>'10',              'default'=>'0',              'unsigned'=>'true',              'not_null'=>'true',              'comment'=>'定时任务ID',              'auto_increment'=>true,              'label'=>'定时任务ID',              'in_list' => true,              'default_in_list' => true,              'search_allow' => true,              'input_type'=>'hidden',          ],          'description' => array(              'type'=>'varchar',              'length'=>'60',             'comment'=>'描述',              'label'=>'描述',              'in_list' => true,              'default_in_list' => true,              'search_allow' => true,              'input_type'=>'text',          ),          'enabled'=>[              'type'=>'enum',              'length'=>'5',             'default'=>'true',              'not_null'=>'true',              'comment'=>'可用状态',              'value'=>array(                  'false'=>'不启用',                 'true'=>'启用'             ),              'label'=>'可用状态',              'in_list' => true,              'default_in_list' => true,              'search_allow' => true,              'input_type'=>'radio',          ],          'schedule' => array(              'type'=>'varchar',              'length'=>'60',             'comment'=>'规则',              'label'=>'规则',              'in_list' => true,              'default_in_list' => true,              'search_allow' => true,              'input_type'=>'text',         ),          'last' => array(              'type'=>'int',              'length'=>'10',             'comment'=>'最后执行时间',              'label'=>'最后执行时间',              'in_list' => true,              'default_in_list' => true,              'search_allow' => true,              'input_type'=>'text',          ),          'app_id' => array (              'type'=>'varchar',              'length'=>'60',             'comment'=>'app应用',              'label'=>'app应用',              'in_list' => true,              'default_in_list' => true,              'search_allow' => true,              'input_type'=>'text',          ),          'class' => array(              'type'=>'varchar',              'length'=>'60',             'comment'=>'定时任务类名',              'label'=>'定时任务类名',              'in_list' => true,              'default_in_list' => true,              'search_allow' => true,              'input_type'=>'text',          ),          'type' => [              'type'=>'enum',              'length'=>'5',             'default'=>'system',              'not_null'=>'true',              'comment'=>'定时器类型',              'value'=>array(                   'custom' => '客户自定义',                  'system' => '系统内置',              ),              'label'=>'定时器类型',              'in_list' => true,              'default_in_list' => true,              'search_allow' => true,              'input_type'=>'radio',          ],      ],      'Charset'=>'utf8',      'Collate'=>'utf8_unicode_ci',      'Engine'=>'InnoDB',      'Annotation'=>'',      'primary'=>[              'id',      ],  ];  