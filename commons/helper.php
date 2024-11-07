<?php
//khai bao cac ham dung global
if (!function_exists('requireFile')) {
    function requireFile($pathFolder)
    {

        $files = array_diff(scandir($pathFolder), ['.', '..']);

        foreach ($files as $file) {
            require_once $pathFolder . $file;
        }
    }
}

if (!function_exists('debug')) {
    function debug($data)
    {

        echo "<pre>";

        print_r($data);

        die;
    }
}

if (!function_exists('e404')) {
    function e404()
    {

        echo "404 - Not found";

        die;
    }
}

if (!function_exists('uploadFile')) {
    function uploadFile($file, $pathToUploadFolder)
    {

        $imgPath = $pathToUploadFolder . time() . '-' . basename($file['name']);

        if (move_uploaded_file($file['tmp_name'], PATH_UPLOAD . $imgPath)) {
            return $imgPath;
        }

        return null;
    }
}

if (!function_exists('get_file_upload')) {
    function get_file_upload($field, $default = null)
    {

        if (isset($_FILES[$field]) && $_FILES[$field]['size'] > 0) {
            return $_FILES[$field];
        } else {
            return $default ?? null;
        }
    }
}

if (!function_exists("middlewareAuthCheck")) {
    function middlewareAuthCheck($act)
    {
        if ($act == 'login') {
            if (!empty($_SESSION['user'])) {
                header('location:' . BASE_URL_ADMIN);
                exit();
            }
        } elseif (empty($_SESSION['user'])) {
            header('location:' . BASE_URL_ADMIN . '?act=login');
            exit();
        }
    }
}

if (!function_exists("settings")) {
    function settings()
    {
        $fileSetting = PATH_UPLOAD . '/uploads/settings.json';
        
        if (file_exists($fileSetting)) {
            $data = json_decode(file_get_contents($fileSetting), true);
        } else {
            $settings = listAll('settings');

            $keys = array_column($settings, 'setting_key');

            $values = array_column($settings, 'value');

            $data = array_combine($keys, $values);

            file_put_contents($fileSetting, json_encode($data));
        }

        return $data;
    }
}
