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
        
return [ 
    [ 
        "id"=>"contents", 
        "name"=>"cms内容系统", 
        "app"=>"contents", 
        "controller"=>"", 
        "method"=>"", 
        "rank"=>"200", 
        "display"=>true, 
        "arg"=>"", 
        "menu"=>[ 
            [ 
                "name"=>"核心管理", 
                "app"=>"contents", 
                "controller"=>"contents", 
                "method"=>"", 
                "rank"=>"1", 
                "display"=>true, 
                "arg"=>"", 
                "menu"=>[ 
                    [ 
                        "name"=>"栏目管理", 
                        "app"=>"contents", 
                        "controller"=>"AdminCat", 
                        "method"=>"index", 
                        "rank"=>"1", 
                        "display"=>true, 
                        "arg"=>"" 
                    ], 
                    [ 
                        "name"=>"栏目编辑", 
                        "app"=>"contents", 
                        "controller"=>"AdminCat", 
                        "method"=>"add", 
                        "rank"=>"1", 
                        "display"=>false, 
                        "arg"=>"" 
                    ], 
                    [ 
                        "name"=>"栏目保存", 
                        "app"=>"contents", 
                        "controller"=>"AdminCat", 
                        "method"=>"toAdd", 
                        "rank"=>"1", 
                        "display"=>false, 
                        "arg"=>"" 
                    ], 
                    [ 
                        "name"=>"栏目删除", 
                        "app"=>"contents", 
                        "controller"=>"AdminCat", 
                        "method"=>"finderDel", 
                        "rank"=>"1", 
                        "display"=>false, 
                        "arg"=>"" 
                    ], 
                    [ 
                        "name"=>"栏目数量", 
                        "app"=>"contents", 
                        "controller"=>"AdminCat", 
                        "method"=>"contentsCount", 
                        "rank"=>"1", 
                        "display"=>false, 
                        "arg"=>"" 
                    ], 
                    [ 
                        "name"=>"文档列表", 
                        "app"=>"contents", 
                        "controller"=>"AdminContents", 
                        "method"=>"index", 
                        "rank"=>"2", 
                        "display"=>true, 
                        "arg"=>"" 
                    ], 
                    [ 
                        "name"=>"文档编辑", 
                        "app"=>"contents", 
                        "controller"=>"AdminContents", 
                        "method"=>"add", 
                        "rank"=>"1", 
                        "display"=>false, 
                        "arg"=>"" 
                    ], 
                    [ 
                        "name"=>"文档保存", 
                        "app"=>"contents", 
                        "controller"=>"AdminContents", 
                        "method"=>"toAdd", 
                        "rank"=>"1", 
                        "display"=>false, 
                        "arg"=>"" 
                    ], 
                    [ 
                        "name"=>"文档删除", 
                        "app"=>"contents", 
                        "controller"=>"AdminContents", 
                        "method"=>"del", 
                        "rank"=>"1", 
                        "display"=>false, 
                        "arg"=>"" 
                    ], 
                    [ 
                        "name"=>"评论管理", 
                        "app"=>"contents", 
                        "controller"=>"AdminComment", 
                        "method"=>"index", 
                        "rank"=>"3", 
                        "display"=>true, 
                        "arg"=>"" 
                    ] 
                ] 
            ], 
            [ 
                "name"=>"频道模型", 
                "app"=>"contents", 
                "controller"=>"AdminChanneltype", 
                "method"=>"", 
                "rank"=>"1", 
                "display"=>true, 
                "arg"=>"", 
                "menu"=>[ 
                    [ 
                        "name"=>"内容模型管理", 
                        "app"=>"contents", 
                        "controller"=>"AdminChanneltype", 
                        "method"=>"index", 
                        "rank"=>"1", 
                        "display"=>true, 
                        "arg"=>"" 
                    ], 
                    [ 
                        "name"=>"内容模型编辑", 
                        "app"=>"contents", 
                        "controller"=>"AdminChanneltype", 
                        "method"=>"finderAdd", 
                        "rank"=>"1", 
                        "display"=>false, 
                        "arg"=>"" 
                    ], 
                    [ 
                        "name"=>"内容模型保存", 
                        "app"=>"contents", 
                        "controller"=>"AdminChanneltype", 
                        "method"=>"toAdd", 
                        "rank"=>"1", 
                        "display"=>false, 
                        "arg"=>"" 
                    ], 
                    [ 
                        "name"=>"单页文档管理", 
                        "app"=>"contents", 
                        "controller"=>"AdminSinglePage", 
                        "method"=>"index", 
                        "rank"=>"3", 
                        "display"=>true, 
                        "arg"=>"" 
                    ], 
                    [ 
                        "name"=>"单页文档编辑", 
                        "app"=>"contents", 
                        "controller"=>"AdminSinglePage", 
                        "method"=>"finderAdd", 
                        "rank"=>"3", 
                        "display"=>false, 
                        "arg"=>"" 
                    ], 
                    [ 
                        "name"=>"单页文档保存", 
                        "app"=>"contents", 
                        "controller"=>"AdminSinglePage", 
                        "method"=>"autoToAdd", 
                        "rank"=>"3", 
                        "display"=>false, 
                        "arg"=>"" 
                    ], 
                    [ 
                        "name"=>"单页文档删除", 
                        "app"=>"contents", 
                        "controller"=>"AdminSinglePage", 
                        "method"=>"finderDel", 
                        "rank"=>"3", 
                        "display"=>false, 
                        "arg"=>"" 
                    ], 
                    [ 
                        "name"=>"自定义表单模型", 
                        "app"=>"contents", 
                        "controller"=>"AdminCustomForm", 
                        "method"=>"index", 
                        "rank"=>"3", 
                        "display"=>true, 
                        "arg"=>"" 
                    ], 
                    [ 
                        "name"=>"自定义表单模型编辑", 
                        "app"=>"contents", 
                        "controller"=>"AdminCustomForm", 
                        "method"=>"finderAdd", 
                        "rank"=>"3", 
                        "display"=>false, 
                        "arg"=>"" 
                    ], 
                    [ 
                        "name"=>"自定义表单模型保存", 
                        "app"=>"contents", 
                        "controller"=>"AdminCustomForm", 
                        "method"=>"autoToAdd", 
                        "rank"=>"3", 
                        "display"=>false, 
                        "arg"=>"" 
                    ], 
                    [ 
                        "name"=>"自定义表单模型删除", 
                        "app"=>"contents", 
                        "controller"=>"AdminCustomForm", 
                        "method"=>"finderDel", 
                        "rank"=>"3", 
                        "display"=>false, 
                        "arg"=>"" 
                    ] 
                ] 
            ], 
            [ 
                "name"=>"辅助插件", 
                "app"=>"contents", 
                "controller"=>"Adminplus", 
                "method"=>"", 
                "rank"=>"1", 
                "display"=>true, 
                "arg"=>"", 
                "menu"=>[ 
                    [ 
                        "name"=>"广告管理", 
                        "app"=>"contents", 
                        "controller"=>"AdminAd", 
                        "method"=>"index", 
                        "rank"=>"1", 
                        "display"=>true, 
                        "arg"=>"" 
                    ], 
                    [ 
                        "name"=>"广告编辑", 
                        "app"=>"contents", 
                        "controller"=>"AdminAd", 
                        "method"=>"finderAdd", 
                        "rank"=>"1", 
                        "display"=>false, 
                        "arg"=>"" 
                    ], 
                    [ 
                        "name"=>"广告保存", 
                        "app"=>"contents", 
                        "controller"=>"AdminAd", 
                        "method"=>"toAdd", 
                        "rank"=>"1", 
                        "display"=>false, 
                        "arg"=>"" 
                    ], 
                    [ 
                        "name"=>"广告删除", 
                        "app"=>"contents", 
                        "controller"=>"AdminAd", 
                        "method"=>"finderDel", 
                        "rank"=>"1", 
                        "display"=>false, 
                        "arg"=>"" 
                    ], 
                    [ 
                        "name"=>"友情链接", 
                        "app"=>"contents", 
                        "controller"=>"AdminFriendLink", 
                        "method"=>"index", 
                        "rank"=>"1", 
                        "display"=>true, 
                        "arg"=>"" 
                    ], 
                    [ 
                        "name"=>"友情链接编辑", 
                        "app"=>"contents", 
                        "controller"=>"AdminFriendLink", 
                        "method"=>"finderAdd", 
                        "rank"=>"1", 
                        "display"=>false, 
                        "arg"=>"" 
                    ], 
                    [ 
                        "name"=>"友情链接保存", 
                        "app"=>"contents", 
                        "controller"=>"AdminFriendLink", 
                        "method"=>"autoToAdd", 
                        "rank"=>"1", 
                        "display"=>false, 
                        "arg"=>"" 
                    ], 
                    [ 
                        "name"=>"友情链接删除", 
                        "app"=>"contents", 
                        "controller"=>"AdminFriendLink", 
                        "method"=>"finderDel", 
                        "rank"=>"1", 
                        "display"=>false, 
                        "arg"=>"" 
                    ] 
                ] 
            ], 
            [ 
                "name"=>"内容系统设置", 
                "app"=>"contents", 
                "controller"=>"AdminSetting", 
                "method"=>"", 
                "rank"=>"1", 
                "display"=>true, 
                "arg"=>"", 
                "menu"=>[ 
                    [ 
                        "name"=>"站点设置", 
                        "app"=>"contents", 
                        "controller"=>"AdminSetting", 
                        "method"=>"site", 
                        "rank"=>"1", 
                        "display"=>true, 
                        "arg"=>"" 
                    ], 
                    [ 
                        "name"=>"互动设置", 
                        "app"=>"contents", 
                        "controller"=>"AdminSetting", 
                        "method"=>"interactive", 
                        "rank"=>"1", 
                        "display"=>true, 
                        "arg"=>"" 
                    ] 
                ] 
            ] 
        ]  
    ] 
]; 
 
