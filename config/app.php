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
                         return [           'app_name'               => '',           'app_host'               => '',           'app_debug'              => true ,           'app_trace'              => false,           'app_status'             => '',           'app_multi_module'       => true,           'auto_bind_module'       => false,           'root_namespace'         => [],           'default_return_type'    => 'html',           'default_ajax_return'    => 'json',           'default_jsonp_handler'  => 'jsonpReturn',           'var_jsonp_handler'      => 'callback',           'default_timezone'       => 'PRC',           'lang_switch_on'         => false,           'default_filter'         => '',           'default_lang'           => 'zh-cn',           'class_suffix'           => false,           'controller_suffix'      => false,                              'default_module'         => 'index',           'deny_module_list'       => ['common'],           'default_controller'     => 'Index',           'default_action'         => 'index',           'default_validate'       => '',           'empty_module'           => 'base',           'empty_controller'       => 'Error',           'use_action_prefix'      => false,           'action_suffix'          => '',           'controller_auto_search' => false,                              'var_pathinfo'           => 's',           'pathinfo_fetch'         => ['ORIG_PATH_INFO', 'REDIRECT_PATH_INFO', 'REDIRECT_URL'],           'pathinfo_depr'          => '-',           'https_agent_name'       => '',           'url_html_suffix'        => 'html',           'url_common_param'       => false,           'url_param_type'         => 0,           'url_lazy_route'         => false,           'url_route_must'         => false,           'route_complete_match'   => false,           'route_annotation'       => false,           'url_domain_root'        => '',           'url_convert'            => true,           'url_controller_layer'   => 'controller',           'var_method'             => '_method',           'var_ajax'               => '_ajax',           'var_pjax'               => '_pjax',           'request_cache'          => false,           'request_cache_expire'   => null,           'request_cache_except'   => [],             'dispatch_success_tmpl'  => Env::get('think_path') . 'tpl/dispatch_jump.tpl',      'dispatch_error_tmpl'    => Env::get('think_path') . 'tpl/dispatch_jump.tpl',             'exception_tmpl'         => Env::get('think_path') . 'tpl/think_exception.tpl',             'error_message'          => '页面错误！请稍后再试～',           'show_error_msg'         => true,           'exception_handle'       => '',    ];  