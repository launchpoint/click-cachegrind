<?
return;
$pending_grinds = CachegrindSession::find_all_by_subdomain($subdomain, array(
  'conditions'=>"file_name like '/tmp/%'"
));
foreach($pending_grinds as $grind)
{
  list($junk, $junk, $session_id, $pid, $time) = split("\.", basename($grind->file_name)); 
  $dst = CORE_MODULES_FPATH."/cachegrind/grinds/{$grind->id}.cachegrind";
  rename($grind->file_name, $dst);
  $grind->file_name = $dst;
  $grind->save();
  echo "Moved {$grind->file_name}<br/>";
  dot_to_png($grind->dot_file_name());
  echo "Made DOT and PNG for {$grind->file_name}<br/>";
}

$expired_grinds = CachegrindSession::find_all_by_subdomain($subdomain, array(
  'conditions'=>'created_at <= now() - interval 24 hour'
));
foreach($expired_grinds as $grind)
{
  if (file_exists($grind->file_name)) unlink($grind->file_name);
  if (file_exists($grind->dot_file_name())) unlink($grind->dot_file_name());
  echo "Expired {$grind->file_name}<br/>";
  $grind->delete();
}
