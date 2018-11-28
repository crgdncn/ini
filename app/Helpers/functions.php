<?php

/**
 * get the object class name without namespacing
 *
 * @param      object  $object  The object
 * @return     string  The object base classname.
 */
function getObjectBaseClassName($object)
{
    return basename(str_replace('\\', '/', get_class($object)));
}
