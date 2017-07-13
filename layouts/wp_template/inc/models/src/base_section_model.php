<?php

namespace VirgilSecurity\Models\Src;


use VirgilSecurity\Models\Base\AttachmentModel;

abstract class BaseSectionModel extends BaseModel
{
    const SHOW_SECTION_MOD = '';

    const FILTER_ITEM_KEY = 'is_hidden';


    public function IsShow()
    {
        return get_theme_mod(static::SHOW_SECTION_MOD, true);
    }


    public function imageModValueToModel($image)
    {
        if (preg_match('/^[0-9]*$/', $image)) {
            return AttachmentModel::createFromImageId($image);
        }

        return AttachmentModel::createFromImageUrl($image);
    }


    public function textModValueToList($items)
    {
        if (!$items) {
            return;
        }

        return explode("\n\n", $items);
    }


    protected function filterCollection($collection, $filters = [])
    {
        $values = array_filter(
            $collection,
            function ($value) {
                return $value[self::FILTER_ITEM_KEY] == false;
            }
        );

        if (!empty($filters)) {

            $values = array_map(
                function ($item) use ($filters) {

                    foreach ($filters as $field => $fieldFilters) {
                        if (array_key_exists($field, $item)) {
                            foreach ($fieldFilters as $fieldFilter) {

                                if (!is_callable($fieldFilter)) {
                                    continue;
                                }

                                $item[$field] = call_user_func_array($fieldFilter, [$item[$field]]);
                            }
                        }
                    }

                    return $item;
                },
                $values
            );
        }

        return $values;
    }
}
