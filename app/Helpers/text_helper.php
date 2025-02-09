<?php

if (!function_exists('formatText')) {
  /**
   * Converts a string to lowercase and removes leading/trailing spaces.
   * This utility function takes a string as input, converts it to lowercase, 
   * and removes any extra spaces at the beginning and end of the string.
   *
   * This can be useful for standardizing user inputs or cleaning text data before processing.
   *
   * @param string $text The text to process
   * @return string The processed text, in lowercase with no extra spaces
   */
  function formatText(string $text): string
  {
    return trim(strtolower($text));
  }
}
