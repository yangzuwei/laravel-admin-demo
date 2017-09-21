<?php

namespace App\Admin\Extensions;

use Encore\Admin\Form\Field;

class WangEditor extends Field
{
   protected $view = 'admin.wangeditor';//'admin::form.editor';

    protected static $css = [
        //'/packages/admin/wangEditor-2.1.22/dist/css/wangEditor.min.css',
        //'/packages/admin/wangEditor-3.0.8/release/wangEditor.css',
    ];

    protected static $js = [
        '/packages/admin/wangEditor-3.0.8/release/wangEditor.js',
        //'/packages/admin/wangEditor-2.1.22/dist/js/wangEditor.js',
        //'http://unpkg.com/wangeditor/release/wangEditor.min.js'
    ];

    public function render()
    {
        $this->token = csrf_token();
        $this->script = <<<EOT
        var E = window.wangEditor;
        var editor = new E('#weditor');
        editor.customConfig.zIndex = 1;
        editor.customConfig.onchange = function (html) {
            $("textarea[name='{$this->id}']").val(html);
        }
        
        editor.customConfig.uploadImgParams = {
            '_token':'{$this->token}',
        }
        
        editor.customConfig.uploadImgServer = '/admin/upload';
        editor.create();

EOT;
        return parent::render();

    }
}