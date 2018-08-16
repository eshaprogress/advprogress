<?php

namespace App\Serializers;

use League\Fractal\Serializer\ArraySerializer;

class CustomArraySerializer extends ArraySerializer
{
    /**
     * Serialize an item.
     *
     * @param string $resourceKey
     * @param array  $data
     *
     * @return array
     */
    public function item($resourceKey, array $data)
    {
        return $resourceKey ? [$resourceKey => $data] : $data;
    }

    public function mergeIncludes($transformedData, $includedData)
    {
        $includedData = array_map(function ($include) {
            if(isset($include['data']))
                return $include['data'];

            return $include;
        }, $includedData);

        return parent::mergeIncludes($transformedData, $includedData);
    }
}