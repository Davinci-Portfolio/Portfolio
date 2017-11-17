<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

if ( ! function_exists('getFileName'))
{
    function getFileName()
    {
        $ci =& get_instance();
        return $ci->router->fetch_class();
    }
}

if ( ! function_exists('GetJSFiles'))
{
    function GetJSFiles($data = null)
    {
        $standardJSFile = 'public/custom/js/standard.js';
        if (isset($data['JSFileNames'])) {
            array_unshift($data['JSFileNames'], $standardJSFile);
        } else {
            $data['JSFileNames'] = [$standardJSFile];
        }
        if (file_exists('public/custom/js/'. $data['fileNameView'] .'.js')) {
            $JSFileIsViewName = 'public/custom/js/'. $data['fileNameView'] .'.js';
            array_push($data['JSFileNames'], $JSFileIsViewName);
        } elseif (file_exists('public/custom/js/'. $data['fileName'] .'.js')) {
            $JSFileIsControllerName = 'public/custom/js/'. $data['fileName'] .'.js';
            array_push($data['JSFileNames'], $JSFileIsControllerName);
        }
        return $data['JSFileNames'];
    }
}

if ( ! function_exists('GetCSSFiles'))
{
    function GetCSSFiles($data = null)
    {
        $standardCSSFile = ['public/custom/css/standard.css'];
        if (isset($data['CSSFileNames'])) {
            array_unshift($data['CSSFileNames'], $standardCSSFile);
        } else {
            $data['CSSFileNames'] = $standardCSSFile;
        }
        if (file_exists('public/custom/css/'. $data['fileNameView'] .'.css')) {
            $CSSFileIsViewName = 'public/custom/css/'. $data['fileNameView'] .'.css';
            array_push($data['CSSFileNames'], $CSSFileIsViewName);
        } elseif (file_exists('public/custom/css/'. $data['fileName'] .'.css')) {
            $CSSFileIsControllerName = 'public/custom/css/'. $data['fileName'] .'.css';
            array_push($data['CSSFileNames'], $CSSFileIsControllerName);
        }
        return $data['CSSFileNames'];
    }
}

if( ! function_exists('crender'))
{
  function crender($f_template, $data = null)
  {
    $data['fileNameView'] = isset($data['fileNameView']) ? $data['fileNameView'] : getFileName();
    $data['fileName'] = getFileName();
    $data['JSFileNames'] = GetJSFiles($data);
    $data['CSSFileNames'] = GetCSSFiles($data);
    $ci =& get_instance();
    $ci->load->view('templates/header', $data);
    $ci->load->view($data['fileNameView']);
    $ci->load->view('templates/footer', $data);
  }
}

if( ! function_exists('loginRender'))
{
  function loginRender($f_template, $data = null)
  {
    $data['fileNameView'] = isset($data['fileNameView']) ? $data['fileNameView'] : getFileName();
    $data['fileName'] = getFileName();
    $data['JSFileNames'] = GetJSFiles($data);
    $data['CSSFileNames'] = GetCSSFiles($data);
    $ci =& get_instance();
    $ci->load->view($data['fileNameView'], $data);
    echo link_tag('public/adminLTE/css/bootstrap.min.css');
    echo link_tag('public/adminLTE/css/AdminLTE.min.css');
    echo link_tag('public/adminLTE/css/skins/skin-blue.min.css');
    echo link_tag('public/adminLTE/css/datatables/dataTables.bootstrap.css');
    echo link_tag('public/adminLTE/plugins/datepicker/datepicker3.css');
    echo link_tag('public/custom/css/Login.css');
  }
}

