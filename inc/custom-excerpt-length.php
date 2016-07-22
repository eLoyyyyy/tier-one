<?php

/*
    http://stackoverflow.com/questions/4082662/multiple-excerpt-lengths-in-wordpress#4082845
*/

class Excerpt {

  // Default length (by WordPress)
  public static $length = 55;

  // So you can call: my_excerpt('short');
  public static $types = array(
      'daniel-short' => 5,
      'bryan-short' => 15,
      'catstyle2-short' => 8,
      'short' => 25,
      'regular' => 55,
      'long' => 100
    );

  /**
   * Sets the length for the excerpt,
   * then it adds the WP filter
   * And automatically calls the_excerpt();
   *
   * @param string $new_length 
   * @return void
   * @author Baylor Rae'
   */
  public static function length($new_length = 55) {
    Excerpt::$length = $new_length;

    add_filter('excerpt_length', 'Excerpt::new_length');
    remove_filter('the_excerpt', 'wpautop');

    Excerpt::output();
  }

  // Tells WP the new length
  public static function new_length() {
    if( isset(Excerpt::$types[Excerpt::$length]) )
      return Excerpt::$types[Excerpt::$length];
    else
      return Excerpt::$length;
  }

  // Echoes out the excerpt
  public static function output() {
    the_excerpt();
  }

}

/* https://wordpress.org/support/topic/how-to-remove-the-from-the-excerpt#post-1000123 */
function trim_excerpt($text) {
    /* http://wordpress.stackexchange.com/questions/109358/hellip-appearing-instead-of#answer-114031 */
    return str_replace('[&hellip;]', '', $text);
}
add_filter('get_the_excerpt', 'trim_excerpt');

// An alias to the class
function tierone_excerpt($length = 55) {
  Excerpt::length($length);
}