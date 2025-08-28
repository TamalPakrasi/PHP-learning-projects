<?php

function getPriorityTheme(string $priority) : string {
  switch ($priority) {
    case 'high':
      return "text-red-300 border-red-300";
    case 'medium':
      return "text-yellow-300 border-yellow-300";
    case 'low':
      return "text-green-300 border-green-300";
    default:
      return "";
  }
}