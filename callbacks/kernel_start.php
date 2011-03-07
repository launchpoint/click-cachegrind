<?

foreach(array('grinds', 'dots') as $folder)
{
  $path = CACHEGRIND_CACHE_FPATH."/$folder";
  ensure_writable_folder($path);
}  
