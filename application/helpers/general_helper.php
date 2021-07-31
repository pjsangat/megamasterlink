<?php 

if (! function_exists('url_ending_trailing_slash')) {

    /**
     * The URL Ending Trailing Slash Helper.
     * 
     * This function helper handle some scenarios:
     *  1. If the given url have multiple ending trailing slash then this must
     *     cut and reduce to proper format.
     *  2. Check if the given url have ending trailing slash then this should be fine to use.
     *  3. If the given url do not have an ending trailing slash, at this scenario we do append
     *     a character in order to meet the requirement for the given url.
     * 
     * By default this function do the ff:
     *  1. Separate the query parameter from the URL and merge later on after passing some
     *     condition to determine if valid to add ending trailing slash.
     *  2. Seprate the anchor tag from the url or query parameter then later on will also be merge
     *     after some process are done.
     * 
     * @param string $url  The given url that will be analyze to determine if need to add
     *                     an ending trailing slash on it.
     * 
     * @return string
     */
    function url_ending_trailing_slash($url) 
    {
        // Separate the url and query parameter.
        $separatedUrlAndQueryParameter = explode('?', $url);
        
        // Prepare the url only string.
        $urlOnly = $separatedUrlAndQueryParameter[0];
    
        // Assume that the query parameter is not set.
        $queryParameterOnly = '';
        
        // If the separation is successful and the total length is greater 1
        // this means that we have a query parameter set on the given url.
        if (count($separatedUrlAndQueryParameter) > 1) {
            $queryParameterOnly = $separatedUrlAndQueryParameter[1];  
        }
        
        // Assume that the anchor tag is not set.
        $anchorTag = '';
        
        // Check if the url is holding anchor tag.
        // Then we must separate it and put it on a proper variable.
        if (strpos($urlOnly, '#') !== false) {
            $urlOnly = explode('#', $urlOnly);
            $anchorTag = $urlOnly[1];   
            $urlOnly = $urlOnly[0];
        }
        
        // Check if the query parameter is holding the anchor tag.
        // Then we must separate it and put it on a proper variable.
        if (strpos($queryParameterOnly, '#') !== false) {
            $queryParameterOnly = explode('#', $queryParameterOnly);
            $anchorTag = $queryParameterOnly[1];   
            $queryParameterOnly = $queryParameterOnly[0];
        }

        // Filter if URL is less than or equal to 1 length and
        // only equal to "/" then we should return the inputed url.
        if (strlen($urlOnly) <= 1 || $urlOnly === '/') {
            return $url;
        }

        // Generic function to handle condition to setting up the url with
        // query parameter.
        $appendQueryParameter = function() use ($queryParameterOnly) {
            return ($queryParameterOnly ? '?' . $queryParameterOnly : '');
        };
        
        // Generic function to handle condition to setting up the url with
        // query parameter.
        $appendAnchorTag = function() use ($anchorTag) {
            return ($anchorTag ? '#' . $anchorTag : '');
        };
        
        // List of common file extensions that might be use in a URL.
        $commonFileExtensionList = function () {
            return array(
                '.jpg',
                '.jpeg',
                '.png',
                '.gif'
            );
        };

        // Verify if the URL is a file type.
        $isFileURLType = function () use ($urlOnly, $commonFileExtensionList) {

            $extensions = $commonFileExtensionList();
            $extensionsLength = count($extensions) - 1;

            for ($x = 0; $x <= $extensionsLength; $x++) {
                // Check if the URL is a file type.
                if (strpos($urlOnly, $extensions[$x]) !== false) {
                    return true;
                }
            }

            return false;
        };
        
        // Set default max index for the given url characters.
        $maxIndex = (strlen($urlOnly) - 1);
        
        // Smart to detect if the given url have multiple trailing slash.
        while ($urlOnly[$maxIndex] === '/') {
            
            $currentLastCharacter = substr($urlOnly, -1);
            
            // We need to check if the next character
            // is not a trailing slash.
            if ($currentLastCharacter !== '/') {
                break;
            }
            
            // Remove the excess trailing slash.
            $urlOnly = substr($urlOnly, 0, -1);
            // And reset the max index for the url.
            $maxIndex = (strlen($urlOnly) - 1);
        }
        
        if ($isFileURLType()) {
            $urlOnly = ($urlOnly[$maxIndex] === '/') ? substr($urlOnly, -1) : $urlOnly;
            return $urlOnly . $appendQueryParameter() . $appendAnchorTag();    
        }
        
        // If the ENDING_TRAILING_SLASH constant is set to false then
        // we should remove or do not append an ending trailing slash.
        if (defined('ENDING_TRAILING_SLASH') && !ENDING_TRAILING_SLASH) {

            if ($urlOnly[$maxIndex] === '/') {
                return substr($urlOnly, 0, -1) . $appendQueryParameter() . $appendAnchorTag();
            }

            return $urlOnly . $appendQueryParameter() . $appendAnchorTag();
        }
        
        // Check if the last character is indeed ending trailing slash.
        // This means the url already in format with ending trailing slash.
        if ($urlOnly[$maxIndex] === '/') {
            return $urlOnly . $appendQueryParameter() . $appendAnchorTag();   
        }
        
        // If we reach this point then the given url does not have a
        // ending trailing slash.
        return $urlOnly . '/' . $appendQueryParameter() . $appendAnchorTag();
    }
}

