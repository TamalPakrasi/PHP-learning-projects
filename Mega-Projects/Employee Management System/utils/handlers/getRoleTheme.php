<?php

function getRoleTheme(string $jobRole) : string {
  switch ($jobRole) {
    case 'Management':
      return "text-yellow-300 border-yellow-300";
    case 'Technical':
      return "text-green-300 border-green-300";
    case 'Non-Technical':
      return "text-blue-300 border-blue-300";
    case 'Support':
      return "text-red-300 border-red-300";
    default:
      return "";
  }
}