<?php

namespace App\Admin\Controllers;

use App\Models\Hits;
use Encore\Admin\Form\Field\UploadField;
use Encore\Admin\Form;
use Encore\Admin\Grid;
use Encore\Admin\Facades\Admin;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\File\UploadedFile;
use App\Http\Controllers\Controller;
//use Encore\Admin\Controllers\ModelForm;

class UploadController extends Controller
{
    use UploadField;

    const FILE_DELETE_FLAG = '__del__';

    public function uploadEditorImage(Request $request)
    {
        $paths = [];
        $this->initStorage();

        $files = $request->allFiles();
        $paths = $this->prepare($files);
        echo json_encode(['errno'=>0,'data'=>array_values($paths)]);
    }

    public function prepare($files)
    {
        if (request()->has(static::FILE_DELETE_FLAG)) {
            return $this->destroy(request(static::FILE_DELETE_FLAG));
        }

        $targets = array_map([$this, 'prepareForeach'], $files);

        return array_merge($this->original(), $targets);
    }

    protected function prepareForeach(UploadedFile $file = null)
    {
        $this->name = $this->getStoreName($file);

        return config('filesystems.disks.admin.url').$this->upload($file);
    }

    public function destroy($key)
    {
        $files = $this->original ?: [];

        $file = array_get($files, $key);

        if ($this->storage->exists($file)) {
            $this->storage->delete($file);
        }

        unset($files[$key]);

        return array_values($files);
    }

    public function original()
    {
        if (empty($this->original)) {
            return [];
        }

        return $this->original;
    }

    public function defaultDirectory()
    {
        return config('admin.upload.directory.file');
    }

}
