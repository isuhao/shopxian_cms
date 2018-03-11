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
         return [      'Stru'=>[          'id'=>[              'type'=>'int',              'length'=>'10',              'default'=>null,              'unsigned'=>'true',              'not_null'=>'true',              'auto_increment'=>'true',              'comment'=>'文章id123',              'zerofill'=>'true',              'auto_increment'=>true,              'label'=>'文章id',              'in_list' => true,              'width'=>'100',              'input_type'=>'hidden',          ],          'title'=>[              'type'=>'varchar',              'length'=>'100',             'comment'=>'标题',              'label'=>'标题',              'in_list' => true,              'is_row_search'=>true,              'is_more_search'=>true,              'width'=>'400',              'input_type'=>'text',          ],          'images'=>[              'type'=>'varchar',              'length'=>'500',             'comment'=>'缩率图',              'label'=>'缩率图',              'in_list' => true,              'width'=>'100',              'fun'=>'img',              'input_type'=>'imagesBrowser',          ],          'tags'=>[              'type'=>'varchar',              'length'=>'255',             'comment'=>'TAG标签',              'label'=>'TAG标签',              'width'=>'100',              'in_list' => true,              'input_type'=>'text',          ],          'channeltype_id'=>[              'type'=>'int',              'length'=>'10',             'comment'=>'内容模型id',              'label'=>'内容模型',              'in_list' => false,              'width'=>'100',              'input_type'=>'hidden',          ],          'templet'=>[              'type'=>'varchar',              'length'=>'100',             'comment'=>'模版文件',              'label'=>'模版文件',              'in_list' => false,              'input_type'=>'hidden',          ],          'author'=>[              'type'=>'varchar',              'length'=>'60',             'comment'=>'作者',              'label'=>'作者',              'in_list' => true,              'width'=>'100',              'input_type'=>'text',          ],          'source'=>[              'type'=>'varchar',              'length'=>'60',             'comment'=>'来源',              'label'=>'来源',              'in_list' => true,              'width'=>'100',              'input_type'=>'text',          ],          'cat_id'=>[              'type'=>'int',              'length'=>'11',             'unsigned'=>'true',              'not_null'=>'true',              'default'=>'0',              'comment'=>'文章栏目',              'label'=>'文章栏目',              'in_list' => true,              'value'=>[],              'width'=>'100',              'input_type'=>'select',          ],            'keywords'=>[              'type'=>'varchar',              'length'=>'255',             'comment'=>'关键词',              'label'=>'关键词',              'in_list' => true,              'width'=>'250',              'input_type'=>'textarea',          ],          'description'=>[             'type'=>'varchar',              'length'=>'255',             'comment'=>'描述',              'label'=>'描述',              'in_list' => true,              'width'=>'250',              'input_type'=>'textarea',          ],          'permission'=>[              'type'=>'enum',              'length'=>'2',              'default'=>'1',              'not_null'=>'true',              'comment'=>'阅读权限',              'value'=>array(                  0=>'待审核',                  1=>'开放浏览',              ),              'label'=>'阅读权限',              'in_list' => true,              'width'=>'100',              'input_type'=>'radio',          ],          'allowreply'=>[              'type'=>'enum',              'length'=>'2',              'default'=>'1',              'not_null'=>'true',              'comment'=>'评论选项',              'value'=>array(                  0=>'禁止评论',                  1=>'允许评论',              ),              'label'=>'评论选项',              'in_list' => true,              'width'=>'100',              'input_type'=>'radio',          ],          'rank'=>[              'type'=>'int',              'length'=>'10',             'unsigned'=>'true',              'not_null'=>'true',              'comment'=>'排序值',              'default'=>'50',              'label'=>'排序值(越小越靠前)',              'in_list' => true,              'width'=>'100',              'input_type'=>'number',          ],          'add_time'=>[              'type'=>'int',              'length'=>'10',             'unsigned'=>'true',              'not_null'=>'true',              'comment'=>'发布时间',              'label'=>'发布时间',              'in_list' => true,              'width'=>'180',              'input_type'=>'datetime',              'fun'=>'dateof',          ],          'user_id'=>[              'type'=>'int',              'length'=>'11',             'unsigned'=>'true',              'not_null'=>'true',              'comment'=>'发布人id',              'label'=>'发布人id',              'in_list' => false,              'width'=>'100',              'input_type'=>'hidden',          ],      ],      'Charset'=>'utf8',      'Collate'=>'utf8_unicode_ci',      'Engine'=>'MyISAM',      'Annotation'=>'',      'primary'=>[              'id',      ],      'index'=>[          'permission'=>[              'index_type'=>'Normal',              'index_way'=>'BTREE',              'columns'=>[                  'permission',              ],          ],          'cat_id'=>[              'index_type'=>'Normal',              'index_way'=>'BTREE',              'columns'=>[                  'cat_id',              ],          ],      ]  ];  