if (! function_exists('remove_tags')) {

    /**
     * The HTML and PHP Tags strip common helper.
     * 
     * This removes HTML or PHP tags in a given string.
     * 
     * @param string $content  The content that will need to be sanitize unwanted tags.
     * 
     * @return string
     */
    function remove_tags($content) 
    {
        return strip_tags($content);
    }
}

if (! function_exists('sanitize_rss_xml_text')) {

    /**
     * The sanitize rss text common helper.
     * 
     * This removes all unwanted characters for rss xml format.
     * 
     * @param string $text  The text that will need to be sanitize unwanted tags.
     * 
     * @return string
     */
    function sanitize_rss_xml_text($text) 
    {
        return preg_replace('/&(?!#?[a-z0-9]+;)/', '&amp;', $text);
    }

}

if (! function_exists('script_compressed_extension')) {

    /**
     * The Script Compressed Extension replacer helper.
     * 
     * This will replace the extension of uncompressed version .min.js to .gz
     * for non local environment.
     * 
     * @param string $url  The url for the script.
     * 
     * @return string
     */
    function script_compressed_extension($url) 
    {
        // Only used unfinified version if the environment is for local.
        if (IS_LOCAL) {
            return $url;
        }

        return str_replace('.min.js', '.gz', $url);
    }
}

if (! function_exists('curl_data')) {

    function curl_data($url, $as_array = true, $referer = false) 
    {
        $ch = curl_init();

        $options = array(
            CURLOPT_URL => $url,
            CURLOPT_HEADER => false,
            CURLOPT_USERAGENT => "Mozilla/5.0 (X11; Linux x86_64; rv:21.0) Gecko/20100101 Firefox/21.0",
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_SSL_VERIFYHOST => false,
            CURLOPT_SSL_VERIFYPEER => false,
            CURLOPT_CONNECTTIMEOUT => 10,
            CURLOPT_TIMEOUT => 10,
        );

        if ($referer) {
            curl_setopt($ch, CURLOPT_REFERER,  $referer);
        }
     
        curl_setopt_array($ch, $options);
      
        $result = curl_exec($ch);
   
        $curlResult = curl_getinfo($ch);

        curl_close($ch);

        $data = json_decode($result, $as_array);

        return $data;
    }
}

if (! function_exists('p')) {
    
    function p($arr = array())
    {
        print "<pre>";
        print_r($arr);
        print "</pre>";
    }
}

if (! function_exists('pe')) {

    function pe($arr = array())
    {
        print "<pre>";
        print_r($arr);
        print "</pre>";

        exit();
    }
}

function slugify($text)
{
  // replace non letter or digits by -
  $text = preg_replace('~[^\pL\d]+~u', '-', $text);

  // transliterate
  $text = iconv('utf-8', 'us-ascii//TRANSLIT', $text);

  // remove unwanted characters
  $text = preg_replace('~[^-\w]+~', '', $text);

  // trim
  $text = trim($text, '-');

  // remove duplicate -
  $text = preg_replace('~-+~', '-', $text);

  // lowercase
  $text = strtolower($text);

  if (empty($text)) {
    return 'n-a';
  }

  return $text;
}