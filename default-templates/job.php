<?php

  $result = "";

  $publicationStart = $job['publicationStart']->format("j.n.Y");
  $description = $job['description'];

  if (strlen($description) > 160) {
    $description = substr($description, 0, 160) . '...';
  }

  $result .= '<article>';

  $result .= sprintf('<div><a href="%s"><strong>%s</strong></a><p>%s</p><small>%s</small><br/><small style="color:#aaa;">%s</small></div>',$job['link'], $job['title'], $description, $job['organisationalUnit'], $publicationStart);
  
  $result .= '</article>';

  echo $result;
?>