<?


  function cachegrind_session_dot_file_name($obj)
  {
    if ($obj->dot_file_name == null)
    {
      $py_path = CORE_MODULES_FPATH."/cachegrind/xdebugtoolkit/cg2dot.py";
      $dot_path = CORE_MODULES_FPATH."/cachegrind/dots/".basename($obj->file_name).".dot";
      $cmd = "python \"$py_path\" \"{$obj->file_name}\" > \"$dot_path\"";
      click_exec($cmd);
      if (!file_exists($dot_path)) click_error("Error creating DOT from grind - $cmd", $obj);
      $obj->dot_file_name=$dot_path;
      $obj->save();
    }
    return $obj->dot_file_name;
  }


