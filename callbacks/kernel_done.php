<?

if (function_exists('xdebug_get_profiler_filename') && xdebug_get_profiler_filename())
{
  $grind = CachegrindSession::create( array(
    'attributes'=>array(
      'file_name'=>xdebug_get_profiler_filename(),
      'subdomain'=>$subdomain,
      'http_request_method'=>$_SERVER['REQUEST_METHOD'],
      'uri'=>$_SERVER['REQUEST_URI'],
      'get_vars'=>$_GET,
      'post_vars'=>$_POST,
      'rendered_output'=>$rendered_page,
      'execution_duration'=>($end-$start)*1000
    )
  ));
}
