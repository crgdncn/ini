<?php

/**
 * get the object class name without namespacing
 *
 * @param      object  $object  The object
 * @return     string  The object base classname.
 */
function getObjectBaseClassName($object)
{
    return trim(basename(str_replace('\\', '/', get_class($object))));
}

/**
 * Generate the URL to a named route.
 *
 * @param  string  $name
 * @param  mixed  $parameters
 * @param  bool  $absolute
 * @return string
 */
function relativeRoute($name, $parameters = [])
{
    $absolute = false;
    return route($name, $parameters, $absolute);
}
