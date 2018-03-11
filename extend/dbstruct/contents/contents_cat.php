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
         return [      'Stru'=>[          'cat_id'=>[              'type'=>'int',              'length'=>'11',              'default'=>null,              'unsigned'=>'true',              'not_null'=>'true',              'auto_increment'=>'true',              'comment'=>'栏目id',              'zerofill'=>'true',              'auto_increment'=>true,              'label'=>'栏目id',              'in_list' => true,              'input_type'=>'hidden',          ],          'channeltype_id'=>[              'type'=>'int',              'length'=>'10',             'default'=>'1',              'comment'=>'内容模型',              'label'=>'内容模型',              'in_list' => true,              'value'=>[                                ],              'in_list' => true,              'ignore'=>true,              'input_type'=>'select',          ],          'cat_name'=>[              'type'=>'varchar',              'length'=>'60',             'comment'=>'栏目名称',              'not_null'=>'true',              'label'=>'栏目名称',              'in_list' => true,              'input_type'=>'text',          ],          'parent_id'=>[              'type'=>'int',              'length'=>'11',             'unsigned'=>'true',              'not_null'=>'true',              'default'=>'0',              'comment'=>'父id',              'label'=>'上级栏目',              'in_list' => true,              'value'=>[                  '0'=>'顶级栏目'              ],              'in_list' => true,              'input_type'=>'select',          ],          'image'=>[             'type'=>'varchar',              'length'=>'255',             'comment'=>'封面图片',              'label'=>'封面图片',              'in_list' => true,              'input_type'=>'imageBrowser',          ],          'attribute'=>[               'type'=>'enum',              'length'=>'2',              'default'=>'0',              'not_null'=>'true',              'comment'=>'栏目属性',              'value'=>array(                  0=>'最终列表栏目',                  1=>'频道封面',                  2=>'外部链接',                  3=>'单页',              ),              'label'=>'栏目属性',              'in_list' => true,              'input_type'=>'radio',          ],          'redirecturl'=>[               'type'=>'varchar',              'length'=>'255',             'comment'=>'外部链接',              'label'=>'外部链接',              'in_list' => true,              'input_type'=>'url',              'input_description'=>'栏目属性为外部链接的情况下需要填写本字段',          ],          'tempindex'=>[              'type'=>'varchar',              'length'=>'100',             'comment'=>'封面模板',              'label'=>'封面模板',              'in_list' => true,              'input_type'=>'text',          ],          'templist'=>[              'type'=>'varchar',              'length'=>'100',             'comment'=>'列表模板',              'label'=>'列表模板',              'in_list' => true,              'input_type'=>'text',          ],          'temparticle'=>[              'type'=>'varchar',              'length'=>'100',             'comment'=>'文章模板',              'label'=>'文章模板',              'in_list' => true,              'input_type'=>'text',          ],          'rank'=>[              'type'=>'int',              'length'=>'11',             'default'=>'50',              'comment'=>'排序',              'label'=>'排序',              'in_list' => true,              'in_list' => true,              'input_type'=>'number',          ],          'seo_title'=>[              'type'=>'varchar',              'length'=>'100',             'comment'=>'SEO标题',              'label'=>'SEO标题',              'input_type'=>'text',          ],          'keywords'=>[              'type'=>'varchar',              'length'=>'255',             'comment'=>'关键词',              'label'=>'关键词',              'input_type'=>'textarea',          ],          'description'=>[             'type'=>'varchar',              'length'=>'255',             'comment'=>'描述',              'label'=>'描述',              'input_type'=>'textarea',          ],          'body'=>[              'type'=>'text',              'length'=>'10000',             'comment'=>'栏目内容',              'label'=>'栏目内容',              'in_list' => true,              'input_description'=>'栏目内容是替代原来栏目单独页的更灵活的一种方式，通常用于企业简介之类的用途。',              'input_type'=>'baiduUmeditor',          ],          'permission'=>[              'type'=>'enum',              'length'=>'2',              'default'=>'1',              'not_null'=>'true',              'comment'=>'浏览权限',              'value'=>array(                  0=>'禁用',                  1=>'开放',              ),              'label'=>'浏览权限',              'in_list' => true,              'input_type'=>'radio',          ],      ],      'Charset'=>'utf8',      'Collate'=>'utf8_unicode_ci',      'Engine'=>'MyISAM',      'Annotation'=>'',      'primary'=>[              'cat_id',      ],      'index'=>[          'permission'=>[              'index_type'=>'Normal',              'index_way'=>'BTREE',              'columns'=>[                  'permission',              ],          ]      ]  ];  