<?php
/**
 * File containing the ZoneAdapter class.
 *
 * @copyright Copyright (C) eZ Systems AS. All rights reserved.
 * @license For full copyright and license information view LICENSE file distributed with this source code.
 * @version //autogentag//
 */

namespace eZ\Publish\Core\MVC\Legacy\Templating\Adapter;

use eZ\Publish\Core\FieldType\Page\Parts\Zone;

/**
 * Adapter for Page\Parts\Zone objects
 */
class ZoneAdapter extends DefinitionBasedAdapter
{
    /**
     * Returns the hash map, mapping the legacy attributes name (key) to the value object property name (value)
     * (e.g. my_legacy_attribute_name => newPropertyName).
     *
     * The value of an entry in the returned array can also be a closure which would be called directly with the value object as only parameter.
     *
     * @return array
     */
    protected function definition()
    {
        return array(
            'id'                => 'id',
            'action'            => 'action',
            'zone_identifier'   => 'identifier',
            'blocks'            =>
                function ( Zone $zone )
                {
                    $legacyBlocks = array();
                    foreach ( $zone->blocks as $block )
                    {
                        $legacyBlocks[] = new BlockAdapter( $block );
                    }

                    return $legacyBlocks;
                }
        );
    }
}
