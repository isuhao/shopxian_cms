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

            * 时间: 2018-03-11 16:08:28
            */
         namespace common\taglib;  use think\template\TagLib;    class Cms extends TagLib{           protected $tags = [                   'nav'=>['attr' => 'parent_id,limit,orderby,item,key', 'close' => 1],         'column'=>['attr' => 'limit,orderby,item,key,images,cat_id', 'close' => 1],         'hotcolumn'=>['attr' => 'limit,cat_id,orderby,item,key', 'close' => 1],         'sgpage'=>['attr' => 'limit,orderby', 'close' => 1],         'friendlink'=>['attr' => 'limit,orderby', 'close' => 1],         'ad'=>['attr' => 'id,limit,orderby,cat_id,ad_type', 'close' => 0],         'aditem'=>['attr' => 'id,orderby,cat_id,ad_type', 'close' =>0],         'config'=>['attr' => 'code', 'close' =>0],         'find'=>['attr' => 'assign,app,model,field,where', 'close' =>0],                   'listnav'=>['attr' => 'limit,orderby', 'close' => 1],         'listcolumn'=>['attr' => 'pagesize,orderby,images,cat_id', 'close' => 1],         'listhotcolumn'=>['attr' => 'pagesize,orderby', 'close' => 1],         'listad'=>['attr' => 'id,limit,orderby,cat_id,ad_type', 'close' => 0],                      'arcad'=>['attr' => 'id,limit,orderby,cat_id,ad_type', 'close' => 0],     ];      public function tagFind($tag, $content){          return "<?php 

           /**
            * 秀仙系统 shopxian_release/3.0.0
            * ============================================================================
            * * 版权所有 2017-2018 上海秀仙网络科技有限公司，并保留所有权利。
            * 网站地址: http://www.shopxian.com；
            * ----------------------------------------------------------------------------
            * 本软件只能免费使用  不允许对程序代码以任何形式任何目的再发布或者出售。
            * ============================================================================
            * 作者: 张启全 

            * 时间: 2018-03-11 16:08:28
            */
        \$".$tag['assign']."=appModel('".$tag['app']."','".$tag['model']."')->where('".$tag['where']."')->field('".$tag['field']."')->cache(3)->find();?>";      }      public function tagConfig($tag, $content){          return "<?php 

           /**
            * 秀仙系统 shopxian_release/3.0.0
            * ============================================================================
            * * 版权所有 2017-2018 上海秀仙网络科技有限公司，并保留所有权利。
            * 网站地址: http://www.shopxian.com；
            * ----------------------------------------------------------------------------
            * 本软件只能免费使用  不允许对程序代码以任何形式任何目的再发布或者出售。
            * ============================================================================
            * 作者: 张启全 

            * 时间: 2018-03-11 16:08:28
            */
        \$code=appModel('base','BaseAppConfig')->cache(3)->find('".$tag['code']."');if(\$code)echo \$code->getData('value'); ?>";      }      public function tagAditem($tag, $content){          $id=0;          $cat_id=0;          $ad_type='code';          $orderby='rank asc';          if(isset($tag['id']))$id=$tag['id'];          if(isset($tag['cat_id']))$cat_id=$tag['cat_id'];          if(isset($tag['ad_type']))$ad_type=$tag['ad_type'];          if(isset($tag['orderby']))$orderby=$tag['orderby'];          $parseStr = '<?php 

           /**
            * 秀仙系统 shopxian_release/3.0.0
            * ============================================================================
            * * 版权所有 2017-2018 上海秀仙网络科技有限公司，并保留所有权利。
            * 网站地址: http://www.shopxian.com；
            * ----------------------------------------------------------------------------
            * 本软件只能免费使用  不允许对程序代码以任何形式任何目的再发布或者出售。
            * ============================================================================
            * 作者: 张启全 

            * 时间: 2018-03-11 16:08:28
            */
                      $vars="";              $where="";              if("'.$id.'"){                  $where="id='.$id.'";              }else{                  $where="cat_id='.$cat_id.' and ad_type=\''.$ad_type.'\'";              }                       ';          $parseStr .= '$res=appModel("contents","ContentsAd")->where($where)->order("'.$orderby.'")->find();';                  $parseStr .= '$'.$tag['item'].'=[];if($res){$'.$tag['item'].'=json_decode($res["ad_body"], true);} ?>';          return $parseStr;      }           public function tagAd($tag, $content){          $id=0;          $cat_id=0;          $ad_type='code';          $orderby='rank asc';          $limit='1';          if(isset($tag['id']))$id=$tag['id'];          if(isset($tag['cat_id']))$cat_id=$tag['cat_id'];          if(isset($tag['ad_type']))$ad_type=$tag['ad_type'];          if(isset($tag['orderby']))$orderby=$tag['orderby'];          if(isset($tag['limit']))$limit=$tag['limit'];          $parseStr = '<?php 

           /**
            * 秀仙系统 shopxian_release/3.0.0
            * ============================================================================
            * * 版权所有 2017-2018 上海秀仙网络科技有限公司，并保留所有权利。
            * 网站地址: http://www.shopxian.com；
            * ----------------------------------------------------------------------------
            * 本软件只能免费使用  不允许对程序代码以任何形式任何目的再发布或者出售。
            * ============================================================================
            * 作者: 张启全 

            * 时间: 2018-03-11 16:08:28
            */
                      $vars="";              if("'.$id.'"){                  $vars="id='.$id.'";              }else{                  $vars="cat_id='.$cat_id.'&ad_type='.$ad_type.'&orderby='.$orderby.'&limit='.$limit.'";              }                       ?><script src="<{url link="contents/Ad/get" vars="" suffix="true" domain="true"}>?<?php 

           /**
            * 秀仙系统 shopxian_release/3.0.0
            * ============================================================================
            * * 版权所有 2017-2018 上海秀仙网络科技有限公司，并保留所有权利。
            * 网站地址: http://www.shopxian.com；
            * ----------------------------------------------------------------------------
            * 本软件只能免费使用  不允许对程序代码以任何形式任何目的再发布或者出售。
            * ============================================================================
            * 作者: 张启全 

            * 时间: 2018-03-11 16:08:28
            */
        echo $vars; ?>" type="text/javascript" language="javascript"></script>';          return $parseStr;      }      public function tagFriendlink($tag, $content){          $parseStr = '<?php 

           /**
            * 秀仙系统 shopxian_release/3.0.0
            * ============================================================================
            * * 版权所有 2017-2018 上海秀仙网络科技有限公司，并保留所有权利。
            * 网站地址: http://www.shopxian.com；
            * ----------------------------------------------------------------------------
            * 本软件只能免费使用  不允许对程序代码以任何形式任何目的再发布或者出售。
            * ============================================================================
            * 作者: 张启全 

            * 时间: 2018-03-11 16:08:28
            */
        $where=[["permission","=","1"]];if(input()==false){$where[]=["position","in",["home","all"]];}else{$where[]=["position","=","nside_pages"];}$res=appModel("contents","ContentsFriendlink")->where($where)->order("'.$tag['orderby'].'")->limit('.$tag['limit'].')->select();';          $parseStr .= 'foreach($res as $'.$tag['key'].'=>$'.$tag['item'].'){ ?>';          $parseStr.=$content;          $parseStr .= '<?php 

           /**
            * 秀仙系统 shopxian_release/3.0.0
            * ============================================================================
            * * 版权所有 2017-2018 上海秀仙网络科技有限公司，并保留所有权利。
            * 网站地址: http://www.shopxian.com；
            * ----------------------------------------------------------------------------
            * 本软件只能免费使用  不允许对程序代码以任何形式任何目的再发布或者出售。
            * ============================================================================
            * 作者: 张启全 

            * 时间: 2018-03-11 16:08:28
            */
        } ?>';          return $parseStr;      }            public function tagNav($tag, $content){          $parseStr = '<?php 

           /**
            * 秀仙系统 shopxian_release/3.0.0
            * ============================================================================
            * * 版权所有 2017-2018 上海秀仙网络科技有限公司，并保留所有权利。
            * 网站地址: http://www.shopxian.com；
            * ----------------------------------------------------------------------------
            * 本软件只能免费使用  不允许对程序代码以任何形式任何目的再发布或者出售。
            * ============================================================================
            * 作者: 张启全 

            * 时间: 2018-03-11 16:08:28
            */
        $res=appModel("contents","ContentsCat")->where(["permission"=>"1","parent_id"=>'.$tag['parent_id'].'])->order("'.$tag['orderby'].'")->limit('.$tag['limit'].')->select();';          $parseStr .= 'foreach($res as $'.$tag['key'].'=>$'.$tag['item'].'){ ?>';          $parseStr.=$content;          $parseStr .= '<?php 

           /**
            * 秀仙系统 shopxian_release/3.0.0
            * ============================================================================
            * * 版权所有 2017-2018 上海秀仙网络科技有限公司，并保留所有权利。
            * 网站地址: http://www.shopxian.com；
            * ----------------------------------------------------------------------------
            * 本软件只能免费使用  不允许对程序代码以任何形式任何目的再发布或者出售。
            * ============================================================================
            * 作者: 张启全 

            * 时间: 2018-03-11 16:08:28
            */
        } ?>';          return $parseStr;      }            public function tagColumn($tag, $content){          $image='';          $cat_id=0;          if(isset($tag['cat_id']))$cat_id=$tag['cat_id'];          if(isset($tag['images']))$image='["images","<>",""]';          $parseStr = '<?php 

           /**
            * 秀仙系统 shopxian_release/3.0.0
            * ============================================================================
            * * 版权所有 2017-2018 上海秀仙网络科技有限公司，并保留所有权利。
            * 网站地址: http://www.shopxian.com；
            * ----------------------------------------------------------------------------
            * 本软件只能免费使用  不允许对程序代码以任何形式任何目的再发布或者出售。
            * ============================================================================
            * 作者: 张启全 

            * 时间: 2018-03-11 16:08:28
            */
        $where=['.$image.'];          if('.$cat_id.'!=0){              $tagcolumn_content_cat=new \lib\contents\ContentCat();              $tag_column_cat_ids= array_merge($tagcolumn_content_cat->allSonid('.$cat_id.'));              $where[]=["cat_id","in",$tag_column_cat_ids];              $where[]=["permission","=","1"];          }              $column=appModel("contents","Contents")->where($where)->order("'.$tag['orderby'].'")->limit('.$tag['limit'].')->cache(3)->select();';          $parseStr .= 'foreach($column as $'.$tag['key'].'=>$'.$tag['item'].'){ ?>';          $parseStr.=$content;          $parseStr .= '<?php 

           /**
            * 秀仙系统 shopxian_release/3.0.0
            * ============================================================================
            * * 版权所有 2017-2018 上海秀仙网络科技有限公司，并保留所有权利。
            * 网站地址: http://www.shopxian.com；
            * ----------------------------------------------------------------------------
            * 本软件只能免费使用  不允许对程序代码以任何形式任何目的再发布或者出售。
            * ============================================================================
            * 作者: 张启全 

            * 时间: 2018-03-11 16:08:28
            */
        } ?>';          return $parseStr;      }            public function tagHotcolumn($tag, $content){          $cat_id=0;          if(isset($tag['cat_id']))$cat_id=$tag['cat_id'];          $parseStr = '<?php 

           /**
            * 秀仙系统 shopxian_release/3.0.0
            * ============================================================================
            * * 版权所有 2017-2018 上海秀仙网络科技有限公司，并保留所有权利。
            * 网站地址: http://www.shopxian.com；
            * ----------------------------------------------------------------------------
            * 本软件只能免费使用  不允许对程序代码以任何形式任何目的再发布或者出售。
            * ============================================================================
            * 作者: 张启全 

            * 时间: 2018-03-11 16:08:28
            */
                  $where=[];              $tag_hot_column_cat_id='.$cat_id.';              $tagcolumn_content_cat=new \lib\contents\ContentCat();          $tag_hotcolumn_cat_ids= array_merge($tagcolumn_content_cat->allSonid($tag_hot_column_cat_id));          $where[]=["cat_id","in",$tag_hotcolumn_cat_ids];          $tag_hot_column_contents_count=appModel("contents","ContentsCount")->where($where)->order("'.$tag['orderby'].'")->limit('.$tag['limit'].')->column("'.explode(' ', $tag['orderby'])[0].'","id");          $'.explode(' ', $tag['orderby'])[0].'=$tag_hot_column_contents_count;          $hotcolumn=[];          if($tag_hot_column_contents_count)$hotcolumn=appModel("contents","Contents")->where([["id","in", array_keys($tag_hot_column_contents_count)],["permission","=","1"]])->cache(3)->select();';          $parseStr .= 'foreach($hotcolumn as $'.$tag['key'].'=>$'.$tag['item'].'){ ?>';          $parseStr.=$content;          $parseStr .= '<?php 

           /**
            * 秀仙系统 shopxian_release/3.0.0
            * ============================================================================
            * * 版权所有 2017-2018 上海秀仙网络科技有限公司，并保留所有权利。
            * 网站地址: http://www.shopxian.com；
            * ----------------------------------------------------------------------------
            * 本软件只能免费使用  不允许对程序代码以任何形式任何目的再发布或者出售。
            * ============================================================================
            * 作者: 张启全 

            * 时间: 2018-03-11 16:08:28
            */
        } ?>';          return $parseStr;      }            public function tagSgpage($tag, $content){          $parseStr = '<?php 

           /**
            * 秀仙系统 shopxian_release/3.0.0
            * ============================================================================
            * * 版权所有 2017-2018 上海秀仙网络科技有限公司，并保留所有权利。
            * 网站地址: http://www.shopxian.com；
            * ----------------------------------------------------------------------------
            * 本软件只能免费使用  不允许对程序代码以任何形式任何目的再发布或者出售。
            * ============================================================================
            * 作者: 张启全 

            * 时间: 2018-03-11 16:08:28
            */
        $sgpage=appModel("contents","ContentsSgpage")->where(["permission"=>"1"])->order("rank asc")->cache(3)->limit('.$tag['limit'].')->select();';          $parseStr .= 'foreach($sgpage as $'.$tag['key'].'=>$'.$tag['item'].'){ ?>';          $parseStr.=$content;          $parseStr .= '<?php 

           /**
            * 秀仙系统 shopxian_release/3.0.0
            * ============================================================================
            * * 版权所有 2017-2018 上海秀仙网络科技有限公司，并保留所有权利。
            * 网站地址: http://www.shopxian.com；
            * ----------------------------------------------------------------------------
            * 本软件只能免费使用  不允许对程序代码以任何形式任何目的再发布或者出售。
            * ============================================================================
            * 作者: 张启全 

            * 时间: 2018-03-11 16:08:28
            */
        } ?>';          return $parseStr;      }            public function tagListnav($tag, $content){          $parseStr = '<?php 

           /**
            * 秀仙系统 shopxian_release/3.0.0
            * ============================================================================
            * * 版权所有 2017-2018 上海秀仙网络科技有限公司，并保留所有权利。
            * 网站地址: http://www.shopxian.com；
            * ----------------------------------------------------------------------------
            * 本软件只能免费使用  不允许对程序代码以任何形式任何目的再发布或者出售。
            * ============================================================================
            * 作者: 张启全 

            * 时间: 2018-03-11 16:08:28
            */
         $channelartlist=appModel("contents","ContentsCat")->where(["permission"=>1,"parent_id"=>input("id")])->select();';          $parseStr .= 'foreach($channelartlist as $'.$tag['key'].'=>$'.$tag['item'].'){?>';          $parseStr.=$content;          $parseStr .= '<?php 

           /**
            * 秀仙系统 shopxian_release/3.0.0
            * ============================================================================
            * * 版权所有 2017-2018 上海秀仙网络科技有限公司，并保留所有权利。
            * 网站地址: http://www.shopxian.com；
            * ----------------------------------------------------------------------------
            * 本软件只能免费使用  不允许对程序代码以任何形式任何目的再发布或者出售。
            * ============================================================================
            * 作者: 张启全 

            * 时间: 2018-03-11 16:08:28
            */
        } ?>';          return $parseStr;      }            public function tagListcolumn($tag, $content){          $image='';          $cat_id= input('id');          if(isset($tag['cat_id']))$cat_id=$tag['cat_id'];          if(isset($tag['images']))$image='["images","<>",""]';          $parseStr = '<?php 

           /**
            * 秀仙系统 shopxian_release/3.0.0
            * ============================================================================
            * * 版权所有 2017-2018 上海秀仙网络科技有限公司，并保留所有权利。
            * 网站地址: http://www.shopxian.com；
            * ----------------------------------------------------------------------------
            * 本软件只能免费使用  不允许对程序代码以任何形式任何目的再发布或者出售。
            * ============================================================================
            * 作者: 张启全 

            * 时间: 2018-03-11 16:08:28
            */
        $where=['.$image.'];          $cat_id='.$cat_id.';              $tag_list_column_content_cat=new \lib\contents\ContentCat();          $tag_listcolumn_cat_ids= array_merge($tag_list_column_content_cat->allSonid($cat_id));          $where[]=["cat_id","in",$tag_listcolumn_cat_ids];          $where[]=["permission","=","1"];          $listcolumn_page="";          $listcolumn=appModel("contents","Contents")->where($where)->order("'.$tag['orderby'].'")->cache(3)->paginate('.$tag['pagesize'].',false,["type"=> "\lib\base\Page"]);          $listcolumn_page=$listcolumn->render();';          $parseStr .= 'foreach($listcolumn as $'.$tag['key'].'=>$'.$tag['item'].'){ ?>';          $parseStr.=$content;          $parseStr .= '<?php 

           /**
            * 秀仙系统 shopxian_release/3.0.0
            * ============================================================================
            * * 版权所有 2017-2018 上海秀仙网络科技有限公司，并保留所有权利。
            * 网站地址: http://www.shopxian.com；
            * ----------------------------------------------------------------------------
            * 本软件只能免费使用  不允许对程序代码以任何形式任何目的再发布或者出售。
            * ============================================================================
            * 作者: 张启全 

            * 时间: 2018-03-11 16:08:28
            */
        } ?>';          return $parseStr;      }            public function tagListhotcolumn($tag, $content){          $cat_id= input('id');          $parseStr = '<?php 

           /**
            * 秀仙系统 shopxian_release/3.0.0
            * ============================================================================
            * * 版权所有 2017-2018 上海秀仙网络科技有限公司，并保留所有权利。
            * 网站地址: http://www.shopxian.com；
            * ----------------------------------------------------------------------------
            * 本软件只能免费使用  不允许对程序代码以任何形式任何目的再发布或者出售。
            * ============================================================================
            * 作者: 张启全 

            * 时间: 2018-03-11 16:08:28
            */
                  $order_field="'.explode(' ', $tag['orderby'])[0].'";              $where=[];              $tag_list_hot_column_cat_id='.$cat_id.';              $tag_list_column_content_cat=new \lib\contents\ContentCat();          $tag_list_hotcolumn_cat_ids= array_merge($tag_list_column_content_cat->allSonid($tag_list_hot_column_cat_id));          $where[]=["cat_id","in",$tag_list_hotcolumn_cat_ids];          $tag_list_hot_column_contents_count=appModel("contents","ContentsCount")->where($where)->order("'.$tag['orderby'].'")->field("$order_field,id")->cache(3)->paginate('.$tag['pagesize'].');          $tag_list_hot_column_contents_count_arr=$tag_list_hot_column_contents_count->toArray();          $listhotcolumn=[];          $$order_field=[];          $listhotcolumn_page="";          if($tag_list_hot_column_contents_count_arr["data"]){              $arr_key=array_column($tag_list_hot_column_contents_count_arr["data"], "id");              $arr_val=array_column($tag_list_hot_column_contents_count_arr["data"], $order_field);              $$order_field=array_combine($arr_key,$arr_val);              $where=[["id","in",$arr_key]];              $where[]=["permission","=","1"];              $listhotcolumn=appModel("contents","Contents")->where($where)->cache(3)->select();              $listhotcolumn_page=$tag_list_hot_column_contents_count->render();          }';          $parseStr .= 'foreach($listhotcolumn as $'.$tag['key'].'=>$'.$tag['item'].'){ ?>';          $parseStr.=$content;          $parseStr .= '<?php 

           /**
            * 秀仙系统 shopxian_release/3.0.0
            * ============================================================================
            * * 版权所有 2017-2018 上海秀仙网络科技有限公司，并保留所有权利。
            * 网站地址: http://www.shopxian.com；
            * ----------------------------------------------------------------------------
            * 本软件只能免费使用  不允许对程序代码以任何形式任何目的再发布或者出售。
            * ============================================================================
            * 作者: 张启全 

            * 时间: 2018-03-11 16:08:28
            */
        } ?>';          return $parseStr;      }            public function tagListad($tag, $content){          $id=0;          $cat_id=0;          $ad_type='code';          $orderby='rank asc';          $limit='1';          if(isset($tag['id']))$id=$tag['id'];          if(isset($tag['cat_id'])){              $cat_id=$tag['cat_id'];          }else{              $cat_id= input('id');          }          if(isset($tag['ad_type']))$ad_type=$tag['ad_type'];          if(isset($tag['orderby']))$orderby=$tag['orderby'];          if(isset($tag['limit']))$limit=$tag['limit'];          $parseStr = '<?php 

           /**
            * 秀仙系统 shopxian_release/3.0.0
            * ============================================================================
            * * 版权所有 2017-2018 上海秀仙网络科技有限公司，并保留所有权利。
            * 网站地址: http://www.shopxian.com；
            * ----------------------------------------------------------------------------
            * 本软件只能免费使用  不允许对程序代码以任何形式任何目的再发布或者出售。
            * ============================================================================
            * 作者: 张启全 

            * 时间: 2018-03-11 16:08:28
            */
                      $vars="";              if("'.$id.'"){                  $vars="id='.$id.'";              }else{                  $vars="cat_id='.$cat_id.'&ad_type='.$ad_type.'&orderby='.$orderby.'&limit='.$limit.'";              }                       ?><script src="<{url link="contents/Ad/get" vars="" suffix="true" domain="true"}>?<?php 

           /**
            * 秀仙系统 shopxian_release/3.0.0
            * ============================================================================
            * * 版权所有 2017-2018 上海秀仙网络科技有限公司，并保留所有权利。
            * 网站地址: http://www.shopxian.com；
            * ----------------------------------------------------------------------------
            * 本软件只能免费使用  不允许对程序代码以任何形式任何目的再发布或者出售。
            * ============================================================================
            * 作者: 张启全 

            * 时间: 2018-03-11 16:08:28
            */
        echo $vars; ?>" type="text/javascript" language="javascript"></script>';          return $parseStr;      }            public function tagArcad($tag, $content){          $id=0;          $cat_id='';          $ad_type='code';          $orderby='rank asc';          $limit='1';          if(isset($tag['id']))$id=$tag['id'];          if(isset($tag['cat_id'])){              $cat_id=$tag['cat_id'];          }          if(isset($tag['ad_type']))$ad_type=$tag['ad_type'];          if(isset($tag['orderby']))$orderby=$tag['orderby'];          if(isset($tag['limit']))$limit=$tag['limit'];          $parseStr = '<?php 

           /**
            * 秀仙系统 shopxian_release/3.0.0
            * ============================================================================
            * * 版权所有 2017-2018 上海秀仙网络科技有限公司，并保留所有权利。
            * 网站地址: http://www.shopxian.com；
            * ----------------------------------------------------------------------------
            * 本软件只能免费使用  不允许对程序代码以任何形式任何目的再发布或者出售。
            * ============================================================================
            * 作者: 张启全 

            * 时间: 2018-03-11 16:08:28
            */
                      $vars="";              if("'.$id.'"){                  $vars="id='.$id.'";              }else{                  $vars_cat_id="";                  if("'.$cat_id.'"==""){                      $vars_cat_id="cat_id=$cat_id&";                  }else{                      $vars_cat_id="cat_id='.$cat_id.'&";                  }                  $vars=$vars_cat_id."ad_type='.$ad_type.'&orderby='.$orderby.'&limit='.$limit.'";              }                       ?><script src="<{url link="contents/Ad/get" vars="" suffix="true" domain="true"}>?<?php 

           /**
            * 秀仙系统 shopxian_release/3.0.0
            * ============================================================================
            * * 版权所有 2017-2018 上海秀仙网络科技有限公司，并保留所有权利。
            * 网站地址: http://www.shopxian.com；
            * ----------------------------------------------------------------------------
            * 本软件只能免费使用  不允许对程序代码以任何形式任何目的再发布或者出售。
            * ============================================================================
            * 作者: 张启全 

            * 时间: 2018-03-11 16:08:28
            */
        echo $vars; ?>" type="text/javascript" language="javascript"></script>';          return $parseStr;      }  }  